@extends('layout.app')

@push('css')

@endpush

@section('content')
<div class="page-body">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-block text-center">
                    <i class="fa fa-user text-c-blue d-block f-40"></i>
                    <h4 class="m-t-20"> Selamat Datang, {{Auth::user()->name}}
                    </h4>
                    <a href="/user/daftarpasien" class="btn btn-primary btn-md btn-round">DAFTAR PASIEN</a>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-header-left">
                        <h5>Daftar Pasien</h5>
                    </div>
                </div>
                <div class="card-block">
                    <!-- Nav tabs -->
                    <!-- Tab panes -->
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Pasien/Puskes/Poli</th>
                                    <th>No antrian/Tanggal</th>
                                    <th>Status</th>
                                    <th>Sisa Antrian</th>
                                </tr>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{$item->nama}} <br />{{$item->puskesmas}}<br />{{$item->nmPoli}}</td>
                                    <td>{{$item->antrian}}<br />{{\Carbon\Carbon::parse($item->tgl_daftar)->format('d M
                                        Y')}}</td>
                                    <td>
                                        @if ($item->status == 0)
                                        <span class="label label-primary">menunggu</span>
                                        @elseif ($item->status == 1)
                                        <span class="label label-danger">Anda Di Panggil</span>
                                        @elseif ($item->status == 2)
                                        <span class="label label-danger">Sedang Di Periksa</span>
                                        @elseif ($item->status == 3)
                                        <span class="label label-success">selesai</span>
                                        @elseif ($item->status == 4)
                                        <span class="label label-success">di lewati</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{$item->sisa_antrian}}<br />

                                        Perkiraan : {{$item->sisa_antrian * 3}} Menit
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{$data->links()}}
                    <div class="text-center">
                        <a href="/user/home" class="btn btn-outline-primary btn-round btn-sm">Refresh</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')

@endpush