
@component('mail::message')

# {{ $mailData['title'] }}


 {!! $mailData['text']!!}

 @component('mail::button', ['url' => $mailData['url']])
View
 @endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
