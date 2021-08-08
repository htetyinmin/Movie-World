<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Cast;
use App\Genre;
use App\Package;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $movies = Movie::all();
        $genres = Genre::all();
        $new_mov = Movie::latest()->limit(3)->get();
        return view('frontend.index', compact('movies', 'genres', 'new_mov'));
    }

    public function movielist(){
        $movies = Movie::all();
        $genres = Genre::all();
        return view('frontend.movielist', compact('movies', 'genres') );
    }

    public function genrelist(){
        $movies = Movie::all();
        $genres = Genre::all();
        return view('frontend.movielist', compact('movies', 'genres') );
    }

    public function about(){
        $genres = Genre::all();
        return view('frontend.about', compact('genres'));
    }

    public function contact(){
        $genres = Genre::all();
        return view('frontend.contact', compact('genres'));
    }

    // public function login(){
    //     return view('frontend.login');
    // }

    public function register(){
        $genres = Genre::all();
        return view('frontend.register', compact('genres'));
    }

    public function pricing(){
        $packages = Package::all();
        $genres = Genre::all();
        return view('frontend.pricing', compact('packages','genres'));
    }

    // public function detail(){
    //     return view('backend.detail');
    // }

    public function moviedetail($id){
        $genres = Genre::all();
        $casts = Cast::all();
        $movies = Movie::where('id', $id)->get();
        $gallery = Movie::all();
        // dd($movies[0]);
        $gallerys = json_decode($movies[0]->gallery);
        // $covers = json_decode($movies[0]->gallery[1]);
        // dd($covers);
        return view('frontend.moviedetail', compact('genres', 'casts', 'movies', 'gallerys'));
    }

    public function castdetail($id){
        $genres = Genre::all();
        $casts = Cast::where('id', $id)->get();
        $movies = Movie::all();
        $gallerys = json_decode($casts[0]->gallery);
        return view('frontend.castdetail', compact('genres', 'casts', 'movies', 'gallerys'));
    }
}
