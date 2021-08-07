<?php

//use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth','checkRole:user']], function() {
	//keranjang
	Route::get('/keranjang','KeranjangController@index');
	Route::post('/postkeranjang/{id}','KeranjangController@store');
	Route::post('/keranjang/edit/{id}','KeranjangController@edit');
	Route::get('/keranjang/hapus/{id}','KeranjangController@destroy');

	//pesanan
	Route::get('/pesanan','PesananController@pesanan');
	Route::get('/pesanan/detail/{kode_pesanan}','PesananController@detail');
	Route::get('/pesanan/bayar/{id}','PesananController@bayar_pesanan');
	Route::get('/pesanan/diterima/{id}','PesananController@diterima');
	Route::post('/pesanan/detail/batal/{id}','PesananController@batal');


	Route::get('/checkout','PesananController@index');
	Route::post('/bayar','PesananController@bayar');
	Route::post('/upload-bayar/{id}','PesananController@upload');
	Route::get('/norek',function(){
			return view('norek');
	});

	Route::get('/akun','FrontendController@akun');
	Route::get('/akun/edit/{id}','FrontendController@edit');
	Route::post('/akun/update/{id}','FrontendController@update');


	Route::get('/logout', 'AuthController@logout');
});


// Frontend
Route::get('/','FrontendController@produk');
Route::get('/detail-produk/{id}','FrontendController@detail_produk');

//daftar & login
Route::get('/daftar', 'UserController@create');
Route::post('/postdaftar','UserController@store');

Route::get('login', function() {
    if (Auth::check()){
        return redirect('/');
    }
    else{
        return view('login');
    }
})->name('login');
Route::post('/do_login', 'AuthController@do_login');



Route::group(['middleware' => ['auth','checkRole:admin']], function() {
	// Backend //
	//produk
	Route::get('/dashboard','BackendController@dashboard');

	Route::get('/produk','ProdukController@index');
	Route::get('/produk/tambah-produk','ProdukController@create');
	Route::post('/post-produk','ProdukController@store');
	Route::post('/update-produk/{id}','ProdukController@update');
	Route::get('/produk/edit/{id}','ProdukController@edit');
	Route::get('/produk/hapus/{id}','ProdukController@destroy');

	Route::get('/data-pesanan','BackendController@index');
	Route::get('/data-pesanan/detail/{id}','BackendController@detail');
	Route::post('/data-pesanan/detail/konfir/{id}','BackendController@konfirbukti');
	Route::post('/data-pesanan/detail/batal/{id}','BackendController@batal');

	Route::get('/data-pesanan/belum-dibayar','BackendController@belum_dibayar');
	Route::get('/data-pesanan/menunggu-konfirmasi','BackendController@konfirmasi');
	Route::get('/data-pesanan/sedang-dikirim','BackendController@dikirim');
	Route::get('/data-pesanan/dibatalkan','BackendController@dibatalkan');
	Route::get('/data-pesanan/selesai','BackendController@selesai');

	Route::get('/logoutadmin', 'AuthController@logoutadmin');
});

Route::get('/wp-admin', function() {
    if (Auth::check()){
        return redirect('/data-pesanan');
    }
    else{
        return view('admin.login');
    }

})->name('wpadmin');

Route::post('/postadmin', 'AuthController@postadmin');










