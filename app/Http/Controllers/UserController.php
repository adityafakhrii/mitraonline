<?php

namespace App\Http\Controllers;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index()
    {
        //
    }

    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $user = new User;
        $img = '';
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama = $gambar->getClientOriginalName();
            $gambar->move(public_path().'/profil_user/',$nama);
            $img = '/profil_user/'.$nama;
        }
        $user->foto = $img;
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->kode_pos = $request->kode_pos;
        $user->alamat = $request->alamat;
        $user->role = 'user';
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/login')->with('register','Data berhasil ditambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
