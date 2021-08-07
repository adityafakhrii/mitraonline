@extends('admin.layouts.master')
<title>Dashboard</title>

@section('content')
								<section role="main" class="content-body content-body-modern">
					<header class="page-header page-header-left-inline-breadcrumb">
						<h2 class="font-weight-bold text-6">Dashboard</h2>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-lg-12 col-xl-12">
					
							<div class="row">
								<div class="col-4">
									<div class="card card-modern">
										<div class="card-body p-0">
											<div class="widget-user-info">
												<div class="widget-user-info-header">
													<h2 class="font-weight-bold text-color-dark text-5">Hello, {{auth()->user()->nama}}</h2>
													<p class="mb-0">Administrator</p>
					
													<div class="widget-user-acrostic bg-primary">
														<span class="font-weight-bold">{{ substr(auth()->user()->nama,0,1) }}{{ substr(auth()->user()->nama,6,1) }}</span>
													</div>
												</div>
												<div class="widget-user-info-body">
													<div class="row">
														<div class="col-auto">
															<strong class="text-color-dark text-5">Rp{{ number_format($pesanan->sum('total_harga'),2,",",".") }}</strong>
															<h3 class="text-4-1">Saldo Pemasukan</h3>
														</div>
														<div class="col-auto">
															<strong class="text-color-dark text-5">{{$produk->count()}}</strong>
															<h3 class="text-4-1">Produk</h3>
														</div>
													</div>
													<div class="row">
														<div class="col">
															<a href="pages-user-profile.html" class="btn btn-light btn-xl border font-weight-semibold text-color-dark text-3 mt-4">View Profile</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-4">
									<div class="card card-modern">
										<div class="card-body py-4">
											<div class="row align-items-center">
												<div class="col-6 col-md-4">
													<h3 class="text-4-1 my-0">Total Pesanan</h3>
													<strong class="text-6 text-color-dark">{{$all->count()}}</strong>
												</div>
												<div class="col-6 col-md-4 border border-top-0 border-right-0 border-bottom-0 border-color-light-grey py-3">
													<h3 class="text-4-1 text-color-success line-height-2 my-0">Pesanan <strong>Meningkat &uarr;</strong></h3>
													<span>30 hari</span>
												</div>
												<div class="col-md-4 text-left text-md-right pr-md-4 mt-4 mt-md-0">
													<i class="bx bx-cart-alt icon icon-inline icon-xl  rounded-circle text-color-light"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-4">
									<div class="card card-modern">
										<div class="card-body py-4">
											<div class="row align-items-center">
												<div class="col-6 col-md-4">
													<h3 class="text-4-1 my-0">Total Pelanggan</h3>
													<strong class="text-6 text-color-dark">{{$user->count()}}</strong>
												</div>
												<div class="col-6 col-md-4 border border-top-0 border-right-0 border-bottom-0 border-color-light-grey py-3">
													<h3 class="text-4-1 text-color-success line-height-2 my-0">Pelanggan <strong>Meningkat &uarr;</strong></h3>
													<span>30 hari</span>
												</div>
												<div class="col-md-4 text-left text-md-right pr-md-4 mt-4 mt-md-0">
													<i class="bx bx-user icon icon-inline icon-xl  rounded-circle text-color-light"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
@endsection