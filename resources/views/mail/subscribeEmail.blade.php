@component('mail::message')
@if ($lang == 'ar')
  ## أهلا بك {{$customer->first_name}} في نشرتنا الجميلة

  @component('mail::button', ['url' => $url])
  إلغاء الإشتراك    
  @endcomponent

  شكرا لك,<br>
@else
  ## Welcome {{$customer->first_name}} to our news letter

  @component('mail::button', ['url' => $url])
  Unsubscribe 
  @endcomponent

Thanks,<br>

@endif



{{ config('app.name') }}
@endcomponent