<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\tb_jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = tb_jabatan::all();
        if(Auth::user()->level == "admin"){
            $admin = Auth::user();
            return view('admin.jabatan.index', ['title' => 'Data Jabatan', 'jabatan' => $jabatan, 'admin' => $admin]);
        }
        else if (Auth::user()->level == "user"){
            $user = Auth::user();
            return view('user.jabatan.index', ['title' => 'Data Jabatan', 'jabatan' => $jabatan, 'user' => $user]);
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
            'nama_jabatan' => 'required',
        ], [
            'nama_jabatan.required' => 'Nama Jabatan tidak boleh kosong',
        ]);

        tb_jabatan::create([
            'nama_jabatan' => $request->nama_jabatan,
        ]);

        if(Auth::user()->level == "admin"){
            return redirect()->route('jabatan_admin')->with('success', 'Data berhasil ditambahkan!');
        }
        else if (Auth::user()->level == "user"){
            return redirect()->route('jabatan_user')->with('success', 'Data berhasil ditambahkan!');
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
        $jabatan = tb_jabatan::find($id);
        if(Auth::user()->level == "admin"){
            $admin = Auth::user();
            return view('admin.jabatan.edit', ['title' => 'Data Jabatan', 'jabatan' => $jabatan, 'admin' => $admin]);
        }
        else if (Auth::user()->level == "user"){
            $user = Auth::user();
            return view('user.jabatan.edit', ['title' => 'Data Jabatan', 'jabatan' => $jabatan, 'user' => $user]);
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
            'nama_jabatan' => 'required',
        ], [
            'nama_jabatan.required' => 'Nama Jabatan tidak boleh kosong',
        ]);

        tb_jabatan::find($id)->update([
            'nama_jabatan' => $request->nama_jabatan,
        ]);

        if(Auth::user()->level == "admin"){
            return redirect()->route('jabatan_admin')->with('success', 'Data berhasil diubah!');
        }
        else if (Auth::user()->level == "user"){
            return redirect()->route('jabatan_user')->with('success', 'Data berhasil diubah!');
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

    public function delete($id)
    {
        tb_jabatan::find($id)->delete();
        if(Auth::user()->level == "admin"){
            return redirect()->route('jabatan_admin')->with('success', 'Data berhasil dihapus!');
        }
        else if (Auth::user()->level == "user"){
            return redirect()->route('jabatan_user')->with('success', 'Data berhasil dihapus!');
        }
    }
}
