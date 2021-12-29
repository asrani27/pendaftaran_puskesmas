@extends('layout.app')

@push('css')

@endpush

@section('content')
<div class="page-body">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <form method="post" action="/user/checkpasien">
                    @csrf
                    <div class="card-block text-center">
                        <i class="fa fa-hospital text-c-blue d-block f-40"></i>
                        <h4 class="m-t-20"> Pilih Puskemas Dan Masukkan NIK
                        </h4>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Puskesmas</label>
                            <div class="col-sm-10">
                                <select name="puskesmas" class="form-control" required>
                                    <option value="">-puskes-</option>
                                    <option value="banjarmasinindah" {{old('puskesmas')=='banjarmasinindah' ? 'selected'
                                        :''}}>Banjarmasin Indah</option>
                                    <option value="karangmekar" {{old('puskesmas')=='karangmekar' ? 'selected' :''}}>
                                        Karang Mekar</option>
                                    <option value="kayutangi" {{old('puskesmas')=='kayutangi' ? 'selected' :''}}>Kayu
                                        Tangi</option>
                                    <option value="seijingah" {{old('puskesmas')=='seijingah' ? 'selected' :''}}>Sei
                                        Jingah</option>
                                    <option value="seimesa" {{old('puskesmas')=='seimesa' ? 'selected' :''}}>Sei Mesa
                                    </option>
                                    <option value="terminal" {{old('puskesmas')=='terminal' ? 'selected' :''}}>Terminal
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nik" value="{{old('nik')}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary btn-block">Check</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @if ($found == 0)

        @elseif($found == 1)
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <form method="post" action="/user/daftarpasien">
                    @csrf
                    <div class="card-block text-center">
                        <i class="fa fa-user text-c-blue d-block f-40"></i>
                        <h4 class="m-t-20"> Daftar Pasien Baru
                        </h4>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nik" value="{{old('nik')}}" required>
                                <input type="hidden" class="form-control" name="db" value="{{$db}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" value="{{old('nama')}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option value="">-gender-</option>
                                    <option value="L" {{old('jenis_kelamin')=='L' ? 'selected' :''}}>
                                        Laki-Laki</option>
                                    <option value="P" {{old('jenis_kelamin')=='P' ? 'selected' :''}}>
                                        Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tanggal_lahir" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Pilih Poli</label>
                            <div class="col-sm-10">
                                <select name="poli" class="form-control" required>
                                    <option value="">-poli-</option>
                                    @foreach ($poli as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tanggal Daftar</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tanggal"
                                    min={{\Carbon\Carbon::today()->format('Y-m-d')}}
                                max={{\Carbon\Carbon::today()->addDays(1)->format('Y-m-d')}} required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @elseif($found == 2)
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <form method="post" action="/user/daftarpasien">
                    @csrf
                    <div class="card-block text-center">
                        <i class="fa fa-user text-c-blue d-block f-40"></i>
                        <h4 class="m-t-20"> Data Pasien Ditemukan
                        </h4>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nik" value="{{old('nik')}}" readonly>
                                <input type="hidden" class="form-control" name="db" value="{{$db}}" readonly>
                                <input type="hidden" class="form-control" name="daftarpoli" value="1" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" value="{{$data->nama}}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select name="jenis_kelamin" class="form-control" readonly>
                                    <option value="">-gender-</option>
                                    <option value="L" {{$data->jenis_kelamin =='L' ? 'selected' :''}}>
                                        Laki-Laki</option>
                                    <option value="P" {{$data->jenis_kelamin =='P' ? 'selected' :''}}>
                                        Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tanggal_lahir"
                                    value="{{$data->tanggal_lahir}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Pilih Poli</label>
                            <div class="col-sm-10">
                                <select name="poli" class="form-control" required>
                                    <option value="">-poli-</option>
                                    @foreach ($poli as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tanggal Daftar</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tanggal"
                                    min={{\Carbon\Carbon::today()->format('Y-m-d')}}
                                max={{\Carbon\Carbon::today()->addDays(1)->format('Y-m-d')}} required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@push('js')

@endpush