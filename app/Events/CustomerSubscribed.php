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

class CustomerSubscribed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $customer;
    public $lang;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Customer $customer, $lang)
    {
        Log::debug("Event Customer {$customer} subscribed to our newsletter lang {$lang}");

        $this->customer = $customer;
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
