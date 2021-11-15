<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\StoreRegisterRequest;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }
    
    public function register(StoreRegisterRequest $req)
    {
        $role = Role::where('name','user')->first();
        $attr = $req->all();
        $attr['email_verified_at'] = null;
        
        $u = User::create($attr);
        $u->roles()->attach($role);

        Auth::login($u);
        return redirect('/user/home');
    }

    public function show()
    {
        //
    }

    public function handle()
    {
        event(new Registered($user));
    }

    public function verify()
    {
        $email = Auth::user()->email;
        return view('verify_notice',compact('email'));
    }
}
