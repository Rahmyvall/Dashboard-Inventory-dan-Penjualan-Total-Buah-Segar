@extends('layouts.app')

@section('title', 'Kategori Buah')

@section('content')
    <div class="container-fluid py-4">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">
                    🍎 Kategori Buah
                </h2>
                <p class="text-muted mb-0">Kelola kategori buah dengan mudah dan cepat</p>
            </div>

            <a href="{{ route('kategori.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
                <i class="fas fa-plus me-2"></i> Tambah
            </a>
        </div>

        <!-- Alert -->
        @if (session('success'))
            <div class="alert alert-success rounded-3 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- Card -->
        <div class="card border-0 shadow-lg rounded-4">

            <!-- Header -->
            <div class="card-header bg-white border-0 py-3 d-flex justify-content-between">
                <h6 class="mb-0 fw-semibold">Daftar Kategori</h6>
                <span class="badge bg-dark rounded-pill px-3">
                    {{ $kategoris->total() }}
                </span>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table align-middle table-hover mb-0">

                    <thead class="bg-light">
                        <tr>
                            <th class="text-center">No</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($kategoris as $kategori)
                            <tr class="align-middle">

                                <td class="text-center fw-semibold">
                                    {{ $loop->iteration + ($kategoris->currentPage() - 1) * $kategoris->perPage() }}
                                </td>

                                <!-- Gambar -->
                                <td>
                                    <img src="{{ str_starts_with($kategori->gambar, 'http') ? $kategori->gambar : asset('storage/' . $kategori->gambar) }}"
                                        class="rounded-3 shadow-sm" style="width:60px;height:60px;object-fit:cover;">
                                </td>

                                <!-- Nama -->
                                <td>
                                    <div class="fw-semibold text-dark">
                                        {{ $kategori->nama_kategori }}
                                    </div>
                                </td>

                                <!-- Deskripsi -->
                                <td class="text-muted small">
                                    {{ $kategori->deskripsi ? \Str::limit($kategori->deskripsi, 70) : '-' }}
                                </td>

                                <!-- Tanggal -->
                                <td>
                                    <small class="text-muted">
                                        {{ $kategori->created_at->format('d M Y') }}
                                    </small>
                                </td>

                                <!-- Aksi -->
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">

                                        <a href="{{ route('kategori.show', $kategori) }}"
                                            class="btn btn-light btn-sm rounded-circle shadow-sm">
                                            <i class="fas fa-eye text-info"></i>
                                        </a>

                                        <a href="{{ route('kategori.edit', $kategori) }}"
                                            class="btn btn-light btn-sm rounded-circle shadow-sm">
                                            <i class="fas fa-edit text-primary"></i>
                                        </a>

                                        <form action="{{ route('kategori.destroy', $kategori) }}" method="POST"
                                            onsubmit="return confirm('Hapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-light btn-sm rounded-circle shadow-sm">
                                                <i class="fas fa-trash text-danger"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <h5 class="text-muted">📭 Belum ada data</h5>
                                    <small class="text-secondary">Silakan tambah kategori baru</small>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            <!-- Footer -->
            <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
                <small class="text-muted">
                    {{ $kategoris->firstItem() ?? 0 }} - {{ $kategoris->lastItem() ?? 0 }}
                    dari {{ $kategoris->total() }}
                </small>

                {{ $kategoris->links() }}
            </div>

        </div>
    </div>
@endsection
