<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\tb_barang;
use App\Models\tb_barang_masuk;
use App\Models\tb_kategori_barang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangMasukController extends Controller
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
        if(Auth::user()->level == "admin"){
            $admin = User::where('username', Auth::user()->username)->first();
            return view('admin.barang_masuk.index', ['title' => 'Daftar Pemasukan Barang', 'barang_masuk' => $barang_masuk, 'admin' => $admin, 'kategori_barang' => $kategori_barang, 'tgl' => $tgl, 'barang' => $barang]);
        }
        else if (Auth::user()->level == "user"){
            $user = User::where('username', Auth::user()->username)->first();
            return view('user.barang_masuk.index', ['title' => 'Daftar Pemasukan Barang', 'barang_masuk' => $barang_masuk, 'user' => $user, 'kategori_barang' => $kategori_barang, 'tgl' => $tgl, 'barang' => $barang]);
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
            'tanggal_masuk' => 'required',
        ],[
            'nama_barang.required' => 'Nama Barang harus diisi',
            //'kategori_barang.required' => 'kategori Barang harus diisi',
            'jumlah_barang.required' => 'Jumlah Barang harus diisi',
            'jumlah_barang.integer' => 'Jumlah Barang harus berupa angka',
            'jumlah_barang.min' => 'Jumlah Barang minimal 1',
            'tanggal_masuk.required' => 'Tanggal Masuk harus diisi',
        ]);

        
        $stok_awal = tb_barang::where('id', $request->nama_barang)->first()->stok;
        //dd($stok_awal);
        $stok_akhir = $stok_awal + $request->jumlah_barang;

        $db = tb_barang_masuk::create([
            'nama_barang' => $request->nama_barang,
            'kategori_barang' => tb_barang::where('id', $request->nama_barang)->first()->kategori_barang,
            'stok_awal' => $stok_awal,
            'jumlah_barang' => $request->jumlah_barang,
            'stok_akhir' => $stok_akhir,
            'tanggal_masuk' => $request->tanggal_masuk,
            'keterangan' => $request->keterangan,
        ]);

        $update_barang = tb_barang::where('id', $request->nama_barang)->first();
        if($update_barang){
            $update_barang->stok = $update_barang->stok + $request->jumlah_barang;
            $update_barang->save();
        }

        

        // else{
        //     tb_barang_kerja::create([
        //         'nama_barang' => $request->nama_barang,
        //         'kategori_barang' => $request->kategori_barang,
        //         'jumlah_barang' => $request->jumlah_barang,
        //     ]);
        // }

        if(Auth::user()->level == "admin"){
            if($db){
                return redirect()->route('barang_masuk_admin')->with('success', 'Data berhasil ditambahkan');
            }
            else{
                return redirect()->route('barang_masuk_admin');
            }
        }
        else if (Auth::user()->level == "user"){
            if($db){
                return redirect()->route('barang_masuk_user')->with('success', 'Data berhasil ditambahkan');
            }
            else{
                return redirect()->route('barang_masuk_user');
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
        $barang_masuk = tb_barang_masuk::find($id);
        $barang_masuk->delete();
        if(Auth::user()->level == "admin"){
            return redirect()->route('barang_masuk_admin')->with('success', 'Data berhasil dihapus');
        }
        else if (Auth::user()->level == "user"){
            return redirect()->route('barang_masuk_user')->with('success', 'Data berhasil dihapus');
        }
    }
}
