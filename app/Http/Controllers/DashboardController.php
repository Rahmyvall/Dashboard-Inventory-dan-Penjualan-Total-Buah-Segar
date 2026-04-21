<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Kategori;
use App\Models\Produk;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $title = 'Dashboard';

        // =========================
        // CHART PRODUK (STOK)
        // =========================
        $produks = Produk::select('nama_buah', 'stok')
            ->orderBy('stok', 'desc')
            ->limit(10)
            ->get();

        $labelsProduk = $produks->pluck('nama_buah');
        $stokProduk   = $produks->pluck('stok');

        // =========================
        // VIEW ROLE
        // =========================
        $views = [
            'admin'   => 'dashboard.admin.index',
            'manager' => 'dashboard.manager.index',
            'kasir'   => 'dashboard.kasir.index',
            'gudang'  => 'dashboard.gudang.index',
        ];

        if (!array_key_exists($user->role, $views)) {
            abort(403, 'Role tidak dikenali');
        }

        return view($views[$user->role], compact(
            'title',
            'user',

            // produk
            'labelsProduk',
            'stokProduk'
        ));
    }
}