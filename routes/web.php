<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// ==================== WELCOME (Root) ====================
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// ==================== AUTH ROUTES ====================
Route::get('/login', [AuthController::class, 'login'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])
    ->middleware('guest')
    ->name('login.post');

// ROUTE LOGOUT ←←← PASTIKAN INI ADA
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// ==================== DASHBOARD ====================
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// ==================== USERS ====================
Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class)
        ->except(['show']);
});