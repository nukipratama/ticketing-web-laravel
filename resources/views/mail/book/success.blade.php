@component('mail::message')
Hello **{{$details->name}}**, {{-- use double space for line break --}}
Thank you for choosing Mailtrap!
**{{$details->desc}}**
Click below to start working right now
@component('mail::button', ['url' => $details->desc])
Go to your inbox
@endcomponent
Sincerely,
Mailtrap team.
@endcomponent