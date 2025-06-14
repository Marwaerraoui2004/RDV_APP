<?php
namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Document;
use App\Models\Indicateur;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class PatientController extends Controller{
    // 1. Tableau de bord
     public function dashboard()
{
    $user = Auth::user();
    $today = Carbon::today();
    $userId = auth()->id();

    // Rendez-vous à venir
    $upcomingAppointments = Appointment::where('patient_id', $user->id)
        ->whereDate('appointment_date', '>=', $today)
        ->orderBy('appointment_date')
        ->get();

    $countUpcoming = $upcomingAppointments->count();
    $nextAppointment = $upcomingAppointments->first();
    $daysUntilNext = $nextAppointment
        ? $today->diffInDays(Carbon::parse($nextAppointment->appointment_date))
        : null;

    // Médecins suivis (via les rdv passés ou à venir)
    $doctorIds = Appointment::where('patient_id', $user->id)
        ->pluck('doctor_id')
        ->unique();

    $countDoctors = $doctorIds->count();
    $lastDoctor = \App\Models\User::whereIn('id', $doctorIds)->latest()->first()?->name;

    // Dernière consultation passée
    $lastAppointment = Appointment::where('patient_id', $user->id)
        ->whereDate('appointment_date', '<', $today)
        ->orderBy('appointment_date', 'desc')
        ->first();
    $indicateurs = Indicateur::where('user_id', auth()->id())->get();
    $daysSinceLast = $lastAppointment
        ? Carbon::parse($lastAppointment->appointment_date)->diffInDays($today)
        : null;

    // Documents médicaux
    $documents = Document::where('patient_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->get();

    $countDocuments = $documents->count();
    $lastDocDate = $documents->first()?->created_at;
    $nextAppointmentsList = Appointment::where('patient_id', $user->id)
    ->whereDate('appointment_date', '>=', $today)
    ->orderBy('appointment_date')
    ->take(5)
    ->get();
     $mesMedecins = User::whereHas('doctorAppointments', function ($query) use ($userId) {
        $query->where('patient_id', $userId);
        })->get();

    return view('pages.patient', compact(
        'countUpcoming',
        'nextAppointment',
        'daysUntilNext',
        'countDoctors',
        'lastDoctor',
        'daysSinceLast',
        'countDocuments',
        'lastDocDate',
        'nextAppointmentsList',
        'mesMedecins',
        'indicateurs',
    ));
}
    public function contacter($id)
    {
        $medecin = User::findOrFail($id);
        return view('patients.contacter', compact('medecin'));
    }

    // 2. Mes rendez-vous
    public function appointments()
    {
        return view('patients.appointments');
    }

    // 3. Mes médecins
    public function mydoctors()
    {
        return view('patients.doctors');
    }

    // 4. Mes documents
    public function myDocuments()
    {
        return view('patients.documents');
    }

    // 5. Mes ordonnances
    public function prescriptions()
    {
        return view('patients.prescriptions');
    }

    // 6. Ma santé
    public function health()
    {
        return view('patients.health');
    }

    // 7. Messagerie
    public function messaging()
    {
        return view('patients.messaging');
    }

    // 8. Paramètres
    public function settings()
    {
        return view('patients.settings');
    }



    public function recherche(Request $request)
{
    $query = $request->input('query');

    // Rechercher dans les utilisateurs qui sont des médecins
    $medecins = User::where('role', 'doctor')
        ->where(function($q) use ($query) {
            $q->where('name', 'like', "%$query%")
              ->orWhere('email', 'like', "%$query%");
        })
        ->get();

    // Rechercher dans les rendez-vous du patient connecté
    $rendezvous = Appointment::where('patient_id', auth()->id())
        ->where(function ($q) use ($query) {
            $q->where('date', 'like', "%$query%")
              ->orWhere('objet', 'like', "%$query%"); // si tu as un champ 'objet' ou similaire
        })
        ->get();

    return view('pages.resultats', compact('medecins', 'rendezvous', 'query'));
}
}
