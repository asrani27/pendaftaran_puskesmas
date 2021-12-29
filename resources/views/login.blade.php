<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gradient Able bootstrap admin template by codedthemes </title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Gradient Able Bootstrap admin template made using Bootstrap 4. The starter version of Gradient Able is completely free for personal project." />
    <meta name="keywords"
        content="free dashboard template, free admin, free bootstrap template, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="codedthemes">
    <!-- Favicon icon -->
    <link rel="icon" href="/gradient/assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="/gradient/assets/css/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="/gradient/assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="/gradient/assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="/gradient/assets/css/style.css">
    @toastr_css
</head>

<body class="fix-menu bg-primary">
    <!-- Pre-loader start -->
    {{-- <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div> --}}
    <!-- Pre-loader end -->
    <section class="login p-fixed d-flex text-center bg-primary">
        <!-- Container-fluid starts -->
        <div class="container-fluid  bg-primary">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="signup-card card-block auth-body mr-auto ml-auto">
                        <form class="md-float-material" method="POST" action="/login">
                            @csrf
                            <div class="text-center">
                                <img src="/gradient/assets/images/logo.png" alt="logo.png">
                            </div>
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">Login Baapik</h3>
                                    </div>
                                </div>
                                <hr />
                                <div class="input-group">
                                    <input type="text" class="form-control" name="username" value="{{old('username')}}"
                                        placeholder="Username">
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password"
                                        value="{{old('password')}}" placeholder="Password">
                                    <span class="md-line"></span>
                                </div>

                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Login
                                        </button>
                                        {{-- <a href="#"
                                            class="btn btn-danger btn-xs btn-block waves-effect text-center m-b-20"><i
                                                class="icofont icofont-social-google-plus"></i> Login
                                            Via Google
                                        </a> --}}
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left m-b-0">Belum punya akun? <a
                                                href="/register"><u><b>Register Disini</b></u></a>
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
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->
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


{{--
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
                                    <input type="text" name="username" class="form-control input input-lg"
                                        placeholder="Email / Username" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input type="password" name="password" class="form-control input input-lg"
                                        placeholder="Password Anda" required>
                                </div>
                            </div>

                            <div class="butn">
                                <button type="submit" class="btn btn-primary btn-block btn-lg"><i
                                        class="fas fa-sign-in-alt"></i> Masuk</button>
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
                                    <p>Belum Punya Akun ? <a href="/register">Daftar Disini</a></p>
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