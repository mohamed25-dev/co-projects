<x-app-layout>
    <x-slot name="header">
       
    </x-slot>

    <div class="container">
        <div class="row py-8">
            <div class="container">
                <div class="py-8">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header mx-auto">{{ __(' تفاصيل المشروع ') }}</div>
                                <a href="">
                                    <img src="{{ asset($project->image) }}" class="card-img-top" alt="...">
                                </a>
                                <div class="card-body">
                                    <h3 class="card-title"><strong>{{ $project->title }}</strong></h3>
                                    <p class="card-text">{{ Str::limit($project->description, 360) }}</p>
                                    <div class="row pt-4">
                                        <div class="mx-auto pt-4">
                                            <a href="{{$project->url}}" rel="nofollow" class="btn btn-primary" target="_blank">
                                                <i class="fa fa-fw fa-link"></i> {{ __(' رابط المشروع ') }}
                                            </a>
                                        </div>
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
