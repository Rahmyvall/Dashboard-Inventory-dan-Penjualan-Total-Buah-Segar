<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProdukApiController;
use App\Http\Controllers\Api\KategoriApiController;
use App\Http\Controllers\Api\SupplierApiController;
use App\Http\Controllers\Api\PelangganController;

/*
|--------------------------------------------------------------------------
| API ROUTES
|--------------------------------------------------------------------------
*/

// =======================
// PRODUK API
// =======================
Route::prefix('produk')->group(function () {

    Route::get('/', [ProdukApiController::class, 'index']);
    Route::get('/{id}', [ProdukApiController::class, 'show']);
    Route::post('/', [ProdukApiController::class, 'store']);
    Route::post('/{id}', [ProdukApiController::class, 'update']);
    Route::delete('/{id}', [ProdukApiController::class, 'destroy']);
});


// =======================
// SUPPLIER API
// =======================
Route::prefix('supplier')->group(function () {

    // 🔥 GET + SEARCH + FILTER
    Route::get('/', [SupplierApiController::class, 'index']);

    // DETAIL
    Route::get('/{id}', [SupplierApiController::class, 'show']);

    // CREATE
    Route::post('/', [SupplierApiController::class, 'store']);

    // UPDATE (upload foto)
    Route::post('/{id}', [SupplierApiController::class, 'update']);

    // DELETE
    Route::delete('/{id}', [SupplierApiController::class, 'destroy']);
});


// =======================
// PELANGGAN API (NEW 🔥)
// =======================
Route::prefix('pelanggan')->group(function () {

    // 🔥 GET + SEARCH + FILTER (optional nanti bisa dikembangkan)
    Route::get('/', [PelangganController::class, 'index']);

    // DETAIL
    Route::get('/{id}', [PelangganController::class, 'show']);

    // CREATE (auto generate kode)
    Route::post('/', [PelangganController::class, 'store']);

    // UPDATE
    Route::put('/{id}', [PelangganController::class, 'update']);
    Route::post('/{id}', [PelangganController::class, 'update']); // opsional biar fleksibel

    // DELETE
    Route::delete('/{id}', [PelangganController::class, 'destroy']);
});
