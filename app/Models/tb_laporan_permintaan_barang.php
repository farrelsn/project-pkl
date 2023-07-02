<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_laporan_permintaan_barang extends Model
{
    use HasFactory;
    protected $table = 'tb_laporan_permintaan_barang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tanggal_masuk',
        'nama_barang',
        'stok_awal',
        'stok_akhir',
        'jumlah',
        'qtydus',
        'kategori_barang',
        'harga',
        'total'
    ];
}
