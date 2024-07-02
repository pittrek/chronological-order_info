<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * $id
 * $season_id ->constrained()
 * $name
 * $number  // episode number
 * $thumbnail ->charset('binary')->nullable() // LONGBLOB
 * $originalFileName ->nullable())
 * $description ->nullable()
 */
class Episode extends Model
{
    use HasFactory;

    public $fillable = ['season_id', 'name', 'number', 'thumbnail', 'originalFileName', 'description'];

    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }

    public function story()
    {
        return $this->hasOne(Story::class);
    }
}
