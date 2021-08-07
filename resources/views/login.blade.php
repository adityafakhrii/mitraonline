@extends('layouts.master')
<title>Login</title>
@section('nav')
                    <li><a href="/">Home</a></li>
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
                    <li><a href="/akun">Akun</a></li>
                    @if (Route::has('login'))
                        @auth
                            <li><a href="/logout">Logout</a></li>
                        @else
                            <li class="active"><a href="/login"></i>Login</a></li>
                            <li><a href="/daftar"></i>Register</a></li>
                        @endauth
                    @endif
@endsection

@section('content')

        <div class="cart-table-area section-padding-100">

            <div class="container-fluid">

                <div class="row">
                    @if(Session::has('fail'))
                    <div class="col-12 col-lg-12 mb-30">
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Login gagal!</strong> periksa kembali email atau password anda
                        </div>
                    </div>
                    @elseif(Session::has('register'))
                    <div class="col-12 col-lg-12 mb-30">
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Registrasi berhasil!</strong> silahkan masuk dengan email dan password anda
                        </div>
                    </div>
                    @endif

                    <div class="col-12 col-lg-12">

                        <div class="checkout_details_area mt-50 clearfix">
                            

                            <div class="cart-title">
                                <h2>Login</h2>
                            </div>

                            <form action="/do_login" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <p>Masuk untuk melakukan transaksi</p>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="password" class="form-control" id="email" name="password" placeholder="Password" autocomplete="off" required>
                                    </div>
                                    <div class="col-md-8 mb-4">
                                        
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="cart-btn mt-4 mb-3">
                                            <button type="submit" class="btn amado-btn w-100">Login</button>
                                        </div>
                                        <p>Belum punya akun? <a class="belum" href="/daftar">Daftar</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection