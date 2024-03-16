<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {

        return view('login');


    }

    public function loginpost(Request $request)
    {
        // $admin = 'admin';
        // $hash = Hash::make($admin);
        // echo($hash);
        $check = $request->only('email','password');

        if(Auth::attempt($check)){
            return redirect('dashboard');
        }

        return redirect()->route('login')->with('error','Sorry you have to try again');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('login')->with('success','So you decided to Logout :) ');
    }
}
