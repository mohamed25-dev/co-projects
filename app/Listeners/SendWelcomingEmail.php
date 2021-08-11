<?php

namespace App\Listeners;

use App\Mail\SubscribeEmail;
use App\Models\Customer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendWelcomingEmail implements ShouldQueue
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
    public function handle($event)
    {
        Log::debug("Customer {$event->customer->first_name} subscribed to our newsletter {$event->customer->lang}");
        Mail::to($event->customer->email)->send(new SubscribeEmail($event->customer, $event->lang));
    }
}
