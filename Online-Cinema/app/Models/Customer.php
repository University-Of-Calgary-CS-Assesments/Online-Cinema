<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_subscriber',
        'user_id',
        'fullName',
        'address',
        'creditCardNo'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subscriber()
    {
        return $this->hasOne(Subscriber::class);
    }

    public function watchedMovies()
    {
        return $this->belongsToMany(Movie::class, "customer_movie_table", "customer_id", "movie_id");
    }

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }

    public function cupons(){
        return $this->hasMany(Cupon::class);
    }
}
