<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role !== 'patient') {
                abort(403, 'Access denied');
            }
            return $next($request);
        });
    }

    // 1. Tableau de bord
    public function dashboard()
    {
        $patient = Auth::user();

        $appointmentsCount = $patient->patientAppointments()
            ->where('appointment_time', '>', now())
            ->count();

        $nextAppointment = $patient->patientAppointments()
            ->where('appointment_time', '>', now())
            ->orderBy('appointment_time')
            ->first();

        $nextAppointmentInDays = $nextAppointment
            ? now()->diffInDays(Carbon::parse($nextAppointment->appointment_time))
            : null;

        $doctors = $patient->patientAppointments()
            ->with('doctor')
            ->get()
            ->pluck('doctor')
            ->unique('id');

        $doctorsCount = $doctors->count();
        $lastDoctorName = $doctors->last()?->name ?? 'N/A';

        $lastConsultation = $patient->patientAppointments()
            ->where('appointment_time', '<', now())
            ->orderByDesc('appointment_time')
            ->first();

        $lastConsultationDaysAgo = $lastConsultation
            ? Carbon::parse($lastConsultation->appointment_time)->diffInDays(now())
            : null;

        $nextConsultationIn = '1 mois';

        $documentsCount = $patient->documents()->count();

        $lastDocument = $patient->documents()->latest()->first();

        $lastDocumentDate = $lastDocument
            ? Carbon::parse($lastDocument->created_at)->diffForHumans()
            : 'Aucun';

        return view('patient.dashboard', compact(
            'patient',
            'appointmentsCount',
            'nextAppointmentInDays',
            'doctorsCount',
            'lastDoctorName',
            'lastConsultationDaysAgo',
            'nextConsultationIn',
            'documentsCount',
            'lastDocumentDate'
        ));
    }

    // 2. Mes rendez-vous
    public function appointments()
    {
        $appointments = Auth::user()->patientAppointments()->with('doctor')->latest()->get();
        return view('patients.appointments', compact('appointments'));
    }

    // 3. Mes médecins
    public function myDoctors()
    {
        $doctors = User::where('role', 'doctor')->get();
        return view('patients.doctors', compact('doctors'));
    }

    // 4. Mes documents
    public function myDocuments()
    {
        $documents = Auth::user()->documents()->latest()->get();
        return view('patients.documents', compact('documents'));
    }

    // 5. Mes ordonnances
    public function prescriptions()
    {
        $prescriptions = Auth::user()->prescriptions()->latest()->get();
        return view('patients.prescriptions', compact('prescriptions'));
    }

    // 6. Ma santé
    public function health()
    {
        $healthIndicators = [
            ['title' => 'Tension', 'value' => '120/80'],
            ['title' => 'Fréquence cardiaque', 'value' => '70 bpm'],
            ['title' => 'IMC', 'value' => '23.1'],
        ];
        return view('patients.health', compact('healthIndicators'));
    }

    // 7. Messagerie
    public function messaging()
    {
        return view('patients.messaging');
    }

    // 8. Paramètres
    public function settings()
    {
        $patient = Auth::user();
        return view('patients.settings', compact('patient'));
    }

    // Rendez-vous - Formulaire
    public function createAppointment()
    {
        $doctors = User::where('role', 'doctor')->get();
        return view('patients.appointment', compact('doctors'));
    }

    // AJAX - Heures disponibles
    public function getAvailableHours(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:users,id',
            'date' => 'required|date|after_or_equal:today',
        ]);

        $date = Carbon::parse($request->date);
        $doctorId = $request->doctor_id;
        $hours = [];
        $start = $date->copy()->setTime(9, 0);
        $end = $date->copy()->setTime(17, 0);

        while ($start < $end) {
            $time = $start->format('Y-m-d H:i:s');
            $isBooked = Appointment::where('doctor_id', $doctorId)
                ->where('appointment_time', $time)
                ->exists();
            if (!$isBooked) {
                $hours[] = $start->format('H:i');
            }
            $start->addMinutes(30);
        }

        return response()->json($hours);
    }

    // Prendre un rendez-vous
    public function storeAppointment(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:users,id',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
        ]);

        $appointmentTime = Carbon::parse($request->date . ' ' . $request->time);

        Appointment::create([
            'patient_id' => Auth::id(),
            'doctor_id' => $request->doctor_id,
            'appointment_time' => $appointmentTime,
            'status' => 'pending',
        ]);

        return redirect()->route('patient.dashboard')->with('success', 'Rendez-vous pris avec succès');
    }
}