<?php

namespace App\Mail;

use App\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UnsubscribeEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $first_name;
    public $email;
    public $lang;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $first_name, $lang)
    {
        $this->first_name = $first_name;
        $this->email = $email;
        $this->lang = $lang;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.unsubscribeEmail');
    }
}
