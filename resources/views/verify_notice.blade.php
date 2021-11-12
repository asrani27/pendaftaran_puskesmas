@extends('front.log')

@section('content')
<div class="row">		
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-body nopadding">
                <div class="row">						
                    <div class="col-lg-12">								
                        <form id="login_form" autocomplete="off" method="POST" action="/register">
                            @csrf		
                            <div class="login_logo">Verifikasi E-Mail</div>
                                <div class="form-group">
                                    <div class="input-group">
                                        Kami Telah Mengirim email {{$email}}, silahkan buka email anda dan verifikasi email anda.
                                    </div>
                                </div>

                                <div class="butn">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="/" class="btn btn-primary btn-block btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali Ke Beranda</a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="/lupa-password" class="btn btn-danger btn-block btn-sm"><i class="fas fa-key"></i> Lupa Password?</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="forgot">
                                </div>
                                
                                <div class="newhere">
                                    <strong><p>Sudah Punya Akun ? <a href="/login">Masuk Disini</a></p></strong>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection