<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\ShowTime;
use App\Models\Subscriber;
use App\Models\SubscriberFavoriteMovie;
use App\Models\Theater;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ControllerMoviePage extends Controller
{
    public function page($movieId){
        $movie = Movie::with('starring')->find($movieId);
        $actors = $movie->starring->pluck('name')->toArray();

        return view('movie-page', compact('movie', 'actors'));
    }

    public function searchPage(Request $request){
        $query = $request->input('query');
        if (!isset($query)) {
            $movies = \App\Models\Movie::all();
        } else {
            $movies = \App\Models\Movie::where('title', 'like', '%'.$query.'%')->get();
        }

        return view('movie-search', compact('movies'));
    }

    public function addFavorite($movieId){
        if (Auth::user()){
            if (session('subscriber')){
                SubscriberFavoriteMovie::create([
                    'subscriber_id' => Auth::user()->id,
                    'movie_id' => $movieId
                ]);
                toastr()->success('The movie added to your favorite list');
            } else{
                toastr()->warning('You are not a subscriber');
            }
        } else{
            toastr()->warning('Please logg-in first');
        }

        return redirect()->back();
    }

    public function removeFavorite($movieId){
        SubscriberFavoriteMovie::where('subscriber_id', Auth::user()->id)->where('movie_id', $movieId)->delete();
        toastr()->success('The movie was successfully removed from your favorite list');
        return redirect()->back();
    }
}
