@component('mail::message')
Hello **{{$book->email}}**, {{-- use double space for line break --}}
We're really sorry to inform you that your registration has been declined by Administrator.
Please contact us at cs@ticketapp if you have problem with registration.
Sincerely,
TicketApp.
@endcomponent