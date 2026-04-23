<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PelangganController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| WEB ROUTES - TOTAL BUAH SEGAR
|--------------------------------------------------------------------------
*/

// ==================== HOME ====================
Route::get('/', [FrontendController::class, 'index'])->name('welcome');


// ==================== AUTH ====================
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


// ==================== FRONTEND MARKETPLACE ====================

Route::prefix('suppliers')->name('suppliers.')->group(function () {

    // LIST SUPPLIER (PUBLIC)
    Route::get('/', [FrontendController::class, 'supplier'])
        ->name('index');

    // DETAIL PRODUK PER SUPPLIER
    Route::get('/{id}/products', [FrontendController::class, 'supplierProduk'])
        ->name('products');
});


// ==================== ADMIN ONLY ====================
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::resource('users', UserController::class)->except(['show']);

    Route::resource('kategori', KategoriController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('pelanggan', PelangganController::class);

    // ADMIN SUPPLIER CRUD (tetap pakai supplier)
    Route::resource('supplier', SupplierController::class);

    Route::get('/supplier/export-excel', [SupplierController::class, 'exportExcel'])
        ->name('supplier.excel');

    Route::get('/supplier/export-pdf', [SupplierController::class, 'exportPdf'])
        ->name('supplier.pdf');
});


// ==================== ROLE LAIN ====================
Route::middleware(['auth', 'role:manager'])->group(function () {
    // manager routes
});

Route::middleware(['auth', 'role:kasir'])->group(function () {
    // kasir routes
});

Route::middleware(['auth', 'role:gudang'])->group(function () {
    // gudang routes
});