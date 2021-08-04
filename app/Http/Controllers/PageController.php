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
}
