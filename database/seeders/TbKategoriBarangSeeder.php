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
            'kategori_barang' => 'ATK',
        ]);

        DB::table('tb_kategori_barang')->insert([
            'kategori_barang' => 'Bukan ATK',
        ]);
    }
}
