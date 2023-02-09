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
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Amplop Coklat 1/2 Folio',
            'stok' => '37',
            'kategori_barang' => '1',
            'kode_barang' => '01.002',
            'satuan' => '100',
            'harga_baru' => '40000',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Amplop Coklat F4',
            'stok' => '119',
            'kategori_barang' => '1',
            'kode_barang' => '01.003',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Amplop Coklat Besar',
            'stok' => '41',
            'kategori_barang' => '1',
            'kode_barang' => '01.004',
            'satuan' => '100',
            'harga_baru' => '10000',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Amplop Putih Kecil',
            'stok' => '0',
            'kategori_barang' => '1',
            'kode_barang' => '01.005',
            'satuan' => '300',
            'harga_baru' => '20000',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Amplop Putih Besar',
            'stok' => '32',
            'kategori_barang' => '1',
            'kode_barang' => '01.006',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Batere A2 Alkaline',
            'stok' => '3',
            'kategori_barang' => '1',
            'kode_barang' => '01.007',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Bukti Penerimaan Khas Merah',
            'stok' => '13',
            'kategori_barang' => '1',
            'kode_barang' => '01.008',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Bukti Penerimaan Khas Hijau',
            'stok' => '13',
            'kategori_barang' => '1',
            'kode_barang' => '01.009',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Buku Kwitansi',
            'stok' => '8',
            'kategori_barang' => '1',
            'kode_barang' => '01.010',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Buku Kwitansi Panjang',
            'stok' => '6',
            'kategori_barang' => '1',
            'kode_barang' => '01.011',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Buku Tanda Terima',
            'stok' => '21',
            'kategori_barang' => '1',
            'kode_barang' => '01.012',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Buku Tulis Kecil',
            'stok' => '3',
            'kategori_barang' => '1',
            'kode_barang' => '01.013',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Buku Tulis Folio Kecil',
            'stok' => '2',
            'kategori_barang' => '1',
            'kode_barang' => '01.014',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Buku Tulis Folio 1/2 Halaman',
            'stok' => '1',
            'kategori_barang' => '1',
            'kode_barang' => '01.015',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Buku Folio Besar',
            'stok' => '4',
            'kategori_barang' => '1',
            'kode_barang' => '01.016',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Isi Staples Besar',
            'stok' => '10',
            'kategori_barang' => '1',
            'kode_barang' => '01.017',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Isi Staples Kecil',
            'stok' => '33',
            'kategori_barang' => '1',
            'kode_barang' => '01.018',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Karet Gelang',
            'stok' => '1',
            'kategori_barang' => '1',
            'kode_barang' => '01.019',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Kertas Fax',
            'stok' => '3',
            'kategori_barang' => '1',
            'kode_barang' => '01.020',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Kertas F4',
            'stok' => '1',
            'kategori_barang' => '1',
            'kode_barang' => '01.021',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Kertas A4',
            'stok' => '0',
            'kategori_barang' => '1',
            'kode_barang' => '01.022',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Kertas Continuous form',
            'stok' => '0',
            'kategori_barang' => '1',
            'kode_barang' => '01.023',
            'satuan' => '1',
        ]);

        
        DB::table('tb_barang')->insert([
            'nama_barang' => 'Kwitansi Panjang',
            'stok' => '5',
            'kategori_barang' => '1',
            'kode_barang' => '01.024',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Kwitansi Pendek',
            'stok' => '10',
            'kategori_barang' => '1',
            'kode_barang' => '01.025',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Label Tom & Jerry',
            'stok' => '5',
            'kategori_barang' => '1',
            'kode_barang' => '01.026',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Lakban Putih Besar',
            'stok' => '0',
            'kategori_barang' => '1',
            'kode_barang' => '01.027',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Lakban Putih Kecil',
            'stok' => '0',
            'kategori_barang' => '1',
            'kode_barang' => '01.028',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Lakban Putih Sedang',
            'stok' => '7',
            'kategori_barang' => '1',
            'kode_barang' => '01.029',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Lem Stick',
            'stok' => '14',
            'kategori_barang' => '1',
            'kode_barang' => '01.030',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Paper Clips (Triagonal CLips)',
            'stok' => '3',
            'kategori_barang' => '1',
            'kode_barang' => '01.031',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Paper Clips (Triagonal CLips) Besar',
            'stok' => '1',
            'kategori_barang' => '1',
            'kode_barang' => '01.032',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Pensil Tukang',
            'stok' => '5',
            'kategori_barang' => '1',
            'kode_barang' => '01.033',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Pita Printer LQ 2190',
            'stok' => '1',
            'kategori_barang' => '1',
            'kode_barang' => '01.034',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Pita Printer LX 300',
            'stok' => '2',
            'kategori_barang' => '1',
            'kode_barang' => '01.035',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Post It Berantai',
            'stok' => '3',
            'kategori_barang' => '1',
            'kode_barang' => '01.036',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Pulpen Faster',
            'stok' => '23',
            'kategori_barang' => '1',
            'kode_barang' => '01.037',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Spidol Hitam Kecil',
            'stok' => '5',
            'kategori_barang' => '1',
            'kode_barang' => '01.038',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Spidol Hitam Besar',
            'stok' => '7',
            'kategori_barang' => '1',
            'kode_barang' => '01.039',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Stabillo',
            'stok' => '17',
            'kategori_barang' => '1',
            'kode_barang' => '01.040',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Straples Kecil',
            'stok' => '1',
            'kategori_barang' => '1',
            'kode_barang' => '01.041',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Tip-X',
            'stok' => '7',
            'kategori_barang' => '1',
            'kode_barang' => '01.042',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Map Plastik L',
            'stok' => '4',
            'kategori_barang' => '1',
            'kode_barang' => '01.043',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Map Kertas',
            'stok' => '5',
            'kategori_barang' => '1',
            'kode_barang' => '01.044',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Plastik BPKB Besar (30x45)',
            'stok' => '3',
            'kategori_barang' => '1',
            'kode_barang' => '01.045',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Plastik BPKB Kecil (15x30)',
            'stok' => '6',
            'kategori_barang' => '1',
            'kode_barang' => '01.046',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Streples Besar',
            'stok' => '0',
            'kategori_barang' => '1',
            'kode_barang' => '01.047',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Map Plastik Tali',
            'stok' => '3',
            'kategori_barang' => '1',
            'kode_barang' => '01.048',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Sapu Lantai',
            'stok' => '3',
            'kategori_barang' => '4',
            'kode_barang' => '04.001',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Sapu Kain Mirip Pel',
            'stok' => '2',
            'kategori_barang' => '4',
            'kode_barang' => '04.002',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Sapu Lidi Musholla',
            'stok' => '1',
            'kategori_barang' => '4',
            'kode_barang' => '04.003',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Pel',
            'stok' => '1',
            'kategori_barang' => '4',
            'kode_barang' => '04.004',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Kontainer Tempat Kebersihan',
            'stok' => '1',
            'kategori_barang' => '4',
            'kode_barang' => '04.005',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Semprotan Air Pembersih Meja',
            'stok' => '3',
            'kategori_barang' => '4',
            'kode_barang' => '04.006',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Meja',
            'stok' => '1',
            'kategori_barang' => '4',
            'kode_barang' => '04.007',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Kursi',
            'stok' => '2',
            'kategori_barang' => '4',
            'kode_barang' => '04.008',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Kulkas',
            'stok' => '1',
            'kategori_barang' => '4',
            'kode_barang' => '04.009',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Piring Makan',
            'stok' => '5',
            'kategori_barang' => '4',
            'kode_barang' => '04.010',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Mangkok',
            'stok' => '6',
            'kategori_barang' => '4',
            'kode_barang' => '04.011',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Sendok',
            'stok' => '5',
            'kategori_barang' => '4',
            'kode_barang' => '04.012',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Gelas',
            'stok' => '12',
            'kategori_barang' => '4',
            'kode_barang' => '04.013',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Bak Sampah Lantai 1 & 2',
            'stok' => '18',
            'kategori_barang' => '4',
            'kode_barang' => '04.014',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Ember',
            'stok' => '2',
            'kategori_barang' => '4',
            'kode_barang' => '04.015',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Keset',
            'stok' => '8',
            'kategori_barang' => '4',
            'kode_barang' => '04.016',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Lap Tangan Wastafel',
            'stok' => '3',
            'kategori_barang' => '4',
            'kode_barang' => '04.017',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Tempat Sabun Wastafel',
            'stok' => '3',
            'kategori_barang' => '4',
            'kode_barang' => '04.018',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Lap Meja',
            'stok' => '3',
            'kategori_barang' => '4',
            'kode_barang' => '04.019',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Sajadah',
            'stok' => '11',
            'kategori_barang' => '4',
            'kode_barang' => '04.020',
            'satuan' => '1',
        ]);

        DB::table('tb_barang')->insert([
            'nama_barang' => 'Mukena',
            'stok' => '10',
            'kategori_barang' => '4',
            'kode_barang' => '04.021',
            'satuan' => '1',
        ]);

    }
}
