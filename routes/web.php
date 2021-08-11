<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/login', 'AuthController@loginform')->name('login');
Route::post('/login', 'AuthController@login');

Route::post('/register', 'AuthController@register');
Route::get('/register', 'AuthController@registerform')->name('register');

Route::post('logout','AuthController@logout')->name('logout');


Route::get('/', 'PageController@index')->name('index');
Route::get('/movielist', 'PageController@movielist')->name('movielist');
Route::get('/genrelist/{id}', 'PageController@genrelist')->name('genrelist');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/contact', 'PageController@contact')->name('contact');
Route::get('/term', 'PageController@term')->name('term');
Route::get('/privacy', 'PageController@privacy')->name('privacy');
Route::get('/userdetail', 'PageController@userdetail')->name('userdetail');
Route::get('/help', 'PageController@help')->name('help');
Route::get('/search', 'PageController@search')->name('search');

Route::get('/castdetail/{id}', 'PageController@castdetail')->name('castdetail');
// Route::get('/login', 'PageController@login')->name('login');
// Route::get('/register', 'PageController@register')->name('register');
Route::get('/pricing', 'PageController@pricing')->name('pricing');
Route::post('/pricing', 'PageController@reactivate');

Route::get('/moviedetail/{id}', 'PageController@moviedetail')->name('moviedetail');

Route::get('/watchmovie/{id}', 'PageController@watchmovie')->name('watchmovie');
Route::get('/downloadmovie/{id}', 'PageController@downloadmovie')->name('downloadmovie');

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
Route::resource('package', 'PackageController');

Route::get('/user', 'PageController@user')->name('user');
Route::get('/dashboard', 'PageController@dashboard')->name('dashboard');

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
