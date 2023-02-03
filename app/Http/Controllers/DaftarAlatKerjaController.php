<?php

namespace App\Http\Controllers;

use App\Models\tb_daftar_alat;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DaftarAlatKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->level == 'user'){
            $user = User::where('username', Auth::user()->username)->first();
            $daftar_alat = tb_daftar_alat::all();
            return view('user.daftar_alat_kerja.index', ['title' => 'Daftar Alat Kerja', 'user' => $user, 'daftar_alat' => $daftar_alat]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tb_daftar_alat  $tb_daftar_alat
     * @return \Illuminate\Http\Response
     */
    public function show(tb_daftar_alat $tb_daftar_alat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tb_daftar_alat  $tb_daftar_alat
     * @return \Illuminate\Http\Response
     */
    public function edit(tb_daftar_alat $tb_daftar_alat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tb_daftar_alat  $tb_daftar_alat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tb_daftar_alat $tb_daftar_alat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tb_daftar_alat  $tb_daftar_alat
     * @return \Illuminate\Http\Response
     */
    public function destroy(tb_daftar_alat $tb_daftar_alat)
    {
        //
    }
}
