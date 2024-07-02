<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * episode_id
 * movie_id
 * orderNum
 * franchise_id
 */
class Story extends Model
{
    use HasFactory;

    protected $fillable = ['episode_id', 'movie_id', 'orderNum', 'franchise_id'];

    public function episode()
    {
        return $this->belongsTo(Episode::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
