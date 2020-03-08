@component('mail::message')
Hello **{{$book->email}}**, {{-- use double space for line break --}}
Thank you for booking your ticket with TicketApp!

Please click button below to continue to payment
@component('mail::button', ['url' => config('app.url').'/book?bid='.$book->bid, 'color' => 'primary'])
Continue to Payment
@endcomponent
Payment deadline is at {{$book->deadline}} , please upload your payment proof invoice before deadline.
Payment upload form can't be accessed after {{$book->deadline}} and the booked ticket will be released.
Sincerely,
TicketApp.
@endcomponent