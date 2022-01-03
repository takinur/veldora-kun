
@component('mail::message')

# {{ $mailData['title'] }}
<br>

 {!! $mailData['text']!!}



Thanks,<br>
{{ config('app.name') }}
@endcomponent
