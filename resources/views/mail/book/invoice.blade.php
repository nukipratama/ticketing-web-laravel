@component('mail::message')
Hello **{{$book->email}}**, {{-- use double space for line break --}}
Terima Kasih telah melakukan pemesanan di TicketApp!

Klik tombol berikut untuk melanjutkan ke pembayaran
@component('mail::button', ['url' => config('app.url').'/book?bid='.$book->bid, 'color' => 'primary'])
Lanjutkan ke Pembayaran
@endcomponent
Batas akhir pembayaran adalah **{{$book->deadline}}** , silahkan melakukan pembayaran sebelum waktu pembayaran habis.
Sincerely,
TicketApp.
@endcomponent