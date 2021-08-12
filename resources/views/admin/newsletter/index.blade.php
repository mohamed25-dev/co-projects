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
                        <th>{{ __('الحالة ') }}</th>
                        <th>{{ __('عرض ') }}</th>
                        <th>{{ __('إعادة إرسال') }}</th>
                        <th>{{ __('الغاء') }}</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($newsletters as$newsletter)
                        <tr>
                            <td>{{$newsletter->title }}</td>
                            <td>{{Str::limit($newsletter->body , 30)}}</td>
                            <td>{{$newsletter->created_at->shortRelativeDiffForHumans() }}</td>
                            <td>
                                @livewire('batch-progress', ['batch_id' => $newsletter->batch_id], key($newsletter->batch_id))
                            </td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{ route('admin.newsletters.show',$newsletter) }}"><i
                                        class="fa fa-eye"></i> </a>
                            </td>
                            <td>
                                @livewire('resend-newsletter', ['batch_id' => $newsletter->batch_id])
                            </td>
                        
                            <td>
                                @livewire('cancel-newsletter', ['batch_id' => $newsletter->batch_id], key($newsletter->id))
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
