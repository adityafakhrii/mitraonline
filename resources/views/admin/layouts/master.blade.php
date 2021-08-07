<!doctype html>
<html class="modern fixed has-top-menu has-left-sidebar-half" data-style-switcher-options="{'changeLogo': false}">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>UMKM | Online Shop</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,300,400,600,700,800,900" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{asset('admin/vendor/bootstrap/css/bootstrap.css')}}" />
		<link rel="stylesheet" href="{{asset('admin/vendor/animate/animate.compat.css')}}">

		<link rel="stylesheet" href="{{asset('admin/vendor/font-awesome/css/all.min.css')}}" />
		<link rel="stylesheet" href="{{asset('admin/vendor/boxicons/css/boxicons.min.css')}}" />
		<link rel="stylesheet" href="{{asset('admin/vendor/magnific-popup/magnific-popup.css')}}" />
		<link rel="stylesheet" href="{{asset('admin/vendor/bootstrap-datepicker/css')}}/bootstrap-datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="{{asset('admin/vendor/select2/css/select2.css')}}" />
		<link rel="stylesheet" href="{{asset('admin/vendor/select2-bootstrap-theme')}}/select2-bootstrap.min.css" />
		<link rel="stylesheet" href="{{asset('admin/vendor/dropzone/basic.css')}}" />
		<link rel="stylesheet" href="{{asset('admin/vendor/dropzone/dropzone.css')}}" />
		<link rel="stylesheet" href="{{asset('admin/vendor/bootstrap-markdown/css')}}/bootstrap-markdown.min.css" />
		<link rel="stylesheet" href="{{asset('admin/vendor/pnotify/pnotify.custom.css')}}" />

		<!--(remove-empty-lines-end)-->

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{asset('admin/css/theme.css')}}" />


		<!-- Theme Layout -->
		<link rel="stylesheet" href="{{asset('admin/css/layouts/modern.css')}}" />
		<!--(remove-empty-lines-end)-->



		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{asset('admin/css/custom.css>')}}">

		<!-- Head Libs -->
		<script src="{{asset('admin/vendor/modernizr/modernizr.js')}}"></script>
		<script src="{{asset('admin/master/style-switcher/style.switcher.localstorage.js')}}"></script>

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header header-nav-menu header-nav-links">
				<div class="logo-container">
					<a href="../" class="logo">
					<img src="{{asset('admin/img/logo-modern.png')}}" class="logo-image" width="90" height="24" alt="Porto Admin" /><img src="{{asset('admin/img/logo-default.png')}}" class="logo-image-mobile" width="90" height="41" alt="Porto Admin" />
					</a>
					<button class="btn header-btn-collapse-nav d-lg-none" data-toggle="collapse" data-target=".header-nav">
						<i class="fas fa-bars"></i>
					</button>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<span class="profile-picture profile-picture-as-text">{{ substr(auth()->user()->nama,0,1) }}{{ substr(auth()->user()->nama,6,1) }}</span>
							<div class="profile-info profile-info-no-role" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
								<span class="name">Hi, <strong class="font-weight-semibold">{{ auth()->user()->nama}}</strong></span>
							</div>
							
							<i class="fas fa-chevron-down text-color-dark"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li>
									<a role="menuitem" tabindex="-1" href="/logoutadmin"><i class="bx bx-log-out"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
					<span class="separator"></span>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
				    <div class="sidebar-header">
				        <div class="sidebar-toggle d-none d-md-flex" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
				            <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
				        </div>
				    </div>
				
				    <div class="nano">
				        <div class="nano-content">
				            <nav id="menu" class="nav-main" role="navigation">
				            
				                <ul class="nav nav-main">
				                    <li>
				                        <a class="nav-link" href="/dashboard">
				                            <i class="bx bx-home-alt" aria-hidden="true"></i>
				                            <span>Dashboard</span>
				                        </a>                        
				                    </li>
				                    <li class="nav-group-label">Pengelolaan Produk</li>
				                    <li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="bx bx-cart-alt" aria-hidden="true"></i>
				                            <span>Produk</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a class="nav-link" href="/produk">
				                                    List Produk
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="/produk/tambah-produk">
				                                    Tambah Produk
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
				                    <li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="bx bx-layout" aria-hidden="true"></i>
				                            <span>Pesanan</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a class="nav-link" href="/data-pesanan">
				                                    Semua Data Pesanan
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="/data-pesanan/belum-dibayar">
				                                    Belum Dibayar
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="/data-pesanan/menunggu-konfirmasi">
				                                    Menunggu Konfirmasi
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="/data-pesanan/sedang-dikirim">
				                                    Sedang Dikirim
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="/data-pesanan/dibatalkan">
				                                    Dibatalkan
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="/data-pesanan/selesai">
				                                    Pesanan Selesai
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
				                </ul>
				            </nav>
				
				            <hr class="separator" />
				        </div>
				
				        <script>
				            // Maintain Scroll Position
				            if (typeof localStorage !== 'undefined') {
				                if (localStorage.getItem('sidebar-left-position') !== null) {
				                    var initialPosition = localStorage.getItem('sidebar-left-position'),
				                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');
				                    
				                    sidebarLeft.scrollTop = initialPosition;
				                }
				            }
				        </script>
				        
				
				    </div>
				
				</aside>
				<!-- end: sidebar -->
				
				@yield('content')
			</div>
		</section>

		<!-- Vendor -->
		<script src="{{asset('admin/vendor/jquery/jquery.js')}}"></script>
		<script src="{{asset('admin/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
		<script src="{{asset('admin/vendor/jquery-cookie/jquery.cookie.js')}}"></script>
		<script src="{{asset('admin/master/style-switcher/style.switcher.js')}}"></script>
		<script src="{{asset('admin/vendor/popper/umd/popper.min.js')}}"></script>
		<script src="{{asset('admin/vendor/bootstrap/js/bootstrap.js')}}"></script>
		<script src="{{asset('admin/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
		<script src="{{asset('admin/vendor/common/common.js')}}"></script>
		<script src="{{asset('admin/vendor/nanoscroller/nanoscroller.js')}}"></script>
		<script src="{{asset('admin/vendor/magnific-popup/jquery.magnific-popup.js')}}"></script>
		<script src="{{asset('admin/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>
		
		<!-- Specific Page Vendor -->
		{{-- <script src="{{asset('admin/vendor/jquery-validation/jquery.validate.js')}}"></script> --}}
		<script src="{{asset('admin/vendor/select2/js/select2.js')}}"></script>
		<script src="{{asset('admin/vendor/dropzone/dropzone.js')}}"></script>
		<script src="{{asset('admin/vendor/pnotify/pnotify.custom.js')}}"></script>


		<!--(remove-empty-lines-end)-->
		
		<!-- Theme Base, Components and Settings -->
		<script src="{{asset('admin/js/theme.js')}}"></script>
		
		<!-- Theme Custom -->
		<script src="{{asset('admin/js/custom.js')}}"></script>
		
		<!-- Theme Initialization Files -->
		<script src="{{asset('admin/js/theme.init.js')}}"></script>
		<!-- Analytics to Track Preview Website -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		  ga('create', 'UA-42715764-8', 'auto');
		  ga('send', 'pageview');
		</script>
		<!-- Examples -->
		<script src="{{asset('admin/js/examples/examples.header.menu.j')}}s"></script>
		<script src="{{asset('admin/js/examples/examples.ecommerce.form.js')}}"></script>

	</body>
</html>