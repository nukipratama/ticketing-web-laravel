@component('mail::message')
Hello **{{$book->email}}**, {{-- use double space for line break --}}
Mohon maaf pembelian tiket anda tidak berhasil karena telah waktu pembayaran sudah habis. Silahkan kontak kami melalui
email di -alamat email cs- jika anda mengalami kendala.
Sincerely,
TicketApp.
@endcomponent