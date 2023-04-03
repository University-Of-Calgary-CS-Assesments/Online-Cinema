<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    public function theater()
    {
        return $this->belongsTo(Theater::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function showTimes()
    {
        return $this->belongsToMany(ShowTime::class, 'reservations');
    }

    public function isReserved($showTime)
    {
        return $this->showTimes()->where('show_time_id', $showTime)->exists();
    }
}
