<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\tb_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = tb_pegawai::all();
        if(Auth::user()->level == "admin"){
            $admin = Auth::user();
            return view('admin.pegawai.index', ['title' => 'Data Pegawai', 'pegawai' => $pegawai, 'admin' => $admin]);
        }
        else if (Auth::user()->level == "user"){
            $user = Auth::user();
            return view('user.pegawai.index', ['title' => 'Data Pegawai', 'pegawai' => $pegawai, 'user' => $user]);
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
            'nama_pegawai' => 'required',
            'jabatan' => 'required',
        ], [
            'nama_pegawai.required' => 'Nama Pegawai tidak boleh kosong!',
            'jabatan.required' => 'Jabatan tidak boleh kosong!',
        ]);

        tb_pegawai::create([
            'nama' => $request->nama_pegawai,
            'jabatan' => $request->jabatan,
        ]);

        if(Auth::user()->level == "admin"){
            return redirect()->route('pegawai_admin')->with('success', 'Data berhasil ditambahkan!');
        }
        else if (Auth::user()->level == "user"){
            return redirect()->route('pegawai_user')->with('success', 'Data berhasil ditambahkan!');
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
        if(Auth::user()->level =="admin"){
            $admin = Auth::user();
            $pegawai = tb_pegawai::where('id', $id)->first();
            return view('admin.pegawai.edit', ['title' => 'Edit Data Pegawai', 'pegawai' => $pegawai, 'admin' => $admin]);
        }
        else if(Auth::user()->level =="user"){
            $user = Auth::user();
            $pegawai = tb_pegawai::where('id', $id)->first();
            return view('user.pegawai.edit', ['title' => 'Edit Data Pegawai', 'pegawai' => $pegawai, 'user' => $user]);
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
        request()->validate([
            'nama_pegawai' => 'required',
            'jabatan' => 'required',
        ], [
            'nama_pegawai.required' => 'Nama Pegawai tidak boleh kosong!',
            'jabatan.required' => 'Jabatan tidak boleh kosong!',
        ]);

        //dd($request);

        $db = tb_pegawai::where('id', $id)->update([
            'nama' => $request->nama_pegawai,
            'jabatan' => $request->jabatan,
        ]);

        if(Auth::user()->level == "admin"){
            if($db){
                return redirect()->route('pegawai_admin')->with('success', 'Data berhasil diubah!');
            }
            else{
                return redirect()->route('pegawai_admin')->with('error', 'Data gagal diubah!');
            }
        }
        else if (Auth::user()->level == "user"){
            if($db){
                return redirect()->route('pegawai_user')->with('success', 'Data berhasil diubah!');
            }
            else{
                return redirect()->route('pegawai_user')->with('error', 'Data gagal diubah!');
            }
        }
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
}
