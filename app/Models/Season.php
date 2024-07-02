<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * $id
 * $tvshow_id ->constrained()
 * $name
 */
class Season extends Model
{
    use HasFactory;

    protected $fillable = ['tvshow_id', 'name'];

    /*public function tvShow()
    {
        return $this->belongsTo(Tvshow::class, 'tvshow_id', 'id');
    }*/

    public function tv(): BelongsTo
    {
        return $this->belongsTo(Tvshow::class, 'tvshow_id', 'id');
    }

    public function episodes(): HasMany
    {
        return $this->hasMany(Episode::class);
    }

}
