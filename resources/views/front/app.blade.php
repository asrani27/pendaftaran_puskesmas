<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Bootstrap, Landing page, Template, Business, Service">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="Grayrids">
    <title>PENDAFTARAN ONLINE BAAPIK</title>
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="/baapik/img/Baapik2.png" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/baapik/css/bootstrap.min.css">
    <link rel="stylesheet" href="/baapik/css/animate.css">
    <link rel="stylesheet" href="/baapik/css/LineIcons.css">
    <link rel="stylesheet" href="/baapik/css/owl.carousel.css">
    <link rel="stylesheet" href="/baapik/css/owl.theme.css">
    <link rel="stylesheet" href="/baapik/css/magnific-popup.css">
    <link rel="stylesheet" href="/baapik/css/nivo-lightbox.css">
    <link rel="stylesheet" href="/baapik/css/main.css">    
    <link rel="stylesheet" href="/baapik/css/responsive.css">

  </head>
  
  <body>
    <header id="home" class="hero-area">    
        <div class="overlay">
          <span></span>
          <span></span>
        </div>
        <nav class="navbar navbar-expand-md bg-inverse fixed-top scrolling-navbar">
          <div class="container">
            <a href="/" class="navbar-brand"><img src="/baapik/img/Baapik2.png" alt=""></a>       
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <i class="lni-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
              <ul class="navbar-nav mr-auto w-100 justify-content-end">
                <li class="nav-item">
                  <img src="/baapik/img/Baapik2.png" width="180px"> &nbsp;
                </li>
      
                {{-- <li class="nav-item">
                  <img src="/baapik/img/apple.png" width="180px">
                </li> --}}
              </ul>
            </div>
          </div>
        </nav>  
        @yield('content')         
    </header>   
    <!-- Header Section Start -->
    
      @yield('content2')  
    <!-- Header Section End --> 
    
    <!-- Team section End -->

    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
      <i class="lni-chevron-up"></i>
    </a> 

    <!-- Preloader -->
    <div id="preloader">
      <div class="loader" id="loader-1"></div>
    </div>
    <!-- End Preloader -->

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="/baapik/js/jquery-min.js"></script>
    <script src="/baapik/js/popper.min.js"></script>
    <script src="/baapik/js/bootstrap.min.js"></script>
    <script src="/baapik/js/owl.carousel.js"></script>      
    <script src="/baapik/js/jquery.nav.js"></script>    
    <script src="/baapik/js/scrolling-nav.js"></script>    
    <script src="/baapik/js/jquery.easing.min.js"></script>     
    <script src="/baapik/js/nivo-lightbox.js"></script>     
    <script src="/baapik/js/jquery.magnific-popup.min.js"></script>      
    <script src="/baapik/js/main.js"></script>
    
  </body>
</html>