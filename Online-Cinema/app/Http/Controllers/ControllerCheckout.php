<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerCheckout extends Controller
{

    public function checkOutPage(Request $request){
        // take a seat at reservation
        // creat a ticket

        $seat = $request['seat'];
        $theater = $request['theater'];
        $showTime = $request['showTime'];
        $movie = $request['movie'];

        return view('checkout');
    }


}
