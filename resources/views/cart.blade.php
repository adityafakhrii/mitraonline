@extends('layouts.master')
<title>Keranjang</title>
@section('nav')
                    <li><a href="/">Home</a></li>
                    <li class="active"><a href="/keranjang">Keranjang 
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
                            <h2>Keranjang Belanja</h2>
                        </div>
                        @if($keranjang->count() != 0)
                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Gambar</th>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $harga = 0;
                                        foreach ($keranjang as $k) {
                                            $harga = $harga + ($k->produk->harga*$k->qty);
                                        }
                                    ?>
                                    @foreach($keranjang as $k)
                                    <tr>
                                        <td class="cart_product_img" >
                                            <a href="/detail-produk/{{$k->produk->id}}"><img src="{{$k->produk->img}}" alt="Product" width="90"></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <a href="/detail-produk/{{$k->produk->id}}"><h5>{{$k->produk->nama_produk}}</h5></a>
                                        </td>
                                        <td class="price">
                                            <span>Rp{{ number_format($k->produk->harga,2,",",".") }}</span>
                                        </td>
                                        <td class="qty">
                                            <form action="/keranjang/edit/{{$k->id}}" method="post">
                                            @csrf
                                            <div class="qty-btn d-flex">
                                                <p>Qty</p>
                                                <div class="quantity">
                                                    
                                                    <input type="number" class="qty-text" id="qty" step="1" min="1" max="999" name="qty" value="{{$k->qty}}">
                                                    
                                                </div>
                                            </div>
                                        </td>
                                        <td class="price">
                                            <span>Rp {{ number_format($k->produk->harga*$k->qty) }}</span>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-sm btn-warning">Ubah stok</button>
                                            </form>
                                            <a class="btn btn-sm btn-danger" href="/keranjang/hapus/{{$k->id}}" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
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
                            <ul class="summary-table">
                                <li><h4>Total Belanja :</h4><h4>Rp{{ number_format($harga,2,",",".") }}</h4></li>
                            </ul>
                            <div class="cart-btn mt-100">
                                <a href="/checkout" class="btn amado-btn w-100">Checkout</a>
                            </div>
                            @else
                                <h4 class="text-center">Keranjang Kosong</h4>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection