<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_daftar_alat extends Model
{
    use HasFactory;
    protected $table = 'tb_daftar_alat';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_daftar_alat',
    ];
}
