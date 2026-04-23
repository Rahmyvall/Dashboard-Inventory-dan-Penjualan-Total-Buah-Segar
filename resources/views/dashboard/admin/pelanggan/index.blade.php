@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">

        {{-- HEADER --}}
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">

            <div>
                <h4 class="fw-bold mb-1">👥 Manajemen Pelanggan</h4>
                <div class="text-muted small">
                    Kelola data pelanggan retail, grosir, dan corporate secara terpusat
                </div>
            </div>

            <a href="{{ route('pelanggan.create') }}" class="btn btn-primary px-4 shadow-sm">
                + Add Customer
            </a>

        </div>

        {{-- KPI CARDS --}}
        <div class="row g-3 mb-4">

            <div class="col-md-4">
                <div class="card border-0 shadow-sm p-3 h-100">
                    <div class="text-muted small">Total Customers</div>
                    <div class="fs-3 fw-bold">{{ $pelanggans->total() }}</div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm p-3 h-100">
                    <div class="text-muted small">Retail Segment</div>
                    <div class="fs-4 fw-bold text-success">
                        {{ \App\Models\Pelanggan::where('tipe_pelanggan', 'retail')->count() }}
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm p-3 h-100">
                    <div class="text-muted small">Corporate Segment</div>
                    <div class="fs-4 fw-bold text-primary">
                        {{ \App\Models\Pelanggan::where('tipe_pelanggan', 'corporate')->count() }}
                    </div>
                </div>
            </div>

        </div>

        {{-- FILTER BAR (CRM STYLE) --}}
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">

                <form method="GET" class="row g-3 align-items-center">

                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-text bg-white">🔍</span>
                            <input type="text" name="search" class="form-control"
                                placeholder="Search customer, email, phone..." value="{{ request('search') }}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <select name="tipe" class="form-select">
                            <option value="">All Segment</option>
                            <option value="retail" {{ request('tipe') == 'retail' ? 'selected' : '' }}>Retail</option>
                            <option value="grosir" {{ request('tipe') == 'grosir' ? 'selected' : '' }}>Wholesale</option>
                            <option value="corporate" {{ request('tipe') == 'corporate' ? 'selected' : '' }}>Corporate
                            </option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-dark w-100">Filter</button>
                    </div>

                    <div class="col-md-2">
                        <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-secondary w-100">
                            Reset
                        </a>
                    </div>

                </form>

            </div>
        </div>

        {{-- TABLE CRM STYLE --}}
        <div class="card border-0 shadow-sm">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="bg-light">
                        <tr class="text-muted small">
                            <th class="text-center">#</th>
                            <th>Customer</th>
                            <th>Contact</th>
                            <th>Segment</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($pelanggans as $item)
                            <tr>

                                {{-- NO --}}
                                <td class="text-center text-muted fw-semibold">
                                    {{ $loop->iteration + ($pelanggans->currentPage() - 1) * $pelanggans->perPage() }}
                                </td>

                                {{-- CUSTOMER INFO --}}
                                <td>
                                    <div class="fw-bold">{{ $item->nama_pelanggan }}</div>
                                    <div class="text-muted small">
                                        {{ $item->kode_pelanggan }}
                                    </div>
                                    <div class="text-muted small">
                                        {{ $item->alamat }}
                                    </div>
                                </td>

                                {{-- CONTACT --}}
                                <td>
                                    <div>{{ $item->telepon ?? '-' }}</div>
                                    <div class="text-muted small">{{ $item->email ?? '-' }}</div>
                                </td>

                                {{-- SEGMENT --}}
                                <td>
                                    @php
                                        $badge = match ($item->tipe_pelanggan) {
                                            'retail' => 'success',
                                            'grosir' => 'warning',
                                            'corporate' => 'primary',
                                            default => 'secondary',
                                        };
                                    @endphp

                                    <span class="badge bg-{{ $badge }} px-3 py-2 rounded-pill">
                                        {{ ucfirst($item->tipe_pelanggan) }}
                                    </span>
                                </td>

                                {{-- ACTION --}}
                                <td class="text-center">

                                    <div class="btn-group btn-group-sm">

                                        <a href="{{ route('pelanggan.show', $item->id_pelanggan) }}"
                                            class="btn btn-light border">
                                            👁
                                        </a>

                                        <a href="{{ route('pelanggan.edit', $item->id_pelanggan) }}"
                                            class="btn btn-warning text-white">
                                            ✏️
                                        </a>

                                        <form action="{{ route('pelanggan.destroy', $item->id_pelanggan) }}" method="POST"
                                            onsubmit="return confirm('Delete customer?')">

                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger">
                                                🗑
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    🚫 No customers found
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        {{-- PAGINATION --}}
        <div class="d-flex justify-content-between align-items-center mt-3">

            <small class="text-muted">
                Showing {{ $pelanggans->firstItem() }} - {{ $pelanggans->lastItem() }}
                of {{ $pelanggans->total() }}
            </small>

            <div>
                {{ $pelanggans->withQueryString()->links() }}
            </div>

        </div>

    </div>

    {{-- STYLE --}}
    <style>
        .card {
            border-radius: 16px;
        }

        .btn {
            border-radius: 10px;
        }

        .table-hover tbody tr:hover {
            background: #f6f9ff;
            transition: .2s;
        }
    </style>
@endsection
