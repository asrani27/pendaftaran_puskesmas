<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\EmailVerificationController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/login', function(){
//     if(Auth::check()){
//         return redirect('/');
//     }
//     return view('login');
// })->name('login');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/login_l', [LoginController::class, 'index_l']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('/verify', [RegisterController::class, 'verify']);


Route::group(['middleware' => ['auth','verified']], function () {
    Route::prefix('user')->group(function () {
        Route::get('home', [HomeController::class, 'user']);
        Route::get('pendaftaran', [PendaftaranController::class, 'index']);
    });
});

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('user')->group(function () {
        Route::get('verify', [EmailVerificationController::class, 'verify'])->name('verification.notice');
    });
});