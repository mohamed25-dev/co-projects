<?php

namespace App\Listeners;

use App\Mail\UnsubscribeEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendGoodByeEmail implements ShouldQueue
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

        Log::debug("Customer {$event->first_name} left our newsletter lang {$event->lang}");
        Mail::to($event->email)->send(new UnsubscribeEmail($event->email, $event->first_name, $event->lang));
    }
}
