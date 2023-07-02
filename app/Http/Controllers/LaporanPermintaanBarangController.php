<?php

namespace App\Http\Controllers;

use App\Exports\LaporanPermintaanBarangExport;
use App\Models\tb_laporan_permintaan_barang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
//use Illuminate\Support\Facades\Input;
//use Symfony\Component\Console\Input\Input as InputInput;

class LaporanPermintaanBarangController extends Controller
{
    public function index()
    {
        $permintaan_barang = tb_laporan_permintaan_barang::all();
        $tgl = date('Y-m-d');
        $tgl_awal = null;
        $tgl_akhir = null;  
        $bulan = null;
        $tahun = ["2021", "2022", "2023", "2024", "2025", "2026", "2027"];
        $thn = null;
        if(Auth::user()->level == "admin"){
            $admin = User::where('username', Auth::user()->username)->first();
            return view('admin.laporan_permintaan_barang.index', ['title' => 'Laporan Permintaan Barang', 'admin' => $admin, 'permintaan_barang' => $permintaan_barang, 'tgl' => $tgl, 'tgl_awal' => $tgl_awal, 'tgl_akhir' => $tgl_akhir, 'tahun' => $tahun, 'bulan' => $bulan, 'thn' => $thn]);
        }
        else if (Auth::user()->level == "user"){
            $user = User::where('username', Auth::user()->username)->first();
            return view('user.laporan_permintaan_barang.index', ['title' => 'Laporan Permintaan Barang', 'user' => $user, 'permintaan_barang' => $permintaan_barang, 'tgl' => $tgl, 'tgl_awal' => $tgl_awal, 'tgl_akhir' => $tgl_akhir, 'tahun' => $tahun, 'bulan' => $bulan, 'thn' => $thn]);
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
            $permintaan_barang = tb_laporan_permintaan_barang::whereBetween('tanggal_masuk', [$tgl_awal, $tgl_akhir])->get();
            if(Auth::user()->level == "admin"){
                $admin = User::where('username', Auth::user()->username)->first();
                return view('admin.laporan_permintaan_barang.index', ['title' => 'Laporan Permintaan Barang', 'admin' => $admin, 'permintaan_barang' => $permintaan_barang, 'tgl' => $tgl, 'tgl_awal' => $tgl_awal, 'tgl_akhir' => $tgl_akhir, 'tahun' => $tahun, 'bulan' => $bulan, 'thn' => $thn]);
            }
            else if (Auth::user()->level == "user"){
                $user = User::where('username', Auth::user()->username)->first();
                return view('user.laporan_permintaan_barang.index', ['title' => 'Laporan Permintaan Barang', 'user' => $user, 'permintaan_barang' => $permintaan_barang, 'tgl' => $tgl, 'tgl_awal' => $tgl_awal, 'tgl_akhir' => $tgl_akhir, 'tahun' => $tahun, 'bulan' => $bulan, 'thn' => $thn]);
            }
        }
        else if($request->submit == "export"){
            if($bulan == null && $thn == null){
                $tgl_awal = null;
                $tgl_akhir = null;
                if(Auth::user()->level == "admin"){
                    $admin = User::where('username', Auth::user()->username)->first();
                    return Excel::download(new LaporanPermintaanBarangExport($tgl_awal,$tgl_akhir), 'Laporan_Permintaan_Barang.xlsx');
                }
                else if (Auth::user()->level == "user"){
                    $user = User::where('username', Auth::user()->username)->first();
                    return Excel::download(new LaporanPermintaanBarangExport($tgl_awal,$tgl_akhir), 'Laporan_Permintaan_Barang.xlsx');
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
                $permintaan_barang = tb_laporan_permintaan_barang::whereBetween('tanggal_masuk', [$tgl_awal, $tgl_akhir])->get();
                //$excel = new LaporanPermintaanBarangExport($tgl_awal,$tgl_akhir);
                if(Auth::user()->level == "admin"){
                    $admin = User::where('username', Auth::user()->username)->first();
                    return Excel::download(new LaporanPermintaanBarangExport($tgl_awal,$tgl_akhir), 'Laporan_Permintaan_Barang_'.$bulan.'_'.$thn.'.xlsx');
                }
                else if (Auth::user()->level == "user"){
                    $user = User::where('username', Auth::user()->username)->first();
                    return Excel::download(new LaporanPermintaanBarangExport($tgl_awal,$tgl_akhir), 'Laporan_Permintaan_Barang_'.$bulan.'_'.$thn.'.xlsx');
                }
            }
        }
    }

    public function delete($id){
        $permintaan_barang = tb_laporan_permintaan_barang::find($id);
        if($permintaan_barang){
            $permintaan_barang->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        }
        else{
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

    // public function export(Request $request){
    //     $bulan = $request->bulan;
    //     $thn = $request->thn;
    //     dd($bulan, $thn);
    //     $tgl_awal = $thn."-".$bulan."-01";
    //     $tgl_akhir = $thn."-".$bulan."-31";
        
    // }
}
