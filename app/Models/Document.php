<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Correction de la casse (App au lieu de app)

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',    // Ajout obligatoire
        'patient_id', 
        'title',
        'type',         // Si vous utilisez ce champ
        'file_path',
        'notes'         // Si vous utilisez ce champ
    ];

    // Relation avec le patient
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id')->withDefault([
            'name' => 'Patient inconnu'
        ]);
    }

    // Relation avec le médecin
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id')->withDefault([
            'name' => 'Médecin inconnu'
        ]);
    }

    // Optionnel : Accessor pour le type de document
    public function getTypeAttribute($value)
    {
        return [
            'ordonnance' => 'Ordonnance',
            'compte-rendu' => 'Compte-rendu',
            'bilan' => 'Bilan',
            'autre' => 'Autre'
        ][$value] ?? $value;
    }

    // Optionnel : Méthode pour le chemin complet du fichier
    public function getFullPathAttribute()
    {
        return storage_path('app/' . $this->file_path);
    }
}