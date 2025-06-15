<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HealthIndicatorController;
use App\Http\Controllers\MessageController;

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
    Route::get('/dashboard', 'dashboard')->name('patient.dashboard')->middleware(['auth', 'verified']);

    Route::get('/rendez-vous', 'appointments')->name('patient.appointments');
    Route::get('/rendez-vous/create', 'create')->name('patient.appointments.create');
    Route::post('/rendez-vous/store', 'store')->name('patient.appointments.store');


    Route::get('/medecins', 'myDoctors')->name('patient.doctors');

    Route::get('/patient/contact', [PatientController::class, 'contact'])->name('patient.contact');


    Route::get('/ordonnances', 'prescriptions')->name('patient.prescriptions');
    Route::get('/sante', 'health')->name('patient.health');
    
    Route::get('/parametres', 'settings')->name('patient.settings');

    Route::get('/recherche',  'recherche')->name('patient.recherche');
    


});


Route::middleware('auth')->group(function () {
    Route::get('/conseil/demande', [MessageController::class, 'create'])->name('message.create');
    Route::post('/conseil', [MessageController::class, 'store'])->name('message.store');
});












Route::post('/login/google', [GoogleAuthController::class, 'loginWithGoogle']);
    Route::get('auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback'])->name('google.callback');


Route::middleware(['auth'])->group(function () {
    

    Route::get('/doctor/dashboard', [DoctorController::class, 'dashboard'])->name('docteur.dashboard');

    // Appointments
    Route::get('/doctor/appointments', [DoctorController::class, 'manageAppointments'])->name('doctor.appointments.index');
    Route::get('/doctor/appointments/create', [DoctorController::class, 'createAppointment'])->name('doctor.appointments.create');
    Route::post('/doctor/appointments', [DoctorController::class, 'storeAppointment'])->name('doctor.appointments.store');
    Route::get('/doctor/appointments/{appointment}', [DoctorController::class, 'showAppointment'])->name('doctor.appointments.show');
    Route::get('/doctor/appointments/{appointment}/edit', [DoctorController::class, 'editAppointment'])->name('doctor.appointments.edit');
    Route::put('/doctor/appointments/{appointment}', [DoctorController::class, 'updateAppointment'])->name('doctor.appointments.update');
    Route::delete('/doctor/appointments/{appointment}', [DoctorController::class, 'destroyAppointment'])->name('doctor.appointments.destroy');

    // Patients
    Route::get('/doctor/patients', [DoctorController::class, 'managePatients'])->name('doctor.patients.index');
    Route::get('/doctor/patients/{patient}', [DoctorController::class, 'showPatient'])->name('doctor.patients.show');

    // Prescriptions
    Route::get('/doctor/prescriptions', [DoctorController::class, 'managePrescriptions'])->name('doctor.prescriptions.index');
    Route::get('/doctor/prescriptions/create', [DoctorController::class, 'createPrescription'])->name('doctor.prescriptions.create');
    // Optional: Route for creating prescription directly from an appointment
    Route::get('/doctor/appointments/{appointment}/prescriptions/create', [DoctorController::class, 'createPrescription'])->name('doctor.appointments.prescriptions.create');
    Route::post('/doctor/prescriptions', [DoctorController::class, 'storePrescription'])->name('doctor.prescriptions.store');
    Route::get('/doctor/prescriptions/{prescription}', [DoctorController::class, 'showPrescription'])->name('doctor.prescriptions.show');
    Route::get('/doctor/prescriptions/{prescription}/edit', [DoctorController::class, 'editPrescription'])->name('doctor.prescriptions.edit');
    Route::put('/doctor/prescriptions/{prescription}', [DoctorController::class, 'updatePrescription'])->name('doctor.prescriptions.update');
    Route::delete('/doctor/prescriptions/{prescription}', [DoctorController::class, 'destroyPrescription'])->name('doctor.prescriptions.destroy');

});