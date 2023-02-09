<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_pengajuan_barang extends Model
{
    use HasFactory;
    protected $table = 'tb_pengajuan_barang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_barang',
        'tanggal_masuk',
        'qtydus',
        'satuan_isi',
        'harga',
    ];
    public $timestamps = false;

    public function barang(){
        return $this->belongsTo(tb_barang::class, 'nama_barang', 'id');
    }

    // public function rupiah($nilai)
    // {
    //     return "Rp. " . number_format($nilai, 2, ',', '.');
    // }
}
