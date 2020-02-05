<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Book;
use Illuminate\Support\Str;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('pages/pendaftaran/index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function confirm(Request $request)
    {
        $bid = Str::random(10);
        $ticket = $request->session()->pull('ticket', 'default');
        $jumlah = count($request->namePeserta);
        Book::create([
            'bid' => $bid,
            'jenis' => $ticket->jenis,
            'kategori' => $ticket->kategori,
            'harga' => $ticket->harga,
            'jumlah' => $jumlah,
            'email' => $request->emailPemesan
        ]);

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
                "id" => $request->idPeserta[$i],
                "community" => $request->communityPeserta[$i],
                "size" => $request->sizePeserta[$i],
                "img" => 'image/temp/' . $file_mod_name,
                "medical" => $request->medicalPeserta[$i]
            ];
        }
        $request->session()->put('peserta', $peserta);
        return view('pages/pendaftaran/confirm', compact('peserta'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
}
