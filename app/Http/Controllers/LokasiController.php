<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\tb_lokasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lokasi = tb_lokasi::all();
        if(Auth::user()->level == "admin"){
            $admin = Auth::user();
            return view('admin.lokasi.index', ['title' => 'Data Karyawan/Lokasi', 'lokasi' => $lokasi, 'admin' => $admin]);
        }
        else if (Auth::user()->level == "user"){
            $user = Auth::user();
            return view('user.lokasi.index', ['title' => 'Data Karyawan/Lokasi', 'lokasi' => $lokasi, 'user' => $user]);
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
            'nama_lokasi' => 'required',
        ], [
            'nama_lokasi.required' => 'Nama Lokasi tidak boleh kosong!',
        ]);

        tb_lokasi::create([
            'nama_lokasi' => $request->nama_lokasi,
        ]);

        if(Auth::user()->level == "admin"){
            return redirect()->route('lokasi_admin')->with('success', 'Data berhasil ditambahkan!');
        }
        else if (Auth::user()->level == "user"){
            return redirect()->route('lokasi_user')->with('success', 'Data berhasil ditambahkan!');
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
        if(Auth::user()->level == "user"){
            $karyawan = tb_lokasi::where('id', $id)->first();
            $user = User::where('username', Auth::user()->username)->first();
            return view('user.lokasi.edit', ['title' => 'Edit Data Karyawan/Lokasi', 'karyawan' => $karyawan, 'user' => $user]);
        }
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
        $lokasi = tb_lokasi::find($id);
        $lokasi->delete();

        if(Auth::user()->level == "admin"){
            return redirect()->route('lokasi_admin')->with('success', 'Data berhasil dihapus!');
        }
        else if (Auth::user()->level == "user"){
            return redirect()->route('lokasi_user')->with('success', 'Data berhasil dihapus!');
        }
    }
}
