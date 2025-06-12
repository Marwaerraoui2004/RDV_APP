<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'doctor_id',
        'patient_id',
        'rating',    // Numeric rating, e.g., 1.0 to 5.0
        'comment',   // Optional textual comment
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'rating' => 'float', // Cast rating to a float
    ];

    /**
     * A rating belongs to the doctor who received it.
     */
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    /**
     * A rating belongs to the patient who gave it.
     */
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
}
