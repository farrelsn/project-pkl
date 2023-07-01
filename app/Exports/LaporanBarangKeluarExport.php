<?php

namespace App\Exports;

use App\Models\tb_barang_keluar;
use App\Models\tb_laporan_barang_keluar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class LaporanBarangKeluarExport implements FromCollection, WithHeadings, ShouldAutoSize
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
        if($this->tgl_awal == null && $this->tgl_akhir == null)
            return tb_laporan_barang_keluar::query()->get(['tanggal_keluar', 'nama_barang', 'kategori_barang', 'stok_awal', 'jumlah','stok_akhir' ,  'created_at'])->sortBy('tanggal_keluar');
        else if($this->tgl_awal != null && $this->tgl_akhir != null)
            return tb_laporan_barang_keluar::query()->whereBetween('tanggal_keluar', [$this->tgl_awal, $this->tgl_akhir])->get(['tanggal_keluar', 'nama_barang', 'kategori_barang', 'stok_awal','jumlah', 'stok_akhir' ,  'created_at'])->sortBy('tanggal_keluar');
    }

    // public function collection_tgl($tgl_awal, $tgl_akhir)
    // {
    //     return tb_laporan_pengajuan_barang::select('tanggal_masuk', 'nama_barang', 'stok_akhir', 'qtydus', 'satuan_isi','harga','total')->whereBetween('tanggal_masuk', [$tgl_awal, $tgl_akhir])->get();
    // }

    public function headings(): array
    {
        return [
            'Tanggal Keluar',
            'Nama Barang',
            'Kategori Barang',
            'Stok Awal',
            'Jumlah Barang',
            'Stok Akhir',
            'Tanggal Konfirmasi'
        ];
    }
}
