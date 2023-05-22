<?php

namespace App\Exports;

use App\Models\tb_laporan_pengajuan_barang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class LaporanPengajuanBarangExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $tgl_awal, $tgl_akhir;
    use Exportable;


    public function __construct($tgl_awal, $tgl_akhir)
    {
        $this->tgl_awal = $tgl_awal;
        $this->tgl_akhir = $tgl_akhir;
    }

    // public function query()
    // {
        
    // }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if ($this->tgl_awal == null && $this->tgl_akhir == null)
            return tb_laporan_pengajuan_barang::query()->get(['tanggal_masuk', 'nama_barang', 'stok_akhir', 'qtydus', 'satuan_isi','harga','total'])->sortBy('tanggal_masuk');
        else if ($this->tgl_awal != null && $this->tgl_akhir != null)
            return tb_laporan_pengajuan_barang::query()->whereBetween('tanggal_masuk', [$this->tgl_awal, $this->tgl_akhir])->get(['tanggal_masuk', 'nama_barang', 'stok_akhir', 'qtydus', 'satuan_isi','harga','total'])->sortBy('tanggal_masuk');
        //return tb_laporan_pengajuan_barang::select('tanggal_masuk', 'nama_barang', 'stok_akhir', 'qtydus', 'satuan_isi','harga','total')->get();
    }

    // public function collection_tgl($tgl_awal, $tgl_akhir)
    // {
    //     return tb_laporan_pengajuan_barang::select('tanggal_masuk', 'nama_barang', 'stok_akhir', 'qtydus', 'satuan_isi','harga','total')->whereBetween('tanggal_masuk', [$tgl_awal, $tgl_akhir])->get();
    // }

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
