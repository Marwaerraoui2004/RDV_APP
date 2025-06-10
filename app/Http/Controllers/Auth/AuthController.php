<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

public function showResetForm()
{
    return view('auth.reset-password');
}

public function resetPassword(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'secret_code' => 'required|string',
        'new_password' => 'required|string|min:8|confirmed',
    ]);

        $user = User::where('email', $request->email)
                ->where('secret_code', $request->secret_code)
                ->first();
    if (!$user) {
        return back()->withErrors(['email' => 'Aucun compte trouvé avec cet email.']);
    }

    $user->password = Hash::make($request->new_password);
    $user->save();

    return redirect()->route('login')->with('success', 'Mot de passe mis à jour avec succès.');

 //
}
}