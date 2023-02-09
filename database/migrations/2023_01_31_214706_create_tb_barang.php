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
        Schema::create('tb_barang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->nullable()->unique();
            $table->foreignId('kategori_barang')->references('id')->on('tb_kategori_barang')->onDelete('cascade')->onUpdate('cascade');
            //$table->foreignId('lokasi')->constrained('tb_lokasi')->onDelete('cascade');
            $table->string('nama_barang');
            //$table->string('kategori_barang');
            //$table->enum('lantai',['1','2'])->nullable();
            $table->unsignedInteger('stok')->default(0);
            $table->unsignedInteger('harga_lama')->default(0);
            $table->unsignedInteger('harga_baru')->default(0);
            $table->unsignedInteger('qtydus')->default(0);
            $table->foreignId('satuan')->references('id')->on('tb_satuan')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('tb_barang');
    }
};
