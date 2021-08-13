@extends('theme.default')

@section('head')
    <link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
    {{ __('Project List') }}
@endsection


@section('content')
    <div class="container">
        <div class="py-8">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Project Details') }}</div>
                        <img src="{{ asset('storage/images/default.jpeg') }}" class="card-img-top" alt="...">

                        <div class="card-body">
                            <h4 class="card-title">{{ $project->title }}</h4>
                            <p class="card-text">{{ $project->description}}</p>
                            <a href="{{$project->url}}" rel="nofollow" class="btn btn-primary" target="_blank">
                                <i class="fa fa-fw fa-link"></i> {{ __('Project Link') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
