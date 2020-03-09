<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/quotes', 'QuoteController@all')->name('quote.all');
Route::post('/quotes', 'QuoteController@store')->name('quote.store');
Route::get('/quotes/create', 'QuoteController@create')->name('quote.create');
Route::get('/quotes/edit/{id}', 'QuoteController@edit')->name('quote.edit');
Route::post('/quotes/edit/{id}', 'QuoteController@update')->name('quote.update');
Route::delete('/quotes/{id}/delete', 'QuoteController@delete')->name('quote.delete');
