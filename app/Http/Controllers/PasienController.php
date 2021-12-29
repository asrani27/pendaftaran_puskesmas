<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $poli  = DB::connection($req->puskesmas)->table('m_ruangan')->where('is_aktif', 'Y')->get();
        $req->flash();
        $db = $req->puskesmas;
        if ($check == null) {
            //Form Input Pasien
            $found = 1;
            toastr()->info('Data Tidak Ditemukan, Silahkan Daftar Baru');
            return view('user.daftar.pilihpuskes', compact('found', 'db', 'poli'));
        } else {
            //Tampilkan Data Pasien dan Pilih Poli
            $found = 2;
            $data = $check;
            toastr()->success('Data Ditemukan, Silahkan Pilih POLI');
            return view('user.daftar.pilihpuskes', compact('found', 'data', 'db', 'poli'));
        }
    }

    public function simpanDaftar(Request $req)
    {
        DB::connection($req->db)->beginTransaction();
        try {
            if ($req->daftarpoli == null) {
                if (DB::connection($req->db)->table('m_pasien')->where('nik', $req->nik)->first() != null) {
                    toastr()->error('NIK Sudah Ada');
                    return redirect('/user/daftarpasien');
                }

                $check = DB::connection($req->db)->table('m_pasien')->count();
                if ($check == 0) {
                    $id_pasien = '0000000000000001';
                } else {
                    $id_pasien = convertid(DB::connection($req->db)->table('m_pasien')->orderBy('id', 'DESC')->first()->id + 1);
                }

                //Mendaftarkan pasien Baru
                DB::connection($req->db)->table('m_pasien')->insert([
                    'id'            => $id_pasien,
                    'nama'          => $req->nama,
                    'nik'           => $req->nik,
                    'jenis_kelamin' => $req->jenis_kelamin,
                    'tanggal_lahir' => $req->tanggal_lahir,
                ]);

                $pasien = DB::connection($req->db)->table('m_pasien')->where('nik', $req->nik)->first();

                //Mendaftarkan pasien Ke Poli
                $pendaftaran_id = DB::connection($req->db)->table('t_pendaftaran')->insertGetId([
                    'tanggal'               => $req->tanggal . ' 00:00:00',
                    'pasien_id'             => $pasien->id,
                    'umur_tahun'            => Tahun($pasien->tanggal_lahir),
                    'umur_bulan'            => Bulan($pasien->tanggal_lahir),
                    'umur_hari'             => Hari($pasien->tanggal_lahir),
                    'kunjungan'             => 'BARU',
                    'status'                => 'SAKIT',
                    'asuransi_id'           => '0000'
                ]);

                //Membuat nomor antrean
                $antrean = DB::connection($req->db)->table('t_pelayanan')->whereDate('tanggal', $req->tanggal)->where('ruangan_id', $req->poli)->latest()->first();
                if ($antrean == null) {
                    $nomor_antrean = 1;
                } else {
                    $query = "CAST(antrean AS DECIMAL(10,0)) DESC";
                    //orderByRaw($query)->
                    $nomor_antrean = (int) DB::connection($req->db)->table('t_pelayanan')->whereDate('tanggal', $req->tanggal)->where('ruangan_id', $req->poli)->latest()->first()->antrean + 1;
                }

                //Mendaftarkan pasien Ke Pelayanan
                DB::connection($req->db)->table('t_pelayanan')->insert([
                    'tanggal'           => $req->tanggal . ' 00:00:00',
                    'pendaftaran_id'    => $pendaftaran_id,
                    'antrean'           => antrean($nomor_antrean),
                    'is_promotifpreventif' => 0,
                    'ruangan_id'        => $req->poli,
                    'instalasi_id'      => DB::connection($req->db)->table('m_ruangan')->find($req->poli)->instalasi_id
                ]);

                //simpan ke DB Lokal
                $s = new Pendaftaran;
                $s->puskesmas = $req->db;
                $s->pendaftaran_id = $pendaftaran_id;
                $s->nama = $pasien->nama;
                $s->user_id = Auth::user()->id;
                $s->poli = DB::connection($req->db)->table('m_ruangan')->find($req->poli)->nama;
                $s->save();

                toastr()->success('Berhasil Disimpan');
                return redirect('/user/home');
            } else {
                //Pasien Sudah Ada, Hanya Mendaftarkan Ke Poli
                $pasien = DB::connection($req->db)->table('m_pasien')->where('nik', $req->nik)->first();

                //Mendaftarkan pasien Ke Poli
                $pendaftaran_id = DB::connection($req->db)->table('t_pendaftaran')->insertGetId([
                    'tanggal'               => $req->tanggal . ' ' . Carbon::now()->format('H:i:s'),
                    'pasien_id'             => $pasien->id,
                    'umur_tahun'            => Tahun($pasien->tanggal_lahir),
                    'umur_bulan'            => Bulan($pasien->tanggal_lahir),
                    'umur_hari'             => Hari($pasien->tanggal_lahir),
                    'kunjungan'             => 'BARU',
                    'status'                => 'SAKIT',
                    'asuransi_id'           => '0000'
                ]);

                //Membuat nomor antrean
                // dd(DB::connection($req->db)->table('t_pelayanan')->whereDate('tanggal', $req->tanggal)->where('ruangan_id', $req->poli)->latest()->first());
                $antrean = DB::connection($req->db)->table('t_pelayanan')->whereDate('tanggal', $req->tanggal)->where('ruangan_id', $req->poli)->latest()->first();
                if ($antrean == null) {
                    $nomor_antrean = 1;
                } else {
                    $query = "CAST(antrean AS DECIMAL(10,0)) DESC";
                    //orderByRaw($query)->
                    $nomor_antrean = (int) DB::connection($req->db)->table('t_pelayanan')->whereDate('tanggal', $req->tanggal)->where('ruangan_id', $req->poli)->latest()->first()->antrean + 1;
                }
                //dd(antrean($nomor_antrean));
                //dd($antrean, $req->all(), $req->tanggal, DB::connection($req->db)->table('t_pelayanan')->whereDate('tanggal', $req->tanggal)->latest()->first());
                //Mendaftarkan pasien Ke Pelayanan
                DB::connection($req->db)->table('t_pelayanan')->insert([
                    'tanggal'           => $req->tanggal . ' ' . Carbon::now()->format('H:i:s'),
                    'pendaftaran_id'    => $pendaftaran_id,
                    'antrean'           => antrean($nomor_antrean),
                    'is_promotifpreventif' => 0,
                    'ruangan_id'        => $req->poli,
                    'instalasi_id'      => DB::connection($req->db)->table('m_ruangan')->find($req->poli)->instalasi_id
                ]);

                //simpan ke DB Lokal
                $s = new Pendaftaran;
                $s->puskesmas = $req->db;
                $s->pendaftaran_id = $pendaftaran_id;
                $s->nama = $pasien->nama;
                $s->user_id = Auth::user()->id;
                $s->poli = DB::connection($req->db)->table('m_ruangan')->find($req->poli)->nama;
                $s->save();
            }
            DB::connection($req->db)->commit();
            toastr()->success('Berhasil Disimpan');
            return redirect('/user/home');
        } catch (\Exception $e) {
            DB::connection($req->db)->rollback();
            toastr()->error('error');
            return redirect('/user/daftarpasien');
        }
    }
}
