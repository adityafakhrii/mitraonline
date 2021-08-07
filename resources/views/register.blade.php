@extends('layouts.master')
<title>Daftar Akun</title>
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
                            <li><a href="/login"></i>Login</a></li>
                            <li class="active"><a href="/daftar"></i>Register</a></li>
                        @endauth
                    @endif
@endsection

@section('content')
        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Daftar Akun</h2>
                            </div>

                            <form action="/postdaftar" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <p>Profil Pengguna</p>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="file" class="form-control" id="file" name="gambar" value="">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" id="name" name="nama" placeholder="Nama Lengkap" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username (tidak dapat diubah)" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" id="street_address" name="alamat" placeholder="Alamat Lengkap" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="zipCode" name="kode_pos" placeholder="Kode Pos" required>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <input type="number" class="form-control" id="phone_number" name="no_hp" min="0" placeholder="No. Telepon" required>
                                    </div>
                                    <div class="col-12">
                                        <p>Data Akun</p>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="password" class="form-control" id="email" name="password" placeholder="Password" required>
                                    </div>
                                    <div class="col-md-8 mb-4">
                                        
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="cart-btn mt-4">
                                            <button type="submit" class="btn amado-btn w-100">Daftar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection