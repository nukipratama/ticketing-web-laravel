@component('mail::message')
Hello **{{$book->email}}**, {{-- use double space for line break --}}
Thank you for your payment. We already receive your payment proof and currently processing your ticket.
Please wait for us to finish processing your ticket. We will send you e-mail if your ticket is ready.
If you have any question please contact us at cs@ticketapp.
Sincerely,
TicketApp.
@endcomponent