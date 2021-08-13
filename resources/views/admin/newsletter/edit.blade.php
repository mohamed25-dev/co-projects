@extends('theme.default')

@section('head')
    <link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
    {{__('Edit Newsletter')}}
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="card mb-2 col-md-8">
                <div class="card-header text-center">
                    {{ __('Edit Newsletter') }}
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.newsletters.update', $newsletter->id) }}" method="POST">
                        @csrf
                        @method('patch')

                        @include('admin.newsletter.form')
                        <div class="form-group row mt-4">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">{{ __('Edit') }}</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

