<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_pesanan extends Model
{
    use HasFactory;
    protected $table = 'detail_pesanans';
    protected $fillable = ['id_pesanan','id_produk','id_user','qty','status'];

    public function pesanan(){
    	return $this->belongsTo('App\Models\Pesanan','id_pesanan');
    }

    public function produk(){
    	return $this->belongsTo('App\Models\Produk','id_produk');
    }

    public function user(){
    	return $this->belongsTo('App\Models\User','id_user');
    }
}
