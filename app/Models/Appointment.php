<?php
namespace App\Models;

use App\Models\Prescription;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['patient_id', 'doctor_id', 'appointment_datetime', 'status'];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
    
    public function prescriptions()
    {
        return $this->hasMany(Prescription::class, 'appointment_id');
    }
}