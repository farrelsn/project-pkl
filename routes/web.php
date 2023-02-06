<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataPenggunaController;
use App\Http\Controllers\EditProfilController;
use App\Http\Controllers\GantiPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\LaporanBarangKeluarController;
use App\Http\Controllers\LaporanBarangMasukController;
use App\Http\Controllers\LaporanGudangController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PegawaiController;
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

    Route::group(['middleware' => ['user']], function () {

        // Barang
        Route::get('/user/data-barang', [BarangController::class, 'index'])->name('data_barang_user');
        Route::post('/user/tambah-barang', [BarangController::class, 'store'])->name('data_barang_user.store');
        Route::get('/user/tambah-barang/{id}', [BarangController::class, 'edit'])->name('data_barang_user.edit');
        Route::post('/user/tambah-barang/{id}', [BarangController::class, 'update'])->name('data_barang_user.update');
        Route::get('/user/tambah-barang/{id}/delete', [BarangController::class, 'delete'])->name('data_barang_user.delete');


        // Kategori Barang
        Route::get('/user/kategori-barang', [KategoriBarangController::class, 'index'])->name('kategori_barang_user');
        Route::post('/user/kategori-barang', [KategoriBarangController::class, 'store'])->name('kategori_barang_user.store');
        Route::get('/user/kategori-barang/{id}', [KategoriBarangController::class, 'edit'])->name('kategori_barang_user.edit');
        Route::post('/user/kategori-barang/{id}', [KategoriBarangController::class, 'update'])->name('kategori_barang_user.update');
        Route::get('/user/kategori-barang/{id}/delete', [KategoriBarangController::class, 'delete'])->name('kategori_barang_user.delete');

        // Barang Masuk
        Route::get('/user/barang-masuk', [BarangMasukController::class, 'index'])->name('barang_masuk_user');
        Route::post('/user/barang-masuk', [BarangMasukController::class, 'store'])->name('barang_masuk_user.store');
        Route::get('/user/barang-masuk/{id}/delete', [BarangMasukController::class, 'delete'])->name('barang_masuk_user.delete');

        // Barang Keluar
        Route::get('/user/barang-keluar', [BarangKeluarController::class, 'index'])->name('barang_keluar_user');
        Route::post('/user/barang-keluar', [BarangKeluarController::class, 'store'])->name('barang_keluar_user.store');
        Route::get('/user/barang-keluar/{id}/delete', [BarangKeluarController::class, 'delete'])->name('barang_keluar_user.delete');

        // Pegawai
        Route::get('/user/pegawai', [PegawaiController::class, 'index'])->name('pegawai_user');
        Route::post('/user/pegawai', [PegawaiController::class, 'store'])->name('pegawai_user.store');
        Route::get('/user/pegawai/{id}', [PegawaiController::class, 'edit'])->name('pegawai_user.edit');
        Route::post('/user/pegawai/{id}', [PegawaiController::class, 'update'])->name('pegawai_user.update');
        Route::get('/user/pegawai/{id}/delete', [PegawaiController::class, 'delete'])->name('pegawai_user.delete');

        // Lokasi
        Route::get('/user/lokasi', [LokasiController::class, 'index'])->name('lokasi_user');
        Route::post('/user/lokasi', [LokasiController::class, 'store'])->name('lokasi_user.store');
        Route::get('/user/lokasi/{id}', [LokasiController::class, 'edit'])->name('lokasi_user.edit');
        Route::post('/user/lokasi/{id}', [LokasiController::class, 'update'])->name('lokasi_user.update');
        Route::get('/user/lokasi/{id}/delete', [LokasiController::class, 'delete'])->name('lokasi_user.delete');

        // Jabatan
        Route::get('/user/jabatan', [JabatanController::class, 'index'])->name('jabatan_user');
        Route::post('/user/jabatan', [JabatanController::class, 'store'])->name('jabatan_user.store');
        Route::get('/user/jabatan/{id}', [JabatanController::class, 'edit'])->name('jabatan_user.edit');
        Route::post('/user/jabatan/{id}', [JabatanController::class, 'update'])->name('jabatan_user.update');
        Route::get('/user/jabatan/{id}/delete', [JabatanController::class, 'delete'])->name('jabatan_user.delete');

        // Laporan Gudang
        Route::get('/user/laporan-gudang', [LaporanGudangController::class, 'index'])->name('laporan_gudang_user');
        
        // Laporan Barang Masuk
        Route::get('/user/laporan-barang-masuk', [LaporanBarangMasukController::class, 'index'])->name('laporan_barang_masuk_user');
        Route::post('/user/laporan-barang-masuk', [LaporanBarangMasukController::class, 'filter'])->name('laporan_barang_masuk_user.filter');

        //Laporan Barang Keluar
        Route::get('/user/laporan-barang-keluar', [LaporanBarangKeluarController::class, 'index'])->name('laporan_barang_keluar_user');
        Route::post('/user/laporan-barang-keluar', [LaporanBarangKeluarController::class, 'filter'])->name('laporan_barang_keluar_user.filter');

    } );

    Route::group(['middleware' => ['admin']], function () {

        // Barang
        Route::get('/admin/data-barang', [BarangController::class, 'index'])->name('data_barang_admin');
        Route::post('/admin/tambah-barang', [BarangController::class, 'store'])->name('data_barang_admin.store');
        Route::get('/admin/tambah-barang/{id}', [BarangController::class, 'edit'])->name('data_barang_admin.edit');
        Route::post('/admin/tambah-barang/{id}', [BarangController::class, 'update'])->name('data_barang_admin.update');
        Route::get('/admin/tambah-barang/{id}/delete', [BarangController::class, 'delete'])->name('data_barang_admin.delete');

        // Kategori Barang
        Route::get('/admin/kategori-barang', [KategoriBarangController::class, 'index'])->name('kategori_barang_admin');
        Route::post('/admin/kategori-barang', [KategoriBarangController::class, 'store'])->name('kategori_barang_admin.store');
        Route::get('/admin/kategori-barang/{id}', [KategoriBarangController::class, 'edit'])->name('kategori_barang_admin.edit');
        Route::post('/admin/kategori-barang/{id}', [KategoriBarangController::class, 'update'])->name('kategori_barang_admin.update');
        Route::get('/admin/kategori-barang/{id}/delete', [KategoriBarangController::class, 'delete'])->name('kategori_barang_admin.delete');

        // Barang Masuk
        Route::get('/admin/barang-masuk', [BarangMasukController::class, 'index'])->name('barang_masuk_admin');
        Route::post('/admin/barang-masuk', [BarangMasukController::class, 'store'])->name('barang_masuk_admin.store');
        Route::get('/admin/barang-masuk/{id}/delete', [BarangMasukController::class, 'delete'])->name('barang_masuk_admin.delete');

        // Barang Keluar
        Route::get('/admin/barang-keluar', [BarangKeluarController::class, 'index'])->name('barang_keluar_admin');
        Route::post('/admin/barang-keluar', [BarangKeluarController::class, 'store'])->name('barang_keluar_admin.store');
        Route::get('/admin/barang-keluar/{id}/delete', [BarangKeluarController::class, 'delete'])->name('barang_keluar_admin.delete');

        // Pegawai
        Route::get('/admin/pegawai', [PegawaiController::class, 'index'])->name('pegawai_admin');
        Route::post('/admin/pegawai', [PegawaiController::class, 'store'])->name('pegawai_admin.store');
        Route::get('/admin/pegawai/{id}', [PegawaiController::class, 'edit'])->name('pegawai_admin.edit');
        Route::post('/admin/pegawai/{id}', [PegawaiController::class, 'update'])->name('pegawai_admin.update');
        Route::get('/admin/pegawai/{id}/delete', [PegawaiController::class, 'delete'])->name('pegawai_admin.delete');


        // Data Pengguna
        Route::get('/admin/data-pengguna', [DataPenggunaController::class, 'index'])->name('data_pengguna_admin');
        Route::post('/admin/tambah-pengguna', [DataPenggunaController::class, 'store'])->name('data_pengguna_admin.store');
        Route::get('/admin/data-pengguna/{id}/delete', [DataPenggunaController::class, 'delete'])->name('data_pengguna_admin.delete');

        // Lokasi
        Route::get('/admin/lokasi', [LokasiController::class, 'index'])->name('lokasi_admin');
        Route::post('/admin/lokasi', [LokasiController::class, 'store'])->name('lokasi_admin.store');
        Route::get('/admin/lokasi/{id}', [LokasiController::class, 'edit'])->name('lokasi_admin.edit');
        Route::post('/admin/lokasi/{id}', [LokasiController::class, 'update'])->name('lokasi_admin.update');
        Route::get('/admin/lokasi/{id}/delete', [LokasiController::class, 'delete'])->name('lokasi_admin.delete');

        // Jabatan
        Route::get('/admin/jabatan', [JabatanController::class, 'index'])->name('jabatan_admin');
        Route::post('/admin/jabatan', [JabatanController::class, 'store'])->name('jabatan_admin.store');
        Route::get('/admin/jabatan/{id}', [JabatanController::class, 'edit'])->name('jabatan_admin.edit');
        Route::post('/admin/jabatan/{id}', [JabatanController::class, 'update'])->name('jabatan_admin.update');
        Route::get('/admin/jabatan/{id}/delete', [JabatanController::class, 'delete'])->name('jabatan_admin.delete');

        // Laporan Gudang
        Route::get('/admin/laporan-gudang', [LaporanGudangController::class, 'index'])->name('laporan_gudang_admin');
        
        // Laporan Barang Masuk
        Route::get('/admin/laporan-barang-masuk', [LaporanBarangMasukController::class, 'index'])->name('laporan_barang_masuk_admin');
        Route::post('/admin/laporan-barang-masuk', [LaporanBarangMasukController::class, 'filter'])->name('laporan_barang_masuk_admin.filter');

        //Laporan Barang Keluar
        Route::get('/admin/laporan-barang-keluar', [LaporanBarangKeluarController::class, 'index'])->name('laporan_barang_keluar_admin');
        Route::post('/admin/laporan-barang-keluar', [LaporanBarangKeluarController::class, 'filter'])->name('laporan_barang_keluar_admin.filter');

        
        // Edit Profil
        //Route::get('/admin/edit-profil', [EditProfilController::class, 'index'])->name('edit_profil_admin');
    } );

    // Route::group(['middleware' => ['admin']], function () {
    //     // Dashboard
    //     Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //     // Alat Kerja
    //     Route::get('/admin/data-barang', [BarangController::class, 'index'])->name('data_barang');
    //     Route::get('/admin/tambah-barang', [TambahBarangController::class, 'index'])->name('tambah_barang');
    //     Route::post('/admin/data-barang', [BarangController::class, 'store'])->name('tambah_barang.store');

    //     // kategori Alat
    //     Route::get('/kategori-barang', [KategoriBarangController::class, 'index']);
    // } );
    // // Dashboard
    // Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // // Alat Kerja
    // Route::get('/user/data-barang', [BarangController::class, 'index'])->name('data_barang');
    // Route::get('/user/tambah-barang', [TambahBarangController::class, 'index'])->name('tambah_barang');
    // Route::post('/user/data-barang', [BarangController::class, 'store'])->name('tambah_barang.store');

    // // kategori Alat
    // Route::get('/kategori-barang', [KategoriBarangController::class, 'index']);
} );

// Route::get('/login', [LoginController::class, 'index'])->name('login');
// Route::post('/postlogin', [LoginController::class, 'login']);
// Route::post('/logout', [LoginController::class, 'logout']);
