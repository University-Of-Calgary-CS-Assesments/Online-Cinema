<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowTime extends Model
{
    use HasFactory;

    public function theaters()
    {
        return $this->belongsToMany(Theater::class)->withPivot('movie_id');
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
