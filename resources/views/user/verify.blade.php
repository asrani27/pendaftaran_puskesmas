@extends('layout.app')

@push('css')
    
@endpush

@section('content')
<div class="page-body breadcrumb-page">
    <div class="card borderless-card">
        <div class="card-block danger-breadcrumb">
            <div class="breadcrumb-header">
                <h5><i class="fas fa-envelope"></i> Email Belum Terverifikasi</h5>
                <span>Email Verifikasi telah di kirim ke <strong>{{Auth::user()->email}}</strong>, buka email anda, silahkan check di inbox atau pun di spam</span>
            </div>
            <br/>
            Anda Belum menerima email verifikasi? <br/>
            <form action="{{ route('verification.request') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary btn-sm btn-round btn-grd-primary">Request Email Verifikasi</button>
            </form>
        </div>
    </div>
    
</div>
@endsection

@push('js')
    
@endpush