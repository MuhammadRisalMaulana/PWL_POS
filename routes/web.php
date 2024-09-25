<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use Illuminate\Support\Facades\Route;

Route::pattern('id', '[0-9]+');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postlogin']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [WelcomeController::class, 'index']);

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index']);          // menampilkan halaman awal user
        Route::post('/list', [UserController::class, 'list']);      // menampilkan data user dalam bentuk json untuk datatables
        Route::get('/create', [UserController::class, 'create']);   // menampilkan halaman form tambah user
        Route::post('/', [UserController::class, 'store']);         // menyimpan data user baru
        Route::get('/{id}', [UserController::class, 'show']);       // menampilkan detail user
        Route::get('/{id}/edit', [UserController::class, 'edit']);  // menampilkan halaman form edit user
        Route::put('/{id}', [UserController::class, 'update']);     // menyimpan perubahan data user
        Route::delete('/{id}', [UserController::class, 'destroy']);
    });

    Route::middleware(['authorize:ADM'])->group (function () {
        Route::get('/level', [LevelController::class, 'index']);          
        Route::post('/level/list', [LevelController::class, 'list']);     
        Route::get('/level/create_ajax', [LevelController::class, 'create']);   // untuk list json datatables
        Route::post('/level_ajax', [LevelController::class, 'store']);         
        Route::get('/level/{id}', [LevelController::class, 'show']);      
        Route::get('/level/{id}/edit', [LevelController::class, 'edit']);  // untuk tampilan form edit
        Route::put('/level/{id}', [LevelController::class, 'update']);     // untuk proses update data
        Route::delete('/level/{id}', [LevelController::class, 'destroy']); // untuk proses hapus data
    });

    Route::group(['prefix' => 'kategori'], function () {
        Route::get('/', [KategoriController::class, 'index']);          // Menampilkan halaman awal kategori
        Route::post('/list', [KategoriController::class, 'list']);      // Menampilkan data kategori dalam bentuk JSON untuk datatables
        Route::get('/create', [KategoriController::class, 'create']);   // Menampilkan halaman form tambah kategori
        Route::post('/', [KategoriController::class, 'store']);         // Menyimpan data kategori baru
        Route::get('/{id}', [KategoriController::class, 'show']);       // Menampilkan detail kategori
        Route::get('/{id}/edit', [KategoriController::class, 'edit']);  // Menampilkan halaman form edit kategori
        Route::put('/{id}', [KategoriController::class, 'update']);     // Menyimpan perubahan data kategori
        Route::delete('/{id}', [KategoriController::class, 'destroy']); // Menghapus data kategori
    });


    
    // artinya semua route di dalam group ini harus punya role ADM (Administrator) 
    Route::middleware (['authorize:ADM,MNG'])->group(function() {
    Route::get('/barang', [BarangController::class, 'index']);
    Route::post('/barang/list', [BarangController::class, 'list']);
    Route::get('/barang/create_ajax', [BarangController::class, 'create_ajax']); // ajax form create 
    Route::post('/barang_ajax', [BarangController::class, 'store_ajax']); // ajax store
    Route::get('/barang/{id}/edit_ajax', [BarangController::class, 'edit_ajax']); // ajax form edit 
    Route::put('/barang/{id}/update_ajax', [BarangController::class, 'update_ajax']); // ajax update 
    Route::get('/barang/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']); // ajax form confirm delete 
    Route::delete('/barang/{id}/delete_ajax', [BarangController::class, 'delete_ajax']); // ajax delete
    Route::delete('/barang/import', [BarangController::class, 'import']); // ajax form upload excel
    Route::delete('/barang/import_ajax', [BarangController::class, 'import_ajax']); // ajax import excel
    });


    Route::group(['prefix' => 'stok'], function () {
        Route::get('/', [StokController::class, 'index']);          // Menampilkan halaman awal Stok
        Route::post('/list', [StokController::class, 'list']);      // Menampilkan data Stok dalam bentuk JSON untuk datatables
        Route::get('/create', [StokController::class, 'create']);   // Menampilkan halaman form tambah Stok
        Route::post('/', [StokController::class, 'store']);         // Menyimpan data Stok baru
        Route::get('/{id}', [StokController::class, 'show']);       // Menampilkan detail Stok
        Route::get('/{id}/edit', [StokController::class, 'edit']);  // Menampilkan halaman form edit Stok
        Route::put('/{id}', [StokController::class, 'update']);     // Menyimpan perubahan data Stok
        Route::delete('/{id}', [StokController::class, 'destroy']); // Menghapus data Stok
    });

    Route::group(['prefix' => 'transaksi'], function () {
        Route::get('/', [TransaksiController::class, 'index']);          // Menampilkan halaman awal Transaksi
        Route::post('/list', [TransaksiController::class, 'list']);      // Menampilkan data Transaksi dalam bentuk JSON untuk datatables
        Route::get('/create', [TransaksiController::class, 'create']);   // Menampilkan halaman form tambah Transaksi
        Route::post('/', [TransaksiController::class, 'store']);         // Menyimpan data Transaksi baru
        Route::get('/{id}', [TransaksiController::class, 'show']);       // Menampilkan detail Transaksi
        Route::get('/{id}/edit', [TransaksiController::class, 'edit']);  // Menampilkan halaman form edit Transaksi
        Route::put('/{id}', [TransaksiController::class, 'update']);     // Menyimpan perubahan data Transaksi
        Route::delete('/{id}', [TransaksiController::class, 'destroy']); // Menghapus data Transaksi
    });
});