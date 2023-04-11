<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Movie;
use App\Models\Starring;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerAdmin extends Controller
{
    public function adminPanel(){
        $admin = Admin::where('user_id', Auth::user()->id);
        if ($admin){
            session()->put('is_admin', true);
        }

        return view('admin.admin');
    }

    public function movieList(){

        $movies = Movie::with('starring')->get();
        return view('admin.movies-list', compact('movies'));
    }

    public function addMovie(Request $request){
        $movie = Movie::create([
            'title' => $request->input('title'),
            'releaseYear' => $request->input('releaseYear'),
            'startDate' => strtotime($request->input('startDate')),
            'endDate' => strtotime($request->input('endDate')),
            'director' => $request->input('director'),
            'writer' => $request->input('writer'),
            'studio' => $request->input('studio'),
            'price' => $request->input('price'),
            'rating' => $request->input('rating'),
            'length' => $request->input('length')
        ]);

        $actors = explode(',', $request->input('starring'));
        foreach ($actors as $actor){
            $staring = Starring::create([
                'name' => $actor,
                'movie_id' => $movie->id
            ]);
        }
        toastr()->success('Movie was added successfully!');
        return redirect()->route('admin.movieList');
    }

    public function deleteMovie(Request $request){
        $movie = Movie::find($request->input('movieId'));
        $movie->delete();
        toastr()->success('Movie was deleted successfully');
        return redirect()->back();
    }

    public function salesMon(){

        $tickets = Ticket::with('customer', 'movie', 'showTime', 'seat')->get();
        $statistics = [
            'totalTickets' => 0,
            'totalIncome' => 0,
            'totalActiveTickets' => 0,
            'totalCanceledTickets' => 0,
            'totalExpiredTickets' => 0,
        ];

        foreach ($tickets as $ticket){
            if ($ticket->showTime->showTime < now()->timestamp){
                $ticket->status = 'expired';
                $ticket->save();
            }

            $statistics['totalTickets']++;

            if ($ticket->status != 'cancelled')
                $statistics['totalIncome'] += $ticket->price;

            switch ($ticket->status){
                case "purchased":
                    $statistics['totalActiveTickets']++;
                    break;
                case "cancelled":
                    $statistics['totalCanceledTickets']++;
                    break;
                case "expired":
                    $statistics['totalExpiredTickets']++;
                    break;
                default:
                    break;
            }
        }

        return (view('admin.sales-monitoring', compact('tickets', 'statistics')));
    }
}
