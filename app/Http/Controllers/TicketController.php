<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Book;
use App\Http\Requests\ParticipantForm;
use App\Jobs\SendBookExpiredMail;
use App\Jobs\SendBookSuccessMail;
use App\Jobs\SendBookTimeNotificationMail;
use App\Participant;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class TicketController extends Controller
{
   public function index()
   {
      $tickets = Ticket::all();
      return view('pages/ticket/index', compact('tickets'));
   }

   public function create(Request $request)
   {
      $book = Ticket::find($request->id);
      if ($book) {
         $book = (object) $book->toArray();
         if ($book->kuota >= $request->jumlah) {
            $book->bid = Str::random(10);
            $book->ticket_id = $book->id;
            $book->jumlah = $request->jumlah;
            $request->session()->put('book', $book);
            return view('pages/ticket/form', compact('book'));
         } else {
            return redirect('/ticket');
         }
      } else {
         return redirect('/ticket');
      }
   }

   public function check(ParticipantForm $request)
   {
      //validate forms
      $validated = (object) $request->validated();

      // retrieve ticket detail, add emailPemesan
      $book = $request->session()->pull('book', 'default');
      $book->email = $validated->emailPemesan;

      //generate uid for peserta, retrieve and store file, wrap input into object
      for ($i = 0; $i < $book->jumlah; $i++) {
         $uid = Str::random(10);
         $file = $request->file('imgPeserta')[$i];
         $file_mod_name = $uid . '.' . $file->getClientOriginalExtension();
         $file->move('image/upload', $file_mod_name);
         $peserta[$i] = (object) [
            "uid" => $uid,
            "bid" => $book->bid,
            "name" => $validated->namePeserta[$i],
            "email" => $validated->emailPeserta[$i],
            "address" => $validated->addressPeserta[$i],
            "tel" => $validated->telPeserta[$i],
            "emergency" => $validated->emergencyPeserta[$i],
            "gender" => $validated->genderPeserta[$i],
            "birthdate" => $validated->birthdatePeserta[$i],
            "identity" => $validated->idPeserta[$i],
            "community" => $validated->communityPeserta[$i],
            "size" => $validated->sizePeserta[$i],
            "img" => 'image/temp/' . $file_mod_name,
            "medical" => $validated->medicalPeserta[$i]
         ];
      }
      // send to store method
      return $this->store($book, $peserta);
   }

   public function store($book, $peserta)
   {
      $book->deadline = Carbon::parse(now()->addDay(), 'Asia/Jakarta');
      Book::create(get_object_vars($book));
      foreach ($peserta as $participant) {
         Participant::create(get_object_vars($participant));
      }

      Log::info('Menambahkan notifikasi tagihan ' . $book->email . ' ke antrian..');
      SendBookSuccessMail::dispatch($book)->onQueue('high');
      // ->delay(now()->addHours(12))
      // ->delay(now()->addDay())
      SendBookTimeNotificationMail::dispatch($book)->onQueue('medium');
      SendBookExpiredMail::dispatch($book)->onQueue('medium');

      return view('pages/ticket/success', compact('book'));
   }
}
