@extends('layout.app')

@push('css')
    
@endpush

@section('content')
<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-header-left">
                        <h5>Pendaftaran Pasien</h5>
                    </div>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <button class="btn btn-primary btn-outline-primary btn-lg btn-block"><i class="icofont icofont-user-alt-3"></i>PASIEN BPJS</button>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <!-- Block level buttons with icon -->
                            <div class="form-group">
                                <button class="btn btn-primary btn-outline-primary btn-lg btn-block"><i class="icofont icofont-user-alt-3"></i>PASIEN UMUM</button>
                            </div>
                        </div>
                    </div>
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
                            <tbody><tr>
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
                        </tbody></table>
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