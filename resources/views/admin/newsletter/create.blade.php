@extends('theme.default')

@section('head')
    <link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
    {{ __('Add Newsletter') }}
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="card mb-2 col-md-8">
                <div class="card-header text-center">
                    {{ __('Add Newsletter') }}
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.newsletters.store') }}" method="POST">
                        @csrf

                        @include('admin.newsletter.form')

                        <div class="form-group row mt-4">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">{{ __('Send') }}</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
