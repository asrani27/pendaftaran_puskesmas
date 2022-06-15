<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function user()
    {

        $data = Pendaftaran::where('user_id', Auth::user()->id)->paginate(10);

        $data->getCollection()->transform(function ($item) {
            $d =  DB::connection($item->puskesmas)->table('t_antrian')->where('pendaftaran_id', $item->id)->first();
            $s =  DB::connection($item->puskesmas)->table('t_antrian')->where('tanggal', $item->tgl_daftar)->where('kdPoli', $item->kdPoli)->where('status', '!=', 3)->where('pendaftaran_id', '<', $item->id)->count();

            $item->antrian = $d->nomor_antrian;
            $item->sisa_antrian = $s;
            $item->status = $d->status;
            return $item;
        });

        $sorted = $data->getCollection()->sortBy('created_at')->sortBy('status')->values();
        $data->setCollection($sorted);

        return view('user.home', compact('data'));
    }
}
