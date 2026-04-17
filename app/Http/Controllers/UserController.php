<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Logika untuk menampilkan daftar pengguna
        return view('admin.users.index');
    }
}