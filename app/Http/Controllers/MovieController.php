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

        //MULTI FILE UPLOAD
        $data = [];
        if($request->hasfile('images')) {
            
            foreach($request->file('images') as $image){

                $fileNames = time().'_'.$image->getClientOriginalName();

                $filePaths = $image->storeAs('movieimg', $fileNames, 'public');
                array_push($data, $filePaths);
            }
        }
        $photostring = json_encode($data);

        //DATA INSERT
        $movie = new Movie;
        $movie->name = $request->name;
        $movie->photo = $filePath;
        $genres = $request->genres;
        $casts = $request->casts;
        $movie->year = $request->year;
        $movie->language = $request->language;
        $movie->duration = $request->duration;
        $movie->overview = $request->overview;
        $movie->trailer = $request->trailer;
        $movie->gallery =  $photostring;
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
        $gallerys = json_decode($movie->gallery);
        return view('backend.movie.detail', compact('movie', 'gallerys'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        $casts = Cast::all();
        return view('backend.movie.edit', compact('genres', 'casts', 'movie')); 
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
        //DELETE OLD PHOTO
            unlink(public_path('storage/').$movie->photo);

        }else{
            $filePath = $movie->photo;
        }

        //MULTI FILE UPLOAD
        $oldphoto_arr = $request->oldPhoto;

        if($oldphoto_arr){
            if(in_array('', $oldphoto_arr)){
                $oldphoto_str = json_encode($oldphoto_arr);
            }
        }
        dd($oldphoto_arr);

        $data = [];
        if($request->hasfile('images')) {
            
            foreach($request->file('images') as $image){

                $fileNames = time().'_'.$image->getClientOriginalName();

                $filePaths = $image->storeAs('movieimg', $fileNames, 'public');
                array_push($data, $filePaths);
            }
        }

        if(count($data)>0){
            $newphoto_str = json_encode($data);
        }else{
            $newphoto_str = null;
        }

        if ($newphoto_str && $oldphoto_arr) 
        {
            $new_arr = json_decode($newphoto_str);
            $old_arr = $oldphoto_arr;

            $mergedArray = array_merge($new_arr,$old_arr);

            $photo = json_encode($mergedArray);
        }
        elseif($newphoto_str)
        {
            $photo = $newphoto_str;
        }
        else
        {
            $photo = $oldphoto_str;
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
        $movie->gallery =  $photo;
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
