<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\KategoriController;


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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'check_login'])->name('login.check_login');
Route::get('/logout', [BarangController::class, 'logout'])->name('barang.logout');

Route::resource('/barang', \App\Http\Controllers\BarangController::class);
Route::resource('/supplier', \App\Http\Controllers\SupplierController::class);
Route::resource('/kategori', \App\Http\Controllers\KategoriController::class);

// Route::get('/barang', [\App\Http\Controllers\BarangController::class, 'index']);

// Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
// Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
// Route::post('/barang', [BarangController::class, 'update'])->name('barang.update');
// Route::delete('/barang', [BarangController::class, 'delete'])->name('barang.delete');

