@extends('theme.default')

@section('head')
    <link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
    {{ __('عرض المشاريع') }}
@endsection


@section('content')
    <div class="container">
        <div class="py-8">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __(' تفاصيل المشروع ') }}</div>
                        <img src="{{ asset('storage/images/default.jpeg') }}" class="card-img-top" alt="...">
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
@endsection
