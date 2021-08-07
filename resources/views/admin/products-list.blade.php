@extends('admin.layouts.master')
<title>List Produk</title>

@section('content')
				<section role="main" class="content-body content-body-modern mt-0">
					<header class="page-header page-header-left-inline-breadcrumb">
						<h2 class="font-weight-bold text-6">List Produk</h2>
						
					</header>

					<!-- start: page -->
					<div class="ecommerce-form-sidebar-overlay-wrapper">
						<div class="ecommerce-form-sidebar-overlay-body">
							<a href="#" class="ecommerce-form-sidebar-overlay-close"><i class="bx bx-x"></i></a>
							<div class="scrollable h-100 loading-overlay-showing" data-plugin-scrollable>
								<div class="loading-overlay">
									<div class="bounce-loader">
										<div class="bounce1"></div>
										<div class="bounce2"></div>
										<div class="bounce3"></div>
									</div>
								</div>
								<div class="ecommerce-form-sidebar-overlay-content scrollable-content px-3 pb-3 pt-1"></div>
							</div>
						</div>
					</div>
					<div class="row justify-content-center justify-content-sm-between">
						<div class="col-sm-auto text-center mb-4 mb-sm-0 mt-2 mt-sm-0">
							<a href="/produk/tambah-produk" class="ecommerce-sidebar-link btn btn-warning btn-md font-weight-semibold btn-py-2 px-4" data-ajax-url="ajax/ajax-products-form-empty.html">+ Tambah Produk</a>
						</div>
						<div class="col-sm-auto">
							<form action="ecommerce-products-list.html" class="search search-style-1 search-style-1-light mx-auto" method="GET">
								<div class="input-group">
									<input type="text" class="form-control" name="product-term" id="product-term" placeholder="Search Product">
									<span class="input-group-append">
										<button class="btn btn-default" type="submit"><i class="bx bx-search"></i></button>
									</span>
								</div>
							</form>
						</div>
					</div>
					<div class="row row-gutter-sm mb-5">
						
						<div class="col-lg-3-6 col-xl-4-7">
							<div class="row row-gutter-sm">
								@foreach($produk as $p)
								<div class="col-sm-6 col-xl-3 mb-4">
									<div class="card card-modern card-modern-alt-padding">
										<div class="card-body bg-light">
											<div class="image-frame mb-2">
												<div class="image-frame-wrapper">
													@if($p->status == 'Tersedia' )
													<div class="image-frame-badges-wrapper">
														<span class="badge badge-ecommerce badge-success">{{$p->status}}</span>
													</div>
													@else
													<div class="image-frame-badges-wrapper">
														<span class="badge badge-ecommerce badge-danger">{{$p->status}}</span>
													</div>
													@endif
													
													<a href="/produk/edit/{{$p->id}}"><img src="{{$p->img}}" class="img-fluid" alt="Product Short Name" /></a>
												</div>
											</div>
											<small><a href="ecommerce-products-form.html" class="ecommerce-sidebar-link text-color-grey text-color-hover-primary text-decoration-none">Sisa {{$p->stok}} pcs</a></small>
											<h4 class="nama-produk text-4 line-height-2 mt-0 mb-2"><a href="/produk/edit/{{$p->id}}" class="ecommerce-sidebar-link text-warning text-color-hover-primary text-decoration-none">{{$p->nama_produk}}</a></h4>
											
											<div class="product-price">
												<div class="sale-price">Rp{{ number_format($p->harga,2,",",".") }}</div>
											</div>
											<br>
											<div class="product-price">
												
												<div class="image-frame-badges-wrapper mr-2">
													<a href="/produk/edit/{{$p->id}}" class="text-white" style="text-decoration: none;"><span class="badge badge-ecommerce badge-warning">Edit</span></a>
												</div>
												<div class="image-frame-badges-wrapper mr-2">
													<a href="/produk/hapus/{{$p->id}}" class="text-white" style="text-decoration: none;" onclick="return confirm('Yakin ingin menghapus produk?')"><span class="badge badge-ecommerce badge-danger">Hapus</span></a>
												</div>
											</div>
											

										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="row row-gutter-sm justify-content-between">
								<div class="col-lg-auto order-2 order-lg-1">
									<p class="text-center text-lg-left mb-0">Showing 1-8 of 60 results</p>
								</div>
								<div class="col-lg-auto order-1 order-lg-2 mb-3 mb-lg-0">
									<nav aria-label="Page navigation example">
									  	<ul class="pagination pagination-modern pagination-modern-spacing justify-content-center justify-content-lg-start mb-0">
									    	<li class="page-item">
									      		<a class="page-link prev" href="#" aria-label="Previous">
										        	<span><i class="fas fa-chevron-left" aria-label="Previous"></i></span>
										      	</a>
									    	</li>
										    <li class="page-item active"><a class="page-link" href="#">1</a></li>
										    <li class="page-item"><a class="page-link" href="#">2</a></li>
										    <li class="page-item"><a class="page-link" href="#">3</a></li>
										    <li class="page-item"><a class="page-link" href="#" disabled="true">...</a></li>
										    <li class="page-item"><a class="page-link" href="#">15</a></li>
										    <li class="page-item">
										      	<a class="page-link next" href="#" aria-label="Next">
										        	<span><i class="fas fa-chevron-right" aria-label="Next"></i></span>
										      	</a>
										    </li>
									  	</ul>
									</nav>
								</div>
							</div>
						</div>
					</div>
					<!-- end: page -->
				</section>
@endsection