<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasienController extends Controller
{
    public function daftar()
    {
        $found = 0;
        return view('user.daftar.pilihpuskes', compact('found'));
    }

    public function checkPasien(Request $req)
    {
        $check = DB::connection($req->puskesmas)->table('m_pasien')->where('nik', $req->nik)->first();
        $req->flash();

        if ($check == null) {
            //Form Input Pasien
            $found = 1;
            return view('user.daftar.pilihpuskes', compact('found'));
        } else {
            //Tampilkan Data Pasien dan Pilih Poli
            $found = 2;
            $data = $check;
            return view('user.daftar.pilihpuskes', compact('found', 'data'));
        }
    }
}
