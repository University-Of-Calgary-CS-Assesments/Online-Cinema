<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\ShowTime;
use App\Models\Theater;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerMoviePage extends Controller
{
    public function page($movieId){
        $movie = Movie::with('starring')->find($movieId);
        $actors = $movie->starring->pluck('name')->toArray();

        return view('movie-page', compact('movie', 'actors'));
    }

    public function ticket($movieId){

    }
}
