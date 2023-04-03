<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowTime extends Model
{
    use HasFactory;

    public function theaters()
    {
        return $this->belongsToMany(Theater::class, 'theater_show_time')->withPivot('movie_id')->withTimestamps();
    }

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'theater_show_time', 'show_time_id', 'movie_id')->withPivot('theater_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function seats()
    {
        return $this->belongsToMany(Seat::class, 'reservations');
    }

    public function isSeatReserved($seat)
    {
        return $this->seats()->where('seat_id', $seat)->exists();
    }
}
