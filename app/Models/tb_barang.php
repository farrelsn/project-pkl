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
    ];

    public function kategori()
    {
        return $this->belongsTo(tb_kategori_barang::class, 'kategori_barang', 'id');
    }
}
