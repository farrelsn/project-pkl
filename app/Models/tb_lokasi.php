<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_lokasi extends Model
{
    use HasFactory;
    protected $table = 'tb_lokasi';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nama_lokasi'
    ];
}
