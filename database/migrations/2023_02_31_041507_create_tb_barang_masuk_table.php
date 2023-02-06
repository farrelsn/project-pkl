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
        Schema::create('tb_barang_masuk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nama_barang')->references('id')->on('tb_barang')->onDelete('cascade')->onUpdate('cascade');
            //$table->string('kode_barang')->nullable();
            //$table->string('nama_barang');
            $table->foreignId('kategori_barang')->references('id')->on('tb_kategori_barang')->onDelete('cascade')->onUpdate('cascade');
            // $table->string('kategori_barang');
            $table->unsignedInteger('stok_awal');
            $table->unsignedInteger('jumlah_barang');
            $table->unsignedInteger('stok_akhir');
            //$table->string('pemakai');
            // $table->string('keterangan')->nullable();
            
            $table->date('tanggal_masuk');
        });
    }

    /** 
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_barang_masuk');
    }
};
