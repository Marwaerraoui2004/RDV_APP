<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
{
    $validated = $request->validateWithBag('updatePassword', [
        'current_password' => ['required', 'current_password'],
        'password' => ['required', Password::defaults(), 'confirmed'],
    ]);

    // Mettre à jour le mot de passe
    $request->user()->update([
        'password' => Hash::make($validated['password']),
    ]);

    // Déconnexion de l'utilisateur
    Auth::logout();

    // Redirection vers la page de login avec un message
    return redirect()->route('login')->with('status', 'Votre mot de passe a été modifié. Veuillez vous reconnecter.');
}

}
