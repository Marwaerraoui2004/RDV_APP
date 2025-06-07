<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // Validation de base
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'string', 'max:20'],
            'role' => ['required', 'in:patient,doctor'],
            'terms' => ['accepted'],
        ];

        // Validation conditionnelle si rôle doctor
        if ($request->role === 'doctor') {
            $rules = array_merge($rules, [
                'onmm' => ['required', 'string', 'max:255'],
                'specialty' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'postal_code' => ['required', 'string', 'max:10'],
            ]);
        } else {
            // Pour patient, on accepte null sur ces champs
            $rules = array_merge($rules, [
                'onmm' => ['nullable', 'string', 'max:255'],
                'specialty' => ['nullable', 'string', 'max:255'],
                'address' => ['nullable', 'string', 'max:255'],
                'city' => ['nullable', 'string', 'max:255'],
                'postal_code' => ['nullable', 'string', 'max:10'],
            ]);
        }

        $validated = $request->validate($rules);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'phone' => $validated['phone'],
            'onmm' => $validated['role'] === 'doctor' ? $validated['onmm'] : null,
            'specialty' => $validated['role'] === 'doctor' ? $validated['specialty'] : null,
            'address' => $validated['role'] === 'doctor' ? $validated['address'] : null,
            'city' => $validated['role'] === 'doctor' ? $validated['city'] : null,
            'postal_code' => $validated['role'] === 'doctor' ? $validated['postal_code'] : null,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
