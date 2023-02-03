<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_detail_alat extends Model
{
    use HasFactory;
    protected $table = 'tb_detail_alat';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_detail_alat',
        'id_daftar_alat',
    ];
}
