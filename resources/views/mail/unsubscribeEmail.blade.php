@component('mail::message')
@if ($lang == 'ar')
  ## نحن حزينون جداً لمغادرتك,  {{$first_name}}  ًنتمنى عودتك قريبا

  شكرا لك,<br>
@else
  ## It feels terrible to hear that you are leaving us {{$first_name}} Hope to see you soon again.

Thanks,<br>

@endif

@endcomponent