<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ManajemenTugasController;
use App\Http\Controllers\Admin\PortofolioController;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Admin\PengajuanPenawaranController;
use App\Http\Controllers\Admin\PostingProyekController;
use App\Http\Controllers\Admin\UlasanController;
use App\Http\Controllers\Admin\UserController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ==================== RESOURCE ROUTES ====================
Route::resource('users', UserController::class)->names('admin.users');
Route::resource('portofolio', PortofolioController::class)->names('admin.portofolio');
Route::resource('pembayaran', PembayaranController::class)->names('admin.pembayaran');
Route::resource('pengajuan-penawaran', PengajuanPenawaranController::class)->names('admin.pengajuan-penawaran');
Route::resource('posting-proyek', PostingProyekController::class)->names('admin.posting-proyek');
Route::resource('ulasan', UlasanController::class)->names('admin.ulasan');
Route::resource('manajemen-tugas', ManajemenTugasController::class)->names('admin.manajemen-tugas');

// ==================== PROFILE ====================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';