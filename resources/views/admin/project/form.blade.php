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

<div class="form-group">
  <label for="url">{{ __('  رابط المشروع ') }}</label>
  <input type="text" id="url" name="url" value="{{ $project->url ?? ''}}"
  value="{{ $project->url ?? ''}}" class="form-control @error('url') is-invalid @enderror">

  @error('url')
      <span class="invalid-feedback">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
</div>

<div class="form-group">
    <label for="category">{{ __('  تصنيف المشروع ') }}</label>
    <select class="form-control" name="category_id" id="category">
      @include('includes.category_options')
    </select>
</div>

<div class="form-group file-area pt-1">
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
