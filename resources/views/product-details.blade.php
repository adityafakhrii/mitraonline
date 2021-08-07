@extends('layouts.master')
<title>Detail Produk</title>
@section('nav')
                    <li class="active"><a href="/">Home</a></li>
                    <li><a href="/keranjang">Keranjang 
                        @if (Route::has('login'))
                            @auth
                                <span>({{ $keranjang = \App\Models\Detail_pesanan::where('status','=','keranjang')->where('id_user','=',auth()->user()->id)->count() }})</span>
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
                            <li><a href="/daftar"></i>Register</a></li>
                        @endauth
                    @endif
@endsection

@section('content')
        <!-- Product Details Area Start -->
        <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mt-50">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$produk->nama_produk}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="{{$produk->img}}">
                                            <img class="d-block w-100" src="{{$produk->img}}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">Rp{{ number_format($produk->harga,2,",",".") }}</p>
                                <a href="product-details.html">
                                    <h6>{{$produk->nama_produk}}</h6>
                                </a>
                                <!-- Ratings & Review -->
                                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                    <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <!-- Avaiable -->
                                @if($produk->status == 'Tersedia')
                                    <p class="avaibility"><i class="fa fa-circle"></i> Tersedia | sisa {{$produk->stok}} pcs</p>
                                @else
                                    <p class="avaibility-out"><i class="fa fa-circle"></i> Habis</p>
                                @endif
                            </div>

                            <div class="short_overview my-5">
                                <p>{{$produk->deskripsi}}</p>
                            </div>

                            <!-- Add to Cart Form -->
                            <form action="/postkeranjang/{{$produk->id}}" class="cart clearfix" method="post">
                                @csrf
                                <div class="cart-btn d-flex mb-50">
                                    <p>Qty</p>
                                    <div class="quantity">
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="qty" value="1">
                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                        <input type="hidden" name="id_produk" value="{{$produk->id}}">
                                        @auth
                                        <input type="hidden" name="id_user" value="{{auth()->user()->id}}">
                                        @endauth
                                    </div>
                                </div>
                                @if($produk->status == 'Tersedia')
                                <button type="submit" name="addtocart" value="5" class="btn amado-btn">Tambah ke Keranjang</button>
                                @else
                                <button type="submit" name="addtocart" value="5" class="btn amado-btn-disabled" disabled="">Stok Habis</button>
                                @endif
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Details Area End -->
@endsection