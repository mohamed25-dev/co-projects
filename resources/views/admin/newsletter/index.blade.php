@extends('theme.default')

@section('head')
    <link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
    {{__('Show Newsletter')}}
@endsection


@section('content')
    <a class="btn btn-primary" href="{{ route('admin.newsletters.create') }}"><i class="fas fa-plus px-2"></i>{{__('Send New Newsletter')}}</a>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table id="books-table" class="table table-stribed " width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Text') }}</th>
                        <th>{{ __('Send Date') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Show') }}</th>
                        <th>{{ __('Resend') }}</th>
                        <th>{{ __('Cancel') }}</th>

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
