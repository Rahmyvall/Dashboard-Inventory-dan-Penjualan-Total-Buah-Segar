@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')

    @php
        $diskon = 5;
        $hargaDiskon = $produk->harga_jual - ($produk->harga_jual * $diskon) / 100;
    @endphp

    <div class="container-fluid py-4">

        <div class="row g-4">

            <!-- LEFT: IMAGE -->
            <div class="col-md-5">

                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                    <div class="position-relative">

                        <!-- BADGE DISKON -->
                        <span class="position-absolute top-0 start-0 m-3 badge bg-danger px-3 py-2 shadow">
                            -{{ $diskon }}%
                        </span>

                        <!-- IMAGE -->
                        <img src="{{ $produk->foto ? asset('storage/' . $produk->foto) : 'https://via.placeholder.com/500' }}"
                            class="w-100" style="height:400px; object-fit:cover;">

                    </div>

                </div>

            </div>

            <!-- RIGHT: INFO -->
            <div class="col-md-7">

                <div class="card border-0 shadow-sm rounded-4 p-4 h-100">

                    <!-- HEADER -->
                    <div class="mb-2">
                        <small class="text-muted">{{ $produk->kode_produk }}</small>

                        <h3 class="fw-bold mb-1">
                            {{ $produk->nama_buah }}
                        </h3>

                        <span class="badge bg-primary">
                            {{ $produk->kategori->nama_kategori ?? '-' }}
                        </span>
                    </div>

                    <hr>

                    <!-- PRICE SECTION -->
                    <div class="mb-3">

                        <div class="text-muted text-decoration-line-through">
                            Rp {{ number_format($produk->harga_jual, 0, ',', '.') }}
                        </div>

                        <div class="d-flex align-items-center gap-2">

                            <h2 class="fw-bold text-success mb-0">
                                Rp {{ number_format($hargaDiskon, 0, ',', '.') }}
                            </h2>

                            <span class="badge bg-danger">
                                HEMAT {{ $diskon }}%
                            </span>

                        </div>

                    </div>

                    <!-- INFO GRID -->
                    <div class="row g-2 mb-3">

                        <div class="col-6">
                            <div class="p-3 bg-light rounded-3">
                                <small class="text-muted">Stok</small>
                                <div class="fw-bold">{{ $produk->stok }} {{ $produk->satuan }}</div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="p-3 bg-light rounded-3">
                                <small class="text-muted">Minimal Stok</small>
                                <div class="fw-bold text-danger">{{ $produk->stok_minimal }}</div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="p-3 bg-light rounded-3">
                                <small class="text-muted">Shelf Life</small>
                                <div class="fw-bold">{{ $produk->shelf_life_days }} hari</div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="p-3 bg-light rounded-3">
                                <small class="text-muted">Status</small>
                                <div>
                                    @if ($produk->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- DESKRIPSI -->
                    <div class="mb-4">
                        <h6 class="fw-bold">Deskripsi Produk</h6>
                        <p class="text-muted">
                            {{ $produk->deskripsi ?? 'Tidak ada deskripsi' }}
                        </p>
                    </div>

                    <!-- BUTTON -->
                    <div class="d-flex gap-2">

                        <a href="{{ route('produk.index') }}" class="btn btn-light rounded-pill px-4 shadow-sm">
                            ← Kembali
                        </a>

                        <a href="{{ route('produk.edit', $produk) }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
                            ✏️ Edit Produk
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
