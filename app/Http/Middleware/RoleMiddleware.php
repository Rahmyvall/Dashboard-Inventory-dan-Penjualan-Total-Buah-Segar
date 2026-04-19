<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|array  ...$roles
     * @return Response
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();

        // Jika user belum login
        if (!$user) {
            return redirect()->route('login');
        }

        // Cek apakah role user ada di dalam daftar role yang diizinkan
        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        // Jika role tidak sesuai
        abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        
        // Alternatif pesan yang lebih ramah:
        // return redirect()->route('dashboard')
        //     ->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
    }
}