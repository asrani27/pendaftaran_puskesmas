@extends('front.log')

@section('content')
<div class="row">		
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-body nopadding">
                <div class="row">						
                    <div class="col-lg-12">								
                        <form id="login_form" autocomplete="off">		
                            <div class="login_logo">Daftar BaApik</div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user registration_form_icons"></i></span>	
                                        <input type="text" class="form-control input input-lg" placeholder="Nama Lengkap"  required/>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope registration_form_icons"></i></span>	
                                        <input type="email" class="form-control input input-lg" name="email" placeholder="Email Anda"  required autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock registration_form_icons"></i></span>	
                                        <input type="password" class="form-control input input-lg" name="password1" placeholder="Password Anda" autocomplete="off" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock registration_form_icons"></i></span>	
                                        <input type="password" class="form-control input input-lg" name="password2" placeholder="Konfirmasi Password" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="butn">
                                    <button class="btn btn-primary btn-block btn-lg"><i class="fas fa-save"></i> Daftar</button>
                                </div>
                                        
    
                                <div class="social-buttons">
                                    <div class="row">
                                        <h4><b> Masuk Menggunakan</b></h4>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a href="#" class="btn btn-default btn-lg btn_gmail">
                                                <i class="fas fa-envelope"></i> Gmail
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