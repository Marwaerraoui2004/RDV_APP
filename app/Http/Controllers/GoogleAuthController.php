<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function loginWithGoogle(Request $request)
    {
        $id_token = $request->input('credential');

        $client = new Google_Client(['client_id' => 'TON_CLIENT_ID_GOOGLE']); // ← remplace ici
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

        if ($user) {
            Auth::login($user);
            return redirect('/home');
        } else {
            // Ne pas créer de compte, simplement renvoyer une erreur
            return redirect('/login')->with('error', 'Aucun compte n\'est associé à cette adresse Google.');
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

