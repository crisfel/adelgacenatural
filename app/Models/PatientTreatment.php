<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(array[] $array)
 * @property mixed $user_id
 * @property mixed $treatment_id
 */
class PatientTreatment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'treatment_id'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function treatment(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Treatment::class);
    }




}
