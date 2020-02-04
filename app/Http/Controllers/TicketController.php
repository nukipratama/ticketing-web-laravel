<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

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
        for ($i = 0; $i < count($request->namePeserta); $i++) {
            $peserta[$i] = [
                "name" =>  $request->namePeserta[$i],
                "email" => $request->emailPeserta[$i],
                "address" => $request->addressPeserta[$i],
                "tel" => $request->telPeserta[$i],
                "emergency" => $request->emergencyPeserta[$i],
                "gender" => $request->genderPeserta[$i],
                "birthdate" => $request->birthdatePeserta[$i],
                "id" => $request->idPeserta[$i],
                "community" => $request->communityPeserta[$i],
                "size" => $request->sizePeserta[$i],
                "img" => $request->imgPeserta[$i],
                "medical" => $request->medicalPeserta[$i]
            ];
        }
        foreach ($peserta as $item) {
            var_dump($item);
        }
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
