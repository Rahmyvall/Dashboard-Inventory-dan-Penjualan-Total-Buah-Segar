<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Produk;
use App\Models\Supplier;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $title = 'Dashboard';

       
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
        ));
    }
}