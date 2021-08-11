<?php

namespace App\Mail;

use App\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscribeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $customer;
    public $lang;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Customer $customer, $lang)
    {
        $this->customer = $customer;
        $this->url = route('customers.unsubscribe', $customer->email);
        $this->lang = $lang;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.subscribeEmail');
    }
}
