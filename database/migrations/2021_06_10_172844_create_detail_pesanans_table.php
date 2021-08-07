<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pesanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pesanan')->nullable();
            $table->unsignedBigInteger('id_produk');
            $table->unsignedBigInteger('id_user');
            $table->double('qty');
            $table->enum('status',['keranjang','dipesan']);
            $table->timestamps();
        });
        Schema::table('detail_pesanans', function (Blueprint $table) {
            $table->foreign('id_produk')->references('id')->on('produks');    
            $table->foreign('id_user')->references('id')->on('users');    
            $table->foreign('id_pesanan')->references('id')->on('pesanans');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pesanans');
    }
}
