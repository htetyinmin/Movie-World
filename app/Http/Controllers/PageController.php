<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Cast;
use App\Genre;
use App\Package;
use App\Moviedownload;
use App\User;
use App\Payment;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class PageController extends Controller
{
    public function index(){

        $now = Carbon::now();
        $currentyear = $now->year;
        $movies = Movie::all();
        $noti_movies = Movie::latest()->take(3)->get();
        $genres = Genre::all();
        $newmovies = Movie::latest()->take(3)->get();

        $newfreemovies = Movie::latest()->where('status', 'Free')->take(10)->get();
        $newpremiummovies = Movie::latest()->where('status', 'Premium')->take(10)->get();

        $currentyearmovies = Movie::latest()->where('year',$currentyear )->take(10)->get();

        $trendingmovies = Movie::all()->random(6);

        return view('frontend.index', compact('movies','noti_movies', 'genres', 'newmovies', 'newfreemovies', 'newpremiummovies', 'currentyearmovies', 'trendingmovies'));

    }

    public function movielist(){
        $movies = Movie::paginate(24);
        $genres = Genre::all();
        $lastmovies = Movie::latest()->take(10)->get();
        $noti_movies = Movie::latest()->take(3)->get();
        return view('frontend.movielist', compact('movies', 'genres', 'lastmovies', 'noti_movies') );
    }

    public function genrelist($id){
        $noti_movies = Movie::latest()->take(3)->get();
        $genres = Genre::all();
        $genre = Genre::where('id', $id)->get();
        return view('frontend.genrelist', compact('noti_movies', 'genres', 'genre') );
    }

    public function about(){
        $genres = Genre::all();
        $movies = Movie::all();
        $noti_movies = Movie::latest()->take(3)->get();
        return view('frontend.about', compact('genres', 'movies', 'noti_movies'));
    }

    public function contact(){
        $genres = Genre::all();
        $movies = Movie::all();
        $noti_movies = Movie::latest()->take(3)->get();
        return view('frontend.contact', compact('genres', 'movies', 'noti_movies'));
    }

    public function term(){
        $genres = Genre::all();
        $movies = Movie::all();
        $noti_movies = Movie::latest()->take(3)->get();
        return view('frontend.term', compact('genres', 'movies', 'noti_movies'));
    }

    public function help(){
        $genres = Genre::all();
        $movies = Movie::all();
        $noti_movies = Movie::latest()->take(3)->get();
        return view('frontend.help', compact('genres', 'movies', 'noti_movies'));
    }

    public function privacy(){
        $genres = Genre::all();
        $movies = Movie::all();
        $noti_movies = Movie::latest()->take(3)->get();
        return view('frontend.privacy', compact('genres', 'movies', 'noti_movies'));
    }

    public function userdetail($id){
        $users = User::where('id', $id)->get();
        $payments = Payment::where('user_id', $id)->get();
        $genres = Genre::all();
        $noti_movies = Movie::latest()->take(3)->get();
        return view('frontend.userdetail', compact('users', 'payments', 'genres', 'noti_movies'));
    }

    public function register(){
        $genres = Genre::all();
        $noti_movies = Movie::latest()->take(3)->get();
        return view('frontend.register', compact('genres', 'noti_movies'));
    }

    public function pricing(){
        $packages = Package::all();
        $genres = Genre::all();
        $noti_movies = Movie::latest()->take(3)->get();
        return view('frontend.pricing', compact('packages', 'genres', 'noti_movies'));
    }

    public function watchmovie($id){
        $genres = Genre::all();
        $movie = Movie::find($id);
        $noti_movies = Movie::latest()->take(3)->get();
        return view('frontend.watchmovie',compact('genres', 'movie', 'noti_movies'));
    }

    public function moviedetail($id){
        $genres = Genre::all();
        $casts = Cast::all();
        $movie = Movie::find($id);
        $noti_movies = Movie::latest()->take(3)->get();
        return view('frontend.moviedetail', compact('genres', 'casts', 'movie', 'noti_movies'));
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
            
        $movies = Movie::where('id', $id)->get();
        $noti_movies = Movie::latest()->take(3)->get();
        // $gallery = Movie::all();
        // dd($gallery);
        $gallerys = json_decode($movies[0]->gallery);
        // $cast_gallerys = json_decode($casts[0]->gallery);
        // dd($cast_gallerys);
        // $covers = json_decode($movies[0]->gallery[1]);
        // dd($covers);
        return view('frontend.moviedetail', compact('genres', 'casts', 'movies', 'noti_movies', 'gallerys', 'cast_gallerys'));
    }

    public function castdetail($id){
        $genres = Genre::all();
        $casts = Cast::where('id', $id)->get();
        $cast = Cast::find($id);
        $noti_movies = Movie::latest()->take(3)->get();
        $gallerys = json_decode($casts[0]->gallery);
        return view('frontend.castdetail', compact('genres', 'casts', 'cast', 'gallerys', 'noti_movies'));
    }

    public function dashboard(){
        return view('backend.dashboard.index');
    }

    public function user(){
        $noti_movies = Movie::latest()->take(3)->get();
        $genres = Genre::all();
        $users = User::paginate(5);
        return view('backend.user.index', compact('noti_movies', 'genres', 'users'));
    }

    public function search(Request $request){
        if($request->ajax()){
            $query = $request->searchdata;


            $data=DB::table('movies')->where('name','like','%'.$query.'%')
                    ->orWhere('overview','like','%'.$query.'%')
                    ->get();

            return response()->json($data);
        }
        $search = $_GET['search'];
        $genres = Genre::all();
        $noti_movies = Movie::latest()->take(3)->get();
        $movies = Movie::where('name', 'like', '%'.$search.'%')->get();
        return view('frontend.search', compact('genres', 'noti_movies', 'movies') );
    }

    public function reactivate(Request $request){
        $planid = $request->planid;
        $userID = Auth::id();
        $authuser = Auth::user();

        $now = Carbon::now();
        $today = $now->toDateString();

        $authuser_package = $authuser->payments->last()->package_id;
        $payment = $authuser->payments->last();

        $installmentdate = $payment->date;

        $status = 0;

        if ($authuser_package == 2) {
            $expiredate = Carbon::parse($installmentdate)->addMonths(1);
            $diff = $now->diffInDays(Carbon::parse($expiredate), false);

            if($diff <= 0 ){
                $status = 1; // Expired [ 1 Month ]
            }
        }

        if ($authuser_package ==3) {
            $expiredate = Carbon::parse($installmentdate)->addYear();
            $diff = $now->diffInDays(Carbon::parse($expiredate), false);

            if($diff <= 0 ){
                $status = 1; // Expired [ 1 Year ]
            }
        }

        // dd($status);  

        $oldpayment = Payment::find($payment->id);
        $oldpayment->status = $status;
        $oldpayment->save();      

        Payment::create([
            'date' => $today,
            'user_id' => $userID,
            'package_id' => $planid,
            'status'    =>  0
        ]);

        return \Redirect::route('index');

    }
}
