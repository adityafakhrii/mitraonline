<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produks';
    protected $fillable = ['id','nama_produk','harga','deskripsi','status','stok','img'];

    public function detail_pesanan(){
    	return $this->hasMany('App\Models\Detail_transaksi','id_produk');
    }
}
