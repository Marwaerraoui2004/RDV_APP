<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prescription;
use App\Models\User;
use Illuminate\Support\Facades\File;

class PrescriptionController extends Controller
{
    public function create()
    {
        // Récupérer les patients
        $patients = User::where('role', 'patient')->get();
        return view('pages.docteurs.create_prescription', compact('patients'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'doctor_id' => 'required|exists:users,id',
            'patient_id' => 'required|exists:users,id',
            'medication_name' => 'required|string|max:255',
            'dosage' => 'required|string|max:100',
            'frequency' => 'required|string|max:100',
            'duration' => 'required|string|max:100',
            'notes' => 'nullable|string',
            'signature' => 'required|string',
        ]);

        // Traitement de la signature
        $signatureData = $request->input('signature');
        $signatureData = str_replace('data:image/png;base64,', '', $signatureData);
        $signatureData = str_replace(' ', '+', $signatureData);

        $signatureName = 'signature_'.time().'.png';
        $signaturePath = public_path('storage/signatures');

        // Créer le dossier s'il n'existe pas
        if (!File::exists($signaturePath)) {
            File::makeDirectory($signaturePath, 0755, true);
        }

        // Sauvegarder l'image
        File::put($signaturePath.'/'.$signatureName, base64_decode($signatureData));

        // Création de l'ordonnance
        Prescription::create([
            'doctor_id' => $validatedData['doctor_id'],
            'patient_id' => $validatedData['patient_id'],
            'medication_name' => $validatedData['medication_name'],
            'dosage' => $validatedData['dosage'],
            'frequency' => $validatedData['frequency'],
            'duration' => $validatedData['duration'],
            'notes' => $validatedData['notes'],
            'signature_path' => 'signatures/'.$signatureName,
        ]);

        return redirect()
            ->route('pages.docteurs.prescription')
            ->with('success', 'Ordonnance créée avec succès.');
    }
}