<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
namespace App\Http\Livewire\Auth;

use Laravel\Jetstream\Http\Livewire\Auth\Login as JetstreamLogin;
use Illuminate\Support\Facades\Session;

class CustomLogin extends JetstreamLogin
{
    public function authenticate()
    {
        parent::authenticate();

        $user = auth()->user();

        if ($user->admin) {
            // The user is an admin, set a session variable to indicate that
            Session::put('is_admin', true);
        } else {
            // The user is not an admin, ensure the session variable is removed
            Session::forget('is_admin');
        }
    }
}

