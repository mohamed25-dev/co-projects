@extends('theme.default')

@section('head')
    <link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
    {{__('عرض النشرة البريدية')}}
@endsection


@section('content')
    <a class="btn btn-primary" href="{{ route('admin.newsletters.create') }}"><i class="fas fa-plus px-2"></i>{{__('إرسال نشرة بريدية جديدة')}}</a>
    <hr>
    <div class="row">
        <div class="col-md-10">
            <table id="books-table" class="table table-stribed text-right" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{ __('العنوان ') }}</th>
                        <th>{{ __('النص ') }}</th>
                        <th>{{ __('تاريخ الإرسال ') }}</th>
                        <th>{{ __('عرض ') }}</th>
                        <th>{{ __('تعديل') }}</th>
                        <th>{{ __('حذف') }}</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($newsletters as$newsletter)
                        <tr>
                            <td>{{$newsletter->title }}</td>
                            <td>{{Str::limit($newsletter->body , 100)}}</td>
                            <td>{{$newsletter->created_at->shortRelativeDiffForHumans() }}</td>

                            <td>
                                <a class="btn btn-info btn-sm" href="{{ route('admin.newsletters.show',$newsletter) }}"><i
                                        class="fa fa-eye"></i> </a>
                            </td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{ route('admin.newsletters.edit',$newsletter) }}"><i
                                        class="fa fa-edit"></i> </a>
                            </td>
                            <td>
                                <form class="inline-form" method="POST"
                                    action="{{ route('admin.newsletters.destroy',$newsletter) }}" style="display:inline-block">
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
