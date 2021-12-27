<!DOCTYPE html>
<html lang="en">

<head>
    <title>BaApik </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Gradient Able Bootstrap admin template made using Bootstrap 4. The starter version of Gradient Able is completely free for personal project." />
    <meta name="keywords"
        content="free dashboard template, free admin, free bootstrap template, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="codedthemes">
    <link rel="icon" href="/gradient/assets/images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/gradient/assets/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/gradient/assets/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="/gradient/assets/icon/icofont/css/icofont.css">
    <link rel="stylesheet" type="text/css" href="/gradient/assets/css/style.css">
    @toastr_css
</head>

<body class="fix-menu bg-primary">
    <section class="login p-fixed d-flex text-center bg-primary">
        <div class="container-fluid  bg-primary">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="signup-card card-block auth-body mr-auto ml-auto">
                        <form class="md-float-material" method="POST" action="/register">
                            @csrf
                            <div class="text-center">
                                <img src="/gradient/assets/images/logo.png" alt="logo.png">
                            </div>
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">Register Baapik</h3>
                                    </div>
                                </div>
                                <hr />
                                @error('name')
                                <span class="text-danger"><strong>{{$message}}</strong></span>
                                @enderror
                                <div class="input-group">
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}"
                                        placeholder="Nama Lengkap" autocomplete="off">
                                    <span class="md-line"></span>
                                </div>
                                @error('username')
                                <span class="text-danger"><strong>{{$message}}</strong></span>
                                @enderror
                                <div class="input-group">
                                    <input type="text" class="form-control" name="username" value="{{old('username')}}"
                                        placeholder="Username" autocomplete="off">
                                    <span class="md-line"></span>
                                </div>

                                @error('email')
                                <span class="text-danger"><strong>{{$message}}</strong></span>
                                @enderror
                                <div class="input-group">
                                    <input type="email" class="form-control" name="email" value="{{old('email')}}"
                                        placeholder="email" autocomplete="off">
                                    <span class="md-line"></span>
                                </div>

                                @error('password')
                                <span class="text-danger"><strong>{{$message}}</strong></span>
                                @enderror
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password"
                                        value="{{old('password')}}" placeholder="Password">
                                    <span class="md-line"></span>
                                </div>

                                @error('password_confirmation')
                                <span class="text-danger"><strong>{{$message}}</strong></span>
                                @enderror
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password_confirmation"
                                        placeholder="Konfirmasi Password">
                                    <span class="md-line"></span>
                                </div>

                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Register
                                        </button>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left m-b-0">Sudah Punya Akun? <a
                                                href="/login"><u><b>Login Disini</b></u></a>
                                        </p>
                                        <a href="/">
                                            <p class="text-inverse text-left"><b>Back To Home</b></p>
                                        </a>
                                    </div>
                                    <div class="col-md-2">
                                        <img src="/gradient/assets/images/auth/Logo-small-bottom.png"
                                            alt="small-logo.png">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
    <!-- Required Jquery -->
    <script type="text/javascript" src="/gradient/assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/gradient/assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/gradient/assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="/gradient/assets/js/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="/gradient/assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="/gradient/assets/js/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="/gradient/assets/js/modernizr/css-scrollbars.js"></script>
    <script type="text/javascript" src="/gradient/assets/js/common-pages.js"></script>


    @toastr_js
    @toastr_render
</body>

</html>

{{-- @extends('front.log')

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
                                    <span class="input-group-addon"><i
                                            class="glyphicon glyphicon-user registration_form_icons"></i></span>
                                    <input type="text" class="form-control input input-lg" name='name'
                                        value="{{old('name')}}" placeholder="Nama Lengkap" />
                                </div>
                                @error('name')
                                <span class="text-danger"><strong>{{$message}}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i
                                            class="glyphicon glyphicon-user registration_form_icons"></i></span>
                                    <input type="text" class="form-control input input-lg" name='username'
                                        value="{{old('username')}}" placeholder="Username" />
                                </div>
                                @error('username')
                                <span class="text-danger"><strong>{{$message}}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i
                                            class="glyphicon glyphicon-envelope registration_form_icons"></i></span>
                                    <input type="text" class="form-control input input-lg" name="email"
                                        value="{{old('email')}}" placeholder="Email Anda">

                                </div>
                                @error('email')
                                <span class="text-danger"><strong>{{$message}}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i
                                            class="glyphicon glyphicon-lock registration_form_icons"></i></span>
                                    <input type="password" class="form-control input input-lg" name="password"
                                        placeholder="Password Anda">
                                </div>
                                @error('password')
                                <span class="text-danger"><strong>{{$message}}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i
                                            class="glyphicon glyphicon-lock registration_form_icons"></i></span>
                                    <input type="password" class="form-control input input-lg"
                                        name="password_confirmation" placeholder="Konfirmasi Password">
                                </div>
                                @error('password_confirmation')
                                <span class="text-danger"><strong>{{$message}}</strong></span>
                                @enderror
                            </div>

                            <div class="butn">
                                <button type="submit" class="btn btn-primary btn-block btn-lg"><i
                                        class="fas fa-save"></i> Daftar</button>
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
                                        <a href="/" class="btn btn-primary btn-block btn-sm"><i
                                                class="fas fa-arrow-circle-left"></i> Kembali Ke Beranda</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="/lupa-password" class="btn btn-danger btn-block btn-sm"><i
                                                class="fas fa-key"></i> Lupa Password?</a>
                                    </div>
                                </div>
                            </div>

                            <div class="forgot">
                            </div>

                            <div class="newhere">
                                <strong>
                                    <p>Sudah Punya Akun ? <a href="/login">Masuk Disini</a></p>
                                </strong>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}