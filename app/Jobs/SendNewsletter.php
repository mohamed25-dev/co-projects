<?php

namespace App\Jobs;

use App\Models\Customer;
use App\Models\Newsletter;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendNewsletter implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Batchable;
    public $newsletter;
    public $index;

    // public $customer;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Newsletter $newsletter, $index)
    {
        $this->newsletter = $newsletter;
        $this->index = $index;

        // $this->customer = $customer;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $mailsPerJob = env('NUMBER_OF_MAILS_PER_JOB', 25);
        
        if ($this->batch()->canceled())
        {
            return;
        }

        sleep(2);

        $customers = Customer::skip($this->index * $mailsPerJob)->take($mailsPerJob)->get();
        foreach ($customers as $customer) {
            $isSent = $this->newsletter->customers()->where([
                'customer_id' => $customer->id
            ])->first();

            if ($isSent) {
                continue;
            }

            Mail::raw($this->newsletter->body, function ($message) use ($customer){
                $message->to($customer->email)->subject($this->newsletter->title);
            });

            $this->newsletter->customers()->attach($customer->id);
        }
    }
}
