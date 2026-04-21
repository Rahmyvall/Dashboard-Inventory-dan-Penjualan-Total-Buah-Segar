<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProdukApiController;
use App\Http\Controllers\Api\KategoriApiController;

/*
|--------------------------------------------------------------------------
| API ROUTES
|--------------------------------------------------------------------------
*/

// =======================
// PRODUK API
// =======================
Route::prefix('produk')->group(function () {

    // GET semua produk
    Route::get('/', [ProdukApiController::class, 'index']);

    // GET detail produk
    Route::get('/{id}', [ProdukApiController::class, 'show']);

    // CREATE produk
    Route::post('/', [ProdukApiController::class, 'store']);

    // UPDATE produk
    Route::post('/{id}', [ProdukApiController::class, 'update']);
    // (pakai POST supaya support multipart/form-data upload gambar)

    // DELETE produk
    Route::delete('/{id}', [ProdukApiController::class, 'destroy']);
});