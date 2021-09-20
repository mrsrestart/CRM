<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class mainController extends Controller
{
    public function index()
    {
        if(Auth::user()){
            return view('home');
        }
        return view('auth.login');
    }
    public function login()
    {
        return view('login');
    }

    public function createUser()
    {
        $password = Hash::make('123!@#aA');
        User::create([
            'name' => 'Moahammad Salmani',

            'email'=>'mohammadsalmanilgg4@gmail.com',
            'password' => $password,
        ]);
    }

    public function loginAuth(Request $request)
    {
//        $this->validate($request , [
//            'email' => 'required',
//            'password' => 'required|min:6',
//        ]);
        $arrayUser = ([
            'email' => $request->email,
            'password' => $request->password,
        ]);
        Auth::user();
        if(Auth::check()){
            return redirect('/home');
        }else{
            return redirect('/home11');
        }

    }
}
