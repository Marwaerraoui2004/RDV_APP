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
