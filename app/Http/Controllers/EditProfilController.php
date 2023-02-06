<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\tb_admin;
use App\Models\tb_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class EditProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->level == 'admin'){
            $admin = User::where('username', Auth::user()->username)->first();
            //dd($admin);
            return view('admin.edit_profil.index', ['title' => 'Edit Profil', 'admin' => $admin]);
        } else if(Auth::user()->level == 'user'){
            $user = User::where('username', Auth::user()->username)->first();
            return view('user.edit_profil.index', ['title' => 'Edit Profil', 'user' => $user]);
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
        //return $request->file('foto_profil')->store('public/foto_profil');

        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'foto_profil' => 'image|file|max:2048',
        ],[
            'nama.required' => 'Nama tidak boleh kosong',
            'username.required' => 'Username tidak boleh kosong',
            'foto_profil.image' => 'File yang diupload harus berupa gambar',
            'foto_profil.file' => 'File yang diupload harus berupa gambar',
            'foto_profil.max' => 'Ukuran file maksimal 2 MB',
        ]);

        if($request->username != Auth::user()->username){
            $request->validate([
                'username' => 'unique:users',
            ],[
                'username.unique' => 'Username sudah digunakan',
            ]);
        }

        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $fileName = time().'_'.$file->getClientOriginalName();
            $path = public_path('assets/images/foto_profil');
            $file->move($path, $fileName);
        }

        if (Auth::user()->level == 'admin'){
            $tb_admin = User::where('username', Auth::user()->username)->first();

            if($tb_admin->foto){
                File::delete(public_path('assets/images/foto_profil/').$tb_admin->foto);
            }
            $tb_admin->update([
                'nama' => $request->nama,
                'username' => $request->username,
                'foto' => $fileName,
            ]);
            User::where('username', Auth::user()->username)->update([
                'nama' => $request->nama,
                'username' => $request->username,
            ]);
            return redirect()->route('dashboard')->with('success', 'Data berhasil diubah');
        } 
        else if (Auth::user()->level == 'user'){
            $tb_user = User::where('username', Auth::user()->username)->first();
            if($tb_user->foto){
                File::delete(public_path('assets/images/foto_profil').$tb_user->foto);
                // Storage::delete('public/foto_profil/'.$tb_user->foto);
            }
            $tb_user->update([
                'nama' => $request->nama,
                'username' => $request->username,
                'foto' => $fileName,
            ]);
            User::where('username', Auth::user()->username)->update([
                'nama' => $request->nama,
                'username' => $request->username,
            ]);
            return redirect()->route('dashboard')->with('success', 'Data berhasil diubah');
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
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
}
