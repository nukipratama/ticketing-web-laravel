<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Mail\BookSuccessMail;
use Illuminate\Support\Facades\Mail;

Route::get('/send-mail', function () {
    $details = new stdClass;
    $details->name = 'NUki';
    $details->desc = 'hello world';
    Mail::to('newuser@example.com')->send(new BookSuccessMail($details));

    return 'A message has been sent to Mailtrap!';
});

Route::get('/', function () {
    return view('pages/landing');
});
//tickets
Route::get('ticket', 'TicketController@index');
Route::post('ticket/check', 'TicketController@check');
Route::get('ticket/{id}', 'TicketController@create');
