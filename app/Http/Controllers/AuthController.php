<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function view(){
        return view('auth.sign_in');
    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credantials = $request->except('_token');

        if(Auth::attempt($credantials)){
            return redirect()->route('admin.home');
        }else{
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }



    public function logout(){
        if(Auth::logout()){
            return redirect()->route('login');

        }else{
            return redirect()->back()->with('error', 'Failed to log out');
        }
    }
}
