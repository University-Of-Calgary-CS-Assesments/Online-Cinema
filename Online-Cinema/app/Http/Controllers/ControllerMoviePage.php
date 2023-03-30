<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class ControllerMoviePage extends Controller
{
    public function page($movieId){
        $movies = Movie::where('id', $movieId)->get();
        $movie = $movies[0];
        return view('movie-page', compact('movie'));
    }
}
