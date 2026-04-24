<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PelangganController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES - TOTAL BUAH SEGAR
|--------------------------------------------------------------------------
*/

// ==================== HOME ====================
Route::get('/', [FrontendController::class, 'index'])->name('welcome');


// ==================== AUTH ====================
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


// ==================== DASHBOARD ====================
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/chart-produk', [DashboardController::class, 'chartProduk'])
        ->name('chart.produk');
});


// ==================== FRONTEND MARKETPLACE ====================
Route::prefix('suppliers')->name('suppliers.')->group(function () {

    Route::get('/', [FrontendController::class, 'supplier'])->name('index');

    Route::get('/{id}/products', [FrontendController::class, 'supplierProduk'])
        ->name('products');
});


// ==================== ADMIN ONLY ====================
Route::middleware(['auth', 'role:admin'])->group(function () {

    // ✅ FIX: aktifkan semua route termasuk users.show
    Route::resource('users', UserController::class);

    Route::resource('kategori', KategoriController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('supplier', SupplierController::class);

    // EXPORT SUPPLIER
    Route::prefix('supplier')->name('supplier.')->group(function () {
        Route::get('/export-excel', [SupplierController::class, 'exportExcel'])->name('excel');
        Route::get('/export-pdf', [SupplierController::class, 'exportPdf'])->name('pdf');
    });
});


// ==================== ROLE LAIN ====================

// MANAGER
Route::middleware(['auth', 'role:manager'])->group(function () {
    // route manager
});

// KASIR
Route::middleware(['auth', 'role:kasir'])->group(function () {
    // route kasir
});

// GUDANG
Route::middleware(['auth', 'role:gudang'])->group(function () {
    // route gudang
});
