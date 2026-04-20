<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $title = 'Dashboard';

        // 🔥 Ambil data kategori untuk chart
        $kategoris = Kategori::select('nama_kategori')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('nama_kategori')
            ->get();

        // Format untuk Chart.js
        $labels = $kategoris->pluck('nama_kategori');
        $data   = $kategoris->pluck('total');

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
            'labels',
            'data'
        ));
    }
}
