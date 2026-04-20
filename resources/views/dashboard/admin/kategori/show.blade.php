@extends('layouts.app')

@section('title', 'Detail Kategori - ' . $kategori->nama_kategori)

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-12">

                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary bg-opacity-10 p-4 rounded-4 me-4">
                            <i class="fas fa-tag fa-3x text-primary"></i>
                        </div>
                        <div>
                            <h1 class="h3 fw-bold text-dark mb-1">Detail Kategori</h1>
                            <p class="text-muted mb-0 fs-5">{{ $kategori->nama_kategori }}</p>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <a href="{{ route('kategori.edit', $kategori) }}" class="btn btn-warning px-4 py-3">
                            <i class="fas fa-edit me-2"></i> Edit
                        </a>
                        <a href="{{ route('kategori.index') }}" class="btn btn-secondary px-4 py-3">
                            <i class="fas fa-arrow-left me-2"></i> Kembali
                        </a>
                    </div>
                </div>

                <!-- Main Detail Card -->
                <div class="card shadow border-0">
                    <div class="card-body p-5">

                        <div class="row g-4">

                            <!-- Nama Kategori -->
                            <div class="col-12">
                                <div class="detail-item">
                                    <span class="label">Nama Kategori</span>
                                    <h2 class="fw-bold text-dark mb-0">{{ $kategori->nama_kategori }}</h2>
                                </div>
                            </div>

                            <!-- Gambar (jika ada) -->
                            @if ($kategori->gambar)
                                <div class="col-12 text-center">
                                    <div class="mb-4">
                                        <img src="{{ $kategori->gambar
                                            ? (str_starts_with($kategori->gambar, 'http')
                                                ? $kategori->gambar
                                                : asset('storage/' . $kategori->gambar))
                                            : asset('images/no-image.png') }}"
                                            alt="{{ $kategori->nama_kategori }}" class="img-fluid rounded-4 shadow-sm"
                                            style="max-height: 280px; object-fit: cover;">
                                    </div>
                                </div>
                            @endif

                            <!-- Deskripsi -->
                            <div class="col-12">
                                <div class="detail-item">
                                    <span class="label">Deskripsi Kategori</span>
                                    <div class="description-box">
                                        @if ($kategori->deskripsi)
                                            <p class="text-muted mb-0 lh-base">{{ $kategori->deskripsi }}</p>
                                        @else
                                            <p class="text-secondary fst-italic mb-0">- Tidak ada deskripsi untuk kategori
                                                ini -</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Metadata -->
                            <div class="col-md-6">
                                <div class="detail-item">
                                    <span class="label">Dibuat Pada</span>
                                    <p class="mb-0 fw-medium">
                                        {{ $kategori->created_at->format('d F Y') }}
                                        <span class="text-muted">•</span>
                                        {{ $kategori->created_at->format('H:i') }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="detail-item">
                                    <span class="label">Terakhir Diperbarui</span>
                                    <p class="mb-0 fw-medium text-muted">
                                        {{ $kategori->updated_at->format('d F Y H:i') }}
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        .detail-item {
            background: #f8f9fa;
            padding: 28px;
            border-radius: 16px;
            height: 100%;
            border: 1px solid #e9ecef;
        }

        .label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: #6c757d;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .description-box {
            background: white;
            padding: 24px;
            border-radius: 12px;
            border: 1px solid #e9ecef;
            min-height: 160px;
        }
    </style>
@endsection
