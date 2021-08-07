<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
    	return view('login');
    }

    public function wpadmin(){
        return view('admin.wp-admin');
    }

    public function do_login(Request $request){
    	if (Auth::attempt($request->only('email','password'))) {
    		return redirect('/')->with('login','');
    	}else{
    		return redirect('/login')->with('fail','');
    	}
    }

    public function postadmin(Request $request){
        if (Auth::attempt($request->only('email','password'))) {
            return redirect('/dashboard')->with('login','');
        }else{
            return redirect('/wp-admin')->with('fail','');
        }
    }

    public function logout(){
    	Auth::logout();
    	return redirect('/');
    }

    public function logoutadmin(){
        Auth::logout();
        return redirect('/wp-admin');
    }
}
