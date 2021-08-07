<?php

namespace App\Http\Controllers;
use App\Models\Detail_pesanan;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function dashboard()
    {
        $pesanan = Pesanan::whereNotIn('status', ['belum_dibayar'])->whereNotIn('status', ['dibatalkan']);
        $all = Pesanan::all();
        $produk = Produk::all();
        $user = User::whereNotIn('role',['admin']);
        return view('admin.dashboard',compact('user','pesanan','produk','all'));
    }

    public function index()
    {
        $pesanan = Pesanan::all()->sortByDesc('created_at');
        return view('admin.orders-list',compact('pesanan'));
    }

    public function detail($id)
    {
        $pesanan = Pesanan::find($id);

        $produk = Detail_pesanan::where('id_user','=',$pesanan->id_user)->where('id_pesanan','=',$pesanan->id)
            ->get();

        return view('admin.orders-detail',compact('pesanan','produk'));
    }

    public function konfirbukti(Request $request, $id)
    {
        
        $pesanan = Pesanan::where('id',$id);
        $pesanan->update([
            'resi' => $request->resi,
            'status' => 'dikirim'
        ]);

        return redirect('data-pesanan');
    }

    public function batal(Request $request, $id)
    {
        
        $pesanan = Pesanan::where('id',$id);
        $pesanan->update([
            'status' => 'dibatalkan'
        ]);

        return redirect('data-pesanan');
    }

    public function belum_dibayar()
    {
        $pesanan = Pesanan::where('status','=','belum_dibayar')->get();
        return view('admin.orders-list',compact('pesanan'));
    }

    public function konfirmasi()
    {
        $pesanan = Pesanan::where('status','=','dibayar')->get();
        return view('admin.orders-list',compact('pesanan'));
    }

    public function dikirim()
    {
        $pesanan = Pesanan::where('status','=','dikirim')->get();
        return view('admin.orders-list',compact('pesanan'));
    }

    public function dibatalkan()
    {
        $pesanan = Pesanan::where('status','=','dibatalkan')->get();
        return view('admin.orders-list',compact('pesanan'));
    }

    public function selesai()
    {
        $pesanan = Pesanan::where('status','=','selesai')->get();
        return view('admin.orders-list',compact('pesanan'));
    }

}
