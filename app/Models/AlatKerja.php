<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlatKerja extends Model
{
    use HasFactory;
    protected $table = 'alat_kerja';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_alat_kerja',
        'jumlah',
        'id_jenis_alat',
    ];

}
