<div class="form-group">
    <label for="title">{{ __('Newsletter Title') }}</label>
    <input type="text" id="title" name="title" value="{{ $newsletter->title ?? '' }}"
        class="form-control @error('title') is-invalid @enderror">
    @error('title')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="body">{{ __('Newsletter Description') }}</label>
    <textarea class="form-control @error('description') is-invalid @enderror"" name="body"
        rows="3">{{ $newsletter->body ?? '' }}</textarea>
    @error('description')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
