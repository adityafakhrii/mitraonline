@extends('layouts.master')
<title>Checkout</title>
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
                            <h2>Rincian Pesanan</h2>
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
                                    @foreach($keranjang as $k)
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
                                            <div class="qty-btn d-flex">
                                                <p>Qty</p>
                                                <div class="quantity">
                                                    
                                                    <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="{{$k->qty}}">
                                                    
                                                </div>
                                            </div>
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
                            <h5>Rincian Penerima <a class="btn btn-sm btn-warning float-right" href="/akun/edit/{{auth()->user()->id}}"><i class="fa fa-edit"></i> Ubah Data</a></h5>
                            <ul class="summary-table">
                                <?php
                                    $harga = 0;
                                    foreach ($keranjang as $k) {
                                        $harga = $harga + ($k->produk->harga*$k->qty);
                                    }
                                ?>
                                <li><span>Nama Penerima :</span><span>{{ auth()->user()->nama }}</span></li>
                                <li><span>alamat        :</span> <span>{{ auth()->user()->alamat }}</span></li>
                                <li><span>Kode Pos      :</span> <span>{{ auth()->user()->kode_pos }}</span></li>
                                <li><span>No. HP        :</span> <span>{{ auth()->user()->no_hp }}</span></li>
                                
                                <form action="/bayar" method="POST">
                                    @csrf
                                <li><span>Catatan       :</span> <input name="catatan" class="form-control col-lg-3" type="text" placeholder="(opsional)"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="cart-summary">
                            <h5>Total Pembayaran</h5>
                            <ul class="summary-table">
                                <?php
                                    $harga = 0;
                                    foreach ($keranjang as $k) {
                                        $harga = $harga + ($k->produk->harga*$k->qty);
                                    }
                                ?>
                                <li><span>Subtotal :</span><span>Rp{{ number_format($harga,2,",",".") }}</span></li>
                                <li><span>Ongkir :</span> <span>Rp{{ number_format(20000,2,",",".") }}</span></li>
                                <li><span>Total :</span> <span>Rp{{ number_format($harga+20000,2,",",".") }}</span></li>
                            </ul>
                            <div class="cart-btn mt-100">
                                
                                    <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                                    <input type="hidden" name="total_harga" value="{{$harga}}">
                                    <input type="hidden" name="ongkir" value="20000">

                                    <button type="submit" class="btn amado-btn w-100">Bayar</button> 
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection