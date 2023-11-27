<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'login'])->name('login');

// Route::middleware(['admin'])->group(function () {
    Route::resource('/dashboard', DashboardController::class);

    Route::controller(LoginController::class)->group(function() {
        Route::get('/', [LoginController::class, 'login'])->name('login');
        Route::post('/', [LoginController::class, 'loginuser'])->name('loginuser');
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    });

    Route::controller(ProdukController::class)->group(function() {
        Route::resource('/produk', ProdukController::class);
        Route::get('/deleteproduk/{id}', [ProdukController::class, 'destroy'])->name('destroy');
        Route::post('/updateproduk/{id}', [ProdukController::class, 'update'])->name('update');
        Route::get('/showproduk/{id}', [ProdukController::class, 'show'])->name('show');
    });

    Route::controller(PelangganController::class)->group(function() {
        Route::resource('/pelanggan', PelangganController::class);
        Route::get('/deletepelanggan/{id}', [PelangganController::class, 'destroy'])->name('destroy');
        Route::post('/updatepelanggan/{id}', [PelangganController::class, 'update'])->name('update');
    });

    Route::controller(PemasokController::class)->group(function() {
        Route::resource('/pemasok', PemasokController::class);
        Route::get('/deletepemasok/{id}', [PemasokController::class, 'destroy'])->name('destroy');
        Route::post('/updatepemasok/{id}', [PemasokController::class, 'update'])->name('update');
    });

    Route::controller(TransaksiController::class)->group(function() {
        Route::resource('/transaksi', TransaksiController::class);
        Route::get('/showtransaksi/{id}', [TransaksiController::class, 'show'])->name('show');
    });
// });

// Route::middleware(['auth'])->group(function () {

// });