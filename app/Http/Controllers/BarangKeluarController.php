<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\tb_barang;
use App\Models\tb_barang_keluar;
use App\Models\tb_kategori_barang;
use App\Models\tb_lokasi;
use App\Models\tb_pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = tb_pegawai::all();
        $barang_keluar = tb_barang_keluar::all();
        $barang = tb_barang::all();
        $kategori_barang = tb_kategori_barang::all();
        $lokasi = tb_lokasi::all();
        $tgl = date('Y-m-d');
        if(Auth::user()->level == "admin"){
            $admin = User::where('username', Auth::user()->username)->first();
            return view('admin.barang_keluar.index', ['title' => 'Daftar Pemakaian Barang', 'barang_keluar' => $barang_keluar, 'admin' => $admin, 'kategori_barang' => $kategori_barang, 'tgl' => $tgl, 'barang' => $barang, 'pegawai' => $pegawai, 'lokasi' => $lokasi]);
        }
        else if (Auth::user()->level == "user"){
            $user = User::where('username', Auth::user()->username)->first();
            return view('user.barang_keluar.index', ['title' => 'Daftar Pemakaian Barang', 'barang_keluar' => $barang_keluar, 'user' => $user, 'kategori_barang' => $kategori_barang, 'tgl' => $tgl, 'barang' => $barang, 'pegawai' => $pegawai, 'lokasi' => $lokasi]);
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
        request()->validate([
            'nama_barang' => 'required',
            //'kategori_barang' => 'required',
            'jumlah_barang' => 'required|integer|min:1',
            'tanggal_keluar' => 'required',
            // 'pemakai' => 'required',
        ], [
            'nama_barang.required' => 'Nama barang tidak boleh kosong',
            'kategori_barang.required' => 'Kategori barang tidak boleh kosong',
            'jumlah_barang.required' => 'Jumlah barang tidak boleh kosong',
            'jumlah_barang.min:1' => 'Jumlah barang yang digunakan minimal 1',
            'tanggal_keluar.required' => 'Tanggal keluar tidak boleh kosong',
            // 'pemakai.required' => 'Pemakai tidak boleh kosong',
            //'keterangan.required' => 'Keterangan tidak boleh kosong',
        ]);

        if($request->pemakai == ""){
            request()->validate([
                'lokasi' => 'required',
            ], [
                'lokasi.required' => 'Lokasi/Pegawai tidak boleh kosong',
            ]);
            $lokasi = $request->lokasi;
            $stok_awal = tb_barang::where('id', $request->nama_barang)->first()->stok;

            $update_barang = tb_barang::where('id', $request->nama_barang)->first();
            if($update_barang){
                $update_barang->stok = $update_barang->stok - $request->jumlah_barang;
                if(Auth::user()->level == "user"){
                    if($update_barang->stok < 0){
                        return redirect()->route('barang_keluar_user')->with('error', 'Stok tidak mencukupi');
                    }
                }
                else if(Auth::user()->level == "admin"){
                    if($update_barang->stok < 0){
                        return redirect()->route('barang_keluar_admin')->with('error', 'Stok tidak mencukupi');
                    }
                }
                $update_barang->save();
            }

            $stok_akhir = tb_barang::where('id', $request->nama_barang)->first()->stok;
            $db = tb_barang_keluar::create([
                'nama_barang' => $request->nama_barang,
                'kategori_barang' => tb_barang::where('id', $request->nama_barang)->first()->kategori_barang,
                'stok_awal' => $stok_awal,//tb_barang::where('id', $request->nama_barang)->first()->stok,
                'jumlah_barang' => $request->jumlah_barang,
                'stok_akhir' => $stok_akhir,//tb_barang::where('id', $request->nama_barang)->first()->stok - $request->jumlah_barang,
                'tanggal_keluar' => $request->tanggal_keluar,
                'lokasi' => $lokasi,
                //'keterangan' => $request->keterangan,
            ]);
        }
        else if($request->lokasi == ""){
            request()->validate([
                'pemakai' => 'required',
            ], [
                'pemakai.required' => 'Lokasi/Pegawai tidak boleh kosong',
            ]);
            $pemakai = $request->pemakai;
            $stok_awal = tb_barang::where('id', $request->nama_barang)->first()->stok;

            $update_barang = tb_barang::where('id', $request->nama_barang)->first();
            if($update_barang){
                $update_barang->stok = $update_barang->stok - $request->jumlah_barang;
                if(Auth::user()->level == "user"){
                    if($update_barang->stok < 0){
                        return redirect()->route('barang_keluar_user')->with('error', 'Stok tidak mencukupi');
                    }
                }
                else if(Auth::user()->level == "admin"){
                    if($update_barang->stok < 0){
                        return redirect()->route('barang_keluar_admin')->with('error', 'Stok tidak mencukupi');
                    }
                }
                $update_barang->save();
            }

            $stok_akhir = tb_barang::where('id', $request->nama_barang)->first()->stok;
            $db = tb_barang_keluar::create([
                'nama_barang' => $request->nama_barang,
                'kategori_barang' => tb_barang::where('id', $request->nama_barang)->first()->kategori_barang,
                'stok_awal' => $stok_awal,//tb_barang::where('id', $request->nama_barang)->first()->stok,
                'jumlah_barang' => $request->jumlah_barang,
                'stok_akhir' => $stok_akhir,//tb_barang::where('id', $request->nama_barang)->first()->stok - $request->jumlah_barang,
                'tanggal_keluar' => $request->tanggal_keluar,
                'pemakai' => $pemakai,
                //'keterangan' => $request->keterangan,
            ]);
        }
        else{
            $stok_awal = tb_barang::where('id', $request->nama_barang)->first()->stok;

            $update_barang = tb_barang::where('id', $request->nama_barang)->first();
            if($update_barang){
                $update_barang->stok = $update_barang->stok - $request->jumlah_barang;
                if(Auth::user()->level == "user"){
                    if($update_barang->stok < 0){
                        return redirect()->route('barang_keluar_user')->with('error', 'Stok tidak mencukupi');
                    }
                }
                else if(Auth::user()->level == "admin"){
                    if($update_barang->stok < 0){
                        return redirect()->route('barang_keluar_admin')->with('error', 'Stok tidak mencukupi');
                    }
                }
                $update_barang->save();
            }

            $stok_akhir = tb_barang::where('id', $request->nama_barang)->first()->stok;
            $db = tb_barang_keluar::create([
                'nama_barang' => $request->nama_barang,
                'kategori_barang' => tb_barang::where('id', $request->nama_barang)->first()->kategori_barang,
                'stok_awal' => $stok_awal,//tb_barang::where('id', $request->nama_barang)->first()->stok,
                'jumlah_barang' => $request->jumlah_barang,
                'stok_akhir' => $stok_akhir,//tb_barang::where('id', $request->nama_barang)->first()->stok - $request->jumlah_barang,
                'tanggal_keluar' => $request->tanggal_keluar,
                'pemakai' => $request->pemakai,
                'lokasi' => $request->lokasi,
                //'keterangan' => $request->keterangan,
            ]);
        }
        


        if(Auth::user()->level == "admin"){
            if($db){
                return redirect()->route('barang_keluar_admin')->with('success', 'Data berhasil ditambahkan');
            }
            else{
                return redirect()->route('barang_keluar_admin');
            }
        }
        else if (Auth::user()->level == "user"){
            if($db){
                return redirect()->route('barang_keluar_user')->with('success', 'Data berhasil ditambahkan');
            }
            else{
                return redirect()->route('barang_keluar_user');
            }
        }
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

    public function delete($id)
    {
        $barang_masuk = tb_barang_keluar::find($id);
        $barang_masuk->delete();
        if(Auth::user()->level == "admin"){
            return redirect()->route('barang_keluar_admin')->with('success', 'Data berhasil dihapus');
        }
        else if (Auth::user()->level == "user"){
            return redirect()->route('barang_keluar_user')->with('success', 'Data berhasil dihapus');
        }
    }

    // public function print()
    // {
    //     $barang_keluar = tb_barang_keluar::all();
    //     $kategori_barang = tb_kategori_barang::all();
    //     $barang = tb_barang::all();
    //     $pegawai = tb_pegawai::all();
    //     $tgl = date('d-m-Y');
    //     $pdf = PDF::loadview('admin.barang_keluar.print', ['barang_keluar' => $barang_keluar, 'kategori_barang' => $kategori_barang, 'tgl' => $tgl, 'barang' => $barang, 'pegawai' => $pegawai]);
    //     return $pdf->stream();
    // }

    // public function filter(Request $request){

    // }
}
