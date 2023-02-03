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
            'stok' => '119',
            'kategori_barang' => 'ATK',
            'kode_barang' => '0001',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Amplop Coklat 1/2 Folio',
            'stok' => '106',
            'kategori_barang' => 'ATK',
            'kode_barang' => '0002',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Amplop Coklat F4',
            'stok' => '0',
            'kategori_barang' => 'ATK',
            'kode_barang' => '0003',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Amplop coklat besar',
            'stok' => '0',
            'kategori_barang' => 'ATK',
            'kode_barang' => '0004',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Amplop Putih Kecil',
            'stok' => '0',
            'kategori_barang' => 'ATK',
            'kode_barang' => '0005',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Amplop Putih Besar',
            'stok' => '0',
            'kategori_barang' => 'ATK',
            'kode_barang' => '0006',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Batere A2 Alkaline',
            'stok' => '0',
            'kategori_barang' => 'ATK',
            'kode_barang' => '0007',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Bukti Penerimaan Khas Merah',
            'stok' => '0',
            'kategori_barang' => 'ATK',
            'kode_barang' => '0008',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Bukti Penerimaan Khas Hijau',
            'stok' => '0',
            'kategori_barang' => 'ATK',
            'kode_barang' => '0009',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Buku Kwitansi',
            'stok' => '0',
            'kategori_barang' => 'ATK',
            'kode_barang' => '0010',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Buku Kwitansi Panjang',
            'stok' => '0',
            'kategori_barang' => 'ATK',
            'kode_barang' => '0011',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Buku Tanda Terima',
            'stok' => '0',
            'kategori_barang' => 'ATK',
            'kode_barang' => '0012',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Buku Tulis Kecil',
            'stok' => '0',
            'kategori_barang' => 'ATK',
            'kode_barang' => '0013',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Buku Tulis Folio Kecil',
            'stok' => '0',
            'kategori_barang' => 'ATK',
            'kode_barang' => '0014',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Buku Tulis Folio 1/2 Halaman',
            'stok' => '0',
            'kategori_barang' => 'ATK',
            'kode_barang' => '0015',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Buku Folio Besar',
            'stok' => '0',
            'kategori_barang' => 'ATK',
            'kode_barang' => '0016',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Isi Staples Besar',
            'stok' => '0',
            'kategori_barang' => 'ATK',
            'kode_barang' => '0017',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Isi Staples Kecil',
            'stok' => '0',
            'kategori_barang' => 'ATK',
            'kode_barang' => '0018',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Karet Gelang',
            'stok' => '0',
            'kategori_barang' => 'ATK',
            'kode_barang' => '0019',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Kertas Fax',
            'stok' => '0',
            'kategori_barang' => 'ATK',
            'kode_barang' => '0020',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Kertas F4',
            'stok' => '0',
            'kategori_barang' => 'ATK',
            'kode_barang' => '0021',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Kertas A4',
            'stok' => '0',
            'kategori_barang' => 'ATK',
            'kode_barang' => '0022',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Kertas Continuous form',
            'stok' => '0',
            'kategori_barang' => 'ATK',
            'kode_barang' => '0023',
        ]);

        
        DB::table('tb_barang')->insert([
            'nama_barang' => 'Kertas HVS',
            'stok' => '0',
            'kategori_barang' => 'ATK',
            'kode_barang' => '0024',
        ]);
    }
}
