<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HealthIndicatorController extends Controller
{
    // Affiche le formulaire de saisie
    public function edit()
    {
        $user = Auth::user();
        return view('health.edit', compact('user'));
    }

    // Enregistre les données du formulaire
    public function update(Request $request)
    {
        $request->validate([
            'tension_arterielle' => 'nullable|string|max:10',
            'frequence_cardiaque' => 'nullable|integer|min:30|max:200',
            'glycemie' => 'nullable|numeric|min:0|max:30',
            'imc' => 'nullable|numeric|min:10|max:60',
        ]);

        $user = Auth::user();
        $user->update($request->only('tension_arterielle', 'frequence_cardiaque', 'glycemie', 'imc'));

        return redirect()->route('dashboard')->with('success', 'Indicateurs mis à jour !');
    }
}

