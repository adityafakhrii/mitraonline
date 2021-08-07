<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pesanan', 16);
            $table->unsignedBigInteger('id_user');
            $table->string('tgl',20);
            $table->string('resi',20)->nullable();
            $table->integer('total_harga');
            $table->integer('ongkir');
            $table->text('catatan')->nullable();
            $table->enum('status',['belum_dibayar','dikemas','dikirim','selesai','dibatalkan']);
            $table->text('bukti');
            $table->timestamps();
        });
        Schema::table('pesanans', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
}
