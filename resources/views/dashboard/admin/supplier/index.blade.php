@extends('layouts.app')

@section('title', 'Supplier')

@section('content')
    <div class="container-fluid py-4">

        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">🏢 Data Supplier</h2>
                <p class="text-muted mb-0">Daftar supplier terdaftar</p>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('supplier.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
                    <i class="fas fa-plus me-2"></i> Tambah Supplier
                </a>
            </div>
        </div>

        <!-- ALERT -->
        @if (session('success'))
            <div class="alert alert-success rounded-3 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- GRID -->
        <div class="row g-4">

            @forelse ($suppliers as $supplier)
                <div class="col-6 col-md-4 col-lg-3">

                    <div class="card border-0 shadow-sm rounded-4 supplier-card position-relative overflow-hidden">

                        <!-- STATUS BADGE -->
                        <div class="position-absolute top-0 start-0 m-2">
                            @if ($supplier->status == 'aktif')
                                <span class="badge bg-success px-3 py-2 shadow-sm">Aktif</span>
                            @else
                                <span class="badge bg-secondary px-3 py-2 shadow-sm">Nonaktif</span>
                            @endif
                        </div>

                        <!-- IMAGE -->
                        <div class="supplier-img">
                            <img
                                src="{{ $supplier->foto ? asset('storage/' . $supplier->foto) : 'https://via.placeholder.com/300' }}">
                        </div>

                        <!-- BODY -->
                        <div class="card-body p-3">

                            <small class="text-muted">{{ $supplier->kode_supplier }}</small>

                            <h6 class="fw-bold mb-1 text-truncate">
                                {{ $supplier->nama_supplier }}
                            </h6>

                            <small class="text-muted">
                                {{ $supplier->kota ?? '-' }}
                            </small>

                            <!-- INFO -->
                            <div class="mt-2 small">
                                <div><i class="fas fa-phone"></i> {{ $supplier->telepon ?? '-' }}</div>
                                <div><i class="fas fa-user"></i> {{ $supplier->kontak_person ?? '-' }}</div>
                            </div>

                        </div>

                        <!-- HOVER ACTION -->
                        <div class="supplier-overlay d-flex justify-content-center align-items-center gap-2">

                            <a href="{{ route('supplier.show', $supplier->id_supplier) }}"
                                class="btn btn-light btn-sm rounded-circle shadow">
                                <i class="fas fa-eye text-info"></i>
                            </a>

                            <a href="{{ route('supplier.edit', $supplier->id_supplier) }}"
                                class="btn btn-light btn-sm rounded-circle shadow">
                                <i class="fas fa-edit text-primary"></i>
                            </a>

                            <form action="{{ route('supplier.destroy', $supplier->id_supplier) }}" method="POST"
                                onsubmit="return confirm('Hapus supplier ini?')">
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
                    <h5 class="text-muted">📭 Belum ada supplier</h5>
                </div>
            @endforelse

        </div>

        <!-- PAGINATION -->
        <div class="mt-4 d-flex justify-content-center">
            {{ $suppliers->links() }}
        </div>

    </div>

    <!-- STYLE -->
    <style>
        .supplier-card {
            transition: .3s;
        }

        .supplier-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .supplier-img {
            height: 170px;
            overflow: hidden;
        }

        .supplier-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: .4s;
        }

        .supplier-card:hover .supplier-img img {
            transform: scale(1.1);
        }

        /* overlay */
        .supplier-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.35);
            opacity: 0;
            transition: .3s;
        }

        .supplier-card:hover .supplier-overlay {
            opacity: 1;
        }
    </style>

@endsection
