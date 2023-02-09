<?php

namespace App\Exports;

use App\Models\tb_laporan_pengajuan_barang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanPengajuanBarangExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    // protected $tgl_awal, $tgl_akhir;

    // public function __construct($tgl_awal, $tgl_akhir)
    // {
    //     $this->tgl_awal = $tgl_awal;
    //     $this->tgl_akhir = $tgl_akhir;
    // }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return tb_laporan_pengajuan_barang::select('tanggal_masuk', 'nama_barang', 'stok_akhir', 'qtydus', 'satuan_isi','harga','total')->get();
    }

    public function headings(): array
    {
        return [
            'Tanggal Masuk',
            'Nama Barang',
            'Stok Akhir',
            'Qty Dus',
            'Satuan Isi',
            'Harga Barang',
            'Jumlah Harga',
        ];
    }
}
