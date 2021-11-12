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
                            <div class="login_logo">Daftar BaApik</div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user registration_form_icons"></i></span>	
                                        <input type="text" class="form-control input input-lg" name='name' value="{{old('name')}}" placeholder="Nama Lengkap"  />
                                    </div>
                                    @error('name')
                                    <span class="text-danger"><strong>{{$message}}</strong></span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user registration_form_icons"></i></span>	
                                        <input type="text" class="form-control input input-lg" name='username' value="{{old('username')}}" placeholder="Username" />
                                    </div>
                                    @error('username')
                                    <span class="text-danger"><strong>{{$message}}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope registration_form_icons"></i></span>	
                                        <input type="text" class="form-control input input-lg" name="email" value="{{old('email')}}" placeholder="Email Anda">
                                        
                                    </div>
                                    @error('email')
                                    <span class="text-danger"><strong>{{$message}}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock registration_form_icons"></i></span>	
                                        <input type="password" class="form-control input input-lg" name="password" placeholder="Password Anda">
                                    </div>
                                    @error('password')
                                    <span class="text-danger"><strong>{{$message}}</strong></span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock registration_form_icons"></i></span>	
                                        <input type="password" class="form-control input input-lg" name="password_confirmation" placeholder="Konfirmasi Password">
                                    </div>
                                    @error('password_confirmation')
                                    <span class="text-danger"><strong>{{$message}}</strong></span>
                                    @enderror
                                </div>

                                <div class="butn">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fas fa-save"></i> Daftar</button>
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