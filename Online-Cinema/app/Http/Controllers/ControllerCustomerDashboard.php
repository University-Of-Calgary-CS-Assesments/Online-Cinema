<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Cupon;
use App\Models\Customer;
use App\Models\Newsletter;
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

        $admin = Admin::where('user_id', Auth::user()->id);
        if ($admin->count() > 0){
            return redirect()->route('admin.panel');
        }

        if (session()->has('is_admin')){
            die("saasdasdfasdf");
        }

        $customer = Customer::where('user_id', Auth::user()->id)->first();
        Session::put('customer', $customer);

        if ($customer->is_subscriber) {
            $subscriber = Subscriber::where('customer_id', $customer->id)->first();
            if ( $subscriber && $subscriber->subscriptionEndDate < now()->timestamp){
                $customer->is_subscriber = 0;
                $customer->save();
                $subscriber->delete();
            } else{
                Session::put('subscriber', $subscriber);
            }
        }

        $news = Newsletter::all();

        return (view('dashboard.dashboard', compact('news')));
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
        if (session()->has('subscriber')){

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

    public function subscriptionFee(){

        if (!session('customer')->is_subscriber) {

            Subscriber::create([
                'customer_id' => session('customer')->id,
                'subscriptionEndDate' => now()->timestamp + 365*24*60*60
            ]);

            $subscriber = Subscriber::where('customer_id', session('customer')->id)->first();
            if ( $subscriber){
                Session::put('subscriber', $subscriber);
                toastr()->success("Subscription was renewed for another year successfully");
            } else{
                \session('customer')->is_subscriber = 0;
                \session('customer')->save();
                toastr()->error("Renewal process failed");
            }
        } else{
            toastr()->warning('You are already a subscriber!');
        }
        return redirect()->route('dashboard.page');
    }

}
