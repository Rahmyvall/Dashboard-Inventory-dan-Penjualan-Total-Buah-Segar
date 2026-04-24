@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold mb-1">👤 User Management</h4>
                <div class="text-muted small">
                    Manage system users & access roles
                </div>
            </div>

            <a href="{{ route('users.create') }}" class="btn btn-primary px-4 shadow-sm">
                + Add User
            </a>
        </div>

        {{-- KPI --}}
        <div class="row g-3 mb-4">

            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3">
                    <div class="text-muted small">Total Users</div>
                    <div class="fs-4 fw-bold">{{ $users->total() }}</div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3">
                    <div class="text-muted small">Admin</div>
                    <div class="fs-4 fw-bold text-primary">
                        {{ \App\Models\User::where('role', 'admin')->count() }}
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3">
                    <div class="text-muted small">Staff</div>
                    <div class="fs-4 fw-bold text-info">
                        {{ \App\Models\User::whereIn('role', ['manager', 'kasir', 'gudang', 'user'])->count() }}
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3">
                    <div class="text-muted small">Active</div>
                    <div class="fs-4 fw-bold text-success">
                        {{ \App\Models\User::where('is_active', 1)->count() }}
                    </div>
                </div>
            </div>

        </div>

        {{-- FILTER --}}
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <form method="GET" class="row g-3">

                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-text bg-white">🔍</span>
                            <input type="text" name="search" class="form-control"
                                placeholder="Search username or name..." value="{{ request('search') }}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <select name="role" class="form-select">
                            <option value="">All Roles</option>
                            @foreach (['admin', 'manager', 'kasir', 'gudang', 'user'] as $role)
                                <option value="{{ $role }}" {{ request('role') == $role ? 'selected' : '' }}>
                                    {{ ucfirst($role) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                        <select name="is_active" class="form-select">
                            <option value="">Status</option>
                            <option value="1" {{ request('is_active') === '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ request('is_active') === '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="col-md-1">
                        <button class="btn btn-dark w-100">Go</button>
                    </div>

                    <div class="col-md-1">
                        <a href="{{ route('users.index') }}" class="btn btn-outline-secondary w-100">↺</a>
                    </div>

                </form>
            </div>
        </div>

        {{-- TABLE --}}
        <div class="card border-0 shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead class="bg-light">
                        <tr class="text-muted small">
                            <th class="text-center">No</th>
                            <th>User</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($users as $item)
                            <tr>

                                {{-- NO --}}
                                <td class="text-center">
                                    {{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}
                                </td>

                                {{-- USER --}}
                                <td>
                                    <div class="d-flex align-items-center gap-3">

                                        <div class="avatar-circle">
                                            {{ strtoupper(substr($item->nama_lengkap ?? 'U', 0, 1)) }}
                                        </div>

                                        <div>
                                            <div class="fw-bold">{{ $item->nama_lengkap }}</div>
                                            <div class="text-muted small">{{ $item->username }}</div>
                                        </div>

                                    </div>
                                </td>

                                {{-- ROLE --}}
                                <td>
                                    @php
                                        $roles = [
                                            'admin' => ['label' => 'Admin', 'color' => 'primary'],
                                            'manager' => ['label' => 'Manager', 'color' => 'info'],
                                            'kasir' => ['label' => 'Kasir', 'color' => 'success'],
                                            'gudang' => ['label' => 'Warehouse', 'color' => 'warning'],
                                            'user' => ['label' => 'User', 'color' => 'dark'],
                                        ];

                                        $role = $roles[$item->role] ?? [
                                            'label' => ucfirst($item->role),
                                            'color' => 'secondary',
                                        ];
                                    @endphp

                                    <span class="badge bg-{{ $role['color'] }} px-3 py-2 rounded-pill">
                                        {{ $role['label'] }}
                                    </span>
                                </td>

                                {{-- STATUS --}}
                                <td>
                                    <span class="badge bg-{{ $item->is_active ? 'success' : 'secondary' }}">
                                        {{ $item->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>

                                {{-- ACTION --}}
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">

                                        <a href="{{ route('users.show', $item->id_user) }}"
                                            class="btn btn-light border">👁</a>

                                        <a href="{{ route('users.edit', $item->id_user) }}"
                                            class="btn btn-warning text-white">✏️</a>

                                        <form action="{{ route('users.destroy', $item->id_user) }}" method="POST"
                                            onsubmit="return confirm('Delete user?')">

                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger">🗑</button>
                                        </form>

                                    </div>
                                </td>

                            </tr>

                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    🚫 No users found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>

        {{-- PAGINATION --}}
        <div class="d-flex justify-content-between mt-3">
            <small class="text-muted">
                Showing {{ $users->firstItem() }} - {{ $users->lastItem() }}
                of {{ $users->total() }}
            </small>

            {{ $users->withQueryString()->links() }}
        </div>

    </div>

    <style>
        .card {
            border-radius: 16px;
        }

        .btn {
            border-radius: 10px;
        }

        .table-hover tbody tr:hover {
            background: #f6f9ff;
        }

        .avatar-circle {
            width: 40px;
            height: 40px;
            background: #4f46e5;
            color: white;
            font-weight: bold;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
@endsection
