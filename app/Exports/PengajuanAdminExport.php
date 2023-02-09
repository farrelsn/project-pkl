<?php

namespace App\Exports;

use App\Models\tb_pengajuan_barang;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PengajuanAdminExport implements FromView
{
    public function view(): View
    {
        return view('admin.laporan_pengajuan_barang.index', [
            'pengajuan_barang' => tb_pengajuan_barang::all()
        ]);
    }
}

