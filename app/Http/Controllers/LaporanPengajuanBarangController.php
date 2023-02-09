<?php

namespace App\Http\Controllers;

use App\Exports\LaporanPengajuanAdminExport;
use App\Exports\LaporanPengajuanBarangExport;
use App\Models\tb_laporan_pengajuan_barang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class LaporanPengajuanBarangController extends Controller
{
    public function index()
    {
        $pengajuan_barang = tb_laporan_pengajuan_barang::all();
        $tgl = date('Y-m-d');
        $tgl_awal = null;
        $tgl_akhir = null;  
        if(Auth::user()->level == "admin"){
            $admin = User::where('username', Auth::user()->username)->first();
            return view('admin.laporan_pengajuan_barang.index', ['title' => 'Laporan Pengajuan Barang', 'admin' => $admin, 'pengajuan_barang' => $pengajuan_barang, 'tgl' => $tgl, 'tgl_awal' => $tgl_awal, 'tgl_akhir' => $tgl_akhir]);
        }
        else if (Auth::user()->level == "user"){
            $user = User::where('username', Auth::user()->username)->first();
            return view('user.laporan_pengajuan_barang.index', ['title' => 'Laporan Pengajuan Barang', 'user' => $user, 'pengajuan_barang' => $pengajuan_barang, 'tgl' => $tgl, 'tgl_awal' => $tgl_awal, 'tgl_akhir' => $tgl_akhir]);
        }
    }

    public function filter(Request $request){
        $tgl_awal = $request->tanggal_awal;
        $tgl_akhir = $request->tanggal_akhir;
        $tgl = date('Y-m-d');
        $pengajuan_barang = tb_laporan_pengajuan_barang::whereBetween('tanggal_masuk', [$tgl_awal, $tgl_akhir])->get();
        if(Auth::user()->level == "admin"){
            $admin = User::where('username', Auth::user()->username)->first();
            return view('admin.laporan_pengajuan_barang.index', ['title' => 'Laporan Pengajuan Barang', 'admin' => $admin, 'pengajuan_barang' => $pengajuan_barang, 'tgl' => $tgl, 'tgl_awal' => $tgl_awal, 'tgl_akhir' => $tgl_akhir]);
        }
        else if (Auth::user()->level == "user"){
            $user = User::where('username', Auth::user()->username)->first();
            return view('user.laporan_pengajuan_barang.index', ['title' => 'Laporan Pengajuan Barang', 'user' => $user, 'pengajuan_barang' => $pengajuan_barang, 'tgl' => $tgl, 'tgl_awal' => $tgl_awal, 'tgl_akhir' => $tgl_akhir]);
        }
    }

    public function delete($id){
        $pengajuan_barang = tb_laporan_pengajuan_barang::find($id);
        $pengajuan_barang->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    public function export(){
        
        if(Auth::user()->level == "admin"){
            $admin = User::where('username', Auth::user()->username)->first();
            return Excel::download(new LaporanPengajuanBarangExport, 'Laporan Pengajuan Barang.xlsx');
        }
        else if (Auth::user()->level == "user"){
            $user = User::where('username', Auth::user()->username)->first();
            return Excel::download(new LaporanPengajuanBarangExport, 'Laporan Pengajuan Barang.xlsx');
        }
    }
}
