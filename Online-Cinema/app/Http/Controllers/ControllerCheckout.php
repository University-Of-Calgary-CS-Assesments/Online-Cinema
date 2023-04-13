<?php

namespace App\Http\Controllers;

use App\Mail\TicketEmail;
use App\Models\Cupon;
use App\Models\Movie;
use App\Models\Reservation;
use App\Models\Seat;
use App\Models\ShowTime;
use App\Models\Theater;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ControllerCheckout extends Controller
{

    public function checkOutPage(Request $request){
        // take a seat at reservation
        // creat a ticket

        $seat = Seat::find($request['seat']);
        $theater = Theater::find($request['theater']);
        $showTime = ShowTime::find($request['showTime']);
        $movie = Movie::find($request['movie']);


        if (!session()->has('checkout'))
            session()->put('checkout', [
                'seat' => $seat,
                'theater' => $theater,
                'showTime' => $showTime,
                'movie' => $movie,
                'price' => $movie->price
            ]);

        return view('checkout');
    }

    public function showCheckoutPage(){
        return view('checkout');
    }

    public function cancel(){
        session()->forget('checkout');
        return redirect()->route('movie.search.page');
    }

    public function payment(){
        // check payment information

        if (session()->has('checkout')){
            $ticket = new Ticket();
            $ticket->ticketId = mt_rand(10000000, 99999999);
            $ticket->customer_id = Auth::user()->id;
            $ticket->movie_id = session('checkout')['movie']->id;
            $ticket->show_time_id = session('checkout')['showTime']->id;
            $ticket->seat_id = session('checkout')['seat']->id;
            $ticket->purchaseTime = Carbon::now()->timestamp;
            $ticket->price = session('checkout')['price'];
            $ticket->assignedEmail = Auth::user()->email;
            $ticket->status = 'purchased';

            $ticket->save();

            $reservation = new Reservation();
            $reservation->show_time_id = session('checkout')['showTime']->id;
            $reservation->seat_id = session('checkout')['seat']->id;
            $reservation->save();

            $data = [
                'title' => session('checkout')['movie']->title,
                'theater' => session('checkout')['theater']->name,
                'address' => session('checkout')['theater']->address,
                'showTime' => session('checkout')['showTime']->showTime,
                'seat' => session('checkout')['seat']->seatId,
                'price' => session('checkout')['price']
            ];

//            @Mail::to(Auth::user()->email)->send(new TicketEmail($data));
            toastr()->success("Confirmation email was sent!");
            return redirect()->route('ticket.success.page');

        } else{
            toastr()->error("Payment failed!");
            return redirect()->back();
        }
    }

    public function coupon(Request $request){

        $coupon = Cupon::where('uniqueId', $request['coupon'])->first();
        // Check if coupon exists and is not expired
        if ($coupon && !$coupon->isExpired()) {
            // Check if coupon has not been used
            if (!$coupon->isUsed()) {
                // Mark coupon as used
                $coupon->markAsUsed();
                $coupon->save();
                // Apply coupon discount to order
                $price = session('checkout')['price'];
                $price = $price - $coupon->amount;

                if ($price < 0)
                    $price = 0;
                session()->put('checkout.price', $price);
                // Redirect back to checkout page with success message
                toastr()->success("Coupon applied successfully!");
                return redirect()->back();
            } else {
                // Redirect back to checkout page with error message
                toastr()->warning("Coupon is already used!");
                return redirect()->back();
            }
        } else {
            // Redirect back to checkout page with error message
            toastr()->error("Invalid Coupon-ID, or the coupon is expired!");
            return redirect()->back();
        }
    }
}
