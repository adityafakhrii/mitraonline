@extends('layouts.master')
<title>Edit Akun - {{auth()->user()->nama}}</title>
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
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Ubah Profil Akun<a class="btn btn-sm btn-outline-secondary float-right" href="/akun"><i class="fa fa-angle-left"></i> Kembali</a></h2>
                            </div>

                            <form action="/akun/update/{{$user->id}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <p>Profil Pengguna</p>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" id="name" name="nama" placeholder="Nama Lengkap" value="{{ auth()->user()->nama }}" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" id="street_address" name="alamat" placeholder="Alamat Lengkap" value="{{ auth()->user()->alamat }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="zipCode" name="kode_pos" placeholder="Kode Pos" value="{{ auth()->user()->kode_pos }}" required>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <input type="number" class="form-control" id="phone_number" name="no_hp" min="0" value="{{ auth()->user()->no_hp }}" placeholder="No. Telepon" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ auth()->user()->email }}" required>
                                    </div>
                                    <div class="col-md-8 mb-4">
                                        
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="cart-btn mt-4">
                                            <button type="submit" class="btn amado-btn w-100">Ubah</button>
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