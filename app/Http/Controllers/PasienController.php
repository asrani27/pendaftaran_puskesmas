<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\M_poli;
use GuzzleHttp\Client;
use App\Models\M_puskesmas;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller
{
    public function daftar()
    {
        $puskes = M_puskesmas::get();
        return view('user.daftar.pilihpuskes', compact('puskes'));
    }

    public function puskesmas($namapuskes)
    {
        $puskesmas = $namapuskes;
        $namaDB = M_puskesmas::where('kode', $namapuskes)->first();
        try {
            $check = DB::connection($namaDB->db)->table('users')->get();
            return view('user.daftar.pilihasuransi', compact('puskesmas'));
        } catch (\Exception $e) {
            toastr()->error('BELUM ONLINE');
            return back();
        }
    }

    public function bpjs($namapuskes)
    {
        $poli = M_poli::where('poliSakit', 1)->get();
        $data = null;
        $puskes = M_puskesmas::where('kode', $namapuskes)->first();
        return view('user.daftar.formbpjs', compact('poli', 'puskes', 'data'));
    }

    public function umum($namapuskes)
    {
        $poli = M_poli::where('poliSakit', 1)->get();
        $puskes = M_puskesmas::where('kode', $namapuskes)->first();
        return view('user.daftar.formumum', compact('poli', 'puskes'));
    }

    public function simpanPendaftaran(Request $req)
    {
        //dd($req->all());
        DB::beginTransaction();
        try {
            $namaDB = M_puskesmas::where('kode', $req->kode)->first();

            $p = new Pendaftaran;
            $p->puskesmas = $namaDB->db;
            $p->jenis = $req->jenis;
            $p->nik = $req->nik;
            $p->nama = $req->nama;
            $p->jkel = $req->jenis_kelamin;
            $p->tgl_lahir = $req->tanggal_lahir;
            $p->tgl_daftar = $req->tanggal;
            $p->user_id = Auth::user()->id;
            $p->kdPoli = M_poli::where('kdPoli', $req->kdPoli)->first()->kdPoli;
            $p->nmPoli = M_poli::where('kdPoli', $req->kdPoli)->first()->nmPoli;
            $p->save();


            $db = DB::connection($namaDB->db)->table('t_antrian')->where('tanggal', $req->tanggal)->where('kdPoli', $req->kdPoli)->get();
            if ($db->count() == 0) {
                $antrian = antrean(1);
                DB::connection($namaDB->db)->table('t_antrian')->insert([
                    'tanggal'       => $req->tanggal,
                    'nama'          => $req->nama,
                    'nik'           => $req->nik,
                    'jenis_kelamin' => $req->jenis_kelamin,
                    'tanggal_lahir' => $req->tanggal_lahir,
                    'jenis'         => 'UMUM',
                    'kdPoli'        => M_poli::where('kdPoli', $req->kdPoli)->first()->kdPoli,
                    'nmPoli'        => M_poli::where('kdPoli', $req->kdPoli)->first()->nmPoli,
                    'nomor_antrian' => $antrian,
                    'pendaftaran_id' => $p->id,
                ]);
            } else {

                $antrian = antrean((int)$db->last()->nomor_antrian + 1);
                DB::connection($namaDB->db)->table('t_antrian')->insert([
                    'tanggal'       => $req->tanggal,
                    'nama'          => $req->nama,
                    'nik'           => $req->nik,
                    'jenis_kelamin' => $req->jenis_kelamin,
                    'tanggal_lahir' => $req->tanggal_lahir,
                    'jenis'         => 'UMUM',
                    'kdPoli'        => M_poli::where('kdPoli', $req->kdPoli)->first()->kdPoli,
                    'nmPoli'        => M_poli::where('kdPoli', $req->kdPoli)->first()->nmPoli,
                    'nomor_antrian' => $antrian,
                    'pendaftaran_id' => $p->id,
                ]);
            }
            //dd($db, $req->all());
            DB::commit();
            toastr()->success('Pendaftaran Berhasil');
            return redirect('/user/home');
        } catch (\Exception $e) {

            DB::rollback();
            toastr()->error('Gagal Menyimpan');
            return back();
        }
    }

    public function simpanPendaftaranBpjs(Request $req)
    {
        if ($req->button == 'check') {
            //check ke pcare
            if ($req->noKartu == null) {
                toastr()->error('NO KARTU KOSONG');
                $req->flash();
                return back();
            }

            if (strlen($req->noKartu) != 13) {
                toastr()->error('JUMLAH NO BPJS HARUS 13');
                $req->flash();
                return back();
            }


            $namaDB = M_puskesmas::where('kode', $req->kode)->first();

            $user = DB::connection($namaDB->db)->table('users')->first();

            $cons_id = $user->cons_id;
            $secret_key = $user->secret_key;
            $username_pcare = $user->user_pcare;
            $password_pcare = $user->pass_pcare;
            $kdAplikasi = '095';

            date_default_timezone_set('UTC');
            $tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));
            $signature = hash_hmac('sha256', $cons_id . "&" . $tStamp, $secret_key, true);
            $encodedSignature = base64_encode($signature);
            $urlencodedSignature = urlencode($encodedSignature);

            $Authorization = base64_encode($username_pcare . ':' . $password_pcare . ':' . $kdAplikasi);

            $head['X-cons-id'] = $cons_id;
            $head['X-Timestamp'] = $tStamp;
            $head['X-Signature'] = $encodedSignature;
            $head['X-Authorization'] = 'Basic ' . $Authorization;

            try {

                $client = new Client([
                    'base_uri' => 'https://new-api.bpjs-kesehatan.go.id/pcare-rest-v3.0/',
                ]);

                $response = $client->request('GET', 'peserta/' . $req->noKartu, [
                    'headers' => $head,
                ]);

                $data = json_decode((string)$response->getBody())->response;

                if ($data == null) {
                    toastr()->error('NO BPJS TIDAK DITEMUKAN');
                    $req->flash();
                    return back();
                }

                $puskes = M_puskesmas::where('kode', $req->kode)->first();

                return view('user.daftar.formbpjs', compact('data', 'puskes'));
            } catch (\Exception $e) {
                toastr()->error('GAGAL CHECK DATA, BRIDGING SEDANG GANGGUAN');
                $req->flash();
                return back();
            }
        } else {
            //simpan
            try {
                $p = new Pendaftaran;
                $p->puskesmas = $req->puskesmas;
                $p->jenis = $req->jenis;
                $p->noKartu = $req->noKartu;
                $p->nama = $req->nama;
                $p->jkel = $req->jenis_kelamin;
                $p->tgl_lahir = $req->tanggal_lahir;
                $p->tgl_daftar = $req->tanggal;
                $p->user_id = Auth::user()->id;
                $p->kdPoli = M_poli::where('kdPoli', $req->kdPoli)->first()->kdPoli;
                $p->nmPoli = M_poli::where('kdPoli', $req->kdPoli)->first()->nmPoli;
                $p->save();

                $db = DB::connection($req->puskesmas)->table('t_antrian')->where('tanggal', $req->tanggal)->where('kdPoli', $req->kdPoli)->get();
                if ($db->count() == 0) {
                    $antrian = antrean(1);
                    DB::connection($req->puskesmas)->table('t_antrian')->insert([
                        'tanggal'       => $req->tanggal,
                        'nama'          => $req->nama,
                        'nik'           => $req->nik,
                        'jenis_kelamin' => $req->jenis_kelamin,
                        'tanggal_lahir' => $req->tanggal_lahir,
                        'jenis'         => 'UMUM',
                        'kdPoli'        => M_poli::where('kdPoli', $req->kdPoli)->first()->kdPoli,
                        'nmPoli'        => M_poli::where('kdPoli', $req->kdPoli)->first()->nmPoli,
                        'nomor_antrian' => $antrian,
                        'pendaftaran_id' => $p->id,
                    ]);
                } else {

                    $antrian = antrean((int)$db->last()->nomor_antrian + 1);
                    DB::connection($req->puskesmas)->table('t_antrian')->insert([
                        'tanggal'       => $req->tanggal,
                        'nama'          => $req->nama,
                        'nik'           => $req->nik,
                        'jenis_kelamin' => $req->jenis_kelamin,
                        'tanggal_lahir' => $req->tanggal_lahir,
                        'jenis'         => 'UMUM',
                        'kdPoli'        => M_poli::where('kdPoli', $req->kdPoli)->first()->kdPoli,
                        'nmPoli'        => M_poli::where('kdPoli', $req->kdPoli)->first()->nmPoli,
                        'nomor_antrian' => $antrian,
                        'pendaftaran_id' => $p->id,
                    ]);
                }
                //dd($db, $req->all());
                toastr()->success('Pendaftaran Berhasil');
                return redirect('/user/home');
            } catch (\Exception $e) {
                toastr()->error('Gagal Menyimpan');
                return back();
            }
        }
        dd($req->all());
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

                //dd($req->all(), $pasien, $pendaftaran_id, $nomor_antrean, $req->db);
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
