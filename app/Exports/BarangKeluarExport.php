<?php

namespace App\Exports;

use App\Models\tb_barang_keluar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BarangKeluarExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return tb_barang_keluar::select('nama_barang','kategori_barang','stok_awal','jumlah_barang','stok_akhir','pemakai','lokasi','tanggal_keluar')->get();
    }

    public function headings(): array
    {
        return [
            'Nama Barang',
            'Kategori Barang',
            'Stok Awal',
            'Jumlah Barang',
            'Stok Akhir',
            'Pemakai',
            'Lokasi',
            'Tanggal Keluar',
        ];
    }
}
