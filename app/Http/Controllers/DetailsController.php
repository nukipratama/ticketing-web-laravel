<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Jobs\SendTicketMail;

class DetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $data = \App\Book::where('id', $request->id)->with(['tickets', 'participants'])->first();
        $title = 'Details - ' . $data->bid;
        $date['created'] = $data->created_at->format('d M Y H:i:s');
        $date['updated'] = $data->updated_at->format('d M Y H:i:s');
        $date['expired'] = Carbon::parse($data->expired)->format('d M Y H:i:s');
        return view('dashboard.details', compact('title', 'data', 'date'));
    }
    public function expiredUpdate(Request $request)
    {
        $book = \App\Book::where('bid', $request->id)->first();
        switch ($request->add) {
            case 0:
                $book->expired = now()->addHours(12);
                break;
            case 1:
                $book->expired = now()->addHours(24);
                break;
            case 2:
                $book->expired = now()->addHours(48);
                break;
        }
        $book->save();
        return back();
    }
    public function emailUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $book = \App\Book::where('bid', $request->id)->first();
        $book->email = $request->email;
        $book->save();
        return back()->withStatus(__('Book Information successfully updated.'));
    }
    public function bookAccept(Request $request)
    {
        $book = \App\Book::where('bid', $request->id)->first();
        $book->status = 'accepted';
        $book->save();
        SendTicketMail::dispatch($book)->onQueue('high');
        return back();
    }
    public function bookDecline(Request $request)
    {
        $book = \App\Book::where('bid', $request->id)->first();
        $book->status = 'declined';
        $book->save();
        return back();
    }
}
