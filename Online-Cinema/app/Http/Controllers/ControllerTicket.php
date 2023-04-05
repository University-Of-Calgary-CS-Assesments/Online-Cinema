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

    public function ticketPurchasing(){
        if (session()->has('seat') && session()->has('theater') && session()->has('showTime') && session()->has('movie') && session()->has('price')){
            $ticket = new Ticket();
            $ticket->ticketId = mt_rand(10000000, 99999999);
            $ticket->customer_id = Auth::user()->id;
            $ticket->movie_id = session('movie')->id;
            $ticket->show_time_id = session('showTime')->id;
            $ticket->seat_id = session('seat')->id;
            $ticket->purchaseTime = Carbon::now()->timestamp;
            $ticket->price = session('price');
            $ticket->assignedEmail = Auth::user()->email;
            $ticket->status = 'purchased';

            $ticket->save();

        } else{

        }

        Mail::to('cariji5524@cyclesat.com')->send(new TicketEmail());

        return view('ticket-success');
    }
}
