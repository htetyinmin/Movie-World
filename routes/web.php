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

// Route::get('/', function () {
//     return view('backend.genres.index');
// });

Route::get('/genre', 'PageController@genre')->name('genre');
Route::get('/create', 'PageController@create')->name('create');
Route::get('/edit', 'PageController@edit')->name('edit');

