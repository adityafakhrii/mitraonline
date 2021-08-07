@extends('layouts.master')
<title>Detail Pesanan - {{$pesanan->kode_pesanan}}</title>
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
                    <li><a href="/pesanan">Pesanan</a></li>
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
                    <div class="col-12 col-lg-12">
                        <div class="cart-title mt-50">
                            <h2>Detail Pesanan - {{$pesanan->kode_pesanan}}</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Gambar</th>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($detail as $k)
                                    <tr>
                                        <td class="cart_product_img">
                                            <a href="#"><img src="{{$k->produk->img}}" alt="Product"></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5>{{$k->produk->nama_produk}}</h5>
                                        </td>
                                        <td class="price">
                                            <span>Rp{{ number_format($k->produk->harga,2,",",".") }}</span>
                                        </td>
                                        <td class="qty">
                                            <span>{{$k->qty}}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="cart-summary">
                            @if($pesanan->status == 'dibatalkan')
                            <h5>Rincian Pesanan - Dibatalkan</h5>
                            @elseif($pesanan->status == 'dibayar')
                            <h5>Rincian Pesanan - Menunggu Dikirim</h5>
                            @elseif($pesanan->status == 'dikirim')
                            <h5>Rincian Pesanan - Sedang Dikirim | <a class="detail" target="_blank" href="https://resi.id/s/{{$pesanan->resi}}">Lacak</a></h5>
                            @elseif($pesanan->status == 'selesai')
                            <h5>Rincian Pesanan - Sudah Diterima</h5>
                            @elseif($pesanan->status == 'belum_dibayar')
                            <form action="/pesanan/detail/batal/{{$pesanan->id}}" method="post">
                            <h5>Rincian Penerima 
                                    @csrf
                                    <button onclick="return confirm('Yakin batalkan pesanan?')" class="btn btn-sm btn-danger float-right" type="submit"><i class="fa fa-trash"></i> Batalkan Pesanan</button>
                            </h5>
                            </form>
                            @endif
                            <ul class="summary-table">
                                <?php
                                    $harga = 0;
                                    foreach ($detail as $k) {
                                        $harga = $harga + ($k->produk->harga*$k->qty);
                                    }
                                ?>
                                <li><span>Nama Penerima :</span><span>{{ $pesanan->user->nama }}</span></li>
                                <li><span>alamat        :</span> <span>{{ $pesanan->user->alamat }}</span></li>
                                <li><span>Kode Pos      :</span> <span>{{ $pesanan->user->kode_pos }}</span></li>
                                <li><span>No. HP        :</span> <span>{{ $pesanan->user->no_hp }}</span></li>
                                <li><span>Status        :</span> <span>{{ $pesanan->status }}</span></li>
                                <li><span>Resi          :</span> <span>
                                    @if($pesanan->resi != NULL)
                                    <span>{{$pesanan->resi}}</span>
                                    @else
                                    <span>Pesanan belum dibayar</span>
                                    @endif
                                </li>
                                <li><span>Catatan       :</span> 
                                    @if($pesanan->catatan != NULL)
                                    <span>{{$pesanan->catatan}}</span>
                                    @else
                                    <span>Tidak ada catatan</span>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="cart-summary">
                            <h5>Total Belanja</h5>
                            <ul class="summary-table">
                                <?php
                                    $harga = 0;
                                    foreach ($detail as $k) {
                                        $harga = $harga + ($k->produk->harga*$k->qty);
                                    }
                                ?>
                                <li><span>Subtotal :</span><span>Rp{{ number_format($harga,2,",",".") }}</span></li>
                                <li><span>Ongkir :</span> <span>Rp{{ number_format(20000,2,",",".") }}</span></li>
                                <li><span>Total :</span> <span>Rp{{ number_format($harga+20000,2,",",".") }}</span></li>
                            </ul>
                            <div class="cart-btn mt-100">
                            <a href="/pesanan" class="btn amado-btn w-100">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection