@extends('admin.layouts.master')
<title>Edit Produk</title>

@section('content')
				<section role="main" class="content-body content-body-modern mt-0">
					<header class="page-header page-header-left-inline-breadcrumb">
						<h2 class="font-weight-bold text-6">Edit Produk</h2>
					</header>

					<!-- start: page -->
						<form class="ecommerce-form action-buttons-fixed" action="/update-produk/{{$produk->id}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="row">
								<div class="col">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-lg-2-5 col-xl-1-5">
													<i class="card-big-info-icon bx bx-box"></i>
													<h2 class="card-big-info-title">Informasi Umum</h2>
													<p class="card-big-info-desc">Add here the product description with all details and necessary information.</p>
												</div>
												<div class="col-lg-3-5 col-xl-4-5">
													<div class="form-group row align-items-center">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Nama Produk</label>
														<div class="col-lg-7 col-xl-6">
															<input type="text" class="form-control form-control-modern" name="nama_produk" value="{{$produk->nama_produk}}" placeholder="{{$produk->nama_produk}}" required />
														</div>
													</div>
													<div class="form-group row">
														<label class="col-lg-5 col-xl-3 control-label text-lg-right pt-2 mt-1 mb-0">Deskripsi Produk</label>
														<div class="col-lg-7 col-xl-6">
															<textarea class="form-control form-control-modern" name="deskripsi" rows="6" placeholder="{{$produk->deskripsi}}" required></textarea>
														</div>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="row">
												<div class="col-lg-2-5 col-xl-1-5">
													<i class="card-big-info-icon bx bx-camera"></i>
													<h2 class="card-big-info-title">Gambar Produk</h2>
													<p class="card-big-info-desc">Upload your Product image. You can add multiple images</p>
												</div>
												<div class="col-lg-3-5 col-xl-4-5">
													<div class="form-group row align-items-center">
														<div class="col">
															<input type="file" name="gambar" value="{{$produk->img}}">
														</div>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<section class="card card-modern card-big-info">
										<div class="card-body">
											<div class="tabs-modern row" style="min-height: 490px;">
												<div class="col-lg-2-5 col-xl-1-5">
													<div class="nav flex-column" id="tab" role="tablist" aria-orientation="vertical">
											      		<a class="nav-link active" id="price-tab" data-toggle="pill" href="#price" role="tab" aria-controls="price" aria-selected="true">Harga dan Stok</a>
											      		
											    	</div>
												</div>
												<div class="col-lg-3-5 col-xl-4-5">
													<div class="tab-content" id="tabContent">
											      		<div class="tab-pane fade show active" id="price" role="tabpanel" aria-labelledby="price-tab">
															<div class="form-group row align-items-center">
																<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Harga Produk (Rp)</label>
																<div class="col-lg-7 col-xl-6">
																	<input type="text" class="form-control form-control-modern" name="harga" value="{{$produk->harga}}" placeholder="{{$produk->harga}}" required />
																</div>
															</div>
															<div class="form-group row align-items-center">
																<label class="col-lg-5 col-xl-3 control-label text-lg-right mb-0">Stok</label>
																<div class="col-lg-7 col-xl-6">
																	<input type="text" class="form-control form-control-modern" name="stok" value="{{$produk->stok}}" placeholder="{{$produk->stok}}" required />
																</div>
															</div>
											      		</div>
											    	</div>
												</div>
											</div>
										</div>
									</section>
								</div>
							</div>
							<div class="row action-buttons">
								<div class="col-12 col-md-auto">
									<button type="submit" class="submit-button btn btn-success btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" data-loading-text="Loading...">
										<i class="bx bx-save text-4 mr-2"></i> Simpan Produk
									</button>
								</div>
								<div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
									<a href="/produk" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Batalkan</a>
								</div>
							</div>
						</form>
					<!-- end: page -->
				</section>
@endsection