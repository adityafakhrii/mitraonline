<?php

namespace App\Http\Controllers;
use App\Models\Detail_pesanan;
use App\Models\Pesanan;
use App\Models\User;
use Str;
use Session;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $keranjang = Detail_pesanan::where('status','=','keranjang')
            ->where('id_user','=',auth()->user()->id)
            ->get();
        return view('checkout',compact('keranjang'));
    }

    public function detail($id)
    {
        $pesanan = Pesanan::find($id);

        $detail = Detail_pesanan::where('id_user','=',$pesanan->id_user)->where('id_pesanan','=',$pesanan->id)
            ->get();
        return view('detail-pesanan',compact('pesanan','detail'));
    }

    public function bayar(Request $request)
    {
    	$pesanan = new Pesanan;
        $pesanan->kode_pesanan = 'JRSY-'.str::random(6);
        $pesanan->id_user = auth()->user()->id;
        $pesanan->tgl = date('d-m-Y');
        $pesanan->resi = NULL;
        $pesanan->total_harga = $request->total_harga;
        $pesanan->ongkir = 20000;
        $pesanan->catatan = $request->catatan;
        $pesanan->status = 'belum_dibayar';

        $pesanan->save();
        

        // $request->request->add(['id_transaksi' => $transaksi->id]);
        Detail_pesanan::where('status', '=', 'keranjang')->where('id_user','=',auth()->user()->id)
                        ->update([
                            'status' => 'dipesan',
                            'id_pesanan' => $pesanan->id
                        ]);

        Session::put('kode',$pesanan->kode_pesanan);

        Session::forget('cart');

        return redirect('/pesanan')->with('pesanan','Transaksi berhasil dibuat');
    }

    public function batal(Request $request, $id)
    {
        
        $pesanan = Pesanan::where('id',$id);
        $pesanan->update([
            'status' => 'dibatalkan'
        ]);

        return redirect('pesanan');
    }

    public function pesanan()
    {
        $user = User::all();
        $pesanan = Pesanan::where('id_user','=',auth()->user()->id)
            ->get();
        return view('pesanan',compact('user','pesanan'));
    }

    public function bayar_pesanan($id)
    {
        $pesanan = Pesanan::find($id);
        return view('norek',compact('pesanan'));
    }

    public function upload(Request $request,$id)
    {
        $img = '';
        if ($request->hasFile('bukti')) {
            $bukti = $request->file('bukti');
            $nama = $bukti->getClientOriginalName();
            $bukti->move(public_path().'/bukti_transfer/',$nama);
            $img = '/bukti_transfer/'.$nama;
        }
        
        $pesanan = Pesanan::where('id',$id);
        $pesanan->update([
            'status' => 'dibayar',
            'bukti' => $img
        ]);
        return redirect('pesanan');
    }

    public function diterima(Request $request,$id)
    {
        $pesanan = Pesanan::where('id',$id);
        $pesanan->update([
            'status' => 'selesai'
        ]);
        return redirect('pesanan');
    }
}
