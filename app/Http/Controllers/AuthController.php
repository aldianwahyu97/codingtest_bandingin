<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function Login(){
        return view('login');
    }
    public function LoginAct(Request $request)
    {
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/index');
        }
        else{
            return redirect('/');
        }
    }
    public function LogoutAct()
    {
        Auth::logout();
        return redirect('/');
    }
}
