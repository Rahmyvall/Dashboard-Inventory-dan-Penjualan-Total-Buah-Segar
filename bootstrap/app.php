<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        
        // Redirect otomatis (opsional tapi sangat membantu)
        $middleware->redirectGuestsTo('/login');     // Tamu → halaman login
        // $middleware->redirectUsersTo('/dashboard'); // User login → dashboard

        // Jika ingin menambahkan middleware global lain (contoh):
        // $middleware->append(\App\Http\Middleware\LogRequest::class);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();