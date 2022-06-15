<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\EmailVerificationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/login_l', [LoginController::class, 'index_l']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('/verify', [RegisterController::class, 'verify']);

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::prefix('user')->group(function () {
        Route::get('home', [HomeController::class, 'user']);
        Route::get('pendaftaran', [PendaftaranController::class, 'index']);
        Route::get('daftarpasien', [PasienController::class, 'daftar']);
        Route::get('daftarpasien/puskesmas/{namapuskes}', [PasienController::class, 'puskesmas']);
        Route::get('daftarpasien/puskesmas/{namapuskes}/bpjs', [PasienController::class, 'bpjs']);
        Route::get('daftarpasien/puskesmas/{namapuskes}/umum', [PasienController::class, 'umum']);
        Route::get('daftarpasien/puskesmas/{namapuskes}/bpjs/check', [PasienController::class, 'checkKartu']);
        Route::post('simpan-daftar', [PasienController::class, 'simpanPendaftaran']);
        Route::post('simpan-bpjs', [PasienController::class, 'simpanPendaftaranBpjs']);
        Route::get('checkpasien', function () {
            return redirect('/user/daftarpasien');
        });
        Route::post('checkpasien', [PasienController::class, 'checkPasien']);
        Route::post('daftarpasien', [PasienController::class, 'simpanDaftar']);
    });
});

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('user')->group(function () {
        Route::get('verify', [EmailVerificationController::class, 'show'])->name('verification.notice');
        Route::post('/verify', [EmailVerificationController::class, 'request'])->name('verification.request');
    });
});

Route::get('/verify-email/{id}/{hash}', [EmailVerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

require __DIR__ . '/web-sso.php';
