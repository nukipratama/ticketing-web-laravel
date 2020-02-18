@component('mail::message')
Hello **{{$book->email}}**, {{-- use double space for line break --}}
Anda telah melakukan pemesanan tiket namun belum melakukan pembayaran.
Segera lakukan pembayaran sebelum **{{$book->deadline}}**.

Tekan tombol berikut untuk melanjutkan pembayaran
@component('mail::button', ['url' => config('app.url').'/book?bid='.$book->bid, 'color' => 'primary'])
Lanjutkan ke pembayaran
@endcomponent
Sincerely,
TicketApp.
@endcomponent