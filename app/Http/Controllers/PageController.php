<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('frontend.index');
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

    public function login(){
        return view('frontend.login');
    }

    public function register(){
        return view('frontend.register');
    }

    public function pricing(){
        return view('frontend.pricing');
    }

    public function detail(){
        return view('backend.detail');
    }

    public function moviedetail(){
        return view('frontend.moviedetail');
    }
}
