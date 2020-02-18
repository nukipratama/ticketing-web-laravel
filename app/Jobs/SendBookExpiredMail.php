<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Log;
use App\Mail\BookExpiredMail;
use App\Book;
use App\Ticket;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendBookExpiredMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $book = $this->details;
        Log::info('Mengirim notifikasi expired ke ' . $book->email);
        $book_status = Book::firstWhere('bid', $book->bid);
        if ($book_status->status === 0) {
            $email = new BookExpiredMail($book);
            Mail::to($book->email)->send($email);
            $ticket = Ticket::where('jenis', $book->jenis)
                ->where('kategori', $book->kategori)
                ->where('harga', $book->harga)
                ->first();
            $ticket->kuota = $ticket->kuota + $book_status->jumlah;
            $ticket->save();
            Log::info('Notifikasi expired terkirim ke ' . $book->email);
        } else {
            Log::info('Status booking ' . $book->email . ' telah berubah');
        }
    }
    public function failed($exception)
    {
        return Log::error($exception);
    }
}
