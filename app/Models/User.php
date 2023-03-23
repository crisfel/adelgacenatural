<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property mixed|string $name
 * @property mixed|string $email
 * @property mixed|string $password
 * @property mixed|string $role
 * @property mixed|string $cellphone
 * @property int|mixed|null $age
 * @property mixed|string|null $occupation
 * @property mixed|string|null $religion
 * @property mixed|string|null $locality
 * @property mixed|string|null $pathological_history
 * @property mixed|string|null $cardiovascular
 * @property mixed|string|null $pulmonary
 * @property mixed|string|null $digestive
 * @property mixed|string|null $diabetes
 * @property mixed|string|null $kidney
 * @property mixed|string|null $surgical
 * @property mixed|string|null $allergies
 * @property mixed|string|null $medicines
 * @property int|mixed|null $alcohol
 * @property int|mixed|null $smoking
 * @property int|mixed|null $dope
 * @property mixed|string|null $family_background
 * @property mixed|string|null $emotional_background
 * @property mixed|string|null $comment
 * @property mixed|string|null $clotting_problems
 * @property mixed|string|null $marital_status
 * @property mixed $id
 * @property mixed|string $url_img
 * @property User|mixed $therapist_id
 * @method static find($id)
 * @method static where(array $array, array $array1)
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date',
        'name',
        'age',
        'url_img',
        'occupation',
        'marital_status',
        'religion',
        'cellphone',
        'locality',
        'pathological_history',
        'cardiovascular',
        'pulmonary',
        'digestive',
        'diabetes',
        'kidney',
        'clotting_problems',
        'surgical',
        'allergies',
        'medicines',
        'alcohol',
        'smoking',
        'dope',
        'family_background',
        'emotional_background',
        'comment',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function therapist(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
