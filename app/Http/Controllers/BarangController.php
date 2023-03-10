<?php

namespace App\Http\Controllers;

use App\Exports\BarangAdminExport;
use App\Exports\BarangUserExport;
use App\Models\barang;
use App\Models\tb_kategori_barang;
use App\Http\Controllers\Controller;
use App\Models\tb_admin;
use App\Models\tb_barang;
use App\Models\tb_lokasi;
use App\Models\tb_satuan;
use App\Models\tb_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = tb_barang::all();
        $kategori_barang = tb_kategori_barang::all();
        $satuan = tb_satuan::all();
        if (Auth::user()->level == 'admin') {
            $admin = User::where('username', Auth::user()->username)->first();
            return view('admin.barang.index', ['title' => 'Data Barang', 'barang' => $barang, 'admin' => $admin, 'kategori_barang' => $kategori_barang, 'satuan' => $satuan]);
        } 
        else if (Auth::user()->level == 'user'){
            $user = User::where('username', Auth::user()->username)->first();
            //dd($kategori_barang);
            return view('user.barang.index', ['title' => 'Data Barang', 'barang' => $barang, 'user' => $user, 'kategori_barang' => $kategori_barang, 'satuan' => $satuan]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'nama_barang' => 'required|unique:tb_barang,nama_barang',
            'kategori_barang' => 'required',
            'stok' => 'required|integer|min:0',
            'harga_lama' => 'required|integer|min:0',
            'harga_baru' => 'required|integer|min:0',
            'qtydus' => 'integer|min:0',
            'satuan' => 'required',
        ], [
            'nama_barang.required' => 'Nama barang tidak boleh kosong',
            'nama_barang.unique' => 'Nama barang sudah ada',
            'kategori_barang.required' => 'kategori barang tidak boleh kosong',
            'stok.required' => 'Stok tidak boleh kosong',
            'stok.integer' => 'Stok harus berupa bilangan bulat',
            'stok.min' => 'Stok tidak boleh kurang dari 0',
            'harga_lama.required' => 'Harga awal tidak boleh kosong',
            'harga_lama.integer' => 'Harga awal harus berupa bilangan bulat',
            'harga_lama.min' => 'Harga awal tidak boleh kurang dari 0',
            'harga_baru.required' => 'Harga akhir tidak boleh kosong',
            'harga_baru.integer' => 'Harga akhir harus berupa bilangan bulat',
            'harga_baru.min' => 'Harga akhir tidak boleh kurang dari 0',
            'qtydus.integer' => 'Qty/Dus harus berupa bilangan bulat',
            'qtydus.min' => 'Qty/Dus tidak boleh kurang dari 0',
            'satuan.required' => 'Satuan tidak boleh kosong',
        ]);


        $kode_kategori = tb_kategori_barang::where('id', $request->kategori_barang)->first()->id;
        $kode_barang = tb_barang::where('kategori_barang', $request->kategori_barang)->count() + 1;
        $kode = sprintf("%02d", $kode_kategori).'.'. sprintf("%03d", $kode_barang);
        while(tb_barang::where('kode_barang', $kode)->exists()){
            $kode_barang = $kode_barang + 1;
            $kode = sprintf("%02d", $kode_kategori).'.'. sprintf("%03d", $kode_barang);
        }

        // $kode_barang = DB::table('tb_barang')->max('kode_barang');
        // $kode_barang = $kode_barang + 1;
        // $kode_barang = str_pad($kode_barang, 4, "0", STR_PAD_LEFT);


        if (tb_barang::where('nama_barang', $request->nama_barang)->exists()) {
            if(Auth::user()->level == "admin")
                return redirect()->route('data_barang_admin')->with(['error' => 'Data barang sudah ada']);
            else if(Auth::user()->level == "user")
                return redirect()->route('data_barang_user')->with(['error' => 'Data barang sudah ada']);
        }

        $db = tb_barang::create([
            'nama_barang' => $request->nama_barang,
            'kategori_barang' => $request->kategori_barang,
            'stok' => $request->stok,
            'qtydus' => $request->qtydus,
            'kode_barang' => $kode,
            'harga_lama' => $request->harga_lama,
            'harga_baru' => $request->harga_baru,
            'satuan' => $request->satuan,
        ]);

        //dd($db);

        if(Auth::user()->level == "admin"){
            if ($db->save()) {
                return redirect()->route('data_barang_admin')->with(['success' => 'Data berhasil ditambahkan']);
            } else {
                return redirect()->route('data_barang_admin')->with(['error' => 'Data gagal ditambahkan']);
            }
        }

        else if(Auth::user()->level == "user"){
            if ($db->save()) {
                return redirect()->route('data_barang_user')->with(['success' => 'Data berhasil ditambahkan']);
            } else {
                return redirect()->route('data_barang_user')->with(['error' => 'Data gagal ditambahkan']);
            }
        }
        

        
        //return redirect()->route('data_barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(tb_barang $barang)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tb_barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(tb_barang $barang, $id)
    {
        if(Auth::user()->level == "user"){
            $barang = tb_barang::where('id', $id)->first();
            $user = User::where('username', Auth::user()->username)->first();
            $kategoribarang = tb_kategori_barang::all();
            $satuan = tb_satuan::all();
            return view('user.barang.edit', ['title' => 'Data Gudang', 'barang' => $barang, 'user' => $user, 'kategori_barang' => $kategoribarang, 'satuan' => $satuan]);
        }
        else if(Auth::user()->level == "admin"){
            $barang = tb_barang::where('id', $id)->first();
            $admin = User::where('username', Auth::user()->username)->first();
            $kategoribarang = tb_kategori_barang::all();
            $satuan = tb_satuan::all();
            return view('admin.barang.edit', ['title' => 'Data Gudang', 'barang' => $barang, 'admin' => $admin, 'kategori_barang' => $kategoribarang, 'satuan' => $satuan]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tb_barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $barang)
    {
        request()->validate([
            'nama_barang' => 'required|unique:tb_barang,nama_barang,'.$barang,
            'kategori_barang' => 'required',
            'stok' => 'required|integer|min:0',
            'harga_lama' => 'required|integer|min:0',
            'harga_baru' => 'required|integer|min:0',
            'qtydus' => 'integer|min:0',
            'satuan' => 'required',
        ], [
            'nama_barang.required' => 'Nama barang tidak boleh kosong',
            'nama_barang.unique' => 'Nama barang sudah ada',
            'kategori_barang.required' => 'kategori barang tidak boleh kosong',
            'stok.required' => 'Stok tidak boleh kosong',
            'stok.integer' => 'Stok harus berupa bilangan bulat',
            'stok.min' => 'Stok tidak boleh kurang dari 0',
            'harga_lama.required' => 'Harga awal tidak boleh kosong',
            'harga_lama.integer' => 'Harga awal harus berupa bilangan bulat',
            'harga_lama.min' => 'Harga awal tidak boleh kurang dari 0',
            'harga_baru.required' => 'Harga akhir tidak boleh kosong',
            'harga_baru.integer' => 'Harga akhir harus berupa bilangan bulat',
            'harga_baru.min' => 'Harga akhir tidak boleh kurang dari 0',
            'qtydus.integer' => 'Qty/Dus harus berupa bilangan bulat',
            'qtydus.min' => 'Qty/Dus tidak boleh kurang dari 0',
            'satuan.required' => 'Satuan tidak boleh kosong',
        ]);

        // dd($request);
        //dd($id, $request->kategori_barang);

        $brg = tb_barang::where('id', $barang)->first();
        if($brg->kategori_barang == $request->kategori_barang){
            //dd($brg);
            $kode = $brg->kode_barang;
        }
        // if(tb_kategori_barang::where('id', $request->kategori_barang)->exists()){
        // }
        else{
            $kode_kategori = tb_kategori_barang::where('id', $request->kategori_barang)->first()->id;
            //dd($kode_kategori);
            $kode_barang = tb_barang::where('kode_barang',$brg->kode_barang)->first()->kode_barang;//tb_barang::where('kategori_barang', $request->kategori_barang)->count() + 1;
            $kode_barang = substr($kode_barang, 3);
            $kode = sprintf("%02d", $kode_kategori).'.'. sprintf("%03d", $kode_barang);
            while(tb_barang::where('kode_barang', $kode)->exists()){
                $kode_barang = $kode_barang + 1;
                $kode = sprintf("%02d", $kode_kategori).'.'. sprintf("%03d", $kode_barang);
            }
        }

        

        $db = tb_barang::where('id', $request->id)->update([
            'nama_barang' => $request->nama_barang,
            'kode_barang' => $kode,
            'kategori_barang' => $request->kategori_barang,
            'stok' => $request->stok,
            'harga_lama' => $request->harga_lama,
            'harga_baru' => $request->harga_baru,
            'qtydus' => $request->qtydus,
            'satuan' => $request->satuan,
        ]);

        if(Auth::user()->level == "admin"){
            if ($db) {
                return redirect()->route('data_barang_admin')->with(['success' => 'Data berhasil diubah']);
            } else {
                return redirect()->route('data_barang_admin')->with(['error' => 'Data gagal diubah']);
            }
        }
        else if(Auth::user()->level == "user"){
            if ($db) {
                return redirect()->route('data_barang_user')->with(['success' => 'Data berhasil diubah']);
            } else {
                return redirect()->route('data_barang_user')->with(['error' => 'Data gagal diubah']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(tb_barang $barang)
    {
        //
    }

    public function delete($id)
    {
        $barang = tb_barang::findOrFail($id);
        $barang->delete();

        if(Auth::user()->level == "admin"){
            return redirect()->route('data_barang_admin')->with(['success' => 'Data berhasil dihapus']);
        }
        else if(Auth::user()->level == "user"){
            return redirect()->route('data_barang_user')->with(['success' => 'Data berhasil dihapus']);
        }
    }

    public function export(){
        if(Auth::user()->level == "user"){
            return Excel::download(new BarangUserExport, 'Data Barang.xlsx');
        }
        else if(Auth::user()->level == "admin"){
            return Excel::download(new BarangAdminExport, 'Data Barang.xlsx');
        }
    }
}
