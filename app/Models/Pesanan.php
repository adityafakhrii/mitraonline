<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanans';
    protected $fillable = ['kode_pesanan','id_user','tgl','resi','total_harga','ongkir','catatan','status','bukti'];

    public function pesanan(){
    	return $this->hasMany('App\Models\Pesanan','id_pesanan');
    }

    public function user(){	
    	return $this->belongsTo('App\Models\User','id_user');
    }
}
