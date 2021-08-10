@extends('theme.default')

@section('head')
    <link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
    {{__('عرض المشاريع')}}
@endsection


@section('content')
    <a class="btn btn-primary" href="{{ route('admin.projects.create') }}"><i class="fas fa-plus px-2"></i>{{__('إضافة مشروع جديد')}}</a>
    <hr>
    <div class="row">
        <div class="col-md-10">
            <table id="books-table" class="table table-stribed text-right" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{ __('عنوان المشروع') }}</th>
                        <th>{{ __('المشروع وصف') }}</th>
                        <th>{{ __('عرض ') }}</th>
                        <th>{{ __('تعديل') }}</th>
                        <th>{{ __('حذف') }}</th>

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
                                        onclick="return confirm('هل أنت متأكد؟')"><i class="fa fa-trash"></i> </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
