<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * 📋 GET /api/users
     */
    public function index(Request $request)
    {
        $query = User::query();

        // SEARCH
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('username', 'like', "%{$request->search}%")
                  ->orWhere('nama_lengkap', 'like', "%{$request->search}%");
            });
        }

        // FILTER
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        if ($request->has('is_active') && $request->is_active !== '') {
            $query->where('is_active', $request->is_active);
        }

        $users = $query->orderBy('id_user', 'desc')->paginate(10);

        return response()->json([
            'success' => true,
            'message' => 'List data user',
            'data' => $users
        ]);
    }

    /**
     * 🔍 GET /api/users/{id}
     */
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $user
        ]);
    }

    /**
     * ➕ POST /api/users
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|max:50|unique:users,username',
            'password' => 'required|min:6',
            'nama_lengkap' => 'required|max:100',
            'role' => 'required|in:admin,manager,kasir,gudang,user',
            'is_active' => 'required|boolean',
        ]);

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        return response()->json([
            'success' => true,
            'message' => 'User berhasil dibuat',
            'data' => $user
        ], 201);
    }

    /**
     * ✏️ PUT /api/users/{id}
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan'
            ], 404);
        }

        $data = $request->validate([
            'username' => 'required|max:50|unique:users,username,' . $id . ',id_user',
            'password' => 'nullable|min:6',
            'nama_lengkap' => 'required|max:100',
            'role' => 'required|in:admin,manager,kasir,gudang,user',
            'is_active' => 'required|boolean',
        ]);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return response()->json([
            'success' => true,
            'message' => 'User berhasil diupdate',
            'data' => $user
        ]);
    }

    /**
     * 🗑️ DELETE /api/users/{id}
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan'
            ], 404);
        }

        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'User berhasil dihapus'
        ]);
    }
}