<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_pegawai extends Model
{
    use HasFactory;
    protected $table = 'tb_pegawai';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nama',
        'jabatan',
        'bagian',
        'departemen',
    ];

    public function id_jabatan()
    {
        return $this->belongsTo(tb_jabatan::class, 'jabatan', 'id');
    }
}
