<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Book;
use App\Http\Requests\ParticipantForm;
use App\Participant;
use Illuminate\Support\Str;

class TicketController extends Controller
{
   public function index()
   {
      $tickets = Ticket::all();
      return view('pages/pendaftaran/index', compact('tickets'));
   }

   public function create(Request $request)
   {
      $book = Ticket::find($request->id);
      if ($book) {
         $book = (object) $book->toArray();
         if ($book->kuota >= $request->jumlah) {
            $book->bid = Str::random(10);
            $book->jumlah = $request->jumlah;
            $request->session()->put('book', $book);
            return view('pages/pendaftaran/form', ['book' => $book]);
         } else {
            return redirect('/ticket');
         }
      } else {
         return redirect('/ticket');
      }
   }

   public function check(ParticipantForm $request)
   {
      dd($request->imgPeserta);
      //validate forms
      $validated = $request->validated();

      // retrieve ticket detail, add emailPemesan
      $book = $request->session()->pull('book', 'default');
      $book->email = $request->emailPemesan;

      //generate uid for peserta, retrieve and store file, wrap input into object
      for ($i = 0; $i < $book->jumlah; $i++) {
         $uid = Str::random(10);
         $file = $request->file('imgPeserta')[$i];
         $file_mod_name = $uid . '.' . $file->getClientOriginalExtension();
         $file->move('image/temp', $file_mod_name);
         $peserta[$i] = (object) [
            "uid" => $uid,
            "bid" => $book->bid,
            "name" => $request->namePeserta[$i],
            "email" => $request->emailPeserta[$i],
            "address" => $request->addressPeserta[$i],
            "tel" => $request->telPeserta[$i],
            "emergency" => $request->emergencyPeserta[$i],
            "gender" => $request->genderPeserta[$i],
            "birthdate" => $request->birthdatePeserta[$i],
            "identity" => $request->idPeserta[$i],
            "community" => $request->communityPeserta[$i],
            "size" => $request->sizePeserta[$i],
            "img" => 'image/temp/' . $file_mod_name,
            "medical" => $request->medicalPeserta[$i]
         ];
      }
      // send to store method
      return $this->store($book, $peserta);
   }

   public function store($book, $peserta)
   {
      Book::create(get_object_vars($book));
      foreach ($peserta as $participant) {
         Participant::create(get_object_vars($participant));
      }
      return view('pages/pendaftaran/success', [
         'book' => $book,
         'peserta' => $peserta
      ]);
   }
}
