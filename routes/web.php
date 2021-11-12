<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\RegisterController;

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
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('/verify', [RegisterController::class, 'verify'])->name('verification.notice');


Route::group(['middleware' => ['auth','verified']], function () {
    Route::get('/user/home', function(){
        return 'home';
    });
    Route::get('/masuk', function(){
        return 'ok';
    });
});