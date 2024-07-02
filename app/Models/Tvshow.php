<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * $id
 * $name
 * $year ->nullable()
 * $acronym ->nullable
 * $thumbnail ->charset('binary')->nullable() // LONGBLOB
 * originalFileName
 */
class Tvshow extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'year', 'acronym', 'thumbnail', 'originalFileName'];

    public function seasons(): HasMany
    {
        return $this->hasMany(Season::class);
    }
}
