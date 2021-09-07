@extends('layouts.master')
<title>UMKM Online Shop</title>

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
        <div class="products-catagories-area clearfix">
            @if(Session::has('login'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Anda berhasil Login!</strong> Selamat datang dan selamat berbelanja {{auth()->user()->nama}}
            </div>
            @elseif(Session::has('keranjang'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Berhasil menambah ke keranjang</strong> Silahkan cek keranjang anda
            </div>
            @elseif(Session::has('pesanan'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Pesanan Berhasil dibuat</strong> lakukan pembayaran agar segera diproses.
            </div>   
            @endif
            
            <div class="amado-pro-catagory clearfix">

                <!-- Single Catagory -->
                @foreach($produk as $p)
                <div class="single-products-catagory clearfix">
                    <a href="/detail-produk/{{$p->id}}">
                        <img src="{{HTML::image('$p->img') }}" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>Rp{{ number_format($p->harga,2,",",".") }}</p>
                            <h4>{{$p->nama_produk}}</h4>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
@endsection