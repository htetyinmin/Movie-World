<?php

namespace App\Http\Controllers;

use App\Cast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // $pagcasts = DB::table('casts')->paginate(5);
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
        if($request->hasfile('photo')) {
            $fileName = time().'_'.$request->photo->getClientOriginalName();

            $filePath = $request->file('photo')->storeAs('castimg', $fileName, 'public');
        }

        //MULTI FILE UPLOAD
        $data = [];
        if($request->hasfile('images')) {
            
            foreach($request->file('images') as $image){

                $fileNames = time().'_'.$image->getClientOriginalName();

                $filePaths = $image->storeAs('castimg', $fileNames, 'public');
                array_push($data, $filePaths);
            }
        }
        $photostring = json_encode($data);

        //DATA INSERT
        $cast = new Cast;
        $cast->name = $request->name;
        $cast->photo = $filePath;
        $cast->gender = $request->gender;
        $cast->dob = $request->dob;
        $cast->pob = $request->pob;
        $cast->bio = $request->bio;
        $cast->gallery = $photostring;
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
        $gallerys = json_decode($cast->gallery);
        // dd($gallerys);
        return view('backend.cast.detail', compact('cast', 'gallerys'));
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
        if($request->hasfile('photo')) {
            $fileName = time().'_'.$request->photo->getClientOriginalName();

            $filePath = $request->file('photo')->storeAs('castimg', $fileName, 'public');

            //DELETE OLD PHOTO
            unlink(public_path('storage/').$cast->photo);

        }else{
            $filePath = $cast->photo;
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

                $filePaths = $image->storeAs('castimg', $fileNames, 'public');
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
        $cast->name = $request->name;
        $cast->photo = $filePath;
        $cast->gender = $request->gender;
        $cast->dob = $request->dob;
        $cast->pob = $request->pob;
        $cast->bio = $request->bio;
        $cast->gallery = $photo;
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
        $cast->delete();
        return redirect()->route('cast.index');
    }

}
