<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public function starring(){
        return $this->hasMany(Starring::class);
    }

    public function showTimes()
    {
        return $this->belongsToMany(ShowTime::class, 'theater_show_time', 'movie_id', 'show_time_id')->withPivot('theater_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function customersWatched()
    {
        return $this->belongsToMany(Customer::class, "customer_movie_table", "movie_id", "customer_id");
    }

    public function subscribersFavourite()
    {
        return $this->belongsToMany(Subscriber::class, 'subscriber_favorite_movie', 'movie_id', 'subscriber_id');
    }
}
