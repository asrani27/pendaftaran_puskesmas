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
            $s =  DB::connection($item->puskesmas)->table('t_antrian')->where('kdPoli', $item->kdPoli)->where('pendaftaran_id', '<', $item->id)->count();
            dd($d, $s);
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
