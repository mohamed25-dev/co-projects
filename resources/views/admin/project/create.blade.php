@extends('theme.default')

@section('head')
    <link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
    {{ __('Add New Project') }}
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="card mb-2 col-md-8">
                <div class="card-header text-center">
                    {{ __('Add New Project') }}
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @include('admin.project.form')

                        <div class="form-group row mt-4">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">{{ __('Add Project') }}</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function readCoverImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#cover-image-thumb').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
                $(".input-name").html(input.files[0].name);
            }
        }
    </script>
@endsection
