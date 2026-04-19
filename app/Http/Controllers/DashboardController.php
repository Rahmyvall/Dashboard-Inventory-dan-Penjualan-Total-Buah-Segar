<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

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
            'admin'   => 'dashboard.admin.index',   // Diubah dari .index
            'manager' => 'dashboard.manager.index',
            'kasir'   => 'dashboard.kasir.index',
            'gudang'  => 'dashboard.gudang.index',
        ];

        if (!array_key_exists($user->role, $views)) {
            abort(403, 'Role tidak dikenali');
        }

        return view($views[$user->role], compact('title', 'user'));
    }
}
