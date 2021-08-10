<div class="form-group">
  <label for="title">{{ __('  عنوان المشروع ') }}</label>
  <input type="text" id="title" name="title" value="{{ $project->title ?? ''}}"
      class="form-control @error('title') is-invalid @enderror">
  @error('title')
      <span class="invalid-feedback">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
</div>

<div class="form-group">
  <label for="description">{{ __('وصف المشروع ') }}</label>
  <textarea class="form-control @error('description') is-invalid @enderror"" name=" description"
      rows="3">{{ $project->description ?? ''}}</textarea>
  @error('description')
      <span class="invalid-feedback">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
</div>

<div class="form-group file-area">
  <label for="image">{{ __(' صورة المشروع ') }} </label>
  <input type="file" id="image" accept="image/*" onchange="readCoverImage(this);" name="image"
      class="form-control @error('image') is-invalid @enderror">
  <div class="input-title">{{ __('اسحب الصورة أو انقر للإختيار يدويا') }}</div>

  @error('image')
      <span class="invalid-feedback">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
</div>

<div class="row px-3">
  <img id="cover-image-thumb" class="col-2" width="100" height="100">
  <span class="input-name col-6 "></span>
</div>