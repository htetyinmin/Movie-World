<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Cast;
use App\Genre;
use App\Package;
use App\Moviedownload;
use App\User;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class PageController extends Controller
{
    public function index(){

        $now = Carbon::now();
        $currentyear = $now->year;

        $movies = Movie::all();
        $genres = Genre::all();
        $newmovies = Movie::latest()->take(3)->get();

        $newfreemovies = Movie::latest()->where('status', 'Free')->take(10)->get();
        $newpremiummovies = Movie::latest()->where('status', 'Premium')->take(10)->get();

        $currentyearmovies = Movie::latest()->where('year',$currentyear )->take(10)->get();

        $trendingmovies = Movie::all()->random(6);

        return view('frontend.index', compact('movies', 'genres', 'newmovies', 'newfreemovies', 'newpremiummovies', 'currentyearmovies', 'trendingmovies'));

    }

    public function movielist(){
        $movies = Movie::all();
        $genres = Genre::all();
        $lastmovies = Movie::latest()->take(10)->get();
        return view('frontend.movielist', compact('movies', 'genres', 'lastmovies') );
    }

    public function genrelist(){
        $movies = Movie::all();
        $genres = Genre::all();
        return view('frontend.genrelist', compact('movies', 'genres') );
    }

    public function about(){
        $genres = Genre::all();
        return view('frontend.about', compact('genres'));
    }

    public function contact(){
        $genres = Genre::all();
        return view('frontend.contact', compact('genres'));
    }

    public function register(){
        $genres = Genre::all();
        return view('frontend.register', compact('genres'));
    }

    public function pricing(){
        $packages = Package::all();
        $genres = Genre::all();
        return view('frontend.pricing', compact('packages','genres'));
    }

    public function watchmovie($id){
        $movie = Movie::find($id);

        return view('frontend.watchmovie',compact('movie'));
    }

    public function moviedetail($id){
        $genres = Genre::all();
        $casts = Cast::all();
        $movie = Movie::find($id);
        $playmovies = Movie::all();
        return view('frontend.moviedetail', compact('genres', 'casts', 'movie', 'playmovies'));
    }

    public function downloadmovie($id){

        $now = Carbon::now();
        $today = $now->toDateString();


        $userID = Auth::user()->id;
            $download = Moviedownload::where(['user_id' => $userID, 'movie_id' => $id])->first();
            if (empty($download->user_id))
            {
                $download = new Moviedownload;
                $download->date = $today;

                $download->user_id = $userID;
                $download->movie_id = $id;
                $download->save();
            }

            $movie = Movie::find($id);
            $download =  public_path(). '/storage/' .$movie->video;
            return response()->download($download);
        $movies = Movie::where('id', $id)->get();
        // $gallery = Movie::all();
        // dd($gallery);
        $gallerys = json_decode($movies[0]->gallery);
        // $cast_gallerys = json_decode($casts[0]->gallery);
        // dd($cast_gallerys);
        // $covers = json_decode($movies[0]->gallery[1]);
        // dd($covers);
        return view('frontend.moviedetail', compact('genres', 'casts', 'movies', 'gallerys', 'cast_gallerys'));
    }

    public function castdetail($id){
        $genres = Genre::all();
        $casts = Cast::where('id', $id)->get();
        $movies = Movie::all();
        $gallerys = json_decode($casts[0]->gallery);
        return view('frontend.castdetail', compact('genres', 'casts', 'movies', 'gallerys'));
    }

    public function user(){
        // $genres = Genre::all();
        $users = User::all();
        return view('backend.user.index', compact('users'));
    }
}
