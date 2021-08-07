<?php

namespace App\Http\Controllers;
use App\Models\Detail_pesanan;
use App\Models\User;
use App\Models\Produk;
use Illuminate\Http\Request;
use Session;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjang = Detail_pesanan::where('status','=','keranjang')
            ->where('id_user','=',auth()->user()->id)
            ->get();
        $produk = Produk::all();

        return view('cart',compact('keranjang','produk'));
    }

    public function store(Request $request,$id)
    {
        $cart = Detail_pesanan::all();
        // compact('cart');

        if (Detail_pesanan::where('id_produk','=',$request->id_produk) == $request->id_produk) {
            $keranjang = Detail_pesanan::where('id_produk', $request->id_produk);
            $keranjang->update([
            'qty' => $request->qty,
            ]);

            return redirect('keranjang')->with('sukses','Data berhasil diubah');
        }else{
            $keranjang = new Detail_pesanan;
            $keranjang->id_pesanan = NULL;
            $keranjang->id_produk = $request->id_produk;
            $keranjang->id_user = $request->id_user;
            $keranjang->qty = $request->qty;
            $keranjang->status = 'keranjang';
            $keranjang->save();

            Session::put('cart','Keranjang kosong');
            return redirect('/')->with('keranjang','Berhasil dimasukkan ke keranjang');   
        }

        
    }

    public function edit(Request $request, $id)
    {
        $keranjang = Detail_pesanan::find($id);
        $keranjang->qty = $request->qty;
        $keranjang->update();

        return redirect('keranjang')->with('sukses','Data berhasil diubah');
    }

    public function destroy($id)
    {
        $keranjang = Detail_pesanan::find($id);
        $keranjang->delete();

        Session::forget('keranjang');

        return redirect('keranjang')->with('sukses','Data berhasil dihapus');
    }
}
