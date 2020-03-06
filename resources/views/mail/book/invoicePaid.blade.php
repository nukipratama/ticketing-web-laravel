@component('mail::message')
Hello **{{$book->email}}**, {{-- use double space for line break --}}
Thank You for buying ticket with TicketApp!
Your ticket is ready! Click the button below to access your ticket
@component('mail::button', ['url' => config('app.url').'/book?bid='.$book->bid, 'color' => 'success'])
Access Ticket
@endcomponent
You can access your ticket too by accessing
<a href="{{config('app.url').'/book?bid='.$book->bid}}">{{config('app.url').'/book?bid='.$book->bid}}</a>
<br>
Please save this e-mail or the ticket link.
Sincerely,
TicketApp.
@endcomponent