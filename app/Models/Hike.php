<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hike extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'steepness',
        'miles',
        'recommend',
        'difficulty_id'
    ];

    public function difficulty(): BelongsTo
    {
        return $this->belongsTo(Difficulty::class, 'difficulty_id');
    }
}
