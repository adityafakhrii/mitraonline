<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">
		<title>Login - Admin</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{asset('admin/vendor/bootstrap/css/bootstrap.css')}}" />
		<link rel="stylesheet" href="{{asset('admin/vendor/animate/animate.compat.css')}}">

		<link rel="stylesheet" href="{{asset('admin/vendor/font-awesome/css/all.min.css')}}" />
		<link rel="stylesheet" href="{{asset('admin/vendor/boxicons/css/boxicons.min.css')}}" />
		<link rel="stylesheet" href="{{asset('admin/vendor/magnific-popup/magnific-popup.css')}}" />
		<link rel="stylesheet" href="{{asset('admin/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}" />

		<link rel="stylesheet" href="{{asset('admin/vendor/simple-line-icons/css/simple-line-icons.css')}}">
		<!--(remove-empty-lines-end)-->

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{asset('admin/css/theme.css')}}" />


		<!--(remove-empty-lines-end)-->



		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">

		<!-- Head Libs -->
		<script src="{{asset('admin/vendor/modernizr/modernizr.js')}}"></script>
		<script src="{{asset('admin/master/style-switcher/style.switcher.localstorage.js')}}"></script>

	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="/" class="logo float-left">
					<img src="{{asset('admin/img/logo.png')}}" height="54" alt="Porto Admin" />
				</a>

				<div class="panel card-sign">
					<div class="card-title-sign mt-3 text-right">
						<h2 class="title text-uppercase font-weight-bold m-0"><i class="bx bx-user-circle mr-1 text-6 position-relative top-5"></i> Login</h2>
					</div>
					<div class="card-body">
						<form action="/postadmin" method="post">
							@csrf
							<div class="form-group mb-3">
								<label>Email</label>
								<div class="input-group">
									<input name="email" type="email" class="form-control form-control-lg" />
									<span class="input-group-append">
										<span class="input-group-text">
											<i class="bx bx-user text-4"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="form-group mb-3">
								<div class="clearfix">
									<label class="float-left">Password</label>
								</div>
								<div class="input-group">
									<input name="password" type="password" class="form-control form-control-lg" />
									<span class="input-group-append">
										<span class="input-group-text">
											<i class="bx bx-lock text-4"></i>
										</span>
									</span>
								</div>
							</div>


							<div class="mb-1 text-center">
								<button type="submit" class="btn btn-info mb-3 ml-1 mr-1" ><i class="icons icon-login"></i> Login</button>
							</div>

							<hr>
							@if(Session::has('fail'))
		                    <div class="col-12 col-lg-12 mb-30 mt-30">
		                        <div class="alert alert-danger">
		                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                            <strong>Login gagal!</strong> periksa kembali email atau password anda
		                        </div>
		                    </div>
		                    @endif

						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-3 mb-3">&copy; Copyright 2021. All Rights Reserved.</p>
			</div>
		</section>
		<!-- end: page -->

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


		<!--(remove-empty-lines-end)-->
		
		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>
		<!-- Analytics to Track Preview Website -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		  ga('create', 'UA-42715764-8', 'auto');
		  ga('send', 'pageview');
		</script>
	</body>
</html>