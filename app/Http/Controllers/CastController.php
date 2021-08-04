<?php

namespace App\Http\Controllers;

use App\Cast;
use Illuminate\Http\Request;

class CastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $casts = Cast::all();
        return view('backend.cast.index', compact('casts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.cast.create');
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
            "dob" => "required",
            "pob" => "required",
            "bio" => "required"
        ]);

        //FILE UPLOAD
        if($request->file()) {
            $fileName = time().'_'.$request->photo->getClientOriginalName();

            $filePath = $request->file('photo')->storeAs('castimg', $fileName, 'public');
        }

        //DATA INSERT
        $cast = new Cast;
        $cast->name = $request->name;
        $cast->photo = $filePath;
        $cast->gender = $request->gender;
        $cast->dob = $request->dob;
        $cast->pob = $request->pob;
        $cast->bio = $request->bio;
        $cast->gallery = $filePath;
        $cast->status = $request->status;
        $cast->save();

        //REDIRECT
        return redirect()->route('cast.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cast  $cast
     * @return \Illuminate\Http\Response
     */
    public function show(Cast $cast)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cast  $cast
     * @return \Illuminate\Http\Response
     */
    public function edit(Cast $cast)
    {
        return view('backend.cast.edit', compact('cast'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cast  $cast
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cast $cast)
    {
        // dd($request);

        //VALIDATION
        $request->validate([
            "name" => "required|max:30|min:3",
            "photo" => "sometimes|mimes:jpeg,jpg,png",
            "dob" => "required",
            "pob" => "required",
            "bio" => "required"
        ]);

        //FILE UPLOAD
        if($request->file()) {
            $fileName = time().'_'.$request->photo->getClientOriginalName();

            $filePath = $request->file('photo')->storeAs('castimg', $fileName, 'public');

            //DELETE OLD PHOTO
            unlink(public_path('storage/').$cast->photo);

        }else{
            $filePath = $cast->photo;
        }

        //DATA INSERT
        $cast->name = $request->name;
        $cast->photo = $filePath;
        $cast->gender = $request->gender;
        $cast->dob = $request->dob;
        $cast->pob = $request->pob;
        $cast->bio = $request->bio;
        $cast->gallery = $filePath;
        $cast->status = $request->status;
        $cast->save();

        //REDIRECT
        return redirect()->route('cast.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cast  $cast
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cast $cast)
    {
        //
    }
}
