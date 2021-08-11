<x-app-layout>
    <div class="container">
        <div class="row pt-4">
            <div class="col-4 mx-auto">
                @livewire('unsubscribe', ['customer' => $customer, 'email' => $customer->email], key($customer->id))
            </div>
        </div>
    </div>

    <x-slot name="footer">

    </x-slot>

</x-app-layout>
