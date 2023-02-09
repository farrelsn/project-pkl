<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TbSatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_satuan')->insert([
            'nama_satuan' => 'pcs',
        ]);

        DB::table('tb_satuan')->insert([
            'nama_satuan' => 'dus',
        ]);

        DB::table('tb_satuan')->insert([
            'nama_satuan' => 'set',
        ]);

        DB::table('tb_satuan')->insert([
            'nama_satuan' => 'rim',
        ]);
    }
}
