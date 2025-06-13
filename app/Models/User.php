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
        'specialty', 'address', 'city', 'postal_code', 'secret_code',
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
      public function receivedRatings()
    {
        return $this->hasMany(Rating::class, 'doctor_id');
    }

    // A patient can give many ratings
    public function givenRatings()
    {
        return $this->hasMany(Rating::class, 'patient_id');
    }
public function prescriptions()
    {
        return $this->hasMany(Prescription::class, 'patient_id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'patient_id');
    }
}
