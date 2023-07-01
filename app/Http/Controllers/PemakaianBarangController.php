<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\tb_barang;
use App\Models\tb_barang_keluar;
use App\Models\tb_kategori_barang;
use App\Models\tb_laporan_barang_keluar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemakaianBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang_keluar = tb_barang_keluar::all();
        $barang = tb_barang::all();
        $kategori_barang = tb_kategori_barang::all();
        $tgl = date('Y-m-d');
        if(Auth::user()->level == "admin"){
            $admin = User::where('username', Auth::user()->username)->first();
            return view('admin.barang_keluar.index', ['title' => 'Daftar Pemakaian Barang', 'barang_keluar' => $barang_keluar, 'admin' => $admin, 'kategori_barang' => $kategori_barang, 'tgl' => $tgl, 'barang' => $barang]);
        }
        else if (Auth::user()->level == "user"){
            $user = User::where('username', Auth::user()->username)->first();
            return view('user.barang_keluar.index', ['title' => 'Daftar Pemakaian Barang', 'barang_keluar' => $barang_keluar, 'user' => $user, 'kategori_barang' => $kategori_barang, 'tgl' => $tgl, 'barang' => $barang]);
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
            'jumlah_barang' => 'required|integer|min:1',
            'tanggal_keluar' => 'required',
        ], [
            'nama_barang.required' => 'Nama barang tidak boleh kosong',
            'kategori_barang.required' => 'Kategori barang tidak boleh kosong',
            'jumlah_barang.required' => 'Jumlah barang tidak boleh kosong',
            'jumlah_barang.min:1' => 'Jumlah barang yang digunakan minimal 1',
            'tanggal_keluar.required' => 'Tanggal keluar tidak boleh kosong',
        ]);
        

        $stok_awal = tb_barang::where('id', $request->nama_barang)->first()->stok;

        $stok_akhir = $stok_awal - $request->jumlah_barang;

        if($stok_akhir < 0){
            if (Auth::user()->level == "admin") {
                return redirect()->route('barang_keluar_admin')->with('error', 'Stok tidak mencukupi');
            }
            else if (Auth::user()->level == "user") {
                return redirect()->route('barang_keluar_user')->with('error', 'Stok tidak mencukupi');
            }
        }

        if(tb_barang_keluar::where('nama_barang',$request->nama_barang)->where('tanggal_keluar',$request->tanggal_keluar)->first()){
            $jumlah_awal = tb_barang_keluar::where('nama_barang',$request->nama_barang)->where('tanggal_keluar',$request->tanggal_keluar)->first()->jumlah_barang;
            tb_barang_keluar::where('nama_barang',$request->nama_barang)->where('tanggal_keluar',$request->tanggal_keluar)->update([
                'jumlah' =>  $jumlah_awal + $request->jumlah,
            ]);
            if(Auth::user()->level == "admin"){
                return redirect()->route('barang_keluar_admin')->with('success', 'Data Berhasil Ditambahkan');
            }
            else if (Auth::user()->level == "user"){
                return redirect()->route('barang_keluar_user')->with('success', 'Data Berhasil Ditambahkan');
            }
        }

        $db = tb_barang_keluar::create([
            'nama_barang' => $request->nama_barang,
            'kategori_barang' => tb_barang::where('id', $request->nama_barang)->first()->kategori_barang,
            //'stok_awal' => $stok_awal,//tb_barang::where('id', $request->nama_barang)->first()->stok,
            'jumlah_barang' => $request->jumlah_barang,
            //'stok_akhir' => $stok_akhir,//tb_barang::where('id', $request->nama_barang)->first()->stok - $request->jumlah_barang,
            'tanggal_keluar' => $request->tanggal_keluar,
        ]);

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
        $barang_keluar = tb_barang_keluar::find($id);
        $barang_keluar->delete();
        if(Auth::user()->level == "admin"){
            return redirect()->route('barang_keluar_admin')->with('success', 'Data berhasil dihapus');
        }
        else if (Auth::user()->level == "user"){
            return redirect()->route('barang_keluar_user')->with('success', 'Data berhasil dihapus');
        }
    }

    public function storelaporan($id){
        $barang_keluar = tb_barang_keluar::find($id);
        if($barang_keluar){
            $barang = tb_barang::where('id', $barang_keluar->nama_barang)->first();
            $stok_awal = $barang->stok;
            $barang->stok = $barang->stok - $barang_keluar->jumlah_barang;
            $barang->save();
                $db = tb_laporan_barang_keluar::create([
                    'nama_barang' => $barang_keluar->barang->nama_barang,
                    'tanggal_keluar' => $barang_keluar->tanggal_keluar,
                    'kategori_barang' => $barang_keluar->kategori->kategori_barang,
                    'stok_awal' => $stok_awal,
                    'stok_akhir' => $barang->stok,
                    'kategori_barang' => $barang_keluar->kategori->kategori_barang,
                    'jumlah' => $barang_keluar->jumlah_barang,
                ]);
           // }
            $barang_keluar->delete();
            if($db){
                if(Auth::user()->level == "admin"){
                    return redirect()->route('barang_keluar_admin')->with('success', 'Data berhasil disetujui');
                }
                else if (Auth::user()->level == "user"){
                    return redirect()->route('barang_keluar_user')->with('success', 'Data berhasil disetujui');
                }
            }
            else{
                if(Auth::user()->level == "admin"){
                    return redirect()->route('barang_keluar_admin')->with('error', 'Data gagal disetujui');
                }
                else if (Auth::user()->level == "user"){
                    return redirect()->route('barang_keluar_user')->with('error', 'Data gagal disetujui');
                }
            }
        }
        else{
            if(Auth::user()->level == "admin"){
                return redirect()->route('barang_keluar_admin')->with('error', 'Data tidak ditemukan');
            }
            else if (Auth::user()->level == "user"){
                return redirect()->route('barang_keluar_user')->with('error', 'Data tidak ditemukan');
            }
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
