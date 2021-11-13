@extends('layout.app')

@push('css')
    
@endpush

@section('content')
<div class="page-body breadcrumb-page">
    <div class="card borderless-card">
        <div class="card-block danger-breadcrumb">
            <div class="breadcrumb-header">
                <h5><i class="fas fa-envelope"></i> Email Belum Terverifikasi</h5>
                <span>Anda tidak bisa menikmati fitur yang ada di Aplikasi BaApik, Silahkan verifikasi email anda terlebih dahulu, dengan membuka email anda, check di inbox atau pun spam</span>
            </div>
            <br/>
            Anda Belum menerima email verifikasi? <br/>
            <button class="btn btn-primary btn-sm btn-round btn-grd-primary">Kirim Email Verifikasi</button>
        </div>
    </div>
    
</div>
@endsection

@push('js')
    
@endpush