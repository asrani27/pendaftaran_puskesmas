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

            $d =  DB::connection($item->puskesmas)->table('t_pelayanan')->where('pendaftaran_id', $item->pendaftaran_id)->first();

            $item->antrean = $d->antrean;
            $item->tanggal = $d->tanggal;
            $item->status  = DB::connection($item->puskesmas)->table('t_pendaftaran')->find($item->pendaftaran_id)->status_periksa;
            return $item;
        });
        //dd($data);
        return view('user.home', compact('data'));
    }
}
