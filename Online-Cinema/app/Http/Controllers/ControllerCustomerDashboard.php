<?php

namespace App\Http\Controllers;

use App\Models\Cupon;
use App\Models\Customer;
use App\Models\Reservation;
use App\Models\Subscriber;
use App\Models\SubscriberFavoriteMovie;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ControllerCustomerDashboard extends Controller
{
    public function dashboardPage(){

        $customer = Customer::where('user_id', Auth::user()->id)->first();
        Session::put('customer', $customer);

        if ($customer->is_subscriber) {
            // Set the session variable if the condition is met
            Session::put('subscriber', true);
        } else{
            Session::put('subscriber', false);
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
        return view('dashboard.info');
    }

    public function dashboardFavoritePage(){
        if (session('subscriber')){

            $favoriteMovies = SubscriberFavoriteMovie::with('movie')->where('subscriber_id', Auth::user()->id)->get();

            return view('dashboard.favorite', compact('favoriteMovies'));
        } else{
            toastr()->error("You are not a subscriber, to access this page!");
            return redirect()->route("dashboard.page");
        }
    }

    public function userDeletion(){

        $tickets = Ticket::where('customer_id', Auth::user()->id)->get();
        foreach ($tickets as $ticket){
            Reservation::where('seat_id', $ticket->seat_id)->where('show_time_id', $ticket->show_time_id)->delete();
        }
        Auth::user()->delete();
        toastr()->success("User was deleted successfully!");
        return redirect()->route('home');
    }

}
