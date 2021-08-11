<?php

namespace App\Providers;

use App\Events\CustomerSubscribed;
use App\Events\CustomerUnsubscribed;
use App\Listeners\SendGoodByeEmail;
use App\Listeners\SendWelcomingEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CustomerSubscribed::class => [
            SendWelcomingEmail::class
        ],
        CustomerUnsubscribed::class => [
            SendGoodByeEmail::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
