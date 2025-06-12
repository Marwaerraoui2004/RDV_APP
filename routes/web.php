<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/renouvler-password', [AuthController::class, 'showResetForm'])->name('password.reset.form');
Route::post('/renouvler-password', [AuthController::class, 'resetPassword'])->name('password.reset.direct');

Route::get('/', function () {
    return view('pages.home');
})->name('home');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::get('/docteur/dashboard', [DocteurController::class, 'index'])->name('docteur.dashboard');
    // Route::get('/patient/dashboard', [PatientController::class, 'index'])->name('patient.dashboard');
    Route::get('/docteur/dashboard', function () {
            return view('pages.docteur'); 
        })->name('docteur.dashboard');

    Route::get('/patient/dashboard', function () {
            return view('pages.patient'); 
        })->name('patient.dashboard');
});
Route::post('/login/google', [GoogleAuthController::class, 'loginWithGoogle']);
Route::get('auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback'])->name('google.callback');

require __DIR__.'/auth.php';
use App\Http\Controllers\PatientController;

Route::middleware(['auth'])->prefix('patient')->controller(PatientController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('patient.dashboard');
    Route::get('/rendez-vous', 'appointments')->name('patient.appointments');
    Route::get('/rendez-vous/creer', 'createAppointment')->name('patient.appointments.create');
    Route::post('/rendez-vous', 'storeAppointment')->name('patient.appointments.store');
    Route::post('/rendez-vous/heures-disponibles', 'getAvailableHours')->name('patient.appointments.hours');

    Route::get('/medecins', 'myDoctors')->name('patient.doctors');
    Route::get('/documents', 'myDocuments')->name('patient.documents');
    Route::get('/ordonnances', 'prescriptions')->name('patient.prescriptions');
    Route::get('/sante', 'health')->name('patient.health');
    Route::get('/messagerie', 'messaging')->name('patient.messaging');
    Route::get('/parametres', 'settings')->name('patient.settings');
});




Route::middleware(['auth', 'role:doctor'])->group(function () {
    Route::get('/doctor/dashboard', [DoctorController::class, 'dashboard'])->name('doctor.dashboard');

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