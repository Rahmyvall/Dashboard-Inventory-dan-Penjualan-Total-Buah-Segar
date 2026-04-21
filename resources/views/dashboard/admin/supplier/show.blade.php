@extends('layouts.app')

@section('title', 'Detail Supplier')

@section('content')
    <div class="container py-4">

        <div class="row g-4">

            <!-- LEFT: FOTO + STATUS -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 text-center p-4">

                    <img src="{{ $supplier->foto ? asset('storage/' . $supplier->foto) : 'https://via.placeholder.com/300' }}"
                        class="img-fluid rounded-4 shadow-sm mb-3" style="height:250px; object-fit:cover;">

                    <h5 class="fw-bold mb-1">{{ $supplier->nama_supplier }}</h5>
                    <small class="text-muted">{{ $supplier->kode_supplier }}</small>

                    <!-- STATUS -->
                    <div class="mt-3">
                        @if ($supplier->status == 'aktif')
                            <span class="badge bg-success px-4 py-2">✔ Aktif</span>
                        @else
                            <span class="badge bg-secondary px-4 py-2">Nonaktif</span>
                        @endif
                    </div>

                </div>
            </div>

            <!-- RIGHT: DETAIL -->
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body p-4">

                        <h4 class="fw-bold mb-4">📋 Informasi Supplier</h4>

                        <div class="row g-3">

                            <!-- KOTA -->
                            <div class="col-md-6">
                                <div class="p-3 border rounded-3 h-100">
                                    <small class="text-muted">Kota</small>
                                    <div class="fw-semibold">
                                        <i class="fas fa-map-marker-alt me-1 text-danger"></i>
                                        {{ $supplier->kota ?? '-' }}
                                    </div>
                                </div>
                            </div>

                            <!-- TELEPON -->
                            <div class="col-md-6">
                                <div class="p-3 border rounded-3 h-100">
                                    <small class="text-muted">Telepon</small>
                                    <div class="fw-semibold">
                                        <i class="fas fa-phone me-1 text-success"></i>
                                        {{ $supplier->telepon ?? '-' }}
                                    </div>
                                </div>
                            </div>

                            <!-- EMAIL -->
                            <div class="col-md-6">
                                <div class="p-3 border rounded-3 h-100">
                                    <small class="text-muted">Email</small>
                                    <div class="fw-semibold">
                                        <i class="fas fa-envelope me-1 text-primary"></i>
                                        {{ $supplier->email ?? '-' }}
                                    </div>
                                </div>
                            </div>

                            <!-- KONTAK -->
                            <div class="col-md-6">
                                <div class="p-3 border rounded-3 h-100">
                                    <small class="text-muted">Kontak Person</small>
                                    <div class="fw-semibold">
                                        <i class="fas fa-user me-1 text-warning"></i>
                                        {{ $supplier->kontak_person ?? '-' }}
                                    </div>
                                </div>
                            </div>

                            <!-- ALAMAT -->
                            <div class="col-12">
                                <div class="p-3 border rounded-3">
                                    <small class="text-muted">Alamat</small>
                                    <div class="fw-semibold">
                                        {{ $supplier->alamat ?? '-' }}
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- BUTTON -->
                        <div class="mt-4 d-flex justify-content-between">

                            <a href="{{ route('supplier.index') }}" class="btn btn-light border">
                                ← Kembali
                            </a>

                            <div class="d-flex gap-2">
                                <a href="{{ route('supplier.edit', $supplier->id_supplier) }}"
                                    class="btn btn-warning shadow-sm">
                                    ✏️ Edit
                                </a>

                                <form action="{{ route('supplier.destroy', $supplier->id_supplier) }}" method="POST"
                                    onsubmit="return confirm('Hapus supplier ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger shadow-sm">
                                        🗑 Hapus
                                    </button>
                                </form>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
