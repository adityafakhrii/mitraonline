@extends('admin.layouts.master')
<title>Data pesanan</title>

@section('content')
				<section role="main" class="content-body content-body-modern mt-0">
					<header class="page-header page-header-left-inline-breadcrumb">
						<h2 class="font-weight-bold text-6">Data Pesanan
						@if($pesanan == \App\Models\Pesanan::where('status','=','belum_dibayar')->get())
						- Belum Dibayar
						@elseif($pesanan == \App\Models\Pesanan::where('status','=','dibayar')->get())
						- Menunggu Konfirmasi/Resi
						@elseif($pesanan == \App\Models\Pesanan::where('status','=','dikirim')->get())
						- Sedang Dikirim
						@elseif($pesanan == \App\Models\Pesanan::where('status','=','dibatalkan')->get())
						- Dibatalkan
						@elseif($pesanan == \App\Models\Pesanan::where('status','=','selesai')->get())
						- Pesanan
						@endif
						</h2>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col">
							
							<div class="card card-modern">
								<div class="card-body">
									<div class="datatables-header-footer-wrapper">
										<div class="datatable-header">
											<div class="row align-items-center mb-3">
												<div class="col-12 col-lg-auto pl-lg-1">
													<div class="search search-style-1 search-style-1-lg mx-lg-auto">
														<div class="input-group">
															<input type="text" class="search-term form-control" name="search-term" id="search-term" placeholder="Search Order">
															<span class="input-group-append">
																<button class="btn btn-default" type="submit"><i class="bx bx-search"></i></button>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<table class="table table-ecommerce-simple table-striped mb-0" id="datatable-ecommerce-list" style="min-width: 640px;">
											<thead>
												<tr>
													
													<th width="14%">Kode</th>
													<th width="20%">Nama Pemesan</th>
													<th width="13%">Tanggal</th>
													<th width="12%">Total</th>
													<th width="18%">Resi</th>
													<th width="5%">Bukti Bayar</th>
													<th width="18%">Status</th>
												</tr>
											</thead>
											<tbody>
												@foreach($pesanan as $p)
												<tr>
													<td>{{$p->kode_pesanan}}</td>
													<td>{{$p->user->nama}}</td>
													<td>{{$p->tgl}}</td>
													<td>Rp{{ number_format($p->total_harga + $p->ongkir,2,",",".") }}</td>
													<td>
			                                            @if($p->resi == NULL)
			                                            <span>-</span>
			                                            @else
			                                            <span><a class="detail" target="_blank" href="https://resi.id/s/{{$p->resi}}">{{$p->resi}}</a></span>
			                                            @endif
			                                        </td>
			                                        <td>
			                                        	@if($p->status == 'dibayar')
			                                            <span><a class="detail" href="/data-pesanan/detail/{{$p->id}}">Konfirmasi pesanan</a></span>
			                                            @else
			                                            <span><a class="detail" href="/data-pesanan/detail/{{$p->id}}">Lihat Detail</a></span>
			                                            @endif
			                                        </td>
													<td>
														@if($p->status == 'dibayar')
														<span class="ecommerce-status processing">Dibayar</span>
														@elseif($p->status == 'diproses')
														<span class="ecommerce-status processing">Diproses</span>
														@elseif($p->status == 'belum_dibayar')
														<span class="ecommerce-status on-hold">Belum dibayar</span>
														@elseif($p->status == 'dikirim')
														<span class="ecommerce-status processing">Sedang Dikirim</span>
														@elseif($p->status == 'selesai')
														<span class="ecommerce-status completed">Selesai</span>
														@else
														<span class="ecommerce-status canceled">Dibatalkan</span>
														@endif
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
										{{-- <hr class="solid mt-5 opacity-4"> --}}
									</table>
								</div>
							</div>

						</div>
					</div>
					<!-- end: page -->
				</section>
@endsection