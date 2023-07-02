<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\tb_barang;
use App\Models\tb_kategori_barang;
use App\Models\tb_laporan_permintaan_barang;
use App\Models\tb_permintaan_barang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class PermintaanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(tb_permintaan_barang::all());
        $permintaan_barang = tb_permintaan_barang::all();
        $barang = tb_barang::all();
        $kategori_barang = tb_kategori_barang::all();
        //$kategori_barang_dipilih = tb_kategori_barang::where('id', tb_barang::where)->first(); 
        $tgl = date('Y-m-d');
        if(Auth::user()->level == "admin"){
            $admin = User::where('username', Auth::user()->username)->first();
            return view('admin.permintaan_barang.index', ['title' => 'Daftar Permintaan Barang', 'permintaan_barang' => $permintaan_barang, 'admin' => $admin, 'kategori_barang' => $kategori_barang, 'tgl' => $tgl, 'barang' => $barang]);
        }
        else if (Auth::user()->level == "user"){
            $user = User::where('username', Auth::user()->username)->first();
            return view('user.permintaan_barang.index', ['title' => 'Daftar Permintaan Barang', 'permintaan_barang' => $permintaan_barang, 'user' => $user, 'kategori_barang' => $kategori_barang, 'tgl' => $tgl, 'barang' => $barang]);
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
        $request->validate([
            'nama_barang' => 'required',
            'tanggal_masuk' => 'required',
            'jumlah' => 'required|min:1|integer',
        ], [
            'nama_barang.required' => 'Nama Barang Harus Diisi',
            'tanggal_masuk.required' => 'Tanggal Masuk Harus Diisi',
            'jumlah.required' => 'Jumlah Harus Diisi',
            'jumlah.min' => 'Jumlah Minimal 1',
            'jumlah.integer' => 'Jumlah Harus Berupa Angka',
        ]);

        if(tb_permintaan_barang::where('nama_barang',$request->nama_barang)->where('tanggal_masuk',$request->tanggal_masuk)->first()){
            $jumlah_awal = tb_permintaan_barang::where('nama_barang',$request->nama_barang)->where('tanggal_masuk',$request->tanggal_masuk)->first()->jumlah;
            tb_permintaan_barang::where('nama_barang',$request->nama_barang)->where('tanggal_masuk',$request->tanggal_masuk)->update([
                'jumlah' =>  $jumlah_awal + $request->jumlah,
            ]);
            if(Auth::user()->level == "admin"){
                return redirect()->route('permintaan_barang_admin')->with('success', 'Data Berhasil Ditambahkan');
            }
            else if (Auth::user()->level == "user"){
                return redirect()->route('permintaan_barang_user')->with('success', 'Data Berhasil Ditambahkan');
            }
        }

        if(Auth::user()->level == "admin"){
            if(tb_barang::where('id',$request->nama_barang)->first()->harga_baru == 0){
                return redirect()->route('permintaan_barang_admin')->with('error','Harga Barang Belum Diisi!');
            }

            if(tb_barang::where('id',$request->nama_barang)->first()->qtydus == 0){
                return redirect()->route('permintaan_barang_admin')->with('error','Jumlah Barang/Dus Belum Diisi!');
            }

            if(tb_permintaan_barang::where('nama_barang',$request->nama_barang)->where('tanggal_masuk',$request->tanggal_masuk)->first()){
                return redirect()->route('permintaan_barang_admin')->with('error','Data Sudah Ada!');
            }
        }
        else if (Auth::user()->level == "user"){
            if(tb_barang::where('id',$request->nama_barang)->first()->harga_baru == 0){
                return redirect()->route('permintaan_barang_user')->with('error','Harga Barang Belum Diisi!');
            }

            if(tb_barang::where('id',$request->nama_barang)->first()->qtydus == 0){
                return redirect()->route('permintaan_barang_user')->with('error','Jumlah Barang/Dus Belum Diisi!');
            }

            if(tb_permintaan_barang::where('nama_barang',$request->nama_barang)->where('tanggal_masuk',$request->tanggal_masuk)->first()){
                return redirect()->route('permintaan_barang_user')->with('error','Data Sudah Ada!');
            }
        }

        
        tb_permintaan_barang::create([
            'nama_barang' => $request->nama_barang,
            'tanggal_masuk' => $request->tanggal_masuk,
            'jumlah' => $request->jumlah,
            'kategori_barang' => tb_barang::where('id', $request->nama_barang)->first()->kategori_barang,
            'qtydus' => tb_barang::where('id', $request->nama_barang)->first()->qtydus,
            'harga' => tb_barang::where('id', $request->nama_barang)->first()->harga_baru,
        ]);

        if(Auth::user()->level == "admin"){
            return redirect()->route('permintaan_barang_admin')->with('success', 'Data Berhasil Ditambahkan');
        }
        else if (Auth::user()->level == "user"){
            return redirect()->route('permintaan_barang_user')->with('success', 'Data Berhasil Ditambahkan');
        }

    }

    public function getharga(){
        $id = $_POST['id'];
        $barang = tb_barang::where('id', $id)->first();
        
        return response()->json($barang);
    }

    public function changeharga(){
        $id = $_POST['id'];
        $jumlah = $_POST['jumlah'];

        $barang = tb_barang::where('id', $id)->first();
        $barang["harga"] = $barang->harga_baru * $jumlah;
        $barang["stok_akhir"] = $barang->stok + ($jumlah * $barang->qtydus);

        return response()->json($barang);

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

    public function delete($id){
        $permintaan_barang = tb_permintaan_barang::find($id);
        if(!$permintaan_barang){
            if(Auth::user()->level == "admin"){
                return redirect()->route('permintaan_barang_admin')->with('error', 'Data sudah dihapus');
            }
            else if (Auth::user()->level == "user"){
                return redirect()->route('permintaan_barang_user')->with('error', 'Data sudah dihapus');
            }
        }
        else{
            $permintaan_barang->delete();
            if(Auth::user()->level == "admin"){
                return redirect()->route('permintaan_barang_admin')->with('success', 'Data berhasil dihapus');
            }
            else if (Auth::user()->level == "user"){
                return redirect()->route('permintaan_barang_user')->with('success', 'Data berhasil dihapus');
            }
        }   
    }

    public function storelaporan($id){
        $permintaan_barang = tb_permintaan_barang::find($id);
        if($permintaan_barang){
            $barang = tb_barang::where('id', $permintaan_barang->nama_barang)->first();
            $barang->stok = $barang->stok + $permintaan_barang->jumlah * $permintaan_barang->qtydus;
            $barang->save();
                $db = tb_laporan_permintaan_barang::create([
                    'nama_barang' => $permintaan_barang->barang->nama_barang,
                    'tanggal_masuk' => $permintaan_barang->tanggal_masuk,
                    'stok_awal' => $barang->stok - ($permintaan_barang->jumlah * $permintaan_barang->qtydus),
                    'stok_akhir' => $barang->stok,
                    'kategori_barang' => $permintaan_barang->kategori->kategori_barang,
                    'qtydus' => $permintaan_barang->qtydus,
                    'jumlah' => $permintaan_barang->jumlah,
                    'harga' => $permintaan_barang->harga,
                    'total' => $permintaan_barang->jumlah * $permintaan_barang->harga,
                ]);
            $permintaan_barang->delete();
            if($db){
                if(Auth::user()->level == "admin"){
                    return redirect()->route('permintaan_barang_admin')->with('success', 'Data berhasil dikonfirmasi');
                }
                else if (Auth::user()->level == "user"){
                    return redirect()->route('permintaan_barang_user')->with('success', 'Data berhasil dikonfirmasi');
                }
            }
            else{
                if(Auth::user()->level == "admin"){
                    return redirect()->route('permintaan_barang_admin')->with('error', 'Data gagal dikonfirmasi');
                }
                else if (Auth::user()->level == "user"){
                    return redirect()->route('permintaan_barang_user')->with('error', 'Data gagal dikonfirmasi');
                }
            }
        }
        else{
            if(Auth::user()->level == "admin"){
                return redirect()->route('permintaan_barang_admin')->with('error', 'Data tidak ditemukan');
            }
            else if (Auth::user()->level == "user"){
                return redirect()->route('permintaan_barang_user')->with('error', 'Data tidak ditemukan');
            }
        }
    }
}
