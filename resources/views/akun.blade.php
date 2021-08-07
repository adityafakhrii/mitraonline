@extends('layouts.master')
<title>Akun - {{auth()->user()->nama}}</title>
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
                            <li class="active"><a href="/akun">Akun</a></li>
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
                            <h5>Data Akun <a class="btn btn-sm btn-warning float-right" href="/akun/edit/{{auth()->user()->id}}"><i class="fa fa-edit"></i> Ubah Data</a></h5>
                            <ul class="summary-table">
                                <li>
                                    <a class="gallery_img" href="{{auth()->user()->foto}}">
                                            <img width="200" style="cursor: zoom-in;" class="d-block" src="{{auth()->user()->foto}}" alt="">
                                        </a></li>
                                <li><span>Nama Lengkap  :</span><span>{{ auth()->user()->nama }}</span></li>
                                <li><span>Username      :</span><span>{{ auth()->user()->username }}</span></li>
                                <li><span>Email         :</span><span>{{ auth()->user()->email }}</span></li>
                                <li><span>Alamat        :</span> <span>{{ auth()->user()->alamat }}</span></li>
                                <li><span>Kode Pos      :</span> <span>{{ auth()->user()->kode_pos }}</span></li>
                                <li><span>No. HP        :</span> <span>{{ auth()->user()->no_hp }}</span></li>
                                <li><span>Akun dibuat pada       :</span> <span>{{ auth()->user()->created_at }}</span></li></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection