<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\ShowTime;
use App\Models\Theater;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerTicket extends Controller
{
    public function page($movieId){

        $movie = Movie::find($movieId);

        $pivotRecords = DB::table('theater_show_time')->where('movie_id', $movieId)->get();

        foreach ($pivotRecords as $record) {
            $theater = Theater::find($record->theater_id);
            $showTime = ShowTime::find($record->show_time_id);

            $seats = $theater->seats()->whereNotIn('id', function($query) use($showTime) {
                $query->select('seat_id')->from('reservations')->where('show_time_id', $showTime->id);
            })->get();


            $schedule[] = array(
                'theater' => $theater,
                'showTime' => $showTime,
                'seats' => $seats
            );
        }

        return view('ticket-page', compact('movie', 'schedule'));
    }
}
