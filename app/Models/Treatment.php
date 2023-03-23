<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 * @method static find($id)
 * @property mixed|string $title
 * @property mixed|string $description
 * @property mixed|string $urlImage
 * @property mixed|string $urlFile
 * @property mixed $therapist_id
 * @property mixed $id
 */
class Treatment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'urlImage',
        'urlFile',
        'therapist_id',
        'is_deleted'
    ];

    public function therapist(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
