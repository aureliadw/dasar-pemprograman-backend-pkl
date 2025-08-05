<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Admin\PengajuanPenawaranController;
use App\Http\Controllers\Admin\PostingProyekController;
use App\Http\Controllers\Admin\UlasanController;
use App\Http\Controllers\Admin\PortofolioController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('pembayaran', PembayaranController::class);
    Route::resource('pengajuan-penawaran', PengajuanPenawaranController::class);
    Route::resource('posting-proyek', PostingProyekController::class);
    Route::resource('ulasan', UlasanController::class);
    Route::resource('portofolio', PortofolioController::class);
});

