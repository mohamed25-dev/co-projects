<?php

namespace App\Http\Livewire;

use App\Events\CustomerUnsubscribed;
use App\Models\Customer;
use Livewire\Component;

class Unsubscribe extends Component
{
    public $customer;
    public $email;
    public $response_message;

    protected $rules = [
        'email' => 'required|email',
    ];

    public function unsubscribe() {
        $validatedData = $this->validate();

        $customer = Customer::where('email', $validatedData['email'])->first();
        if ($customer) {
            $lang = request()->session()->get('lang', 'ar');
            CustomerUnsubscribed::dispatch($customer->email, $customer->first_name, $lang);

            Customer::destroy($customer->id);
        }

        $this->email = null;
        $this->response_message = __("We are sad you are leaving us 😔");
    }  

    public function render()
    {
        return view('livewire.unsubscribe');
    }
}
