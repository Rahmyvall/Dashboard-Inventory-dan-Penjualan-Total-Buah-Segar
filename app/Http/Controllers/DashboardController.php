<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Supplier;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $title = 'Dashboard';

        // ======================
        // 🔥 DATA CHART PRODUK
        // ======================
        $data = DB::table('produk')
            ->selectRaw('MONTH(created_at) as bulan, SUM(harga_jual * stok) as total')
            ->whereYear('created_at', date('Y'))
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        $labels = [];
        $totals = [];

        foreach ($data as $d) {
            $labels[] = date('F', mktime(0, 0, 0, $d->bulan, 10));
            $totals[] = $d->total;
        }

        // ======================
        // 🔥 DATA DASHBOARD
        // ======================
        $totalProduk   = Produk::count();
        $totalSupplier = Supplier::count();

        // 🔥 TAMBAHAN USER
        $totalUsers  = User::count();
        $activeUsers = User::where('is_active', 1)->count();
        $newUsers    = User::whereDate('created_at', today())->count();

        // 🔥 OPTIONAL: USER PER ROLE
        $totalAdmin   = User::where('role', 'admin')->count();
        $totalManager = User::where('role', 'manager')->count();
        $totalKasir   = User::where('role', 'kasir')->count();
        $totalGudang  = User::where('role', 'gudang')->count();

        // ======================
        // 🔥 VIEW BY ROLE
        // ======================
        $views = [
            'admin'   => 'dashboard.admin.index',
            'manager' => 'dashboard.manager.index',
            'kasir'   => 'dashboard.kasir.index',
            'gudang'  => 'dashboard.gudang.index',
        ];

        if (!isset($views[$user->role])) {
            abort(403, 'Role tidak dikenali');
        }

        return view($views[$user->role], compact(
            'title',
            'labels',
            'totals',
            'totalProduk',
            'totalSupplier',

            // 🔥 USER DATA
            'totalUsers',
            'activeUsers',
            'newUsers',
            'totalAdmin',
            'totalManager',
            'totalKasir',
            'totalGudang'
        ));
    }

    // ======================
    // 🔥 API CHART PRODUK
    // ======================
    public function chartProduk(Request $request)
    {
        $type = $request->type;

        if ($type == 'month') {
            $format = 'DAY(created_at)';
        } elseif ($type == 'week') {
            $format = 'WEEK(created_at)';
        } else {
            $format = 'MONTH(created_at)';
        }

        $data = DB::table('produk')
            ->selectRaw("$format as periode, SUM(harga_jual * stok) as total")
            ->groupBy('periode')
            ->orderBy('periode')
            ->get();

        $labels = [];
        $totals = [];

        foreach ($data as $d) {
            $labels[] = $d->periode;
            $totals[] = $d->total;
        }

        return response()->json([
            'labels' => $labels,
            'data'   => $totals
        ]);
    }
}
