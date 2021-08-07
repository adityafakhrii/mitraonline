<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('admin/products-list',compact('produk'));
    }
    
    public function create()
    {
        return view('/admin/products-form');
    }

    public function store(Request $request)
    {
        $produk = new Produk;
        $img = '';
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama = $gambar->getClientOriginalName();
            $gambar->move(public_path().'/img/',$nama);
            $img = '/img/'.$nama;
        }
        $produk->img = $img;
        $produk->nama_produk = $request->nama_produk;
        $produk->deskripsi = $request->deskripsi;
        $produk->harga = $request->harga;
        
        if ($request->stok == 0) {
            $produk->status = 'Habis';
            $produk->stok = 0;
        }else{
            $produk->status = 'Tersedia';
            $produk->stok = $request->stok;
        }

        $produk->save();
        return redirect('/produk')->with('sukses','Produk berhasil ditambahkan');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $produk = Produk::find($id);
        return view('admin.products-edit',compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);
        $img = '';
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama = $gambar->getClientOriginalName();
            $gambar->move(public_path().'/img/',$nama);
            $img = '/img/'.$nama;
        }
        $produk->img = $img;
        $produk->nama_produk = $request->nama_produk;
        $produk->deskripsi = $request->deskripsi;
        $produk->harga = $request->harga;
        
        if ($request->stok == 0) {
            $produk->status = 'Habis';
            $produk->stok = 0;
        }else{
            $produk->status = 'Tersedia';
            $produk->stok = $request->stok;
        }

        $produk->save();
        return redirect('/produk');
    }
    
    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk->delete();
        return redirect('/produk');
    }
}
