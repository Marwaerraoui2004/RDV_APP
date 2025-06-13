<?php

namespace App\Http\Controllers;

use App\Models\User; 
use App\Models\Rating; 
use App\Models\Prescription;
use Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DoctorController extends Controller
{
    /**
     * Display the doctor's dashboard.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function dashboard(Request $request)
    {
        $doctor = Auth::user();

        if ($doctor->role !== 'doctor') {
            return redirect('/')->with('error', 'Accès non autorisé.');
        }

        // Dashboard data retrieval (as in the previous response)
        $today = Carbon::today();
        $appointmentsToday = \App\Models\Appointment::where('doctor_id', $doctor->id)
                                        ->whereDate('appointment_date', $today)
                                        ->count();

        $yesterday = Carbon::yesterday();
        $appointmentsYesterday = \App\Models\Appointment::where('doctor_id', $doctor->id)
                                            ->whereDate('appointment_date', $yesterday)
                                            ->count();
        $appointmentComparisonToday = $appointmentsToday - $appointmentsYesterday;


        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $newPatientsThisWeek = \App\Models\Appointment::where('doctor_id', $doctor->id)
                                          ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                                          ->distinct('patient_id')
                                          ->count();
        $startLastWeek = Carbon::now()->subWeek()->startOfWeek();
        $endLastWeek = Carbon::now()->subWeek()->endOfWeek();
        $newPatientsLastWeek = \App\Models\Appointment::where('doctor_id', $doctor->id)
                                          ->whereBetween('created_at', [$startLastWeek, $endLastWeek])
                                          ->distinct('patient_id')
                                          ->count();
        $newPatientsComparisonWeek = $newPatientsThisWeek - $newPatientsLastWeek;


        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $estimatedRevenueThisMonth = \App\Models\Appointment::where('doctor_id', $doctor->id)
                                                ->where('status', 'completed')
                                                ->whereBetween('appointment_date', [$startOfMonth, $endOfMonth])
                                                ->sum('cost');

        $startLastMonth = Carbon::now()->subMonth()->startOfMonth();
        $endLastMonth = Carbon::now()->subMonth()->endOfMonth();
        $estimatedRevenueLastMonth = \App\Models\Appointment::where('doctor_id', $doctor->id)
                                                ->where('status', 'completed')
                                                ->whereBetween('appointment_date', [$startLastMonth, $endLastMonth])
                                                ->sum('cost');
        $revenueComparisonMonth = ($estimatedRevenueLastMonth > 0) ?
                                  (($estimatedRevenueThisMonth - $estimatedRevenueLastMonth) / $estimatedRevenueLastMonth) * 100
                                  : ($estimatedRevenueThisMonth > 0 ? 100 : 0);


        $startOfQuarter = Carbon::now()->subMonths(3)->startOfMonth();
        $endOfQuarter = Carbon::now()->endOfMonth();
        $currentQuarterRatings = Rating::where('doctor_id', $doctor->id)
                                       ->whereBetween('created_at', [$startOfQuarter, $endOfQuarter])
                                       ->avg('rating');
        $currentQuarterRatings = round($currentQuarterRatings, 1);

        $startOfPreviousQuarter = Carbon::now()->subMonths(6)->startOfMonth();
        $endOfPreviousQuarter = Carbon::now()->subMonths(3)->endOfMonth();
        $previousQuarterRatings = Rating::where('doctor_id', $doctor->id)
                                        ->whereBetween('created_at', [$startOfPreviousQuarter, $endOfPreviousQuarter])
                                        ->avg('rating');
        $previousQuarterRatings = round($previousQuarterRatings, 1);
        $satisfactionComparisonQuarter = $currentQuarterRatings - $previousQuarterRatings;


        $upcomingAppointments = \App\Models\Appointment::where('doctor_id', $doctor->id)
                                          ->where('appointment_date', '>=', $today)
                                          ->whereIn('status', ['pending', 'confirmed'])
                                          ->orderBy('appointment_date')
                                          ->orderBy('appointment_time')
                                          ->limit(5)
                                          ->with('patient')
                                          ->get();

        return view('pages.docteur', [
            'doctor' => $doctor,
            'appointmentsToday' => $appointmentsToday,
            'appointmentComparisonToday' => $appointmentComparisonToday,
            'newPatientsThisWeek' => $newPatientsThisWeek,
            'newPatientsComparisonWeek' => $newPatientsComparisonWeek,
            'estimatedRevenueThisMonth' => $estimatedRevenueThisMonth,
            'revenueComparisonMonth' => $revenueComparisonMonth,
            'patientSatisfaction' => $currentQuarterRatings,
            'satisfactionComparisonQuarter' => $satisfactionComparisonQuarter,
            'upcomingAppointments' => $upcomingAppointments,
        ]);
    }

    /**
     * Display a list of all appointments for the doctor.
     *
     * @return \Illuminate\View\View
     */
    public function manageAppointments()
    {
        $doctor = Auth::user();

        $appointments = \App\Models\Appointment::where('doctor_id', $doctor->id)
                                   ->with('patient') // Eager load patient details
                                   ->orderBy('appointment_date', 'desc')
                                   ->orderBy('appointment_time', 'desc')
                                   ->paginate(10); // Paginate for large lists

        return view('doctor.appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new appointment (optional, usually done by patient or receptionist).
     *
     * @return \Illuminate\View\View
     */
    public function createAppointment()
    {
        $patients = User::where('role', 'patient')->get(); // Get all patients to select from
        return view('doctor.appointments.create', compact('patients'));
    }

    /**
     * Store a newly created appointment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeAppointment(Request $request)
    {
        $doctor = Auth::user();

        $request->validate([
            'patient_id' => 'required|exists:users,id,role,patient',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required|date_format:H:i',
            'cost' => 'nullable|numeric|min:0',
            'notes' => 'nullable|string|max:1000',
        ]);

        \App\Models\Appointment::create([
            'doctor_id' => $doctor->id,
            'patient_id' => $request->patient_id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'status' => 'pending', // Default status for new appointments
            'cost' => $request->cost,
            'notes' => $request->notes,
        ]);

        return redirect()->route('doctor.appointments.index')->with('success', 'Rendez-vous créé avec succès.');
    }

    /**
     * Display the specified appointment.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\View\View
     */
    public function showAppointment(\App\Models\Appointment $appointment)
    {
        // Ensure the doctor owns this appointment
        if (Auth::id() !== $appointment->doctor_id) {
            abort(403, 'Accès non autorisé.');
        }

        // Load patient and any related prescriptions if available
        $appointment->load('patient', 'prescriptions'); // Assuming appointment has a prescriptions relationship

        return view('doctor.appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified appointment.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\View\View
     */
    public function editAppointment(\App\Models\Appointment $appointment)
    {
        if (Auth::id() !== $appointment->doctor_id) {
            abort(403, 'Accès non autorisé.');
        }
        $patients = User::where('role', 'patient')->get();
        return view('doctor.appointments.edit', compact('appointment', 'patients'));
    }

    /**
     * Update the specified appointment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateAppointment(Request $request, \App\Models\Appointment $appointment)
    {
        if (Auth::id() !== $appointment->doctor_id) {
            abort(403, 'Accès non autorisé.');
        }

        $request->validate([
            'patient_id' => 'required|exists:users,id,role,patient',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
            'cost' => 'nullable|numeric|min:0',
            'notes' => 'nullable|string|max:1000',
        ]);

        $appointment->update($request->all());

        return redirect()->route('doctor.appointments.index')->with('success', 'Rendez-vous mis à jour avec succès.');
    }

    /**
     * Remove the specified appointment from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyAppointment(\App\Models\Appointment $appointment)
    {
        if (Auth::id() !== $appointment->doctor_id) {
            abort(403, 'Accès non autorisé.');
        }

        $appointment->delete();

        return redirect()->route('doctor.appointments.index')->with('success', 'Rendez-vous supprimé avec succès.');
    }

    // --- Patient Management ---

    /**
     * Display a list of patients seen by this doctor.
     *
     * @return \Illuminate\View\View
     */
    public function managePatients()
    {
        $doctor = Auth::user();

        // Get unique patients that have had appointments with this doctor
        $patients = User::whereHas('patientAppointments', function ($query) use ($doctor) {
            $query->where('doctor_id', $doctor->id);
        })
        ->paginate(10);

        return view('doctor.patients.index', compact('patients'));
    }

    /**
     * Display the specified patient's details and history with this doctor.
     *
     * @param  \App\Models\User  $patient
     * @return \Illuminate\View\View
     */
    public function showPatient(User $patient)
    {
        // Ensure the selected user is a patient
        if ($patient->role !== 'patient') {
            abort(404);
        }

        $doctor = Auth::user();

        // Ensure this doctor has a history with this patient
        $hasHistory = \App\Models\Appointment::where('doctor_id', $doctor->id)
                                 ->where('patient_id', $patient->id)
                                 ->exists();

        if (!$hasHistory) {
            abort(403, 'Vous n\'avez pas de dossier pour ce patient.');
        }

        $appointments = $patient->patientAppointments()
                                ->where('doctor_id', $doctor->id)
                                ->orderBy('appointment_date', 'desc')
                                ->get();

        $prescriptions = Prescription::where('doctor_id', $doctor->id)
                                     ->where('patient_id', $patient->id)
                                     ->orderBy('created_at', 'desc')
                                     ->get();

        // You might want to get ratings given by this patient to this doctor too
        $ratings = Rating::where('doctor_id', $doctor->id)
                         ->where('patient_id', $patient->id)
                         ->orderBy('created_at', 'desc')
                         ->get();

        return view('doctor.patients.show', compact('patient', 'appointments', 'prescriptions', 'ratings'));
    }

    // --- Prescription Management ---

    /**
     * Display a list of prescriptions issued by this doctor.
     *
     * @return \Illuminate\View\View
     */
    public function managePrescriptions()
    {
        $doctor = Auth::user();

        $prescriptions = Prescription::where('doctor_id', $doctor->id)
                                     ->with('patient') // Eager load patient details
                                     ->orderBy('created_at', 'desc')
                                     ->paginate(10);

        return view('doctor.prescriptions.index', compact('prescriptions'));
    }

    /**
     * Show the form for creating a new prescription.
     *
     * @param  \App\Models\Appointment|null  $appointment (optional, for direct linking)
     * @return \Illuminate\View\View
     */
    public function createPrescription(\App\Models\Appointment $appointment = null)
    {
        $doctor = Auth::user();
        $patients = User::where('role', 'patient')->get();

        // If an appointment is provided, ensure the doctor is linked and preload patient
        if ($appointment && $appointment->doctor_id !== $doctor->id) {
            abort(403, 'Accès non autorisé.');
        }

        $selectedPatient = $appointment ? $appointment->patient : null;

        return view('doctor.prescriptions.create', compact('patients', 'selectedPatient', 'appointment'));
    }

    /**
     * Store a newly created prescription in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storePrescription(Request $request)
    {
        $doctor = Auth::user();

        $request->validate([
            'patient_id' => 'required|exists:users,id,role,patient',
            'medication_name' => 'required|string|max:255',
            'dosage' => 'required|string|max:255',
            'frequency' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'notes' => 'nullable|string|max:1000',
            'appointment_id' => 'nullable|exists:appointments,id', // Optional link to appointment
        ]);

        // Optional: Verify that the patient_id is related to the doctor if appointment_id is provided
        if ($request->appointment_id) {
            $appointment = \App\Models\Appointment::find($request->appointment_id);
            if (!$appointment || $appointment->doctor_id !== $doctor->id || $appointment->patient_id !== $request->patient_id) {
                return back()->withErrors(['appointment_id' => 'Rendez-vous ou patient invalide pour ce docteur.']);
            }
        }

        Prescription::create([
            'doctor_id' => $doctor->id,
            'patient_id' => $request->patient_id,
            'appointment_id' => $request->appointment_id, // Can be null
            'medication_name' => $request->medication_name,
            'dosage' => $request->dosage,
            'frequency' => $request->frequency,
            'duration' => $request->duration,
            'notes' => $request->notes,
        ]);

        return redirect()->route('doctor.prescriptions.index')->with('success', 'Ordonnance créée avec succès.');
    }

    /**
     * Display the specified prescription.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\View\View
     */
    public function showPrescription(Prescription $prescription)
    {
        if (Auth::id() !== $prescription->doctor_id) {
            abort(403, 'Accès non autorisé.');
        }

        $prescription->load('patient', 'doctor'); // Load related models

        return view('doctor.prescriptions.show', compact('prescription'));
    }

    /**
     * Show the form for editing the specified prescription.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\View\View
     */
    public function editPrescription(Prescription $prescription)
    {
        if (Auth::id() !== $prescription->doctor_id) {
            abort(403, 'Accès non autorisé.');
        }
        $patients = User::where('role', 'patient')->get();
        return view('doctor.prescriptions.edit', compact('prescription', 'patients'));
    }

    /**
     * Update the specified prescription in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePrescription(Request $request, Prescription $prescription)
    {
        if (Auth::id() !== $prescription->doctor_id) {
            abort(403, 'Accès non autorisé.');
        }

        $request->validate([
            'patient_id' => 'required|exists:users,id,role,patient',
            'medication_name' => 'required|string|max:255',
            'dosage' => 'required|string|max:255',
            'frequency' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'notes' => 'nullable|string|max:1000',
            'appointment_id' => 'nullable|exists:appointments,id',
        ]);

        // Optional: Verify that the patient_id is related to the doctor if appointment_id is provided
        if ($request->appointment_id) {
            $appointment = \App\Models\Appointment::find($request->appointment_id);
            if (!$appointment || $appointment->doctor_id !== $prescription->doctor_id || $appointment->patient_id !== $request->patient_id) {
                return back()->withErrors(['appointment_id' => 'Rendez-vous ou patient invalide pour ce docteur.']);
            }
        }

        $prescription->update($request->all());

        return redirect()->route('doctor.prescriptions.index')->with('success', 'Ordonnance mise à jour avec succès.');
    }

    /**
     * Remove the specified prescription from storage.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyPrescription(Prescription $prescription)
    {
        if (Auth::id() !== $prescription->doctor_id) {
            abort(403, 'Accès non autorisé.');
        }

        $prescription->delete();

        return redirect()->route('doctor.prescriptions.index')->with('success', 'Ordonnance supprimée avec succès.');
    }
}