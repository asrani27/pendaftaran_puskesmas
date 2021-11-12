<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRegisterRequest;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }
    
    public function register(StoreRegisterRequest $req)
    {
        $attr = $req->all();
        
        User::create($attr);

        $email = 'Ke '.$req->email;
        return view('verify_notice',compact('email'));
    }

    public function verify()
    {
        $email = null;
        return view('verify_notice',compact('email'));
    }
}
