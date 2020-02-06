<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Book;
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
        $ticket = Ticket::where('id', $request->id)->first();
        if ($ticket) {
            if ($ticket->kuota >= $request->jumlah) {
                $request->session()->put('ticket', $ticket);
                return view(
                    'pages/pendaftaran/form',
                    [
                        'ticket' => $ticket,
                        'jumlah' => $request->jumlah
                    ]
                );
            } else {
                return 'Sisa tiket tidak memenuhi jumlah tiket';
            }
        } else {
            return abort(404);
        }
    }

    public function check(Request $request)
    {
        //validate forms

        // generate bid, retrieve ticket detail,count peserta
        $bid = Str::random(10);
        $ticket = $request->session()->pull('ticket', 'default');
        $jumlah = count($request->namePeserta);

        //create book object, insert into 'books' table
        $book = (object) [
            'bid' => $bid,
            'jenis' => $ticket->jenis,
            'kategori' => $ticket->kategori,
            'harga' => $ticket->harga,
            'jumlah' => $jumlah,
            'email' => $request->emailPemesan
        ];

        //generate uid for peserta, retrieve and store file, wrap input into object
        for ($i = 0; $i < $jumlah; $i++) {
            $uid = Str::random(10);
            $file = $request->file('imgPeserta')[$i];
            $file_mod_name = $uid . '.' . $file->getClientOriginalExtension();
            $file->move('image/temp', $file_mod_name);
            $peserta[$i] = (object) [
                "uid" => $uid,
                "bid" => $bid,
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
        return $this->insert($book, $peserta);
    }

    public function insert($book, $peserta)
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
