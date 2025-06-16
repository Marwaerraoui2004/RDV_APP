<?php
namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Document;
use App\Models\Indicateur;
use App\Models\User;
use Illuminate\Http\Request;
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
    ->whereDate('appointment_datetime', '>=', $today)  // Filtre sur la date seulement (ignore l'heure)
    ->orderBy('appointment_datetime')                  // Trie par date + heure
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
        ->whereDate('appointment_datetime', '<', $today)
        ->orderBy('appointment_datetime', 'desc')
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
    ->whereDate('appointment_datetime', '>=', $today)
    ->orderBy('appointment_datetime')
    ->take(5)
    ->get();
     $mesMedecins = User::whereHas('appointmentsReceived', function ($query) use ($userId) {
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
        'documents'
    ));
}

    // 2. Mes rendez-vous
   public function appointments()
    {
        $appointments = Appointment::where('patient_id', Auth::id())
            ->orderBy('appointment_datetime', 'desc')  // Attention : selon ta migration, tu as date ET heure séparés
            ->orderBy('appointment_datetime', 'desc')
            ->get();

        return view('patients.appointments', compact('appointments'));
    }
   public function create(Request $request)
    {
        $selectedDoctorId = $request->input('doctor_id');
        
        $doctors = User::where('role', 'doctor')
                    ->withAvg('reviewsReceived', 'rating')
                    ->get();

        return view('patients.create_appointment', compact('doctors', 'selectedDoctorId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:users,id',
            'appointment_datetime' => 'required|date|after:now',
            'notes' => 'nullable|string',
        ]);

        Appointment::create([
            'patient_id' => auth()->id(),
            'doctor_id' => $request->doctor_id,
            'appointment_datetime' => $request->appointment_datetime,
            'notes' => $request->notes,
            'status' => 'en attente',
        ]);

        return redirect()->route('patient.dashboard')->with('success', 'Votre demande de rendez-vous a été envoyée.');
    }

    

    // 3. Mes médecins
    public function mydoctors()
        {
            $patientId = auth()->id();

            // Récupère tous les docteurs avec qui le patient a déjà eu un rendez-vous
            $doctors = User::whereHas('appointmentsReceived', function ($query) use ($patientId) {
                $query->where('patient_id', $patientId);
            })->withAvg('reviewsReceived', 'rating')->get();

            return view('patients.doctors', compact('doctors'));
        }

    // 4. Mes documents
   public function myDocuments()
    {
        $documents = Document::where('patient_id', Auth::id())
            ->with('doctor') // Assure-toi que la relation doctor() existe dans le modèle Document
            ->latest()
            ->get();

        return view('patients.documents', compact('documents'));
    }

    // 5. Mes ordonnances
    public function prescriptions()
{
    $patientId = auth()->id(); // ou Auth::user()->id;

    $prescriptions = \App\Models\Prescription::where('patient_id', $patientId)
        ->with('doctor') // pour afficher le nom du docteur
        ->orderByDesc('created_at')
        ->get();

    return view('patients.prescriptions', compact('prescriptions'));
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
public function contact()
{
    return view('patient.contact'); // ou la vue que tu souhaites afficher
}

}
