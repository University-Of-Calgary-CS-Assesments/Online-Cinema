<?php

namespace App\Listeners;

use App\Models\Customer;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateCustomer
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Registered $event)
    {
//        $user = $event->user;
//        $customer = new Customer();
//        $customer->user_id = $user->id;
//        $customer->save();
    }
}
