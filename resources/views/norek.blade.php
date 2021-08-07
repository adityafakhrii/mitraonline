@extends('layouts.master')
<title>Lakukan Pembayaran</title>
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
                        <div class="cart-summary">
                            <h4>Pesanan <b>{{$pesanan->kode_pesanan}}</b></h4>
                            <hr>
                            <h6>Silahkan lakukan pembayaran ke salah satu rekening berikut:</h6>
                            <ul class="summary-table">
                                <li><h5>Bank Mandiri | 100-001-22-07 a/n Toko Jersey Indo</h5></li>
                                <li><h5>Bank BNI | 100-001-22-07 a/n Toko Jersey Indo</h5></li>
                                <li><h5>Bank BRI | 100-001-22-07 a/n Toko Jersey Indo</h5></li>
                            </ul>
                            <form action="/upload-bayar/{{$pesanan->id}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <hr>
                                <h5>Silahkan transfer sesuai total belanja anda senilai <b>Rp{{ number_format($pesanan->total_harga+$pesanan->ongkir,2,",",".") }}</b> </h5>
                                <input type="file" name="bukti" class="mt-50">
                                <div class="cart-btn mt-50">
                                    <input type="submit" class="btn amado-btn w-100" value="Upload Bukti Transfer">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection