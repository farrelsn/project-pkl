<?php

namespace App\Http\Controllers;

use App\Exports\PengajuanAdminExport;
use App\Exports\PengajuanUserExport;
use App\Exports\UsersExport;
use App\Models\tb_barang;
use App\Models\tb_kategori_barang;
use App\Models\tb_laporan_pengajuan_barang;
use App\Models\tb_pengajuan_barang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class PengajuanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajuan_barang = tb_pengajuan_barang::all();
        $barang = tb_barang::all();
        $kategori_barang = tb_kategori_barang::all();
        $tgl = date('Y-m-d');
        if(Auth::user()->level == "admin"){
            $admin = User::where('username', Auth::user()->username)->first();
            return view('admin.pengajuan_barang.index', ['title' => 'Daftar Pengajuan Barang', 'pengajuan_barang' => $pengajuan_barang, 'admin' => $admin, 'kategori_barang' => $kategori_barang, 'tgl' => $tgl, 'barang' => $barang]);
        }
        else if (Auth::user()->level == "user"){
            $user = User::where('username', Auth::user()->username)->first();
            return view('user.pengajuan_barang.index', ['title' => 'Daftar Pengajuan Barang', 'pengajuan_barang' => $pengajuan_barang, 'user' => $user, 'kategori_barang' => $kategori_barang, 'tgl' => $tgl, 'barang' => $barang]);
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
            'qtydus' => 'required|min:1|integer',
            
        ], [
            'nama_barang.required' => 'Nama Barang Harus Diisi',
            'tanggal_masuk.required' => 'Tanggal Masuk Harus Diisi',
            'qtydus.required' => 'Qty Dus Harus Diisi',
            'qtydus.min' => 'Qty Dus Minimal 1',
            'qtydus.integer' => 'Qty Dus Harus Berupa Angka',
        ]);

        if(Auth::user()->level == "admin"){
            if(tb_barang::where('id',$request->nama_barang)->first()->harga_baru == 0){
                return redirect()->route('pengajuan_barang_admin')->with('error','Harga Barang Belum Diisi!');
            }

            if(tb_barang::where('id',$request->nama_barang)->first()->qtydus == 0){
                return redirect()->route('pengajuan_barang_admin')->with('error','Jumlah Barang/Dus Belum Diisi!');
            }

            if(tb_pengajuan_barang::where('nama_barang',$request->nama_barang)->where('tanggal_masuk',$request->tanggal_masuk)->first()){
                return redirect()->route('pengajuan_barang_admin')->with('error','Data Sudah Ada!');
            }
        }
        else if (Auth::user()->level == "user"){
            if(tb_barang::where('id',$request->nama_barang)->first()->harga_baru == 0){
                return redirect()->route('pengajuan_barang_user')->with('error','Harga Barang Belum Diisi!');
            }

            if(tb_barang::where('id',$request->nama_barang)->first()->qtydus == 0){
                return redirect()->route('pengajuan_barang_user')->with('error','Jumlah Barang/Dus Belum Diisi!');
            }

            if(tb_pengajuan_barang::where('nama_barang',$request->nama_barang)->where('tanggal_masuk',$request->tanggal_masuk)->first()){
                return redirect()->route('pengajuan_barang_user')->with('error','Data Sudah Ada!');
            }
        }


        tb_pengajuan_barang::create([
            'nama_barang' => $request->nama_barang,
            'tanggal_masuk' => $request->tanggal_masuk,
            'qtydus' => $request->qtydus,
            'satuan_isi' => tb_barang::where('id', $request->nama_barang)->first()->qtydus,
            'harga' => tb_barang::where('id', $request->nama_barang)->first()->harga_baru,
        ]);

        if(Auth::user()->level == "admin"){
            return redirect()->route('pengajuan_barang_admin')->with('success', 'Data Berhasil Ditambahkan');
        }
        else if (Auth::user()->level == "user"){
            return redirect()->route('pengajuan_barang_user')->with('success', 'Data Berhasil Ditambahkan');
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

    public function delete($id){
        $pengajuan_barang = tb_pengajuan_barang::find($id);
        $pengajuan_barang->delete();
        if(Auth::user()->level == "admin"){
            return redirect()->route('pengajuan_barang_admin')->with('success', 'Data berhasil dihapus');
        }
        else if (Auth::user()->level == "user"){
            return redirect()->route('pengajuan_barang_user')->with('success', 'Data berhasil dihapus');
        }
    }

    public function export(){
        if(Auth::user()->level == "admin"){
            return Excel::download(new PengajuanAdminExport, 'pengajuan_barang.xlsx');
        }
        else if (Auth::user()->level == "user"){
            return Excel::download(new PengajuanUserExport, 'pengajuan_barang.xlsx');
        }
    }

    public function storelaporan($id){
        $pengajuan_barang = tb_pengajuan_barang::find($id);

        $barang = tb_barang::where('id', $pengajuan_barang->nama_barang)->first();
        $barang->stok = $barang->stok + $pengajuan_barang->qtydus * $pengajuan_barang->satuan_isi;
        $barang->save();


        if(tb_laporan_pengajuan_barang::where('nama_barang',$pengajuan_barang->barang->nama_barang)->where('tanggal_masuk',$pengajuan_barang->tanggal_masuk)->first()){
            $db = tb_laporan_pengajuan_barang::where('nama_barang',$pengajuan_barang->barang->nama_barang)->where('tanggal_masuk',$pengajuan_barang->tanggal_masuk)->first();
            $db->update([
                'stok_akhir' => $barang->stok,
                'qtydus' => $db->qtydus + $pengajuan_barang->qtydus,
                'total' => $db->total + ($pengajuan_barang->qtydus * $pengajuan_barang->harga),
            ]);
        }
        else{
            $db = tb_laporan_pengajuan_barang::create([
                'nama_barang' => $pengajuan_barang->barang->nama_barang,
                'tanggal_masuk' => $pengajuan_barang->tanggal_masuk,
                'stok_akhir' => $barang->stok,
                'qtydus' => $pengajuan_barang->qtydus,
                'satuan_isi' => $pengajuan_barang->satuan_isi,
                'harga' => $pengajuan_barang->harga,
                'total' => $pengajuan_barang->qtydus * $pengajuan_barang->harga,
            ]);
        }

        

        
        $pengajuan_barang->delete();

        if($db){
            if(Auth::user()->level == "admin"){
                return redirect()->route('pengajuan_barang_admin')->with('success', 'Data berhasil disetujui');
            }
            else if (Auth::user()->level == "user"){
                return redirect()->route('pengajuan_barang_user')->with('success', 'Data berhasil disetujui');
            }
        }
        else{
            if(Auth::user()->level == "admin"){
                return redirect()->route('pengajuan_barang_admin')->with('error', 'Data gagal disetujui');
            }
            else if (Auth::user()->level == "user"){
                return redirect()->route('pengajuan_barang_user')->with('error', 'Data gagal disetujui');
            }
        }
        
    }
}
