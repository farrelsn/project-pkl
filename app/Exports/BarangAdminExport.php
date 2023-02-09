<?php

namespace App\Exports;

use App\Models\tb_barang;
use App\Models\tb_satuan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BarangAdminExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('admin.barang.export', [
            'barang' => tb_barang::all(),
            'satuan' => tb_satuan::all(),

        ]);
    }
}
