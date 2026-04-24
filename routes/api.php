<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProdukApiController;
use App\Http\Controllers\Api\KategoriApiController;
use App\Http\Controllers\Api\SupplierApiController;
use App\Http\Controllers\Api\PelangganController;
use App\Http\Controllers\Api\UserController;

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
    Route::post('/{id}', [ProdukApiController::class, 'update']); // fleksibel
    Route::put('/{id}', [ProdukApiController::class, 'update']);  // RESTful
    Route::delete('/{id}', [ProdukApiController::class, 'destroy']);
});


// =======================
// SUPPLIER API
// =======================
Route::prefix('supplier')->group(function () {

    Route::get('/', [SupplierApiController::class, 'index']);
    Route::get('/{id}', [SupplierApiController::class, 'show']);
    Route::post('/', [SupplierApiController::class, 'store']);
    Route::post('/{id}', [SupplierApiController::class, 'update']); // fleksibel
    Route::put('/{id}', [SupplierApiController::class, 'update']);
    Route::delete('/{id}', [SupplierApiController::class, 'destroy']);
});


// =======================
// PELANGGAN API
// =======================
Route::prefix('pelanggan')->group(function () {

    Route::get('/', [PelangganController::class, 'index']);
    Route::get('/{id}', [PelangganController::class, 'show']);
    Route::post('/', [PelangganController::class, 'store']);
    Route::put('/{id}', [PelangganController::class, 'update']);
    Route::post('/{id}', [PelangganController::class, 'update']); // fleksibel
    Route::delete('/{id}', [PelangganController::class, 'destroy']);
});


// =======================
// USERS API (🔥 TAMBAHAN)
// =======================
Route::prefix('users')->group(function () {

    // LIST + SEARCH + FILTER
    Route::get('/', [UserController::class, 'index']);

    // DETAIL
    Route::get('/{id}', [UserController::class, 'show']);

    // CREATE
    Route::post('/', [UserController::class, 'store']);

    // UPDATE
    Route::put('/{id}', [UserController::class, 'update']);
    Route::post('/{id}', [UserController::class, 'update']); // fleksibel

    // DELETE
    Route::delete('/{id}', [UserController::class, 'destroy']);
});
