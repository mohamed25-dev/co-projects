<div class="mx-auto ">
    <form class="form-inline pb-2" wire:submit.prevent="subscribe">
        <div class="form-group px-2">
            <input type="text" placeholder="{{ __('First Name') }}" class="form-control-plaintext" name="first_name"
                wire:model="first_name" required>
            @error('first_name') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group px-2">
            <input type="email" placeholder="{{ __('Your Email') }}" class="form-control-plaintext" name="email"
                wire:model="email" required>
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>

        @if ($response_message == null)
            <button type="submit" class="btn btn-primary px-2">
                {{ __('Join our Family') }}
            </button>
        @else
            <span>{{ $response_message }}</span>

        @endif


    </form>
</div>
