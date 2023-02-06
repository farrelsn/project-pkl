<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\tb_admin;
use App\Models\tb_barang;
use App\Models\tb_kategori_barang;
use App\Models\tb_lokasi;
use App\Models\tb_pegawai;
use App\Models\tb_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $username = Auth::user();
        $barang = tb_barang::all();
        $kategori_barang = tb_kategori_barang::all();
        $lokasi = tb_lokasi::all();
        $pegawai = tb_pegawai::all();
        if (Auth::user()->level == 'admin'){
            $users = User::all();
            $admin = User::where('username', Auth::user()->username)->first();
            return view('dashboard.index', ['title' => 'Dashboard', 'admin' => $admin, 'username' => $username, 'users' => $users, 'barang' => $barang, 'kategori_barang' => $kategori_barang, 'lokasi' => $lokasi, 'pegawai' => $pegawai]);
        }
        else if (Auth::user()->level == 'user'){
            $user = User::where('username', Auth::user()->username)->first();
            return view('dashboard.index', ['title' => 'Dashboard', 'user' => $user, 'username' => $username, 'barang' => $barang, 'kategori_barang' => $kategori_barang, 'lokasi' => $lokasi, 'pegawai' => $pegawai]);
        }
    }
}
