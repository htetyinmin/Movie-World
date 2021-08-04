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

Route::get('/', 'PageController@index')->name('index');
Route::get('/movielist', 'PageController@movielist')->name('movielist');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/contact', 'PageController@contact')->name('contact');
Route::get('/login', 'PageController@login')->name('login');
Route::get('/register', 'PageController@register')->name('register');
Route::get('/package', 'PageController@package')->name('package');

// Route::get('/', function () {
//     return view('backend.genres.index');
// });

// Route::get('/genre', 'PageController@genre')->name('genre');
// Route::get('/create', 'PageController@create')->name('create');
// Route::get('/edit', 'PageController@edit')->name('edit');

//CRUD
Route::resource('genre', 'GenreController');
Route::resource('cast', 'CastController');
Route::resource('movie', 'MovieController');


