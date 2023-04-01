<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theater extends Model
{
    use HasFactory;


    public function movies(){
        return $this->belongsToMany(Movie::class, "theater_show_time")->withPivot('show_time_id')->withTimestamps();
    }

    public function showTimes()
    {
        return $this->belongsToMany(ShowTime::class, 'theater_show_time', "show_time_id")->withPivot('movie_id')->withTimestamps();
    }

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }

//    public function tickets()
//    {
//        return $this->hasMany(Ticket::class);
//    }
}
