<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UlasanController;
use App\Models\Wisata;
use App\Http\Controllers\AdminController;
use App\Models\Kategori;

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


// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

Route::get('/beach', function () {
    $pantaiList = Wisata::whereHas('kategori', function ($query) {
        $query->where('nama', 'Pantai');
    })->get();

    return view('destinations.beach', compact('pantaiList'));
});

Route::get('/gunung', function () {
    $gunungList = Wisata::whereHas('kategori', function ($query) {
        $query->where('nama', 'Gunung');
    })->get();

    return view('destinations.gunung', compact('gunungList'));
});

Route::get('/budaya', function () {
    $budayaList = Wisata::whereHas('kategori', function ($query) {
        $query->where('nama', 'Budaya');
    })->get();

    return view('destinations.budaya', compact('budayaList'));
});

Route::get('/kuliner', function () {
    $kulinerList = Wisata::whereHas('kategori', function ($query) {
        $query->where('nama', 'Kuliner');
    })->get();

    return view('destinations.kuliner', compact('kulinerList'));
});

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/wisata/{kategori}/{id}', [WisataController::class, 'detail'])->name('wisata.detail');

Route::post('/ulasan/store', [UlasanController::class, 'store'])->name('ulasan.store');


Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
Route::post('/admin/wisata', [AdminController::class, 'storeWisata'])->name('admin.wisata.store');
Route::delete('/admin/wisata/{id}', [AdminController::class, 'destroyWisata'])->name('admin.wisata.destroy');

Route::post('/admin/kategori', [AdminController::class, 'storeKategori'])->name('admin.kategori.store');
Route::delete('/admin/kategori/{id}', [AdminController::class, 'destroyKategori'])->name('admin.kategori.destroy');
