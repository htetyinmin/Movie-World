<?php

namespace App\Http\Controllers;

use App\Cast;
use App\Genre;
use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        return view('backend.movie.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        $casts = Cast::all();
        return view('backend.movie.create', compact('genres', 'casts'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        //VALIDATION
        $request->validate([
            "name" => "required|unique:casts|max:30|min:3",
            "photo" => "required|mimes:jpeg,jpg,png",
            "year" => "required",
            "duration" => "required",
            "overview" => "required",
            "trailer" => "required"
        ]);

        //FILE UPLOAD
        if($request->file()) {
            $fileName = time().'_'.$request->photo->getClientOriginalName();

            $filePath = $request->file('photo')->storeAs('movieimg', $fileName, 'public');
        }

        //DATA INSERT
        $movie = new Movie;
        $movie->name = $request->name;
        $movie->photo = $filePath;
        $genres = $request->genre;
        $casts = $request->cast;
        $movie->year = $request->year;
        $movie->language = $request->language;
        $movie->duration = $request->duration;
        $movie->overview = $request->overview;
        $movie->trailer = $request->trailer;
        // $movie->gallery = $filePath;
        // $movie->video = $filePath;
        $movie->status = $request->status;
        $movie->save();

        foreach ($genres as $genre) {
            $movie->genres()->attach($genre);
        }

        foreach ($casts as $cast) {
            $movie->casts()->attach($cast);
        }

        //REDIRECT
        return redirect()->route('movie.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return view('backend.movie.detail', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        return view('backend.movie.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //VALIDATION
        $request->validate([
            "name" => "required|max:30|min:3",
            "photo" => "sometimes|mimes:jpeg,jpg,png",
            "year" => "required",
            "duration" => "required",
            "overview" => "required",
            "trailer" => "required"
        ]);

        //FILE UPLOAD
        if($request->file()) {
            $fileName = time().'_'.$request->photo->getClientOriginalName();

            $filePath = $request->file('photo')->storeAs('movieimg', $fileName, 'public');
        }

        //DATA INSERT
        $movie->name = $request->name;
        $movie->photo = $filePath;
        $genres = $request->genre;
        $casts = $request->cast;
        $movie->year = $request->year;
        $movie->language = $request->language;
        $movie->duration = $request->duration;
        $movie->overview = $request->overview;
        $movie->trailer = $request->trailer;
        // $movie->gallery = $filePath;
        // $movie->video = $filePath;
        $movie->status = $request->status;
        $movie->save();

        $movie->genres()->detach();
        foreach ($genres as $genre) {
            $movie->genres()->attach($genre);
        }

        $movie->casts()->detach();
        foreach ($casts as $cast) {
            $movie->casts()->attach($cast);
        }

        //REDIRECT
        return redirect()->route('movie.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movie.index');
    }
}
