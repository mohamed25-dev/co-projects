@component('mail::message')
  # {{$newsletter->title}}
  ## أهلا بك {{$customer->first_name}} 

  ### {{$newsletter->body}}

  @component('mail::button', ['url' => $url])
  إلغاء الإشتراك    
  @endcomponent

  شكرا لك,<br>


{{ config('app.name') }}
@endcomponent