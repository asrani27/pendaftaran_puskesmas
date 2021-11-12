<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return redirect('/user/home');
        }
        return view('login');
    }
    
    public function login()
    {
        $login = request()->input('username');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        
        if (Auth::attempt([$field => $login, 'password' => request()->password], true)) {

            dd(Auth::user()->hasVerifiedEmail());
            return redirect('/user/home');
        } else {
            toastr()->error('Username / Password Tidak Ditemukan');
            return back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
