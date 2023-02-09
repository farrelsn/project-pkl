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
            'qtydus' => '100',
            'harga_baru' => '40000',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Amplop Coklat F4',
            'stok' => '119',
            'kategori_barang' => '1',
            'kode_barang' => '01.003',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Amplop Coklat Besar',
            'stok' => '103',
            'kategori_barang' => '1',
            'kode_barang' => '01.004',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Amplop Putih Kecil',
            'stok' => '0',
            'kategori_barang' => '1',
            'kode_barang' => '01.005',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Amplop Putih Besar',
            'stok' => '32',
            'kategori_barang' => '1',
            'kode_barang' => '01.006',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Batere A2 Alkaline',
            'stok' => '3',
            'kategori_barang' => '1',
            'kode_barang' => '01.007',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Bukti Penerimaan Khas Merah',
            'stok' => '13',
            'kategori_barang' => '1',
            'kode_barang' => '01.008',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Bukti Penerimaan Khas Hijau',
            'stok' => '13',
            'kategori_barang' => '1',
            'kode_barang' => '01.009',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Buku Kwitansi',
            'stok' => '8',
            'kategori_barang' => '1',
            'kode_barang' => '01.010',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Buku Kwitansi Panjang',
            'stok' => '6',
            'kategori_barang' => '1',
            'kode_barang' => '01.011',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Buku Tanda Terima',
            'stok' => '21',
            'kategori_barang' => '1',
            'kode_barang' => '01.012',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Buku Tulis Kecil',
            'stok' => '3',
            'kategori_barang' => '1',
            'kode_barang' => '01.013',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Buku Tulis Folio Kecil',
            'stok' => '2',
            'kategori_barang' => '1',
            'kode_barang' => '01.014',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Buku Tulis Folio 1/2 Halaman',
            'stok' => '1',
            'kategori_barang' => '1',
            'kode_barang' => '01.015',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Buku Folio Besar',
            'stok' => '4',
            'kategori_barang' => '1',
            'kode_barang' => '01.016',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Isi Staples Besar',
            'stok' => '10',
            'kategori_barang' => '1',
            'kode_barang' => '01.017',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Isi Staples Kecil',
            'stok' => '33',
            'kategori_barang' => '1',
            'kode_barang' => '01.018',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Karet Gelang',
            'stok' => '1',
            'kategori_barang' => '1',
            'kode_barang' => '01.019',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Kertas Fax',
            'stok' => '3',
            'kategori_barang' => '1',
            'kode_barang' => '01.020',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Kertas F4',
            'stok' => '1',
            'kategori_barang' => '1',
            'kode_barang' => '01.021',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Kertas A4',
            'stok' => '0',
            'kategori_barang' => '1',
            'kode_barang' => '01.022',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Kertas Continuous form',
            'stok' => '0',
            'kategori_barang' => '1',
            'kode_barang' => '01.023',
        ]);

        
        DB::table('tb_barang')->insert([
            'nama_barang' => 'Kwitansi Panjang',
            'stok' => '5',
            'kategori_barang' => '1',
            'kode_barang' => '01.024',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Kwitansi Pendek',
            'stok' => '10',
            'kategori_barang' => '1',
            'kode_barang' => '01.025',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Label Tom & Jerry',
            'stok' => '5',
            'kategori_barang' => '1',
            'kode_barang' => '01.026',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Lakban Putih Besar',
            'stok' => '0',
            'kategori_barang' => '1',
            'kode_barang' => '01.027',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Lakban Putih Kecil',
            'stok' => '0',
            'kategori_barang' => '1',
            'kode_barang' => '01.028',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Lakban Putih Sedang',
            'stok' => '7',
            'kategori_barang' => '1',
            'kode_barang' => '01.029',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Lem Stick',
            'stok' => '14',
            'kategori_barang' => '1',
            'kode_barang' => '01.030',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Paper Clips (Triagonal CLips)',
            'stok' => '3',
            'kategori_barang' => '1',
            'kode_barang' => '01.031',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Paper Clips (Triagonal CLips) Besar',
            'stok' => '1',
            'kategori_barang' => '1',
            'kode_barang' => '01.032',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Pensil Tukang',
            'stok' => '5',
            'kategori_barang' => '1',
            'kode_barang' => '01.033',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Pita Printer LQ 2190',
            'stok' => '1',
            'kategori_barang' => '1',
            'kode_barang' => '01.034',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Pita Printer LX 300',
            'stok' => '2',
            'kategori_barang' => '1',
            'kode_barang' => '01.035',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Post It Berantai',
            'stok' => '3',
            'kategori_barang' => '1',
            'kode_barang' => '01.036',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Pulpen Faster',
            'stok' => '23',
            'kategori_barang' => '1',
            'kode_barang' => '01.037',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Spidol Hitam Kecil',
            'stok' => '5',
            'kategori_barang' => '1',
            'kode_barang' => '01.038',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Spidol Hitam Besar',
            'stok' => '7',
            'kategori_barang' => '1',
            'kode_barang' => '01.039',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Stabillo',
            'stok' => '17',
            'kategori_barang' => '1',
            'kode_barang' => '01.040',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Straples Kecil',
            'stok' => '1',
            'kategori_barang' => '1',
            'kode_barang' => '01.041',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Tip-X',
            'stok' => '7',
            'kategori_barang' => '1',
            'kode_barang' => '01.042',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Map Plastik L',
            'stok' => '4',
            'kategori_barang' => '1',
            'kode_barang' => '01.043',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Map Kertas',
            'stok' => '5',
            'kategori_barang' => '1',
            'kode_barang' => '01.044',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Plastik BPKB Besar (30x45)',
            'stok' => '3',
            'kategori_barang' => '1',
            'kode_barang' => '01.045',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Plastik BPKB Kecil (15x30)',
            'stok' => '6',
            'kategori_barang' => '1',
            'kode_barang' => '01.046',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Streples Besar',
            'stok' => '0',
            'kategori_barang' => '1',
            'kode_barang' => '01.047',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Map Plastik Tali',
            'stok' => '3',
            'kategori_barang' => '1',
            'kode_barang' => '01.048',
        ]);

    }
}
