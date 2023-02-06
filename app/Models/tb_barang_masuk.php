<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_barang_masuk extends Model
{
    use HasFactory;
    protected $table = 'tb_barang_masuk';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nama_barang',
        'kategori_barang',
        'stok_awal',
        'jumlah_barang',
        'stok_akhir',
        'tanggal_masuk',
        //'keterangan',
    ];

    public function barang()
    {
        return $this->belongsTo(tb_barang::class, 'nama_barang', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(tb_kategori_barang::class, 'kategori_barang', 'id');
    }

    
}
