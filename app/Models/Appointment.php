<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed|string $date
 * @property mixed|string $time
 * @property mixed|string|null $comment
 * @property mixed|string $status
 * @property mixed $patient_id
 * @property mixed $therapist_id
 * @method static find($appointmentID)
 */
class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'time',
        'date',
        'status',
        'comment',
        'patient_id',
        'therapist_id'
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id' );
    }

    public function therapist()
    {
        return $this->belongsTo(User::class, 'therapist_id' );
    }

}
