<?php

namespace App\Actions\Fortify;

use App\Models\Subscriber;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Laravel\Fortify\Contracts\LogoutResponse as LogoutResponseContract;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; // Import the Session facade

class CustomLoginAction
{
    public function __invoke()
    {
        $subscriber = Subscriber::where('customer_id', Auth::user()->id)->first();

        if ($subscriber) {
            // Set the session variable if the condition is met
            Session::put('subscriber', $subscriber);
        } else{
            Session::put('subscriber', 'sssssssssss');
        }

        return app(LoginResponseContract::class);
    }
}
