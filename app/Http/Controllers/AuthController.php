<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\User;   // Jika kamu pakai model User default

class AuthController extends Controller
{
    /**
     * Tampilkan halaman Login
     */
    public function login(): View
    {
        return view('auth.login');   // pastikan file blade ada di resources/views/auth/login.blade.php
    }

    /**
     * Proses Login (Authenticate)
     */
  public function authenticate(Request $request)
{
    $request->validate([
        'username' => 'required|string',
        'password' => 'required',
    ]);

    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials, $request->boolean('remember'))) {
        $request->session()->regenerate();

        // Redirect ke dashboard (atau halaman yang dituju sebelumnya)
        return redirect()->intended(route('dashboard'))
                         ->with('success', 'Login berhasil! Selamat datang.');
    }

    // Jika gagal
    return back()
        ->withErrors(['username' => 'Username atau password salah.'])
        ->withInput($request->only('username'));
}

    /**
     * Proses Logout
     */
   public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('welcome');
}
}