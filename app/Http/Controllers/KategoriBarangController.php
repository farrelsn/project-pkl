<?php

namespace App\Http\Controllers;

use App\Models\tb_kategori_barang;
use App\Http\Controllers\Controller;
use App\Models\tb_admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori_barang = tb_kategori_barang::all();
        if(Auth::user()->level == "admin"){
            $admin = User::where('username', Auth::user()->username)->first();
            return view('admin.kategori_barang.index', ['title' => 'Kategori Barang', 'kategori_barang' => $kategori_barang, 'admin' => $admin]);
        }
        else if (Auth::user()->level == "user"){
            $user = User::where('username', Auth::user()->username)->first();
            return view('user.kategori_barang.index', ['title' => 'Kategori Barang', 'kategori_barang' => $kategori_barang, 'user' => $user]);
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
            'kategori_barang' => 'required',
        ]);

        $db = tb_kategori_barang::create([
            'kategori_barang' => $request->kategori_barang,
        ]);

        if(Auth::user()->level == "user"){
            if($db){
                return redirect()->route('kategori_barang_user')->with('success', 'Data berhasil ditambahkan');
            }
            else {
                return redirect()->route('kategori_barang_user')->with('error', 'Data gagal ditambahkan');
            }
        }
        else if (Auth::user()->level == "admin"){
            if($db){
                return redirect()->route('kategori_barang_admin')->with('success', 'Data berhasil ditambahkan');
            }
            else {
                return redirect()->route('kategori_barang_admin')->with('error', 'Data gagal ditambahkan');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tb_kategori_barang  $tb_kategori_barang
     * @return \Illuminate\Http\Response
     */
    public function show(tb_kategori_barang $tb_kategori_barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tb_kategori_barang  $tb_kategori_barang
     * @return \Illuminate\Http\Response
     */
    public function edit(tb_kategori_barang $tb_kategori_barang, $id)
    {
        if(Auth::user()->level == "user"){
            $kategori_barang = tb_kategori_barang::where('id', $id)->first();
            $user = User::where('username', Auth::user()->username)->first();
            return view('user.kategori_barang.edit', ['title' => 'Kategori Barang', 'kategori_barang' => $kategori_barang, 'user' => $user]);
        }
        else if(Auth::user()->level == "admin"){
            $kategori_barang = tb_kategori_barang::where('id', $id)->first();
            $admin = User::where('username', Auth::user()->username)->first();
            return view('admin.kategori_barang.edit', ['title' => 'Kategori Barang', 'kategori_barang' => $kategori_barang, 'admin' => $admin]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tb_kategori_barang  $tb_kategori_barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tb_kategori_barang $tb_kategori_barang)
    {
        $request->validate([
            'kategori_barang' => 'required',
        ]);

        $db = tb_kategori_barang::where('id', $request->id)->update([
            'kategori_barang' => $request->kategori_barang,
        ]);

        if(Auth::user()->level == "user"){
            if($db){
                return redirect()->route('kategori_barang_user')->with('success', 'Data berhasil diubah');
            }
            else {
                return redirect()->back()->with('error', 'Data gagal diubah');//redirect()->route('kategori_barang_user')->with('error', 'Data gagal diubah');
            }
        }
        else if (Auth::user()->level == "admin"){
            if($db){
                return redirect()->route('kategori_barang_admin')->with('success', 'Data berhasil diubah');
            }
            else {
                return redirect()->route('kategori_barang_admin')->with('error', 'Data gagal diubah');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tb_kategori_barang  $tb_kategori_barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(tb_kategori_barang $tb_kategori_barang)
    {
        
    }

    public function delete($id)
    {
        $db = tb_kategori_barang::where('id', $id)->delete();
        if(Auth::user()->level == "user"){
            if($db){
                return redirect()->route('kategori_barang_user')->with('success', 'Data berhasil dihapus');
            }
            else {
                return redirect()->route('kategori_barang_user')->with('error', 'Data gagal dihapus');
            }
        }
        else if (Auth::user()->level == "admin"){
            if($db){
                return redirect()->route('kategori_barang_admin')->with('success', 'Data berhasil dihapus');
            }
            else {
                return redirect()->route('kategori_barang_admin')->with('error', 'Data gagal dihapus');
            }
        }
    }
}
