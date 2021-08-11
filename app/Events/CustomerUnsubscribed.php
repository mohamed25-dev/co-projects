<?php

namespace App\Events;

use App\Models\Customer;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CustomerUnsubscribed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $first_name;
    public $email;
    public $lang;
    /**
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($email, $first_name, $lang)
    {
        Log::debug("Event Customer {$first_name} unsubscribed from our newsletter lang {$lang}");

        $this->email = $email;
        $this->first_name = $first_name;
        $this->lang = $lang;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
