<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * 📋 LIST DATA (SEARCH + FILTER)
     */
    public function index(Request $request)
    {
        $query = User::query();

        // 🔍 SEARCH
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('username', 'like', "%{$search}%")
                  ->orWhere('nama_lengkap', 'like', "%{$search}%");
            });
        }

        // 🎯 FILTER ROLE
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        // 🎯 FILTER STATUS (FIX BUG ⚠️)
        if ($request->has('is_active') && $request->is_active !== '') {
            $query->where('is_active', $request->is_active);
        }

        // 🔽 SORT
        $sort = $request->get('sort', 'desc');
        $query->orderBy('id_user', $sort);

        // 📄 PAGINATION
        $perPage = $request->get('per_page', 10);
        $users = $query->paginate($perPage)->withQueryString();

        return view('dashboard.admin.users.index', compact('users'));
    }

    /**
     * ➕ FORM CREATE
     */
    public function create()
    {
        return view('dashboard.admin.users.create');
    }

    /**
     * 💾 STORE
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'username'      => 'required|string|max:50|unique:users,username',
            'password'      => 'required|string|min:6',
            'nama_lengkap'  => 'required|string|max:100',
            'role'          => 'required|in:admin,manager,kasir,gudang,user',
            'is_active'     => 'required|boolean',
        ]);

        // 🔐 HASH PASSWORD
        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('users.index')
            ->with('success', 'User berhasil ditambahkan');
    }

    /**
     * 🔍 SHOW
     */
    public function show(User $user)
    {
        return view('dashboard.admin.users.show', compact('user'));
    }

    /**
     * ✏️ EDIT
     */
    public function edit(User $user)
    {
        return view('dashboard.admin.users.edit', compact('user'));
    }

    /**
     * 🔄 UPDATE
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'username'      => 'required|string|max:50|unique:users,username,' . $user->id_user . ',id_user',
            'password'      => 'nullable|string|min:6',
            'nama_lengkap'  => 'required|string|max:100',
            'role'          => 'required|in:admin,manager,kasir,gudang,user',
            'is_active'     => 'required|boolean',
        ]);

        // 🔐 PASSWORD OPTIONAL (FIX BEST PRACTICE)
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('users.index')
            ->with('success', 'User berhasil diupdate');
    }

    /**
     * 🗑️ DELETE
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User berhasil dihapus');
    }
}
