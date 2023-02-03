<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\tb_barang;
use App\Models\tb_barang_masuk;
use App\Models\tb_kategori_barang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanBarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang_masuk = tb_barang_masuk::all();
        $barang = tb_barang::all();
        $kategori_barang = tb_kategori_barang::all();
        $tgl = date('Y-m-d');
        if(Auth::user()->level == 'user'){
            $user = User::where('username', Auth::user()->username)->first();
            return view('user.laporan_barang_masuk.index', ['title' => 'Laporan Barang Masuk', 'barang' => $barang, 'user' => $user, 'kategori_barang' => $kategori_barang, 'tgl' => $tgl, 'barang' => $barang, 'barang_masuk' => $barang_masuk]);
        }
        else if(Auth::user()->level == 'admin'){
            $admin = User::where('username', Auth::user()->username)->first();
            return view('admin.laporan_barang_masuk.index', ['title' => 'Laporan Barang Masuk', 'barang' => $barang, 'admin' => $admin, 'kategori_barang' => $kategori_barang, 'tgl' => $tgl, 'barang' => $barang, 'barang_masuk' => $barang_masuk]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function filter(Request $request){
        $tgl_awal = $request->tanggal_awal;
        $tgl_akhir = $request->tanggal_akhir;
        $barang = tb_barang::all();
        $kategori_barang = tb_kategori_barang::all();
        $barang_masuk = tb_barang_masuk::whereBetween('tanggal_masuk', [$tgl_awal, $tgl_akhir])->get();
        //dd($tgl_awal, $tgl_akhir, $barang_masuk);
        if(Auth::user()->level == 'user'){
            $user = User::where('username', Auth::user()->username)->first();
            return view('user.laporan_barang_masuk.index', ['title' => 'Laporan Barang Masuk', 'barang' => $barang, 'user' => $user, 'kategori_barang' => $kategori_barang, 'tgl_awal' => $tgl_awal, 'tgl_akhir' => $tgl_akhir, 'barang' => $barang, 'barang_masuk' => $barang_masuk]);
        }
        else if(Auth::user()->level == 'admin'){
            $admin = User::where('username', Auth::user()->username)->first();
            return view('admin.laporan_barang_masuk.index', ['title' => 'Laporan Barang Masuk', 'barang' => $barang, 'admin' => $admin, 'kategori_barang' => $kategori_barang, 'tgl_awal' => $tgl_awal, 'tgl_akhir' => $tgl_akhir, 'barang' => $barang, 'barang_masuk' => $barang_masuk]);
        }
    }
}
