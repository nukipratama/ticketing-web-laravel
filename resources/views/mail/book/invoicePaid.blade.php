@component('mail::message')
Hello **{{$book->email}}**, {{-- use double space for line break --}}
Terima Kasih telah melakukan pembelian tiket di TicketApp!

Selamat pembelian tiket anda telah sukses! Tekan tombol berikut untuk menampilkan tiket anda
@component('mail::button', ['url' => config('app.url').'/book?bid='.$book->bid, 'color' => 'primary'])
KLik disini
@endcomponent
Sincerely,
TicketApp.
@endcomponent