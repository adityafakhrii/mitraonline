@extends('admin.layouts.master')
<title>Detail Pesanan</title>

@section('content')				
				<section role="main" class="content-body content-body-modern mt-0">
					<header class="page-header page-header-left-inline-breadcrumb">
						<h2 class="font-weight-bold text-6">Detail pesanan: {{$pesanan->kode_pesanan}}</h2>
					</header>

					<!-- start: page -->
					<form class="order-details action-buttons-fixed" action="/data-pesanan/detail/konfir/{{$pesanan->id}}" method="post">
						@csrf
						<div class="row">
							<div class="col-xl-4 mb-4 mb-xl-0">
								
								<div class="card card-modern">
									<div class="card-header">
										<h2 class="card-title">Rincian Pesanan</h2>
									</div>
									<div class="card-body">
										<div class="form-row">
											<div class="form-group col mb-3">
												<label>Status</label>
												<input type="text" class="form-control form-control-modern" name="orderDate" value="{{$pesanan->status}}" disabled />
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col mb-3">
												<label>Tanggal Pesan</label>
												<input type="text" class="form-control form-control-modern" name="orderDate" value="{{$pesanan->tgl}}" disabled />
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col mb-3">
												<label>Terakhir Diubah</label>
												<input type="text" class="form-control form-control-modern" name="orderDate" value="{{$pesanan->updated_at}}" disabled />
											</div>
										</div>
									</div>
								</div>

							</div>
							<div class="col-xl-8">
								
								<div class="card card-modern">
									<div class="card-header">
										<h2 class="card-title">Rincian Pengiriman</h2>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-xl-auto mr-xl-5 pr-xl-5 mb-4 mb-xl-0">
												<h3 class="text-color-dark font-weight-bold text-4 line-height-1 mt-0 mb-3">Penerima</h3>
												<ul class="list list-unstyled list-item-bottom-space-0">
													<li>{{$pesanan->user->nama}}</li>
													<li>{{$pesanan->user->alamat}}</li>
													<li>{{$pesanan->user->kode_pos}}</li>
													<li>Indonesia</li>
												</ul>
												<strong class="d-block text-color-dark">Email:</strong>
												<a href="mailto:{{$pesanan->user->email}}">{{$pesanan->user->email}}</a>
												<strong class="d-block text-color-dark mt-3">No.HP:</strong>
												<a href="tel:{{$pesanan->user->no_hp}}" class="text-color-dark">{{$pesanan->user->no_hp}}</a>
											</div>
											<div class="col-xl-auto pl-xl-5">
												<h3 class="font-weight-bold text-color-dark text-4 line-height-1 mt-0 mb-3">Bukti Pembayaran</h3>
												@if($pesanan->bukti != NULL)
												<img src="{{$pesanan->bukti}}" alt="" width="370">
												@else
												<p>Pelanggan belum melakukan pembayaran</p>
												@endif
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
						<div class="row">
							<div class="col">
								
								<div class="card card-modern">
									<div class="card-header">
										<h2 class="card-title">Produk yang dipesan</h2>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-ecommerce-simple table-ecommerce-simple-border-bottom table-striped mb-0" style="min-width: 380px;">
												<thead>
													<tr>
														<th>Nama Produk</th>
														<th class="text-right">Harga</th>
														<th class="text-right">Qty</th>
														<th class="text-right">Total</th>
													</tr>
												</thead>
												<tbody>
													@foreach($produk as $p)
													<tr>
														<td><a href="/detail-produk/{{$p->produk->id}}"><strong>{{$p->produk->nama_produk}}</strong></a></td>
														<td class="text-right">Rp{{ number_format($p->produk->harga,2,",",".") }}</td>
														<td class="text-right">{{$p->qty}}</td>
														<td class="text-right">Rp{{ number_format($p->produk->harga*$p->qty,2,",",".") }}</td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>

										<div class="row justify-content-end flex-column flex-lg-row my-3">
											<div class="col-auto mr-5">
												<h3 class="font-weight-bold text-color-dark text-4 mb-3">Total Produk</h3>
												<span class="d-flex align-items-center">
													{{$pesanan->count()}}
													<i class="fas fa-chevron-right text-color-primary px-3"></i>
													<b class="text-color-dark text-xxs">Rp{{ number_format($pesanan->total_harga,2,",",".") }}</b>
												</span>
											</div>
											<div class="col-auto mr-5">
												<h3 class="font-weight-bold text-color-dark text-4 mb-3">Pengiriman</h3>
												<span class="d-flex align-items-center">
													Ongkir
													<i class="fas fa-chevron-right text-color-primary px-3"></i>
													<b class="text-color-dark text-xxs">Rp{{ number_format($pesanan->ongkir,2,",",".") }}</b>
												</span>
											</div>
											<div class="col-auto">
												<h3 class="font-weight-bold text-color-dark text-4 mb-3">Total Pembayaran</h3>
												<span class="d-flex align-items-center justify-content-lg-end">
													<strong class="text-color-dark text-5">Rp{{ number_format($pesanan->total_harga+$pesanan->ongkir,2,",",".") }}</strong>
												</span>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
						<div class="row">
							<div class="col">
								
								<div class="card card-modern">
									<div class="card-header">
										<h2 class="card-title">Catatan Pesanan</h2>
									</div>
									<div class="card-body">
										<div class="ecommerce-timeline">
											<div class="ecommerce-timeline-items-wrapper">
												<div class="ecommerce-timeline-item">
													@if($pesanan->catatan != NULL)
													<p>{{$pesanan->catatan}}</p>
													@else
													<p>Tidak ada catatan.</p>
													@endif
												</div>
											</div>
										</div>
									</div>
									@if($pesanan->resi == NULL)
									<div class="card-header">
										<h2 class="card-title">Input Resi</h2>
									</div>
									<div class="card-body">
										@if($pesanan->status == 'belum_dibayar')
										<input class="form-control form-control-modern" name="resi" placeholder="Tunggu sampai pesanan dibayar." disabled></input>
										@elseif($pesanan->status == 'dibatalkan')
										<input class="form-control form-control-modern" name="resi" placeholder="Pesanan dibatalkan." disabled></input>
										@else
										<input class="form-control form-control-modern" name="resi" placeholder="Masukkan resi pengiriman..." required></input>
										@endif
									</div>
									@else
									<div class="card-header">
										<h2 class="card-title">Resi Pengiriman  - <a class="detail" target="_blank" href="https://resi.id/s/{{$pesanan->resi}}">Lacak</a></h2>
									</div>
									<div class="card-body">
										<input class="form-control form-control-modern" value="{{$pesanan->resi}}" disabled></input>
									</div>
									@endif
								</div>

							</div>
						</div>
						@if($pesanan->resi == NULL && $pesanan->status != 'dibatalkan')
						<div class="row action-buttons">
							@if($pesanan->status == 'belum_dibayar')
							<div class="col-12 col-md-auto">
								<button type="submit" class="submit-button btn btn-success btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" data-loading-text="Loading..." disabled>
									<i class="bx bx-save text-4 mr-2"></i> Konfirmasi Pesanan
								</button>
							</div>
							@else
								<button onclick="return confirm('Pastikan resi yang dimasukkan sudah benar!')" type="submit" class="submit-button btn btn-success btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" data-loading-text="Loading...">
									<i class="bx bx-save text-4 mr-2"></i> Konfirmasi Pesanan
								</button>
							@endif
							<div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0 ml-2">
								<a href="/data-pesanan" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Kembali</a>
							</div>
					</form>
							@if($pesanan->status == 'belum_dibayar' || $pesanan->status == 'dibayar')
							<form action="/data-pesanan/detail/batal/{{$pesanan->id}}" method="post">
								@csrf
								<div class="col-12 col-md-auto ml-md-auto mt-3 mt-md-0">
									<button onclick="return confirm('Batalkan pesanan ini?')" href="#" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
										<i class="bx bx-trash text-4 mr-2"></i> Batalkan Pesanan
									</button>
								</div>
							</form>
							@endif
						</div>
					
						@endif
					<!-- end: page -->
				</section>
@endsection