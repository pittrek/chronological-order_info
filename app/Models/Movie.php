<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * $id
 * $name
 * $year ->nullable();
 * $version ->nullable();
 * $description ->nullable();
 * $thumbnail ->nullable(); // LONGBLOB
 * $originalFileName -> nullable
 * $shortcut ->nullable();
 */
class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'year', 'version', 'description', 'thumbnail', 'originalFileName', 'shortcut'];

    public function story()
    {
        return $this->hasOne(Story::class);
    }
}
