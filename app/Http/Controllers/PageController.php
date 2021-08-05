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
        return view('frontend.index', compact('movies', 'genres'));
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

    // public function login(){
    //     return view('frontend.login');
    // }

    public function register(){
        return view('frontend.register');
    }

    public function pricing(){
        $packages = Package::all();
        return view('frontend.pricing', compact('packages'));
    }

    public function detail(){
        
        return view('backend.detail');
    }

    public function moviedetail($id){
        $genres = Genre::all();
        $casts = Cast::all();
        $movies = Movie::where('id', $id);
        return view('frontend.moviedetail', compact('genres', 'casts', 'movies'));
    }
}
