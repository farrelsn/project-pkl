<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DataPenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->level == 'admin'){
            $users = User::all();
            $admin = User::where('username', Auth::user()->username)->first();
            $dataPengguna = User::all();
            return view('admin.data_pengguna.index', ['title' => 'Data Pengguna', 'data_pengguna' => $dataPengguna, 'admin' => $admin, 'users' => $users]);
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
        if(Auth::user()->level == "admin"){
            //dd($request);
            $request->validate([
                'nama' => 'required',
                'nama_pengguna' => 'required|unique:users,username',
                'level' => 'required',
            ],[
                'nama.required' => 'Nama tidak boleh kosong',
                'nama_pengguna.required' => 'Nama Pengguna tidak boleh kosong',
                'level.required' => 'Level tidak boleh kosong',
                'nama_pengguna.unique' => 'Nama Pengguna sudah digunakan',
            ]);

            User::create([
                'nama' => $request->nama,
                'username' => $request->nama_pengguna,
                'password' => Hash::make('123'),
                'level' => $request->level,
            ]);

            return redirect()->route('data_pengguna_admin')->with('success', 'Data Pengguna Berhasil Ditambahkan');
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
        if(Auth::user()->level == "admin"){
            $user = User::find($id);
            if($user->username == Auth::user()->username){
                return redirect()->route('data_pengguna_admin')->with('error', 'Pengguna Tidak Bisa Dihapus');
            }
            else{
                $user->delete();
    
                return redirect()->route('data_pengguna_admin')->with('success', 'Pengguna Berhasil Dihapus');
            }
        }
    }
}
