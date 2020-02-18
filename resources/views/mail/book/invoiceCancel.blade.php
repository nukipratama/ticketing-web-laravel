@component('mail::message')
Hello **{{$book->email}}**, {{-- use double space for line break --}}
Mohon maaf pembelian tiket anda tidak berhasil karena telah dibatalkan oleh admin. Silahkan kontak kami dalam 1x24 jam
melalui email di -alamat email cs- untuk informasi lebih lanjut.
Sincerely,
TicketApp.
@endcomponent