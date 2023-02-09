<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_laporan_pengajuan_barang extends Model
{
    use HasFactory;
    protected $table = 'tb_laporan_pengajuan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tanggal_masuk',
        'nama_barang',
        'stok_akhir',
        'qtydus',
        'satuan_isi',
        'harga',
        'total'
    ];
    public $timestamps = false;
}
