<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\Payment;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;
use App\Genre;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function registerform(){
        $genres = Genre::all();
        $packages = Package::all();
        return view('auth.register', compact('genres', 'packages'));
    }

    public function register(Request $request){

        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            "planid"    => ['required']

        ])->validate();

        $now = Carbon::now();
        $today = $now->toDateString();

        $planid = $request->planid;
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        $user =User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);
        $user->assignRole('member');

        Payment::create([
            'date' => $today,
            'user_id' => $user->id,
            'package_id' => $planid
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);

        return redirect('/');


    }

    public function loginform(){
        $genres = Genre::all();
        return view('auth.login', compact('genres'));   
    }

    public function login(Request $request){
        Validator::make($request->all(), [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:8'],
        ])->validate();

        $email = $request->email;
        $password = Hash::make($request->password);

        $user= User::where('email', '=', $email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                // Success
                                
                $role = $user->getRoleNames();

                $credentials = $request->only('email', 'password');
                Auth::attempt($credentials);

                if ($role[0] == 'member') {
                    return redirect('/');                   
                }
                else{
                    return \Redirect::route('movie.index'); 
                }
            }
            else{
                return redirect()->back()
                ->with('message','Wrong Password');
            }

            
        }else{
            return redirect()->back()
            ->with('message','We did not recognize this account. Enter a different account.');


        }
        
    }

    public function logout(){
        \Auth::logout();

        return redirect()->route('login');
    }
}
