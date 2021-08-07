@extends('layouts.master')
<title>Pesanan</title>
@section('nav')
                    <li><a href="/">Home</a></li>
                    <li><a href="/keranjang">Keranjang 
                        @if (Route::has('login'))
                            @auth
                                <span>({{ $cart = \App\Models\Detail_pesanan::where('status','=','keranjang')->where('id_user','=',auth()->user()->id)->count() }})</span>
                            @else
                                <span>(0)</span>
                            @endauth
                        @endif
                        
                    </a></li>
                    <li class="active"><a href="/pesanan">Pesanan</a></li>
                    @if (Route::has('login'))
                        @auth
                            <li><a href="/akun">Akun</a></li>
                            <li><a href="/logout">Logout</a></li>
                        @else
                            <li><a href="/login"></i>Login</a></li>
                            <li><a href="/daftar"></i>Daftar</a></li>
                        @endauth
                    @endif
@endsection

@section('content')

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    @if(Session::has('pesanan'))
                            <div class="alert alert-success mb-5" >
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Pesanan Berhasil Dibuat dengan Kode Pesanan:<strong> {{Session::get('kode')}}</strong> 
                            </div>
                        @endif
                    <div class="col-12 col-lg-12">

                        <div class="cart-title mt-50">
                            <h2>Pesanan</h2>
                        </div>
                        @if($pesanan->count() != 0)
                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Aksi</th>
                                        <th>Kode Pesanan</th>
                                        <th>Tanggal</th>
                                        <th>Total Harga</th>
                                        <th>Status</th>
                                        <th>Resi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    @foreach($pesanan as $p)
                                    <tr>
                                        <td>
                                            @if($p->status == 'belum_dibayar')
                                            <a href="/pesanan/bayar/{{$p->id}}" class="btn btn-sm btn-outline-primary">Upload Bukti Pembayaran</a>
                                            @elseif($p->status == 'dikirim')
                                            <a href="/pesanan/diterima/{{$p->id}}" class="btn btn-sm btn-success" onclick="return confirm('Konfirmasi terima produk?')">Pesanan Diterima</a>
                                            @elseif($p->status == 'selesai')
                                            <p>Produk sudah diterima</p>
                                            @elseif($p->status == 'dibayar')
                                            <p>Menunggu produk dikirim</p>
                                            @elseif($p->status == 'dibatalkan')
                                            <p>Pesanan Dibatalkan</p>
                                            @endif
                                        </td>
                                        <td class="" width="" >
                                            <h5>{{$p->kode_pesanan}} - <a class="detail" href="/pesanan/detail/{{$p->id}}">Lihat Detail</a></h5>
                                        </td>
                                        <td class="">
                                            <h5>{{$p->tgl}}</h5>
                                        </td>
                                        <td class="">
                                            <span>Rp{{ number_format($p->total_harga+$p->ongkir,2,",",".") }}</span>
                                        </td>
                                        <td class="">
                                            @if($p->status == 'belum_dibayar')
                                            <span>Menunggu pembayaran</span>
                                            @elseif($p->status == 'dibayar')
                                            <span>Sedang Diproses</span>
                                            @elseif($p->status == 'dikirim')
                                            <span>Sedang Dikirim</span>
                                            @elseif($p->status == 'selesai')
                                            <span>Pesanan Selesai</span>
                                            @elseif($p->status == 'dibatalkan')
                                            <span>Pesanan Dibatalkan</span>
                                            @endif
                                        </td>
                                        <td class="">
                                            @if($p->resi == NULL)
                                            <span>-</span>
                                            @else
                                            <span>{{$p->resi}} - <a class="detail" target="_blank" href="https://resi.id/s/{{$p->resi}}">Lacak</a></span>
                                            @endif
                                        </td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                            <h4 class="text-center">Tidak ada pesanan dibuat</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>

@endsection