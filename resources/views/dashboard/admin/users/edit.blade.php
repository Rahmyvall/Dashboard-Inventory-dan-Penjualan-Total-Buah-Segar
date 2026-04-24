@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="card shadow-sm border-0">
            <div class="card-body">

                {{-- HEADER --}}
                <div class="mb-4">
                    <h4 class="fw-bold">✏️ Edit User</h4>
                    <div class="text-muted small">Update data user</div>
                </div>

                {{-- ERROR --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0 small">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- FORM --}}
                <form action="{{ route('users.update', $user->id_user) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">

                        {{-- USERNAME --}}
                        <div class="col-md-6">
                            <label class="form-label">Username</label>
                            <input type="text" name="username"
                                class="form-control @error('username') is-invalid @enderror"
                                value="{{ old('username', $user->username) }}" required>

                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- NAMA --}}
                        <div class="col-md-6">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap"
                                class="form-control @error('nama_lengkap') is-invalid @enderror"
                                value="{{ old('nama_lengkap', $user->nama_lengkap) }}" required>

                            @error('nama_lengkap')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- PASSWORD (OPTIONAL) --}}
                        <div class="col-md-6">
                            <label class="form-label">
                                Password <small class="text-muted">(kosongkan jika tidak diubah)</small>
                            </label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror">

                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- ROLE --}}
                        <div class="col-md-6">
                            <label class="form-label">Role</label>

                            @php
                                $roles = [
                                    'admin' => 'Admin',
                                    'manager' => 'Manager',
                                    'kasir' => 'Kasir',
                                    'gudang' => 'Warehouse',
                                    'user' => 'User',
                                ];
                            @endphp

                            <select name="role" class="form-select @error('role') is-invalid @enderror" required>

                                @foreach ($roles as $key => $label)
                                    <option value="{{ $key }}"
                                        {{ old('role', $user->role) == $key ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach

                            </select>

                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- STATUS --}}
                        <div class="col-md-6">
                            <label class="form-label">Status</label>

                            <select name="is_active" class="form-select @error('is_active') is-invalid @enderror" required>

                                <option value="1" {{ old('is_active', $user->is_active) == 1 ? 'selected' : '' }}>
                                    Active
                                </option>

                                <option value="0" {{ old('is_active', $user->is_active) == 0 ? 'selected' : '' }}>
                                    Inactive
                                </option>

                            </select>

                            @error('is_active')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    {{-- BUTTON --}}
                    <div class="mt-4 d-flex justify-content-between">

                        <a href="{{ route('users.index') }}" class="btn btn-secondary">
                            ← Kembali
                        </a>

                        <button class="btn btn-primary px-4">
                            💾 Update User
                        </button>

                    </div>

                </form>

            </div>
        </div>

    </div>

    <style>
        .card {
            border-radius: 16px;
        }

        .btn {
            border-radius: 10px;
        }
    </style>
@endsection
