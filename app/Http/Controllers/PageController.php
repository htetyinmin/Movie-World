<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Cast;
use App\Genre;
use App\Package;
use App\Moviedownload;

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
        return view('frontend.movielist');
    }

    public function about(){
        return view('frontend.about');
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function register(){
        return view('frontend.register');
    }

    public function pricing(){
        $packages = Package::all();
        return view('frontend.pricing', compact('packages'));
    }

    public function watchmovie($id){
        $movie = Movie::find($id);

        return view('frontend.watchmovie',compact('movie'));
    }

    public function moviedetail($id){
        $genres = Genre::all();
        $casts = Cast::all();
        $movie = Movie::find($id);
        return view('frontend.moviedetail', compact('genres', 'casts', 'movie'));
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
    }
}
