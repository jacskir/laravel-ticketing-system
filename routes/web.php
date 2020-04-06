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

Auth::routes();

Route::get('/', 'TicketController@index');

Route::get('/ticket/{ticket}/', 'TicketController@show');

Route::get('/ticket/{ticket}/delete/', 'TicketController@destroy');

Route::get('/ticket/{ticket}/edit/', 'TicketController@edit');

Route::post('/ticket/{ticket}/edit/', 'TicketController@update');

Route::get('/add/', 'TicketController@create');

Route::post('/add/', 'TicketController@store');