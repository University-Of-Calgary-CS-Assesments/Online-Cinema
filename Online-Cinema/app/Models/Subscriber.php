<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;


    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function favoriteMovies()
    {
        return $this->belongsToMany(Movie::class, 'subscriber_favorite_movie', 'subscriber_id', 'movie_id');
    }
}
