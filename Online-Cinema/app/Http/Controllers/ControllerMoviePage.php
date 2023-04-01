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

//        $pivotRecords = DB::table('theater_show_time')
//            ->where('movie_id', $movieId)
//            ->get();
//
//        foreach ($pivotRecords as $record) {
//            $theater = Theater::find($record->theater_id);
//            $showTime = ShowTime::find($record->show_time_id);
//
//            echo "Theater: " . $theater->name . PHP_EOL;
//            echo "Show Time: " . $showTime->showTime . PHP_EOL;
//            echo PHP_EOL;
//        }


        return view('movie-page', compact('movie', 'actors'));
    }

    public function ticket($movieId){

    }
}
