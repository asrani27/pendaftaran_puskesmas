@extends('front.log')

@section('content')
<div class="row">		
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-body nopadding">
                <div class="row">						
                    <div class="col-lg-12">								
                        <form id="login_form" method="POST" action="/login">
                            @csrf		
                            <div class="login_logo">Masuk BaApik</div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>	
                                        <input type="text" name="username" class="form-control input input-lg" placeholder="Email / Username" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>	
                                        <input type="password" name="password" class="form-control input input-lg" placeholder="Password Anda" required>
                                    </div>
                                </div>
                                                                        
                                <div class="butn">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fas fa-sign-in-alt"></i> Masuk</button>
                                </div>
                                        
    
                                <div class="social-buttons">
                                    <div class="row">
                                        <h4><b> Masuk Menggunakan</b></h4>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a href="#">
                                                <img src="/baapik/img/login_google.png" width="200px">
                                            </a>
                                        </div>
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
                                    <strong><p>Belum Punya Akun ? <a href="/register">Daftar Disini</a></p></strong>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection