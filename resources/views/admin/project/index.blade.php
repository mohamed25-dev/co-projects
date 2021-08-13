@extends('theme.default')

@section('head')
    <link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
    {{__('Project List')}}
@endsection


@section('content')
    <a class="btn btn-primary" href="{{ route('admin.projects.create') }}"><i class="fas fa-plus px-2"></i>{{__('Add New Project')}}</a>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table id="books-table" class="table table-stribed " width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{ __('Project Title') }}</th>
                        <th>{{ __('Project Description') }}</th>
                        <th>{{ __('Show') }}</th>
                        <th>{{ __('Edit') }}</th>
                        <th>{{ __('Delete') }}</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->description }}</td>

                            <td>
                                <a class="btn btn-info btn-sm" href="{{ route('admin.projects.show', $project) }}"><i
                                        class="fa fa-eye"></i> </a>
                            </td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{ route('admin.projects.edit', $project) }}"><i
                                        class="fa fa-edit"></i> </a>
                            </td>
                            <td>
                                <form class="inline-form" method="POST"
                                    action="{{ route('admin.projects.destroy', $project) }}" style="display:inline-block">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are You Sure ?')"><i class="fa fa-trash"></i> </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
