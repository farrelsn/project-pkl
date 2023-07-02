<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TbBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_barang')->insert([
            'nama_barang' => 'Amplop Coklat Kecil',
            'stok' => '113',
            'kategori_barang' => '1',
            'kode_barang' => '01.001',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Amplop Coklat 1/2 Folio',
            'stok' => '37',
            'kategori_barang' => '1',
            'kode_barang' => '01.002',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Amplop Coklat F4',
            'stok' => '119',
            'kategori_barang' => '1',
            'kode_barang' => '01.003',
            'qtydus' => '200',
            'harga_baru' => '40000',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Amplop Coklat Besar',
            'stok' => '41',
            'kategori_barang' => '1',
            'kode_barang' => '01.004',
            'harga_baru' => '10000',
            'qtydus' => '50',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Amplop Putih Kecil',
            'stok' => '0',
            'kategori_barang' => '1',
            'kode_barang' => '01.005',
            'harga_baru' => '20000',
            'qtydus' => '300',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Amplop Putih Besar',
            'stok' => '32',
            'kategori_barang' => '1',
            'harga_baru' => '25000',
            'kode_barang' => '01.006',
            'qtydus' => '100',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Isi Staples Besar',
            'stok' => '10',
            'kategori_barang' => '1',
            'kode_barang' => '01.007',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Isi Staples Kecil',
            'stok' => '33',
            'kategori_barang' => '1',
            'kode_barang' => '01.008',
            'harga_baru' => '30000',
            'qtydus' => '60',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Batere A2 Alkaline',
            'stok' => '3',
            'kategori_barang' => '2',
            'kode_barang' => '02.001',
            'harga_baru' => '12000',
            'qtydus' => '6',
        ]);

    }
}
