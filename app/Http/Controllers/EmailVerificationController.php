<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends Controller
{
    public function show()
    {
        return view('user.verify');
    }

    public function request()
    {
        auth()->user()->sendEmailVerificationNotification();

        toastr()->success('Email Verifikasi berhasil di kirim');
        return back();
    }

    public function verify(EmailVerificationRequest $request, $id, $hash)
    {
        $request->fulfill();
        
        return redirect()->to('/user/home');
    }
}
