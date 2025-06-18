<?php
namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Document;
use App\Models\Prescription;


use App\Models\Indicateur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DoctorController extends Controller
{
    // 1. Tableau de bord médecin
    public function dashboard()
    {
        $user = Auth::user();
        $today = Carbon::today();
        $userId = auth()->id();

        // Rendez-vous à venir
        $upcomingAppointments = Appointment::where('doctor_id', $user->id)
            ->whereDate('appointment_datetime', '>=', $today)
            ->orderBy('appointment_datetime')
            ->get();

        $countUpcoming = $upcomingAppointments->count();
        $nextAppointment = $upcomingAppointments->first();
        $daysUntilNext = $nextAppointment
            ? $today->diffInDays(Carbon::parse($nextAppointment->appointment_datetime))
            : null;

        // Patients suivis
        $patientIds = Appointment::where('doctor_id', $user->id)
            ->pluck('patient_id')
            ->unique();

        $countPatients = $patientIds->count();
        $lastPatient = User::whereIn('id', $patientIds)->latest()->first()?->name;

        $lastAppointment = Appointment::with('patient') // Chargement anticipé de la relation
        ->where('doctor_id', $user->id)
        ->whereDate('appointment_datetime', '<', $today)
        ->orderBy('appointment_datetime', 'desc')
        ->first();
        $patients = User::whereHas('patientAppointments', function ($query) use ($userId) {
            $query->where('doctor_id', $userId);
        })
        ->with(['patientAppointments' => function ($q) use ($today) {
            $q->orderBy('appointment_datetime', 'desc');
        }])
        ->get();


$daysSinceLast = $lastAppointment
    ? Carbon::parse($lastAppointment->appointment_datetime)->diffInDays($today)
    : null;
     $weeklyAppointments = Appointment::where('doctor_id', $user->id)
        ->whereBetween('appointment_datetime', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])
        ->count();

        // Documents médicaux créés
        $documents = Document::where('doctor_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $countDocuments = $documents->count();
        $lastDocDate = $documents->first()?->created_at;

        // Liste des prochains rendez-vous
        $nextAppointmentsList = Appointment::where('doctor_id', $user->id)
            ->whereDate('appointment_datetime', '>=', $today)
            ->orderBy('appointment_datetime')
            ->take(5)
            ->get();

        // Mes patients
        $mesPatients = User::whereHas('patientAppointments', function ($query) use ($userId) {
            $query->where('doctor_id', $userId);
        })->get();

        return view('pages.docteur', compact(
            'countUpcoming',
            "weeklyAppointments",
            'nextAppointment',
            'daysUntilNext',
            'countPatients',
            'lastPatient',
            'lastAppointment',
            'daysSinceLast',
            'countDocuments',
            'lastDocDate',
            'nextAppointmentsList',
            'mesPatients',
            'documents',
        ));
    }

    public function appointments()
{
    $appointments = Appointment::with(['patient'])
        ->where('doctor_id', Auth::id())
        ->orderBy('appointment_datetime', 'desc')
        ->get();

    $managedAppointment = request('manage') 
        ? Appointment::find(request('manage'))
        : null;

    return view('pages.docteurs.appointments', [
        'appointments' => $appointments,
        'managedAppointment' => $managedAppointment,
        'availableStatuses' => ['accepté', 'refusé', 'en attente']
    ]);
}


public function updateAppointmentStatus(Request $request, $id)
{
    $validated = $request->validate([
        'status' => 'required|in:accepté,refusé,en attente',
        'reason' => 'nullable|string|max:500'
    ]);

    $appointment = Appointment::where('doctor_id', Auth::id())
        ->findOrFail($id);

    $appointment->update([
        'status' => $validated['status'],
        'reason' => $validated['reason'] ?? null,
        'status_changed_at' => now()
    ]);

    return redirect()->route('docteur.rendezvous.index')
        ->with('success', 'Statut mis à jour');
}
public function manageAppointment(Request $request)
{
    // Your appointment management logic here
    // Example: Process form data, update database, etc.

    // Redirect back with a success message
    return back()->with('success', 'Appointment managed successfully!');
}

    // 5. Mes patients
   public function myPatients()
{   
    $patients = User::whereHas('patientAppointments', function ($query) {
        $query->where('doctor_id', Auth::id());
    })
    ->with(['patientAppointments']) // ⚠️ Ajout essentiel
    ->get();

    return view('pages.docteurs.patients', compact('patients'));
}


    
    // 8. Voir les documents créés
    public function documents()
    {
        $documents = Document::where('doctor_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.docteurs.documents', compact('documents'));
    }

    // 9. Messagerie
    public function messaging()
    {
        $patients = User::whereHas('patientAppointments', function ($query) {
            $query->where('doctor_id', Auth::id());
        })->get();

        return view('pages.docteurs.messaging', compact('patients'));
    }

    // 10. Paramètres
    public function settings()
    {
        return view('pages.docteurs.settings');
    }

    // 11. Recherche
    public function recherche(Request $request)
    {
        $query = $request->input('query');

        // Rechercher dans les patients
        $patients = User::where('role', 'patient')
            ->whereHas('patientAppointments', function ($q) {
                $q->where('doctor_id', Auth::id());
            })
            ->where(function($q) use ($query) {
                $q->where('name', 'like', "%$query%")
                  ->orWhere('email', 'like', "%$query%");
            })
            ->get();
        
            
        // Rechercher dans les rendez-vous
        $rendezvous = Appointment::where('doctor_id', Auth::id())
            ->where(function ($q) use ($query) {
                $q->where('appointment_datetime', 'like', "%$query%")
                  ->orWhere('notes', 'like', "%$query%");
            })
            ->get();

        return view('pages.docteurs.resultats', compact('patients', 'rendezvous', 'query'));
    }
    public function listPrescriptions()
{
    $prescriptions = Prescription::with(['patient' => function($query) {
            $query->select('id', 'name',  'phone');
        }])
        ->where('doctor_id', auth()->id())
        ->orderBy('created_at', 'desc')
        ->paginate(10);

    return view('pages.docteurs.prescription', [ // Notez le singulier "prescription"
        'prescriptions' => $prescriptions,
        'title' => 'Mes ordonnances'
    ]);
}
    
}