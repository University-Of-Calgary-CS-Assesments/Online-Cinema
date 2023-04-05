<?php

namespace App\Http\Controllers;

use App\Mail\TicketEmail;
use App\Models\Movie;
use App\Models\ShowTime;
use App\Models\Theater;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ControllerTicket extends Controller
{
    public function schedulePage($movieId){

        session()->flush();

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

    public function ticketSuccess(){


        return view('ticket-success');
    }
}
