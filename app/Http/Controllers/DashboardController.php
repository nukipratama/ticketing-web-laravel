<?php

namespace App\Http\Controllers;


class DashboardController extends Controller
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
        $recent = \App\Book::orderBy('id', 'desc')->with('tickets')->take(5)->get();
        $total = \App\Ticket::select('id', 'jenis', 'kategori')->with('books')->get();
        $income = 0;
        foreach ($total as $key => $value) {
            $book[$key] = \App\Book::select('id', 'jumlah', 'ticket_id')
                ->where('status', 2)->where('ticket_id', $value->id)
                ->with('tickets')->get();
            $total[$key]->income = 0;
            $total[$key]->participant = 0;
            if ($book[$key]->isNotEmpty()) {
                foreach ($book[$key] as  $value) {
                    $total[$key]->income += ($value->tickets->harga * $value->jumlah) + $value->id;
                    $total[$key]->participant += $value->jumlah;
                }
                $income += $total[$key]->income;
            }
        }
        return view('dashboard.dashboard', compact('recent', 'total', 'income'));
    }

    public function recent()
    {
        $title = 'Recent Books';
        $description = 'Latest book made ordered by latest date';
        $recent = \App\Book::orderBy('id', 'desc')->with('tickets')->paginate('10');
        return view('dashboard.table', compact('recent', 'title', 'description'));
    }
    public function confirmation()
    {
        $title = 'Confirmation List';
        $description = 'Unconfirmed paid participant list';
        $recent = \App\Book::where('status', 1)->with('tickets')->paginate('10');
        return view('dashboard.table', compact('recent', 'title', 'description'));
    }
    public function unpaid()
    {
        $title = 'Unpaid Books';
        $description = 'Unpaid / not yet upload their payment proof';
        $recent = \App\Book::where('status', 0)->with('tickets')->paginate('10');
        return view('dashboard.table', compact('recent', 'title', 'description'));
    }
    public function failed()
    {
        $title = 'Failed Books';
        $description = 'Expired / Declined Books';
        $recent = \App\Book::whereIn('status', [3, 4])->with('tickets')->paginate(10);
        return view('dashboard.table', compact('recent', 'title', 'description'));
    }
}
