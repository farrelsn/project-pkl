<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_pemakaian_barang extends Model
{
    use HasFactory;
    protected $table = 'tb_pemakaian_barang';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nama_barang',
        'kategori_barang',
        //'stok_awal',
        'jumlah',
        //'stok_akhir',
        'tanggal_keluar',
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
