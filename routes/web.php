<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PemakaianBarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataPenggunaController;
use App\Http\Controllers\EditProfilController;
use App\Http\Controllers\GantiPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\LaporanPemakaianBarangController;
use App\Http\Controllers\LaporanBarangMasukController;
use App\Http\Controllers\LaporanGudangController;
use App\Http\Controllers\LaporanPermintaanBarangController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PermintaanBarangController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

//Login
Route::get('/login', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->middleware('guest')->name('login.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Edit Profil
    Route::get('/edit-profil', [EditProfilController::class, 'index'])->name('edit_profil');
    Route::post('/edit-profil', [EditProfilController::class, 'store'])->name('edit_profil.update');

    // Ganti Password
    Route::get('/ganti-password', [GantiPasswordController::class, 'index'])->name('ganti_password');
    Route::post('/ganti-password', [GantiPasswordController::class, 'store'])->name('ganti_password.update');

    // Permintaan Barang (Excel)
    Route::get('/permintaan-barang/export', [PermintaanBarangController::class, 'export'])->name('pengajuan_barang.excel');
    Route::get('/laporan-permintaan-barang/export/', [LaporanPermintaanBarangController::class, 'export'])->name('laporan_pengajuan_barang.excel');

    Route::group(['middleware' => ['user']], function () {

        // Barang
        Route::get('/user/data-barang', [BarangController::class, 'index'])->name('data_barang_user');
        Route::post('/user/tambah-barang', [BarangController::class, 'store'])->name('data_barang_user.store');
        Route::get('/user/tambah-barang/{id}', [BarangController::class, 'edit'])->name('data_barang_user.edit');
        Route::post('/user/tambah-barang/{id}', [BarangController::class, 'update'])->name('data_barang_user.update');
        Route::get('/user/tambah-barang/{id}/delete', [BarangController::class, 'delete'])->name('data_barang_user.delete');
        Route::get('/user/data-barang/export', [BarangController::class, 'export'])->name('data_barang_user.export');


        // Kategori Barang
        Route::get('/user/kategori-barang', [KategoriBarangController::class, 'index'])->name('kategori_barang_user');
        Route::post('/user/kategori-barang', [KategoriBarangController::class, 'store'])->name('kategori_barang_user.store');
        Route::get('/user/kategori-barang/{id}', [KategoriBarangController::class, 'edit'])->name('kategori_barang_user.edit');
        Route::post('/user/kategori-barang/{id}', [KategoriBarangController::class, 'update'])->name('kategori_barang_user.update');
        Route::get('/user/kategori-barang/{id}/delete', [KategoriBarangController::class, 'delete'])->name('kategori_barang_user.delete');
        
        // Permintaan Barang
        Route::get('/user/permintaan-barang', [PermintaanBarangController::class, 'index'])->name('pengajuan_barang_user');
        Route::post('/user/permintaan-barang', [PermintaanBarangController::class, 'store'])->name('pengajuan_barang_user.store');
        Route::get('/user/permintaan-barang/{id}/delete', [PermintaanBarangController::class, 'delete'])->name('pengajuan_barang_user.delete');
        Route::get('/user/permintaan-barang/{id}/store-laporan', [PermintaanBarangController::class, 'storelaporan'])->name('pengajuan_barang_user.storelaporan');

        // Pemakaian Barang
        Route::get('/user/pemakaian-barang', [PemakaianBarangController::class, 'index'])->name('barang_keluar_user');
        Route::post('/user/pemakaian-barang', [PemakaianBarangController::class, 'store'])->name('barang_keluar_user.store');
        Route::get('/user/pemakaian-barang/{id}/delete', [PemakaianBarangController::class, 'delete'])->name('barang_keluar_user.delete');
        Route::get('/user/pemakaian-barang/{id}/store-laporan', [PemakaianBarangController::class, 'storelaporan'])->name('barang_keluar_user.storelaporan');

        // Laporan Gudang
        Route::get('/user/laporan-gudang', [LaporanGudangController::class, 'index'])->name('laporan_gudang_user');

        // Laporan Permintaan Barang
        Route::get('/user/laporan-permintaan-barang', [LaporanPermintaanBarangController::class, 'index'])->name('laporan_pengajuan_barang_user');
        Route::post('/user/laporan-permintaan-barang', [LaporanPermintaanBarangController::class, 'action'])->name('laporan_pengajuan_barang_user.action');
        Route::get('/user/laporan-permintaan-barang/{id}/delete', [LaporanPermintaanBarangController::class, 'delete'])->name('laporan_pengajuan_barang_user.delete');
        Route::get('/user/laporan-permintaan-barang/export', [LaporanPermintaanBarangController::class, 'export'])->name('laporan_pengajuan_barang_user.export');
        

        // Laporan Pemakaian Barang
        Route::get('/user/laporan-pemakaian-barang', [LaporanPemakaianBarangController::class, 'index'])->name('laporan_barang_keluar_user');
        Route::post('/user/laporan-pemakaian-barang', [LaporanPemakaianBarangController::class, 'action'])->name('laporan_barang_keluar_user.action');
        Route::get('/user/laporan-pemakaian-barang/{id}/delete', [LaporanPemakaianBarangController::class, 'delete'])->name('laporan_barang_keluar_user.delete');

    } );

    Route::group(['middleware' => ['admin']], function () {

        // Barang
        Route::get('/admin/data-barang', [BarangController::class, 'index'])->name('data_barang_admin');
        Route::post('/admin/tambah-barang', [BarangController::class, 'store'])->name('data_barang_admin.store');
        Route::get('/admin/tambah-barang/{id}', [BarangController::class, 'edit'])->name('data_barang_admin.edit');
        Route::post('/admin/tambah-barang/{id}', [BarangController::class, 'update'])->name('data_barang_admin.update');
        Route::get('/admin/tambah-barang/{id}/delete', [BarangController::class, 'delete'])->name('data_barang_admin.delete');
        Route::get('/admin/data-barang/export', [BarangController::class, 'export'])->name('data_barang_admin.export');

        // Kategori Barang
        Route::get('/admin/kategori-barang', [KategoriBarangController::class, 'index'])->name('kategori_barang_admin');
        Route::post('/admin/kategori-barang', [KategoriBarangController::class, 'store'])->name('kategori_barang_admin.store');
        Route::get('/admin/kategori-barang/{id}', [KategoriBarangController::class, 'edit'])->name('kategori_barang_admin.edit');
        Route::post('/admin/kategori-barang/{id}', [KategoriBarangController::class, 'update'])->name('kategori_barang_admin.update');
        Route::get('/admin/kategori-barang/{id}/delete', [KategoriBarangController::class, 'delete'])->name('kategori_barang_admin.delete');

        // Permintaan Barang
        Route::get('/admin/permintaan-barang', [PermintaanBarangController::class, 'index'])->name('pengajuan_barang_admin');
        Route::post('/admin/permintaan-barang', [PermintaanBarangController::class, 'store'])->name('pengajuan_barang_admin.store');
        Route::get('/admin/permintaan-barang/{id}/delete', [PermintaanBarangController::class, 'delete'])->name('pengajuan_barang_admin.delete');
        Route::get('/admin/permintaan-barang/{id}/store-laporan', [PermintaanBarangController::class, 'storelaporan'])->name('pengajuan_barang_admin.storelaporan');


        // Pemakaian Barang
        Route::get('/admin/pemakaian-barang', [PemakaianBarangController::class, 'index'])->name('barang_keluar_admin');
        Route::post('/admin/pemakaian-barang', [PemakaianBarangController::class, 'store'])->name('barang_keluar_admin.store');
        Route::get('/admin/pemakaian-barang/{id}/delete', [PemakaianBarangController::class, 'delete'])->name('barang_keluar_admin.delete');
        Route::get('/admin/pemakaian-barang/{id}/store-laporan', [PemakaianBarangController::class, 'storelaporan'])->name('barang_keluar_admin.storelaporan');

        // // Pegawai
        // Route::get('/admin/pegawai', [PegawaiController::class, 'index'])->name('pegawai_admin');
        // Route::post('/admin/pegawai', [PegawaiController::class, 'store'])->name('pegawai_admin.store');
        // Route::get('/admin/pegawai/{id}', [PegawaiController::class, 'edit'])->name('pegawai_admin.edit');
        // Route::post('/admin/pegawai/{id}', [PegawaiController::class, 'update'])->name('pegawai_admin.update');
        // Route::get('/admin/pegawai/{id}/delete', [PegawaiController::class, 'delete'])->name('pegawai_admin.delete');


        // Data Pengguna
        Route::get('/admin/data-pengguna', [DataPenggunaController::class, 'index'])->name('data_pengguna_admin');
        Route::post('/admin/tambah-pengguna', [DataPenggunaController::class, 'store'])->name('data_pengguna_admin.store');
        Route::get('/admin/data-pengguna/{id}/delete', [DataPenggunaController::class, 'delete'])->name('data_pengguna_admin.delete');

        // Laporan Gudang
        Route::get('/admin/laporan-gudang', [LaporanGudangController::class, 'index'])->name('laporan_gudang_admin');

        // Laporan Permintaan Barang
        Route::get('/admin/laporan-permintaan-barang', [LaporanPermintaanBarangController::class, 'index'])->name('laporan_pengajuan_barang_admin');
        Route::post('/admin/laporan-permintaan-barang', [LaporanPermintaanBarangController::class, 'action'])->name('laporan_pengajuan_barang_admin.action');
        Route::get('/admin/laporan-permintaan-barang/{id}/delete', [LaporanPermintaanBarangController::class, 'delete'])->name('laporan_pengajuan_barang_admin.delete');

        //Laporan Pemakaian Barang
        Route::get('/admin/laporan-pemakaian-barang', [LaporanPemakaianBarangController::class, 'index'])->name('laporan_barang_keluar_admin');
        Route::post('/admin/laporan-pemakaian-barang', [LaporanPemakaianBarangController::class, 'action'])->name('laporan_barang_keluar_admin.action');
        Route::get('/admin/laporan-pemakaian-barang/{id}/delete', [LaporanPemakaianBarangController::class, 'delete'])->name('laporan_barang_keluar_admin.delete');
        
    } );

} );
