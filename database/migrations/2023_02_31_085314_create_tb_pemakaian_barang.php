<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pemakaian_barang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nama_barang')->references('id')->on('tb_barang')->onDelete('cascade')->onUpdate('cascade');
            // $table->string('kode_barang')->nullable();
            // $table->string('nama_barang');
            $table->foreignId('kategori_barang')->references('id')->on('tb_kategori_barang')->onDelete('cascade')->onUpdate('cascade');
            //$table->string('kategori_barang');
            $table->string('jumlah');
            $table->string('tanggal_keluar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pemakaian_barang');
    }
};
