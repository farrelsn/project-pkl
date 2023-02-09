<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TbKategoriBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_kategori_barang')->insert([
            'kategori_barang' => 'Alat Tulis Kantor',
        ]);

        DB::table('tb_kategori_barang')->insert([
            'kategori_barang' => 'Elektronik',
        ]);

        DB::table('tb_kategori_barang')->insert([
            'kategori_barang' => 'Furniture',
        ]);

        DB::table('tb_kategori_barang')->insert([
            'kategori_barang' => 'Pantry',
        ]);

        DB::table('tb_kategori_barang')->insert([
            'kategori_barang' => 'Alat Kebersihan',
        ]);

    
    }
}
