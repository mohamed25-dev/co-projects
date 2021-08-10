<section class="m-auto text-center">
    <div class="pt-4">
        <ul class="list-inline">
            @foreach ($categories as $category)
                      <a href="{{ route('category.show', $category->id) }}" class="text-light bg-indigo-500 hover:bg-indigo-900 m-2 p-2 ">
                        <li class="list-inline-item active"> {{ $category->name }}</li>
                      </a>
            @endforeach
        </ul>
    </div>
</section>
