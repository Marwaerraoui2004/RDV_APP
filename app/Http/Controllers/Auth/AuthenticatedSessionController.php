<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
   public function store(Request $request): RedirectResponse
{
    // Validation des champs email et password
    $request->validate([
        'email' => ['required', 'string', 'email'],
        'password' => ['required', 'string'],
    ]);

    // Tente d'authentifier l'utilisateur avec les infos + remember (checkbox)
    // $request->boolean('remember') renvoie true si la checkbox est cochée
    if (! Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
        return back()->withErrors([
            'email' => 'Les identifiants sont incorrects.',
        ])->withInput();  // garde les anciennes données dans le formulaire
    }

    // Regénère la session pour éviter fixation de session
    $request->session()->regenerate();

    // Récupère l'utilisateur connecté
    $user = Auth::user();

    // Redirection selon le rôle
    if ($user->role === 'doctor') {
        return redirect()->route('docteur.dashboard');
    } elseif ($user->role === 'patient') {
        return redirect()->route('patient.dashboard');
    } else {
        Auth::logout();
        return redirect('/login')->withErrors(['role' => 'Rôle non reconnu.']);
    }
}
    

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
