<?php

namespace App\Http\Controllers;

use App\Models\Cupon;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerCustomerDashboard extends Controller
{
    public function dashboardPage(){

        $tickets = Ticket::with( 'showTime')->where('customer_id', Auth::user()->id)->get();

        foreach ($tickets as $ticket){
            if ($ticket->showTime->showTime < now()->timestamp){
                $ticket->status = 'expired';
                $ticket->save();
            }
        }


        return (view('dashboard.dashboard'));
    }

    public function dashboardTickets(){

        $tickets = Ticket::with('movie', 'showTime', 'seat')->where('customer_id', Auth::user()->id)->get();

        foreach ($tickets as $ticket){
            if ($ticket->showTime->showTime < now()->timestamp){
                $ticket->status = 'expired';
                $ticket->save();
            }
        }

        return (view('dashboard.tickets', compact('tickets')));
    }

    public function dashboardCoupons(){
        $coupons = Cupon::where('customer_id', Auth::user()->id)->get();
        return (view('dashboard.coupons', compact('coupons')));
    }

    public function dashboardInfo(){

    }

    public function dashboardFavorite(){

    }
}
