<?php

namespace App\Http\Controllers;

use App\Models\Cupon;
use App\Models\Movie;
use App\Models\Seat;
use App\Models\ShowTime;
use App\Models\Theater;
use Illuminate\Http\Request;

class ControllerCheckout extends Controller
{

    public function checkOutPage(Request $request){
        // take a seat at reservation
        // creat a ticket

        $seat = Seat::find($request['seat']);
        $theater = Theater::find($request['theater']);
        $showTime = ShowTime::find($request['showTime']);
        $movie = Movie::find($request['movie']);


        session()->put('seat', $seat);
        session()->put('theater', $theater);
        session()->put('showTime', $showTime);
        session()->put('movie', $movie);
        session()->put('price', $movie->price);

        return view('checkout');
    }

    public function cancel(){
        session_destroy();
    }

    public function payment(){

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
                // Redirect back to checkout page with success message
                return redirect()->back()->with('message', 'Coupon code applied successfully.');
            } else {
                // Redirect back to checkout page with error message
                return redirect()->back()->with('message', 'This coupon has already been used.');
            }
        } else {
            // Redirect back to checkout page with error message
            return redirect()->back()->with('message', 'Invalid coupon code. Please try again.');
        }
    }

}
