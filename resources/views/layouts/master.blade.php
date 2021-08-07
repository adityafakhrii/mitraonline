<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>UMKM | Home</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{asset('assets/img/core-img/icon.png')}}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/core-style.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    
    

</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="{{asset("assets/img/core-img/search.png")}}" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="/"><img src="{{asset("assets/img/core-img/logo.png")}}" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="/"><img src="{{asset("assets/img/core-img/logo.png")}}" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav mb-100">
                <ul>
                    @if(Auth::check())
                        <li><p>Hi, {{auth()->user()->nama}}!</li>
                    @endif

                    @yield('nav')
                </ul>
            </nav>
            
            
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->

        <!-- Product Catagories Area Start -->
        @yield('content')
        <!-- Product Catagories Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
    <section class="newsletter-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <!-- Newsletter Text -->
                <center>
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="newsletter-text mb-100">
                        <h2>UMKM <span>Online Shop</span></h2>
                        <p>Adalah sebuah aplikasi berbasis web yang dikembangkan untuk membantu para pelaku
                        UMKM dalam mengembangkan bisnisnya secara online.</p>
                    </div>
                </div>
                </center>
            </div>
        </div>
    </section>
    <!-- ##### Newsletter Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row align-items-center">
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-4">
                    <div class="single_widget_area">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="/"><img src="{{asset('assets/img/core-img/logo2.png')}}" alt=""></a>
                        </div>
                        <!-- Copywrite Text -->
                        <p class="copywrite"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <br> Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by Aditya Fakhri Riansyah
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-8">
                    <div class="single_widget_area">
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <nav class="navbar navbar-expand-lg justify-content-end">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                                <div class="collapse navbar-collapse" id="footerNavContent">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="/">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/keranjang">keranjang</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/pesanan">Pesanan</a>
                                        </li>
                                        @if (Route::has('login'))
                                            @auth
                                                <li class="nav-item"><a class="nav-link" href="/akun">Akun</a></li>
                                                <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
                                            @else
                                                <li class="nav-item"><a class="nav-link" href="/login"></i>Login</a></li>
                                                <li class="nav-item"><a class="nav-link" href="/daftar"></i>Daftar</a></li>
                                            @endauth
                                        @endif
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="{{asset("assets/js/jquery/jquery-2.2.4.min.js")}}"></script>
    <!-- Popper js -->
    <script src="{{asset("assets/js/popper.min.js")}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset("assets/js/bootstrap.min.js")}}"></script>
    <!-- Plugins js -->
    <script src="{{asset("assets/js/plugins.js")}}"></script>
    <!-- Active js -->
    <script src="{{asset("assets/js/active.js")}}"></script>

</body>

</html>