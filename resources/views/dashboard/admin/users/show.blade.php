@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="card shadow-sm border-0">
            <div class="card-body">

                {{-- HEADER --}}
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="fw-bold mb-1">👤 Detail User</h4>
                        <div class="text-muted small">Informasi lengkap user</div>
                    </div>

                    <a href="{{ route('users.index') }}" class="btn btn-secondary">
                        ← Kembali
                    </a>
                </div>

                {{-- PROFILE --}}
                <div class="row">

                    {{-- LEFT --}}
                    <div class="col-md-4 text-center border-end">

                        {{-- AVATAR --}}
                        <div class="avatar-circle mx-auto mb-3">
                            {{ strtoupper(substr($user->nama_lengkap ?? 'U', 0, 1)) }}
                        </div>

                        <h5 class="fw-bold">{{ $user->nama_lengkap }}</h5>
                        <div class="text-muted">{{ $user->username }}</div>

                        {{-- ROLE --}}
                        @php
                            $roles = [
                                'admin' => ['label' => 'Admin', 'color' => 'primary'],
                                'manager' => ['label' => 'Manager', 'color' => 'info'],
                                'kasir' => ['label' => 'Kasir', 'color' => 'success'],
                                'gudang' => ['label' => 'Warehouse', 'color' => 'warning'],
                                'user' => ['label' => 'User', 'color' => 'dark'],
                            ];

                            $role = $roles[$user->role] ?? [
                                'label' => ucfirst($user->role),
                                'color' => 'secondary',
                            ];
                        @endphp

                        <div class="mt-2">
                            <span class="badge bg-{{ $role['color'] }} px-3 py-2 rounded-pill">
                                {{ $role['label'] }}
                            </span>
                        </div>

                        {{-- STATUS --}}
                        <div class="mt-2">
                            <span class="badge bg-{{ $user->is_active ? 'success' : 'secondary' }}">
                                {{ $user->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>

                    </div>

                    {{-- RIGHT --}}
                    <div class="col-md-8">

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="text-muted small">Username</label>
                                <div class="fw-semibold">{{ $user->username }}</div>
                            </div>

                            <div class="col-md-6">
                                <label class="text-muted small">Nama Lengkap</label>
                                <div class="fw-semibold">{{ $user->nama_lengkap }}</div>
                            </div>

                            <div class="col-md-6">
                                <label class="text-muted small">Role</label>
                                <div>{{ $role['label'] }}</div>
                            </div>

                            <div class="col-md-6">
                                <label class="text-muted small">Status</label>
                                <div>{{ $user->is_active ? 'Active' : 'Inactive' }}</div>
                            </div>

                            <div class="col-md-6">
                                <label class="text-muted small">Created At</label>
                                <div>
                                    {{ $user->created_at ? $user->created_at->format('d M Y H:i') : '-' }}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="text-muted small">Updated At</label>
                                <div>
                                    {{ $user->updated_at ? $user->updated_at->format('d M Y H:i') : '-' }}
                                </div>
                            </div>

                        </div>

                        {{-- ACTION --}}
                        <div class="mt-4">

                            <a href="{{ route('users.edit', $user->id_user) }}" class="btn btn-warning text-white">
                                ✏️ Edit
                            </a>

                            <form action="{{ route('users.destroy', $user->id_user) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Delete user?')">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger">
                                    🗑 Delete
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>

    <style>
        .card {
            border-radius: 16px;
        }

        .avatar-circle {
            width: 90px;
            height: 90px;
            background: #4f46e5;
            color: white;
            font-size: 32px;
            font-weight: bold;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
@endsection
