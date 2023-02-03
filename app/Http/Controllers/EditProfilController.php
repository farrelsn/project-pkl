<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\tb_admin;
use App\Models\tb_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        ]);

        if ($request->hasFile('foto_profil')) {
            $request->file('foto_profil')->store('public/foto_profil');
            $fileName = $request->file('foto_profil')->hashName();
        }

        if (Auth::user()->level == 'admin'){
            $tb_admin = User::where('username', Auth::user()->username)->first();
            if($tb_admin->foto){
                Storage::delete('public/foto_profil/'.$tb_admin->foto);
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
                Storage::delete('public/foto_profil/'.$tb_user->foto);
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
        // dd($request);
        // $request->validate([
        //     'nama' => 'required',
        //     'username' => 'required',
        //     'foto' => 'required',
        // ]);

        // if (Auth::user()->level == 'admin'){
        //     User::where('username', Auth::user()->username)->update([
        //         'name' => $request->nama,
        //         'username' => $request->username,
        //         'foto' => $request->foto_profil,
        //     ]);
        //     return redirect()->route('admin.edit_profil.index');//->with('success', 'Data berhasil diubah');
        // } 
        // else if (Auth::user()->level == 'user'){
        //     User::where('id', Auth::user()->id)->update([
        //         'name' => $request->nama,
        //         'username' => $request->username,
        //         'foto' => $request->foto_profil,
        //     ]);
        //     return redirect()->route('user.edit_profil.index');//->with('success', 'Data berhasil diubah');
        // }
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
