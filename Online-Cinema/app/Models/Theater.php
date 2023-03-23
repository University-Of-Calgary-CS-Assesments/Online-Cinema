<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theater extends Model
{
    use HasFactory;

    public function showTimes()
    {
        return $this->belongsToMany(ShowTime::class)->withPivot('movie_id');
    }
}
