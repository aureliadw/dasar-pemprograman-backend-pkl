<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Admin\PengajuanPenawaranController;
use App\Http\Controllers\Admin\PostingProyekController;
use App\Http\Controllers\Admin\UlasanController;
use App\Http\Controllers\Admin\PortofolioController;
use App\Http\Controllers\Admin\ManajemenTugasController;

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

Route::prefix('admin')->group(function () {

    // ==================== PORTOFOLIO ====================
    Route::get('portofolio', [PortofolioController::class, 'index'])->name('admin.portofolio.index');
    Route::get('portofolio/create', [PortofolioController::class, 'create'])->name('admin.portofolio.create');
    Route::post('portofolio', [PortofolioController::class, 'store'])->name('admin.portofolio.store');
    Route::get('portofolio/{id}/edit', [PortofolioController::class, 'edit'])->name('admin.portofolio.edit');
    Route::put('portofolio/{id}', [PortofolioController::class, 'update'])->name('admin.portofolio.update');
    Route::delete('portofolio/{id}', [PortofolioController::class, 'destroy'])->name('admin.portofolio.destroy');

    // ==================== PEMBAYARAN ====================
    Route::get('pembayaran', [PembayaranController::class, 'index'])->name('admin.pembayaran.index');
    Route::get('pembayaran/create', [PembayaranController::class, 'create'])->name('admin.pembayaran.create');
    Route::post('pembayaran', [PembayaranController::class, 'store'])->name('admin.pembayaran.store');
    Route::get('pembayaran/{id}/edit', [PembayaranController::class, 'edit'])->name('admin.pembayaran.edit');
    Route::put('pembayaran/{id}', [PembayaranController::class, 'update'])->name('admin.pembayaran.update');
    Route::delete('pembayaran/{id}', [PembayaranController::class, 'destroy'])->name('admin.pembayaran.destroy');

    // ==================== PENGAJUAN PENAWARAN ====================
    Route::get('pengajuan-penawaran', [PengajuanPenawaranController::class, 'index'])->name('admin.pengajuan-penawaran.index');
    Route::get('pengajuan-penawaran/create', [PengajuanPenawaranController::class, 'create'])->name('admin.pengajuan-penawaran.create');
    Route::post('pengajuan-penawaran', [PengajuanPenawaranController::class, 'store'])->name('admin.pengajuan-penawaran.store');
    Route::get('pengajuan-penawaran/{id}/edit', [PengajuanPenawaranController::class, 'edit'])->name('admin.pengajuan-penawaran.edit');
    Route::put('pengajuan-penawaran/{id}', [PengajuanPenawaranController::class, 'update'])->name('admin.pengajuan-penawaran.update');
    Route::delete('pengajuan-penawaran/{id}', [PengajuanPenawaranController::class, 'destroy'])->name('admin.pengajuan-penawaran.destroy');

    // ==================== POSTING PROYEK ====================
    Route::get('posting-proyek', [PostingProyekController::class, 'index'])->name('admin.posting-proyek.index');
    Route::get('posting-proyek/create', [PostingProyekController::class, 'create'])->name('admin.posting-proyek.create');
    Route::post('posting-proyek', [PostingProyekController::class, 'store'])->name('admin.posting-proyek.store');
    Route::get('posting-proyek/{id}/edit', [PostingProyekController::class, 'edit'])->name('admin.posting-proyek.edit');
    Route::put('posting-proyek/{id}', [PostingProyekController::class, 'update'])->name('admin.posting-proyek.update');
    Route::delete('posting-proyek/{id}', [PostingProyekController::class, 'destroy'])->name('admin.posting-proyek.destroy');

    // ==================== ULASAN ====================
    Route::get('ulasan', [UlasanController::class, 'index'])->name('admin.ulasan.index');
    Route::get('ulasan/create', [UlasanController::class, 'create'])->name('admin.ulasan.create');
    Route::post('ulasan', [UlasanController::class, 'store'])->name('admin.ulasan.store');
    Route::get('ulasan/{id}/edit', [UlasanController::class, 'edit'])->name('admin.ulasan.edit');
    Route::put('ulasan/{id}', [UlasanController::class, 'update'])->name('admin.ulasan.update');
    Route::delete('ulasan/{id}', [UlasanController::class, 'destroy'])->name('admin.ulasan.destroy');

    // ==================== MANAJEMEN TUGAS ====================
    Route::get('manajemen-tugas', [ManajemenTugasController::class, 'index'])->name('admin.manajemen-tugas.index');
    Route::get('manajemen-tugas/create', [ManajemenTugasController::class, 'create'])->name('admin.manajemen-tugas.create');
    Route::post('manajemen-tugas', [ManajemenTugasController::class, 'store'])->name('admin.manajemen-tugas.store');
    Route::get('manajemen-tugas/{id}/edit', [ManajemenTugasController::class, 'edit'])->name('admin.manajemen-tugas.edit');
    Route::put('manajemen-tugas/{id}', [ManajemenTugasController::class, 'update'])->name('admin.manajemen-tugas.update');
    Route::delete('manajemen-tugas/{id}', [ManajemenTugasController::class, 'destroy'])->name('admin.manajemen-tugas.destroy');

});

