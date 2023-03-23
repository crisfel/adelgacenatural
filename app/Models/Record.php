<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $age
 * @property mixed $size
 * @property mixed $blood_pressure
 * @property mixed|string $heartbeat
 * @property mixed|string $temperature
 * @property mixed|string $glucometer
 * @property mixed|string $last_food
 * @property mixed|string $oximetry
 * @property mixed|string $oximetry_level
 * @property mixed|string $bust
 * @property mixed|string $waist
 * @property mixed|string $hip
 * @property mixed|string $left_bicep
 * @property mixed|string $right_bicep
 * @property mixed|string $right_calf
 * @property mixed|string $adipometer
 * @property mixed|string $weight
 * @property mixed|string $imc
 * @property mixed|string $metabolic_age
 * @property mixed|string $body_water
 * @property mixed|string $visceral_fat
 * @property mixed|string $bone_mass
 * @property float|int|mixed $detox
 * @property mixed|string $left_calf
 * @property mixed|string $user_id
 * @property mixed|string $recommendations
 * @property mixed|string $news
 * @method static where(string $string, $id)
 * @method static find($id)
 */
class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'age',
        'size',
        'blood_pressure',
        'heartbeat',
        'temperature',
        'glucometer',
        'last_food',
        'oximetry',
        'oximetry_level',
        'bust',
        'waist',
        'hip',
        'left_bicep',
        'right_bicep',
        'right_calf',
        'adipometer',
        'weight',
        'imc',
        'metabolic_age',
        'body_water',
        'visceral_fat',
        'bone_mass',
        'detox',
        'left_calf',
        'user_id',
        'recommendations',
        'news',
        'body_photo_url'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}

