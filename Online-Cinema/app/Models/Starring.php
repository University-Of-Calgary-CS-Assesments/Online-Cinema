<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Starring extends Model
{
    use HasFactory;

    protected $table = 'starring';

    protected $fillable = ['movie_id', 'name'];

    public function movie(){
        return $this->belongsTo(Movie::class);
    }
}
