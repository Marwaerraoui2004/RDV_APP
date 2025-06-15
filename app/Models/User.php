<?php
namespace App\Models;

use App\Models\Prescription;
use App\Models\Document;
use App\Models\Appointment;
use App\Models\Rating;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role', 'phone', 'onmm',
        'specialty', 'address', 'city', 'postal_code', 'secret_code','tension_arterielle',
        'frequence_cardiaque',
        'glycemie',
        'imc',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relationships
    public function patientAppointments()
    {
        return $this->hasMany( Appointment::class, 'patient_id');
    }

    public function doctorAppointments()
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }
     public function reviewsReceived()
    {
        return $this->hasMany(Rating::class, 'doctor_id');
    }

    // Le patient peut écrire des avis
    public function reviewsGiven()
    {
        return $this->hasMany(Rating::class, 'patient_id');
    }
    public function prescriptions()
        {
            return $this->hasMany(Prescription::class, 'patient_id');
        }
    public function doctors()
{
    return $this->belongsToMany(User::class, 'doctor_patient', 'patient_id', 'doctor_id')
                ->withTimestamps();
}
 public function patients()
{
    return $this->belongsToMany(User::class, 'doctor_patient', 'patient_id', 'doctor_id')
                ->withTimestamps();
}
    public function documents()
    {
        return $this->hasMany(Document::class, 'patient_id');
    }
    public function doctorDocuments()
{
    return $this->hasMany(Document::class, 'doctor_id');
}
 public function doctorprescriptions()
        {
            return $this->hasMany(Prescription::class, 'doctor_id');
        }
}
