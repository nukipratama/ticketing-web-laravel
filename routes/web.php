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
Route::post('ticket/check', 'TicketController@check');
Route::get('ticket/{id}', 'TicketController@create');
//invoice
Route::get('invoice/{id}', 'InvoiceController@index')->name('invoice');
Route::put('invoice/{id}', 'InvoiceController@store')->name('uploadInvoice');
//dashboard
Route::get('more-priv-plz', 'DashboardController@index')->name('home');
Route::get('isi-untuk-masuk', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('masuk-dashboard', 'Auth\LoginController@login')->name('login-post');
Route::post('keluar', 'Auth\LoginController@logout')->name('logout');
Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
    Route::get('recent', ['as' => 'dashboard.recent', 'uses' => 'DashboardController@recent']);
    Route::get('confirmation', ['as' => 'dashboard.confirmation', 'uses' => 'DashboardController@confirmation']);
    Route::get('unpaid', ['as' => 'dashboard.unpaid', 'uses' => 'DashboardController@unpaid']);
    Route::get('failed', ['as' => 'dashboard.failed', 'uses' => 'DashboardController@failed']);
});
