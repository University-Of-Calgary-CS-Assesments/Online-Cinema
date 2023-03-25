<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function showTime()
    {
        return $this->belongsTo(ShowTime::class);
    }

//    public function theater()
//    {
//        return $this->belongsTo(Theater::class);
//    }

    public function customer()
    {
        return $this->belongsTo(User::class);
    }
}
