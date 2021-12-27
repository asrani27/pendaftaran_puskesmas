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
                                    <th>Pasien</th>
                                    <th>Puskesmas</th>
                                    <th>Poli</th>
                                    <th>No Antrian</th>
                                    <th>Status</th>
                                </tr>
                                <tr>
                                    <td>Zainudin</td>
                                    <td>Kayu Tangi</td>
                                    <td>Umum</td>
                                    <td>12</td>
                                    <td><span class="label label-danger">menunggu</span></td>
                                </tr>
                                <tr>
                                    <td>Wawan</td>
                                    <td>Terminal</td>
                                    <td>Anak</td>
                                    <td>12</td>
                                    <td><span class="label label-primary">selesai</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-outline-primary btn-round btn-sm">Refresh</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')

@endpush