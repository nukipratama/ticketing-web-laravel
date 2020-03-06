@component('mail::message')
Hello {{$book->email}}, {{-- use double space for line break --}}
You already registered but didn't upload any payment proof.
Please pay your invoice and upload the payment proof before {{$book->deadline}}.

Please click button below to continue to payment
@component('mail::button', ['url' => config('app.url').'/book?bid='.$book->bid, 'color' => 'primary'])
Continue to Payment
@endcomponent
Payment upload form can't be accessed after {{$book->deadline}} and the booked ticket will be released.
Sincerely,
TicketApp.
@endcomponent