
@component('mail::message')

# {{ $mailData['title'] }}

<h2> Hi, You have received new message. </h2>

<b> Name:</b> {{$mailData['name'] }} <br>
<b> Email:</b> {{ $mailData['email'] }} <br>
<b> Message: </b> <br>
<p>{{ $mailData['message'] }} </p> <br>



Thanks,<br>
{{ config('app.name') }}
@endcomponent
