<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\tb_barang;
use App\Models\tb_pemakaian_barang;
use App\Models\tb_kategori_barang;
use App\Models\tb_laporan_pemakaian_barang;
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
        $pemakaian_barang = tb_pemakaian_barang::all();
        $barang = tb_barang::all();
        $kategori_barang = tb_kategori_barang::all();
        $tgl = date('Y-m-d');
        if(Auth::user()->level == "admin"){
            $admin = User::where('username', Auth::user()->username)->first();
            return view('admin.pemakaian_barang.index', ['title' => 'Daftar Pemakaian Barang', 'pemakaian_barang' => $pemakaian_barang, 'admin' => $admin, 'kategori_barang' => $kategori_barang, 'tgl' => $tgl, 'barang' => $barang]);
        }
        else if (Auth::user()->level == "user"){
            $user = User::where('username', Auth::user()->username)->first();
            return view('user.pemakaian_barang.index', ['title' => 'Daftar Pemakaian Barang', 'pemakaian_barang' => $pemakaian_barang, 'user' => $user, 'kategori_barang' => $kategori_barang, 'tgl' => $tgl, 'barang' => $barang]);
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
            'jumlah' => 'required|integer|min:1',
            'tanggal_keluar' => 'required',
        ], [
            'nama_barang.required' => 'Nama barang tidak boleh kosong',
            'kategori_barang.required' => 'Kategori barang tidak boleh kosong',
            'jumlah.required' => 'Jumlah barang tidak boleh kosong',
            'jumlah.min:1' => 'Jumlah barang yang digunakan minimal 1',
            'tanggal_keluar.required' => 'Tanggal keluar tidak boleh kosong',
        ]);
        

        $stok_awal = tb_barang::where('id', $request->nama_barang)->first()->stok;

        $stok_akhir = $stok_awal - $request->jumlah;

        if($stok_akhir < 0){
            if (Auth::user()->level == "admin") {
                return redirect()->route('pemakaian_barang_admin')->with('error', 'Stok tidak mencukupi');
            }
            else if (Auth::user()->level == "user") {
                return redirect()->route('pemakaian_barang_user')->with('error', 'Stok tidak mencukupi');
            }
        }

        if(tb_pemakaian_barang::where('nama_barang',$request->nama_barang)->where('tanggal_keluar',$request->tanggal_keluar)->first()){
            $jumlah_awal = tb_pemakaian_barang::where('nama_barang',$request->nama_barang)->where('tanggal_keluar',$request->tanggal_keluar)->first()->jumlah;
            $jumlah_akhir = $jumlah_awal + $request->jumlah;
            tb_pemakaian_barang::where('nama_barang',$request->nama_barang)->where('tanggal_keluar',$request->tanggal_keluar)->update([
                'jumlah' =>  $jumlah_akhir,
            ]);
            if(Auth::user()->level == "admin"){
                return redirect()->route('pemakaian_barang_admin')->with('success', 'Data Berhasil Ditambahkan');
            }
            else if (Auth::user()->level == "user"){
                return redirect()->route('pemakaian_barang_user')->with('success', 'Data Berhasil Ditambahkan');
            }
        }

        $db = tb_pemakaian_barang::create([
            'nama_barang' => $request->nama_barang,
            'kategori_barang' => tb_barang::where('id', $request->nama_barang)->first()->kategori_barang,
            //'stok_awal' => $stok_awal,//tb_barang::where('id', $request->nama_barang)->first()->stok,
            'jumlah' => $request->jumlah,
            //'stok_akhir' => $stok_akhir,//tb_barang::where('id', $request->nama_barang)->first()->stok - $request->jumlah,
            'tanggal_keluar' => $request->tanggal_keluar,
        ]);

        if(Auth::user()->level == "admin"){
            if($db){
                return redirect()->route('pemakaian_barang_admin')->with('success', 'Data berhasil ditambahkan');
            }
            else{
                return redirect()->route('pemakaian_barang_admin');
            }
        }
        else if (Auth::user()->level == "user"){
            if($db){
                return redirect()->route('pemakaian_barang_user')->with('success', 'Data berhasil ditambahkan');
            }
            else{
                return redirect()->route('pemakaian_barang_user');
            }
        }
    }

    public function getstok(){
        $id = $_POST['id'];
        $barang = tb_barang::where('id', $id)->first();
        
        return response()->json($barang);
    }

    public function changestok(){
        $id = $_POST['id'];
        $jumlah = $_POST['jumlah'];

        $barang = tb_barang::where('id', $id)->first();
        $barang["stok_akhir"] = $barang->stok - $jumlah;

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

    public function delete($id)
    {
        $pemakaian_barang = tb_pemakaian_barang::find($id);
        $pemakaian_barang->delete();
        if(Auth::user()->level == "admin"){
            return redirect()->route('pemakaian_barang_admin')->with('success', 'Data berhasil dihapus');
        }
        else if (Auth::user()->level == "user"){
            return redirect()->route('pemakaian_barang_user')->with('success', 'Data berhasil dihapus');
        }
    }

    public function storelaporan($id){
        $pemakaian_barang = tb_pemakaian_barang::find($id);
        if($pemakaian_barang){
            $barang = tb_barang::where('id', $pemakaian_barang->nama_barang)->first();
            $stok_awal = $barang->stok;
            if($barang->stok < $pemakaian_barang->jumlah){
                $pemakaian_barang->delete();
                if(Auth::user()->level == "admin"){
                    return redirect()->route('pemakaian_barang_admin')->with('error', 'Stok tidak mencukupi');
                }
                else if (Auth::user()->level == "user"){
                    return redirect()->route('pemakaian_barang_user')->with('error', 'Stok tidak mencukupi');
                }
            }
            $barang->stok = $barang->stok - $pemakaian_barang->jumlah;
            $barang->save();
                $db = tb_laporan_pemakaian_barang::create([
                    'nama_barang' => $pemakaian_barang->barang->nama_barang,
                    'tanggal_keluar' => $pemakaian_barang->tanggal_keluar,
                    'kategori_barang' => $pemakaian_barang->kategori->kategori_barang,
                    'stok_awal' => $stok_awal,
                    'stok_akhir' => $barang->stok,
                    'kategori_barang' => $pemakaian_barang->kategori->kategori_barang,
                    'jumlah' => $pemakaian_barang->jumlah,
                ]);
           // }
            $pemakaian_barang->delete();
            if($db){
                if(Auth::user()->level == "admin"){
                    return redirect()->route('pemakaian_barang_admin')->with('success', 'Data berhasil disetujui');
                }
                else if (Auth::user()->level == "user"){
                    return redirect()->route('pemakaian_barang_user')->with('success', 'Data berhasil disetujui');
                }
            }
            else{
                if(Auth::user()->level == "admin"){
                    return redirect()->route('pemakaian_barang_admin')->with('error', 'Data gagal disetujui');
                }
                else if (Auth::user()->level == "user"){
                    return redirect()->route('pemakaian_barang_user')->with('error', 'Data gagal disetujui');
                }
            }
        }
        else{
            if(Auth::user()->level == "admin"){
                return redirect()->route('pemakaian_barang_admin')->with('error', 'Data tidak ditemukan');
            }
            else if (Auth::user()->level == "user"){
                return redirect()->route('pemakaian_barang_user')->with('error', 'Data tidak ditemukan');
            }
        }
    }

}
