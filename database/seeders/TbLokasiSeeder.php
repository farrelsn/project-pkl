<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TbLokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_lokasi')->insert([
            'nama_lokasi' => 'Ruang Meeting'
        ]);

        DB::table('tb_lokasi')->insert([
            'nama_lokasi' => 'Ruang Security'
        ]);
    }
}
