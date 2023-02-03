<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_kategori_barang extends Model
{
    use HasFactory;
    protected $table = 'tb_kategori_barang';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'kategori_barang',
    ];
}
