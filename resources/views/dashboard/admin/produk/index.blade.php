@extends('layouts.app')

@section('title', 'Produk Buah')

@section('content')
    <div class="container-fluid py-4">

        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">🍎 Produk Buah</h2>
                <p class="text-muted mb-0">Marketplace style catalog produk</p>
            </div>

            <a href="{{ route('produk.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
                <i class="fas fa-plus me-2"></i> Tambah Produk
            </a>
        </div>

        <!-- ALERT -->
        @if (session('success'))
            <div class="alert alert-success rounded-3 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- GRID -->
        <div class="row g-4">

            @forelse ($produks as $produk)
                @php
                    $diskon = 5;
                    $hargaDiskon = $produk->harga_jual - ($produk->harga_jual * $diskon) / 100;
                @endphp

                <div class="col-6 col-md-4 col-lg-3">

                    <div class="card border-0 shadow-sm rounded-4 product-card position-relative overflow-hidden">

                        <!-- BADGE DISKON -->
                        <div class="position-absolute top-0 start-0 m-2">
                            <span class="badge bg-danger px-3 py-2 shadow-sm">
                                -{{ $diskon }}%
                            </span>
                        </div>

                        <!-- IMAGE -->
                        <div class="product-img">
                            <img
                                src="{{ $produk->foto ? asset('storage/' . $produk->foto) : 'https://via.placeholder.com/300' }}">
                        </div>

                        <!-- BODY -->
                        <div class="card-body p-3">

                            <small class="text-muted">{{ $produk->kode_produk }}</small>

                            <h6 class="fw-bold mb-1 text-truncate">
                                {{ $produk->nama_buah }}
                            </h6>

                            <small class="text-muted">
                                {{ $produk->kategori->nama_kategori ?? '-' }}
                            </small>

                            <!-- PRICE -->
                            <div class="mt-2">
                                <div class="text-muted text-decoration-line-through small">
                                    Rp {{ number_format($produk->harga_jual, 0, ',', '.') }}
                                </div>

                                <div class="fw-bold text-success">
                                    Rp {{ number_format($hargaDiskon, 0, ',', '.') }}
                                </div>
                            </div>

                            <!-- STOK -->
                            <div class="d-flex justify-content-between mt-2 small">
                                <span>Stok</span>
                                <span class="fw-semibold">{{ $produk->stok }} {{ $produk->satuan }}</span>
                            </div>

                        </div>

                        <!-- HOVER ACTION -->
                        <div class="product-overlay d-flex justify-content-center align-items-center gap-2">

                            <a href="{{ route('produk.show', $produk) }}"
                                class="btn btn-light btn-sm rounded-circle shadow">
                                <i class="fas fa-eye text-info"></i>
                            </a>

                            <a href="{{ route('produk.edit', $produk) }}"
                                class="btn btn-light btn-sm rounded-circle shadow">
                                <i class="fas fa-edit text-primary"></i>
                            </a>

                            <form action="{{ route('produk.destroy', $produk) }}" method="POST"
                                onsubmit="return confirm('Hapus produk ini?')">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-light btn-sm rounded-circle shadow">
                                    <i class="fas fa-trash text-danger"></i>
                                </button>
                            </form>

                        </div>

                    </div>
                </div>

            @empty
                <div class="col-12 text-center py-5">
                    <h5 class="text-muted">📭 Belum ada produk</h5>
                </div>
            @endforelse

        </div>

        <!-- PAGINATION -->
        <div class="mt-4 d-flex justify-content-center">
            {{ $produks->links() }}
        </div>

    </div>

    <!-- STYLE MARKETPLACE -->
    <style>
        .product-card {
            transition: .3s;
        }

        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .product-img {
            height: 170px;
            overflow: hidden;
        }

        .product-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: .4s;
        }

        .product-card:hover .product-img img {
            transform: scale(1.1);
        }

        /* overlay */
        .product-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.35);
            opacity: 0;
            transition: .3s;
        }

        .product-card:hover .product-overlay {
            opacity: 1;
        }
    </style>

@endsection
