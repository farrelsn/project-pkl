<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_laporan_pemakaian_barang extends Model
{
    use HasFactory;
    protected $table = 'tb_laporan_pemakaian_barang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tanggal_keluar',
        'nama_barang',
        'kategori_barang',
        'stok_awal',
        'stok_akhir',
        'jumlah',
        'satuan',
    ];
}
