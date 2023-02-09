<?php

namespace App\Exports;

use App\Models\tb_laporan_pengajuan_barang;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanPengajuanUserExport implements FromView
{
    private $tgl_awal, $tgl_akhir;

    public function __construct($tgl_awal, $tgl_akhir)
    {
        $this->tgl_awal = $tgl_awal;
        $this->tgl_akhir = $tgl_akhir;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('user.laporan_pengajuan_barang.export', [
            'laporan' => tb_laporan_pengajuan_barang::whereBetween('tanggal_masuk', [$this->tgl_awal, $this->tgl_akhir])->get(),
        ]);
    }
}
