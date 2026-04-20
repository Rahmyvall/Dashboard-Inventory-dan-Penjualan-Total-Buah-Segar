<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;   // ← Tambahkan ini
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Total Buah Segar
|--------------------------------------------------------------------------
*/

// ==================== WELCOME ====================
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// ==================== AUTHENTICATION ====================

Route::get('/login', [AuthController::class, 'login'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])
    ->middleware('guest')
    ->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// ==================== DASHBOARD ====================

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
});

// ==================== ROLE-BASED ROUTES ====================

// === ADMIN ONLY ===
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class)->except(['show']);

    // ==================== KATEGORI (Admin Only) ====================
    Route::resource('kategori', KategoriController::class);

    // Jika ingin route manual (lebih fleksibel):
    // Route::prefix('kategori')->name('kategori.')->group(function () {
    //     Route::get('/', [KategoriController::class, 'index'])->name('index');
    //     Route::get('/create', [KategoriController::class, 'create'])->name('create');
    //     Route::post('/', [KategoriController::class, 'store'])->name('store');
    //     Route::get('/{kategori}/edit', [KategoriController::class, 'edit'])->name('edit');
    //     Route::put('/{kategori}', [KategoriController::class, 'update'])->name('update');
    //     Route::delete('/{kategori}', [KategoriController::class, 'destroy'])->name('destroy');
    // });
});

// === MANAGER ONLY ===
Route::middleware(['auth', 'role:manager'])->group(function () {
    // Tambahkan route manager di sini nanti
});

// === KASIR ONLY ===
Route::middleware(['auth', 'role:kasir'])->group(function () {
    // Tambahkan route kasir di sini nanti
});

// === GUDANG ONLY ===
Route::middleware(['auth', 'role:gudang'])->group(function () {
    // Tambahkan route gudang di sini nanti
});

// ==================== ROUTES UNTUK BEBERAPA ROLE ====================

// Tambahkan route yang bisa diakses oleh lebih dari satu role di sini nanti
