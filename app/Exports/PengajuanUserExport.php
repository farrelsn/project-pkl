<?php

namespace App\Exports;

use App\Models\tb_pengajuan_barang;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PengajuanUserExport implements FromView
{
    public function view(): View
    {
        return view('user.laporan_pengajuan_barang.index', [
            'pengajuan' => tb_pengajuan_barang::all()
        ]);
    }
}

