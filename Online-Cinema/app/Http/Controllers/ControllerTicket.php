<?php

namespace App\Http\Controllers;

use App\Mail\TicketEmail;
use App\Models\Cupon;
use App\Models\Movie;
use App\Models\Reservation;
use App\Models\ShowTime;
use App\Models\Theater;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Padosoft\Laravel\Notification\Notifier\Notifier;

class ControllerTicket extends Controller
{
    public function schedulePage($movieId){

        session()->forget('checkout');

        $movie = Movie::find($movieId);

        $pivotRecords = DB::table('theater_show_time')->where('movie_id', $movieId)->get();

        if ($pivotRecords->count() == 0){
            toastr()->warning('movie is not being scheduled yet!');
            return redirect()->back();
        }

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

    public function ticketCancellation(Request $request){
        // check if the time is appropriate to cancel
        // change the ticket status
        // release the seat
        // create the coupon

        $ticket= Ticket::find($request['ticket']);

        if (now()->timestamp <= $ticket->showTime->showTime - 24*60*60){
            $ticket->status = 'cancelled';
            $ticket->save();

            Reservation::where('show_time_id', $ticket->show_time_id)->where('seat_id', $ticket->seat_id)->delete();

            Cupon::create([
               'uniqueId' => mt_rand(10000000, 99999999),
               'expiryDate' => now()->timestamp + 365*24*60*60,
                'amount' => $ticket->price,
                'customer_id' => Auth::user()->id
            ]);

            toastr()->success("Ticket Cancelled successfully. You refunded with a coupon.");

        } else{
            toastr()->error("Cannot be cancelled! Less than 24H to the show.");
        }

        return redirect()->back();
    }
}
