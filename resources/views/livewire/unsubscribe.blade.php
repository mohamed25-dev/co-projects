<div>
    <form class="form-inline" method="POST" wire:submit.prevent="unsubscribe">

        @method('DELETE')
        @csrf

        <div class="form-group mb-2 p-2">
            <input type="text"  wire:model="email" required class="form-control-plaintext" name="email" value="{{ $email }}">
        </div>

        @if ($response_message == null)
            <button type="submit" class="btn btn-primary mb-2 p-2">
                {{ __('Unsubscribe') }}
            </button>
        @else
            <span>{{ $response_message }}</span>
        @endif
        
    </form>
</div>
