<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends Controller
{
    public function show()
    {
        if (Auth::user()->email_verified_at == null) {
            return view('user.verify');
        } else {
            return redirect('/user/home');
        }
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
