@component('mail::message')
Hello {{$book->email}}, {{-- use double space for line break --}}
You already registered but didn't upload any payment proof.
Please pay your invoice and upload the payment proof before {{$book->expired}}.

Please click button below to continue to payment
@component('mail::button', ['url' => $book->invoiceUrl, 'color' => 'primary'])
Continue to Payment
@endcomponent
Payment upload form can't be accessed after {{$book->expired}} and the booked ticket will be released.
Sincerely,
TicketApp.
@endcomponent