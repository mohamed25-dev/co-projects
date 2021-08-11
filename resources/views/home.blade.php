<x-app-layout>
    <x-slot name="header">
        @include('includes/category_list')
    </x-slot>

    <div class="container">
        <div class="row py-8">

            @forelse ($projects as $project)
                <div class="col-sm-6 col-md-4 mt-3">
                    <div class="card">
                        <a href="{{ route('projects.show', $project->id) }}">
                            <img src="{{ asset('storage/images/default.jpeg') }}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <a href="{{ route('projects.show', $project->id) }}">
                                <h4 class="card-title">{{ $project->title }}</h4>
                            </a>
                            <p class="card-text">{{ Str::limit($project->description, 60) }}</p>
                            <a href="#" class="btn btn-primary">{{ __('Project Link') }}</a>
                        </div>

                        <div class="card-footer">
                            <div class="d-flex">
                                <div class="d-flex align-items-center">
                                    <img src="/images/clock.svg" alt="">
                                    <div class="me-2">
                                        {{ $project->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                    <div class="alert alert-primary mx-auto" role="alert">
                        {{ __('No Projects on the category for now, join our news letter to find out once we add them') }}
                        {{-- لا يوجد مشاريع ضمن هذا التصنيف , سيتم إضافتها قريبا --}}
                    </div>

            @endforelse
        </div>
    </div>
    <x-slot name="footer">
        <div class="row">
            @include('includes/footer')
        </div>
    </x-slot>

</x-app-layout>
