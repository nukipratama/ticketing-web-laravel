@component('mail::message')
Hello **{{$book->email}}**, {{-- use double space for line break --}}
Thank you for booking your ticket with TicketApp!

Please click button below to continue to payment
@component('mail::button', ['url' => $book->invoiceUrl, 'color' => 'primary'])
Continue to Payment
@endcomponent
Payment deadline is at {{$book->expired}} , please upload your payment proof invoice before deadline.
Payment upload form can't be accessed after {{$book->expired}} and the booked ticket will be released.
Sincerely,
TicketApp.
@endcomponent