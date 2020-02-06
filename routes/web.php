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


Route::get('/', function () {
    return view('pages/landing');
});
//tickets
Route::get('ticket', 'TicketController@index');
Route::post('ticket', 'TicketController@create');
Route::post('ticket/check', 'TicketController@check');
// Route::get('ticket/insert', 'TicketController@insert');
