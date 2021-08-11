<x-app-layout>
    <x-slot name="header">
       
    </x-slot>

    <div class="container">
        <div class="row py-8">
            <div class="container">
                <div class="py-8">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">{{ __(' تفاصيل المشروع ') }}</div>
                                <img src="{{ asset($project->image) }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $project->title }}</h4>
                                    <p class="card-text">{{ Str::limit($project->description, 60) }}</p>
                                    <div class="pt-4">
                                        <a href="#" class="btn btn-primary ">{{ __(' رابط المشروع ') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-slot name="footer">
                <div class="row">
                    @include('includes/footer')
                </div>
            </x-slot>

</x-app-layout>
