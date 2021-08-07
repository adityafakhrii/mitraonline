<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function produk()
    {
        $produk = Produk::all();
        return view('index',compact('produk'));
    }
    
    public function detail_produk($id)
    {
        $produk = Produk::find($id);
        return view('product-details',compact('produk'));
    }

    public function akun()
    {
        // $user = User::find($id);
        return view('akun');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('edit-akun',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->nama = $request->nama;
        $user->alamat = $request->alamat;
        $user->kode_pos = $request->kode_pos;
        $user->no_hp = $request->no_hp;
        $user->email = $request->email;
        $user->save();

        return redirect('/akun')->with('akun','Akun berhasil diubah');
    }
}
