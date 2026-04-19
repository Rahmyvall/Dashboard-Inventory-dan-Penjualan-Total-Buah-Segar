<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        // ✅ Validasi
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // 🔥 Debug sementara (hapus nanti)
        // dd($request->username, $request->password);

        // 🔐 Proses login
        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
            'is_active' => 1
        ])) {

            // regenerate session
            $request->session()->regenerate();

            // 🔥 Debug login berhasil
            // dd(Auth::user());

            return redirect()->route('dashboard');
        }

        // ❌ Jika gagal
        return back()->withErrors([
            'username' => 'Username atau password salah'
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}