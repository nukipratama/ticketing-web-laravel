<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $recent = \App\Book::orderBy('id', 'desc')->take(5)->get();
        $total = \App\Ticket::select('jenis', 'kategori')->get();
        $income = 0;
        foreach ($total as $key => $value) {
            $book[$key] = \App\Book::select('id', 'harga', 'jumlah')
                ->where('jenis', $value->jenis)
                ->where('kategori', $value->kategori)
                ->where('status', 2)
                ->get();
            $total[$key]->income = 0;
            $total[$key]->participant = 0;
            if ($book[$key]->isNotEmpty()) {
                foreach ($book[$key] as  $value) {
                    $total[$key]->income += ($value->harga * $value->jumlah) + $value->id;
                    $total[$key]->participant += $value->jumlah;
                }
                $income += $total[$key]->income;
            }
        }
        return view('dashboard.dashboard', compact('recent', 'total', 'income'));
    }
}
