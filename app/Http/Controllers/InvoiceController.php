<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        !$request->hasValidSignature() ? abort(401) : '';
        $book = \App\Book::where('bid', $request->id)->with(['tickets', 'participants'])->first();
        $book->countdown = date('Y/m/d H:m:s', strtotime('+1 days', strtotime($book->updated_at)));
        $book->countdownLabel = date('d M Y H:m:s', strtotime('+1 days', strtotime($book->updated_at)));
        $book->uploadURL = URL::signedRoute('uploadInvoice', ['id' => $book->bid]);
        switch ($book->status) {
            case 0:
                return view('pages.invoice.uploadForm', compact('book'));
                break;
            case 1:
                $title = 'Waiting - ' . $book->bid;
                $description = '<img src="' . asset($book->invoice) . '"><br>waiting admin confirmation';
                return view('pages.invoice.plain', compact('title', 'description'));
                break;
            case 2:
                return view('pages.invoice.confirmed', compact('book'));
                break;
            case 3:
                $title = 'Expired - ' . $book->bid;
                $description = 'didnt upload payment';
                return view('pages.invoice.plain', compact('title', 'description'));
                break;
            case 4:
                $title = 'Failed - ' . $book->bid;
                $description = 'invalid data added or prohibit rules';
                return view('pages.invoice.plain', compact('title', 'description'));
                break;
        }
    }

    public function store(Request $request)
    {
        !$request->hasValidSignature() ? abort(401) : '';
        $validator = Validator::make($request->all(), [
            'PaymentProof' => 'required|image|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect(URL::signedRoute('invoice', ['id' => $request->id]))
                ->withErrors($validator)
                ->withInput();
        }
        $book = \App\Book::where('bid', $request->id)->first();
        $file = $request->file('PaymentProof');
        $file_mod_name = $book->bid . '.' . $file->getClientOriginalExtension();
        $file_path = 'image/invoice/';
        $file->move($file_path, $file_mod_name);
        $book->status = 1;
        $book->invoice = $file_path . $file_mod_name;
        $book->save();
        return redirect(URL::signedRoute('invoice', ['id' => $book->bid]));
    }
}
