<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Log;
use App\Mail\BookTimeNotificationMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendBookTimeNotificationMail implements ShouldQueue
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
        $book_status = \App\Book::firstWhere('bid', $book->bid);
        if ($book_status->status === 'booked') {
            Log::info('Mengirim reminder ke ' . $book->email);
            $email = new BookTimeNotificationMail($book);
            Mail::to($book->email)->send($email);
        }
    }
    public function failed($exception)
    {
        return Log::error($exception);
    }
}
