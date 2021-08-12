<?php

namespace App\Mail;

use App\Models\NewsLetter;
use App\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsletterEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $customer;
    public $newsletter;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Customer $customer, NewsLetter $newsletter)
    {
        $this->customer = $customer;
        $this->url = route('customers.unsubscribe', $customer->email);
        $this->newsletter = $newsletter;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.newsletterEmail');
    }
}
