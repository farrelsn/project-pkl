<?php

namespace App\Exports;

use App\Models\tb_barang;
use App\Models\tb_satuan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BarangUserExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('user.barang.export', [
            'barang' => tb_barang::all(),
            'satuan' => tb_satuan::all(),

        ]);
    }
}
