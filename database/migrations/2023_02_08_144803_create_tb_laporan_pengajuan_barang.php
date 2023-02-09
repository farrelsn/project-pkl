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
        Schema::create('tb_laporan_pengajuan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_masuk');
            $table->string('nama_barang');
            $table->unsignedInteger('stok_akhir');
            $table->unsignedInteger('qtydus');
            $table->unsignedInteger('satuan_isi');
            $table->unsignedInteger('harga');
            $table->unsignedInteger('total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_laporan_pengajuan');
    }
};
