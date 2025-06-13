<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;


class GoogleAuthController extends Controller
{
    public function loginWithGoogle(Request $request)
    {
        $id_token = $request->input('credential');

        $client = new \Google_Client(['client_id' => env('GOOGLE_CLIENT_ID')]);
        $payload = $client->verifyIdToken($id_token);

        if ($payload) {
            $email = $payload['email'];
            $name = $payload['name'];

            // Crée ou récupère l’utilisateur
            $user = User::firstOrCreate(
                ['email' => $email],
                ['name' => $name, 'password' => bcrypt('motdepassepardefault')]
            );

            Auth::login($user);

            return response()->json(['success' => true]);
        } else {
            return response()->json(['error' => 'Token invalide'], 401);
        }
    }
    

public function handleGoogleCallback()
{
    try {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::where('email', $googleUser->getEmail())->first();

        // Créer l'utilisateur s'il n'existe pas
        if (!$user) {
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'password' => bcrypt(Str::random(24)),
                'role' => 'patient' // ou 'docteur', à toi de gérer cette logique
            ]);
        }

        Auth::login($user);

        // Redirection selon le rôle
        if ($user->role === 'patient') {
            return redirect()->route('patient.dashboard');
        } elseif ($user->role === 'docteur') {
            return redirect()->route('docteur.dashboard');
        } else {
            return redirect('/home'); // ou une route par défaut
        }

    } catch (\Exception $e) {
        return redirect('/login')->with('error', 'Erreur lors de la connexion avec Google.');
    }
}



    
        public function redirectToGoogle()
        {
            return Socialite::driver('google')
                ->with(['prompt' => 'select_account'])
                ->redirect();
        }


       
}