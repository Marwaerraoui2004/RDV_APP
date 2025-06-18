<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HealthIndicatorController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PrescriptionController;


Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->role === 'doctor') {
        return redirect()->route('docteur.dashboard');
    } elseif ($user->role === 'patient') {
        return redirect()->route('patient.dashboard');
    }

    // fallback si aucun rôle reconnu
    return redirect('/');
})->middleware(['auth'])->name('dashboard');

Route::get('/renouvler-password', [AuthController::class, 'showResetForm'])->name('password.reset.form');
Route::post('/renouvler-password', [AuthController::class, 'resetPassword'])->name('password.reset.direct');

Route::get('/', function () {
    return view('pages.home');
})->name('home');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
       
   Route::get('/indicateurs/edit', [HealthIndicatorController::class, 'edit'])->name('health.edit');
    Route::post('/indicateurs/update', [HealthIndicatorController::class, 'update'])->name('health.update');
});




Route::middleware('auth')->group(function() {
    Route::get('/documents', [DocumentController::class, 'index'])->name('patient.documents');
    Route::get('/documents/download/{id}', [DocumentController::class, 'download'])->name('documents.download');
});



require __DIR__.'/auth.php';
use App\Http\Controllers\PatientController;

Route::middleware(['auth'])->prefix('patient')->controller(PatientController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('patient.dashboard');

    Route::get('/rendez-vous', 'appointments')->name('patient.appointments');
    Route::get('/rendez-vous/create', 'create')->name('patient.appointments.create');
    Route::post('/rendez-vous/store', 'store')->name('patient.appointments.store');


    Route::get('/medecins', 'myDoctors')->name('patient.doctors');

    Route::get('/patient/contact', [PatientController::class, 'contact'])->name('patient.contact');


    Route::get('/ordonnances', 'prescriptions')->name('patient.prescriptions');
    Route::get('/sante', 'health')->name('patient.health');
    
    Route::get('/parametres', 'settings')->name('patient.settings');

    Route::get('/recherche',  'recherche')->name('patient.recherche');
    Route::put('/appointments/{id}/cancel', 'cancel')->name('appointments.cancel');

    Route::get('/patient/rendezvous/{id}/annuler',  'cancel')->name('appointment.cancel');



});

// Routes pour les médecins
Route::middleware(['auth', 'verified'])->prefix('docteur')->name('docteur.')->group(function () {
    Route::prefix('rendezvous')
            ->name('rendezvous.')
            ->group(function() {
                Route::get('/', [DoctorController::class, 'appointments'])->name('index');
                Route::get('/gerer/{id}', [DoctorController::class, 'manageAppointment'])->name('gerer');
                Route::put('/statut/{id}', [DoctorController::class, 'updateAppointmentStatus'])->name('statut'); // Changé de 'update-status' à 'statut'
            });
    

        Route::get('/dashboard', [DoctorController::class, 'dashboard'])->name('dashboard');


Route::get('/prescription', [DoctorController::class, 'listPrescriptions'])->name('prescription');
    // Gestion des patients
    Route::get('/patients', [DoctorController::class, 'myPatients'])->name('patients');
    
    // Gestion des documents
    Route::prefix('documents')->name('documents.')->group(function () {
        Route::get('/', [DoctorController::class, 'documents'])->name('index');
        Route::get('/creer', [DoctorController::class, 'createDocument'])->name('creer');
        Route::post('/enregistrer', [DoctorController::class, 'storeDocument'])->name('enregistrer');
    });
    
    // Messagerie
    Route::get('/messagerie', [DoctorController::class, 'messaging'])->name('messagerie');
    
    // Paramètres
    Route::get('/parametres', [DoctorController::class, 'settings'])->name('parametres');
    
    // Recherche
    Route::get('/recherche', [DoctorController::class, 'recherche'])->name('recherche');
});

// Routes pour les conseils (commun aux médecins et patients)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/conseil/demande', [MessageController::class, 'create'])->name('message.create');
    Route::post('/conseil', [MessageController::class, 'store'])->name('message.store');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/docteurs/prescription', [PrescriptionController::class, 'index'])->name('pages.docteurs.prescription');
    Route::get('/prescriptions/create', [PrescriptionController::class, 'create'])->name('prescriptions.create');
    Route::post('/prescriptions', [PrescriptionController::class, 'store'])->name('prescriptions.store');
});







Route::post('/login/google', [GoogleAuthController::class, 'loginWithGoogle']);
    Route::get('auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback'])->name('google.callback');

