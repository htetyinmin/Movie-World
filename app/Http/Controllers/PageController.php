<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function genre(){
        return view('backend.genres.index');
    }

    public function create(){
        return view('backend.genres.create');
    }

    public function edit(){
        return view('backend.genres.edit');
    }
}
