<option selected>اختر التصنيف المناسب</option>
@if(!isset($project))
    @foreach($categories as $category)
        <option value="{{$category->id}}"> {{$category->name}} </option>
    @endforeach
@else
    @foreach($categories as $category)
        <option value="{{ $category->id }}"  {{ $project->category_id == $category->id  ? 'selected' : '' }}>{{ $category->name }}</option>
    @endforeach
@endif