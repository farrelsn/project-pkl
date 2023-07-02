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
        Schema::create('tb_laporan_pemakaian_barang', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_keluar');
            $table->string('nama_barang');
            $table->string('kategori_barang');
            $table->unsignedInteger('stok_awal');
            $table->unsignedInteger('stok_akhir');
            $table->unsignedInteger('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_laporan_pemakaian_barang');
    }
};
