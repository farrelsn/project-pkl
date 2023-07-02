<?php

namespace App\Http\Controllers;

use App\Exports\LaporanPemakaianBarangExport;
use App\Http\Controllers\Controller;
use App\Models\tb_pemakaian_barang;
use App\Models\tb_laporan_pemakaian_barang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class LaporanPemakaianBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporan_pemakaian_barang = tb_laporan_pemakaian_barang::all();
        $tgl = date('Y-m-d');
        $tgl_awal = null;
        $tgl_akhir = null;  
        $bulan = null;
        $tahun = ["2021", "2022", "2023", "2024", "2025", "2026", "2027"];
        $thn = null;
        if(Auth::user()->level == "admin"){
            $admin = User::where('username', Auth::user()->username)->first();
            return view('admin.laporan_pemakaian_barang.index', ['title' => 'Laporan Pemakaian Barang', 'admin' => $admin, 'laporan_pemakaian_barang' => $laporan_pemakaian_barang, 'tgl' => $tgl, 'tgl_awal' => $tgl_awal, 'tgl_akhir' => $tgl_akhir, 'tahun' => $tahun, 'bulan' => $bulan, 'thn' => $thn]);
        }
        else if (Auth::user()->level == "user"){
            $user = User::where('username', Auth::user()->username)->first();
            return view('user.laporan_pemakaian_barang.index', ['title' => 'Laporan Pemakaian Barang', 'user' => $user, 'laporan_pemakaian_barang' => $laporan_pemakaian_barang, 'tgl' => $tgl, 'tgl_awal' => $tgl_awal, 'tgl_akhir' => $tgl_akhir, 'tahun' => $tahun, 'bulan' => $bulan, 'thn' => $thn]);
        }
    }

    public function action(Request $request){
        $tgl = date('Y-m-d');
        $bulan = $request->bulan;
        $thn = $request->thn;
        $tahun = ["2021", "2022", "2023", "2024", "2025", "2026", "2027"];
        if($request->submit == "filter"){
            request()->validate([
                'bulan' => 'required',
                'thn' => 'required'
            ],[
                'bulan.required' => 'Bulan tidak boleh kosong',
                'thn.required' => 'Tahun tidak boleh kosong'
            ]);
            $tgl_awal = $thn."-".$bulan."-01";
            $tgl_akhir = $thn."-".$bulan."-31";
            $laporan_pemakaian_barang = tb_laporan_pemakaian_barang::whereBetween('tanggal_keluar', [$tgl_awal, $tgl_akhir])->get();
            if(Auth::user()->level == "admin"){
                $admin = User::where('username', Auth::user()->username)->first();
                return view('admin.laporan_pemakaian_barang.index', ['title' => 'Laporan Pengajuan Barang', 'admin' => $admin, 'laporan_pemakaian_barang' => $laporan_pemakaian_barang, 'tgl' => $tgl, 'tgl_awal' => $tgl_awal, 'tgl_akhir' => $tgl_akhir, 'tahun' => $tahun, 'bulan' => $bulan, 'thn' => $thn]);
            }
            else if (Auth::user()->level == "user"){
                $user = User::where('username', Auth::user()->username)->first();
                return view('user.laporan_pemakaian_barang.index', ['title' => 'Laporan Pengajuan Barang', 'user' => $user, 'laporan_pemakaian_barang' => $laporan_pemakaian_barang, 'tgl' => $tgl, 'tgl_awal' => $tgl_awal, 'tgl_akhir' => $tgl_akhir, 'tahun' => $tahun, 'bulan' => $bulan, 'thn' => $thn]);
            }
        }
        else if($request->submit == "export"){
            if($bulan == null && $thn == null){
                $tgl_awal = null;
                $tgl_akhir = null;
                if(Auth::user()->level == "admin"){
                    $admin = User::where('username', Auth::user()->username)->first();
                    return Excel::download(new LaporanPemakaianBarangExport($tgl_awal,$tgl_akhir), 'Laporan_Pemakaian_Barang.xlsx');
                }
                else if (Auth::user()->level == "user"){
                    $user = User::where('username', Auth::user()->username)->first();
                    return Excel::download(new LaporanPemakaianBarangExport($tgl_awal,$tgl_akhir), 'Laporan_Pemakaian_Barang.xlsx');
                }
            }
            else if($bulan == null && $thn != null){
                return redirect()->back()->with('error', 'Bulan tidak boleh kosong');
            }
            else if($bulan != null && $thn == null){
                return redirect()->back()->with('error', 'Tahun tidak boleh kosong');
            }
            else{
                $tgl_awal = $thn."-".$bulan."-01";
                $tgl_akhir = $thn."-".$bulan."-31";
                $laporan_pemakaian_barang = tb_laporan_pemakaian_barang::whereBetween('tanggal_keluar', [$tgl_awal, $tgl_akhir])->get();
                //$excel = new LaporanPemakaianBarangExport($tgl_awal,$tgl_akhir);
                if(Auth::user()->level == "admin"){
                    $admin = User::where('username', Auth::user()->username)->first();
                    return Excel::download(new LaporanPemakaianBarangExport($tgl_awal,$tgl_akhir), 'Laporan_Pemakaian_Barang_'.$bulan.'_'.$thn.'.xlsx');
                }
                else if (Auth::user()->level == "user"){
                    $user = User::where('username', Auth::user()->username)->first();
                    return Excel::download(new LaporanPemakaianBarangExport($tgl_awal,$tgl_akhir), 'Laporan_Pemakaian_Barang_'.$bulan.'_'.$thn.'.xlsx');
                }
            }
        }
    }

    public function delete($id){
        $laporan_pemakaian_barang = tb_laporan_pemakaian_barang::find($id);
        if($laporan_pemakaian_barang){
            $laporan_pemakaian_barang->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        }
        else{
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
        $laporan_pemakaian_barang = tb_laporan_pemakaian_barang::all();
        $tgl = date('Y-m-d');
        $tgl_awal = null;
        $tgl_akhir = null;  
        $bulan = null;
        $tahun = ["2021", "2022", "2023", "2024", "2025", "2026", "2027"];
        $thn = null;
        if(Auth::user()->level == "admin"){
            $admin = User::where('username', Auth::user()->username)->first();
            return view('admin.laporan_pemakaian_barang.index', ['title' => 'Laporan Pemakaian Barang', 'admin' => $admin, 'laporan_pemakaian_barang' => $laporan_pemakaian_barang, 'tgl' => $tgl, 'tgl_awal' => $tgl_awal, 'tgl_akhir' => $tgl_akhir, 'tahun' => $tahun, 'bulan' => $bulan, 'thn' => $thn]);
        }
        else if (Auth::user()->level == "user"){
            $user = User::where('username', Auth::user()->username)->first();
            return view('user.laporan_pemakaian_barang.index', ['title' => 'Laporan Pemakaian Barang', 'user' => $user, 'laporan_pemakaian_barang' => $laporan_pemakaian_barang, 'tgl' => $tgl, 'tgl_awal' => $tgl_awal, 'tgl_akhir' => $tgl_akhir, 'tahun' => $tahun, 'bulan' => $bulan, 'thn' => $thn]);
        }
    }


    
}
