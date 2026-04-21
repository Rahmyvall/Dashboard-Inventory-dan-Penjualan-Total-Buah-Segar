<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProdukApiController;
use App\Http\Controllers\Api\KategoriApiController;
use App\Http\Controllers\Api\SupplierApiController;

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
    Route::post('/{id}', [ProdukApiController::class, 'update']); // upload gambar
    Route::delete('/{id}', [ProdukApiController::class, 'destroy']);
});


// =======================
// SUPPLIER API (NEW)
// =======================
Route::prefix('supplier')->group(function () {

    // GET semua supplier
    Route::get('/', [SupplierApiController::class, 'index']);

    // GET detail supplier
    Route::get('/{id}', [SupplierApiController::class, 'show']);

    // CREATE supplier
    Route::post('/', [SupplierApiController::class, 'store']);

    // UPDATE supplier (support upload foto)
    Route::post('/{id}', [SupplierApiController::class, 'update']);

    // DELETE supplier
    Route::delete('/{id}', [SupplierApiController::class, 'destroy']);
});
