<?php

namespace App\Http\Livewire;

use App\Events\CustomerSubscribed;
use App\Models\Customer;
use Livewire\Component;

class NewsLetter extends Component
{
    public $email;
    public $first_name;
    public $response_message;

    protected $rules = [
        'email' => 'required|email',
        'first_name' => 'required|min:3',
    ];

    public function subscribe() {
        $validatedData = $this->validate();

        $customer = Customer::where('email', $validatedData['email'])->first();
        if ($customer) {
            $this->first_name = null;
            $this->email = null;
            
           return $this->response_message = __("Your are already a member of our family 😉 ");
        }

        $customer = Customer::create($validatedData);
        
        $lang = request()->session()->get('lang', 'ar');
        CustomerSubscribed::dispatch($customer, $lang);

        $this->first_name = null;
        $this->email = null;

        $this->response_message =  __("Welcome to our Family 😍 ");
    }  

    public function render()
    {
        return view('livewire.news-letter');
    }
}
