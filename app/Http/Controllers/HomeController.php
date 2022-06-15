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
            dd($d);
            $item->antrian = $d->nomor_antrian;
            $item->status = $d->status;
            return $item;
        });


        return view('user.home', compact('data'));
    }
}
