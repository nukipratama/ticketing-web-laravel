@component('mail::message')
Hello **{{$book->email}}**, {{-- use double space for line break --}}
We're really sorry to inform you that your registration is expired and has been automatically cancelled. This can be
happen because we didn't receive your payment proof within deadline. The ticket has been released, please re-book your
ticket if you still want to participate. Contact us at cs@ticketapp if you have problem with registration. Thank You.
Sincerely,
TicketApp.
@endcomponent