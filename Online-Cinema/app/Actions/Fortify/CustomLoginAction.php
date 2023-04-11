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
        $user = Auth::user();

        if ($user->admin) {
            // The user is an admin, set a session variable to indicate that
            Session::put('is_admin', true);
        } else {
            // The user is not an admin, ensure the session variable is removed
            Session::forget('is_admin');
        }

        return app(LoginResponseContract::class);
    }
}
