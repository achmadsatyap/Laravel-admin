<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function halamanlogin(){
        return view('login.index');
    }
    public function postlogin(Request $request){
        if(Auth::attempt($request->only('name','password'))){
            return redirect()->route('posts.index');
        }    
        return redirect('/');
    }
    public function logout(){
        Auth::logout();
        return redirect ('/');
    }

}
