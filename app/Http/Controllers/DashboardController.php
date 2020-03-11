<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $data = \App\Book::orderBy('id', 'desc')->with('tickets')->take(5)->get();
        $total = \App\Ticket::select('id', 'jenis', 'kategori')->with('books')->get();
        $income = 0;
        foreach ($total as $key => $value) {
            $book[$key] = \App\Book::select('id', 'jumlah', 'ticket_id')
                ->where('status', 'accepted')->where('ticket_id', $value->id)
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
        return view('dashboard.dashboard', compact('data', 'total', 'income'));
    }

    public function recent()
    {
        $title = 'Recent Books';
        $description = 'Latest book made ordered by latest date';
        $data = \App\Book::orderBy('id', 'desc')->with('tickets')->paginate('10');
        return view('dashboard.table', compact('data', 'title', 'description'));
    }
    public function confirmation()
    {
        $title = 'Confirmation List';
        $description = 'Unconfirmed paid participant list';
        $data = \App\Book::where('status', 'uploaded')->with('tickets')->paginate('10');
        return view('dashboard.table', compact('data', 'title', 'description'));
    }
    public function unpaid()
    {
        $title = 'Unpaid Books';
        $description = 'Unpaid / not yet upload their payment proof';
        $data = \App\Book::where('status', 'booked')->with('tickets')->paginate('10');
        return view('dashboard.table', compact('data', 'title', 'description'));
    }
    public function failed()
    {
        $title = 'Failed Books';
        $description = 'Expired / Declined Books';
        $data = \App\Book::where('expired', '<', now())->orWhere('status', 'declined')->with('tickets')->paginate(10);
        return view('dashboard.table', compact('data', 'title', 'description'));
    }
    public function search(Request $request)
    {
        $query = $request->get('query');
        $title = 'Search Data';
        $description = 'Search query - ' . $query;
        $data = \App\Book::where('email', $query)->orWhere('bid', $query)->with('tickets')->paginate(10);
        return view('dashboard.table', compact('data', 'title', 'description'));
    }
}
