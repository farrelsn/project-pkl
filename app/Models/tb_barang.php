<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_barang extends Model
{
    use HasFactory;
    protected $table = 'tb_barang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'stok',
        'kategori_barang',
        'harga_lama',
        'harga_baru',
        'qtydus',
        'satuan',
    ];

    public function kategori()
    {
        return $this->belongsTo(tb_kategori_barang::class, 'kategori_barang', 'id');
    }

    public function satuan()
    {
        return $this->belongsTo(tb_satuan::class, 'satuan', 'id');
    }

    public function rupiah($nilai)
    {
        return "Rp. " . number_format($nilai, 2, ',', '.');
    }
}
