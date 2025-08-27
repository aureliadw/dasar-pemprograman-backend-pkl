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
use App\Http\Controllers\Admin\PermissionController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\RoleController;


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

// Halaman Utama
Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    // ---------------- User Management ----------------
    Route::get('/users', [UserController::class, 'index'])
        ->middleware('permission:view_user')
        ->name('admin.users.index');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])
        ->middleware('permission:edit_user')
        ->name('admin.users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])
        ->middleware('permission:edit_user')
        ->name('admin.users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])
        ->middleware('permission:delete_user')
        ->name('admin.users.destroy');

    // ---------------- Portofolio ----------------
    Route::resource('portofolio', PortofolioController::class)->names([
        'index'   => 'admin.portofolio.index',
        'create'  => 'admin.portofolio.create',
        'store'   => 'admin.portofolio.store',
        'show'    => 'admin.portofolio.show',
        'edit'    => 'admin.portofolio.edit',
        'update'  => 'admin.portofolio.update',
        'destroy' => 'admin.portofolio.destroy',
    ]);

    // ---------------- Pembayaran ----------------
    Route::resource('pembayaran', PembayaranController::class)->names([
        'index'   => 'admin.pembayaran.index',
        'create'  => 'admin.pembayaran.create',
        'store'   => 'admin.pembayaran.store',
        'show'    => 'admin.pembayaran.show',
        'edit'    => 'admin.pembayaran.edit',
        'update'  => 'admin.pembayaran.update',
        'destroy' => 'admin.pembayaran.destroy',
    ]);

    // ---------------- Pengajuan Penawaran ----------------
    Route::resource('pengajuan-penawaran', PengajuanPenawaranController::class)->names([
        'index'   => 'admin.pengajuan.index',
        'create'  => 'admin.pengajuan.create',
        'store'   => 'admin.pengajuan.store',
        'show'    => 'admin.pengajuan.show',
        'edit'    => 'admin.pengajuan.edit',
        'update'  => 'admin.pengajuan.update',
        'destroy' => 'admin.pengajuan.destroy',
    ]);

    // ---------------- Posting Proyek ----------------
    Route::resource('posting-proyek', PostingProyekController::class)->names([
        'index'   => 'admin.posting-proyek.index',
        'create'  => 'admin.porsting-proyek.create',
        'store'   => 'admin.posting-proyek.store',
        'show'    => 'admin.posting-proyek.show',
        'edit'    => 'admin.posting-proyek.edit',
        'update'  => 'admin.posting-proyek.update',
        'destroy' => 'admin.posting-proyek.destroy',
    ]);

    // ---------------- Ulasan ----------------
    Route::resource('ulasan', UlasanController::class)->names([
        'index'   => 'admin.ulasan.index',
        'create'  => 'admin.ulasan.create',
        'store'   => 'admin.ulasan.store',
        'show'    => 'admin.ulasan.show',
        'edit'    => 'admin.ulasan.edit',
        'update'  => 'admin.ulasan.update',
        'destroy' => 'admin.ulasan.destroy',
    ]);

    // ---------------- Manajemen Tugas ----------------
    Route::resource('manajemen-tugas', ManajemenTugasController::class)->names([
        'index'   => 'admin.manajemen-tugas.index',
        'create'  => 'admin.manajemen-tugas.create',
        'store'   => 'admin.manajemen-tugas.store',
        'show'    => 'admin.manajemen-tugas.show',
        'edit'    => 'admin.manajemen-tugas.edit',
        'update'  => 'admin.manajemen-tugas.update',
        'destroy' => 'admin.manajemen-tugas.destroy',
    ]);

    // ---------------- Roles (khusus admin/superadmin) ----------------
    Route::resource('roles', RoleController::class)->names([
        'index'   => 'roles.index',
        'create'  => 'roles.create',
        'store'   => 'roles.store',
        'show'    => 'roles.show',
        'edit'    => 'roles.edit',
        'update'  => 'roles.update',
        'destroy' => 'roles.destroy',
    ]);

    // ---------------- Permissions (khusus admin/superadmin) ----------------
    Route::resource('permissions', PermissionController::class)->names([
        'index'   => 'permissions.index',
        'create'  => 'permissions.create',
        'store'   => 'permissions.store',
        'show'    => 'permissions.show',
        'edit'    => 'permissions.edit',
        'update'  => 'permissions.update',
        'destroy' => 'permissions.destroy',
    ]);
});

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Logout
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

require __DIR__.'/auth.php';