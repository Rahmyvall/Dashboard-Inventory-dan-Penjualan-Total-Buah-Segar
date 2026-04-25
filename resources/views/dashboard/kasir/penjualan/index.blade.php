@extends('layouts.app')

@section('content')
    <div class="container py-4">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-0">📋 Data Penjualan</h3>
                <small class="text-muted">Kelola seluruh transaksi penjualan</small>
            </div>

            <a href="{{ route('penjualan.create') }}" class="btn btn-success">
                ➕ Transaksi Baru
            </a>
        </div>

        {{-- STAT CARDS --}}
        <div class="row mb-4">

            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="text-muted">Total Transaksi</h6>
                        <h3 class="fw-bold">{{ $penjualans->count() }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="text-muted">Total Pendapatan</h6>
                        <h3 class="fw-bold text-success">
                            Rp {{ number_format($penjualans->sum('total')) }}
                        </h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="text-muted">Total Dibayar</h6>
                        <h3 class="fw-bold text-primary">
                            Rp {{ number_format($penjualans->sum('dibayar')) }}
                        </h3>
                    </div>
                </div>
            </div>

        </div>

        {{-- SEARCH --}}
        <form method="GET" class="mb-3">
            <div class="input-group shadow-sm">
                <input type="text" name="search" class="form-control"
                    placeholder="🔍 Cari invoice, pelanggan, metode..." value="{{ request('search') }}">

                <button class="btn btn-dark">
                    Cari
                </button>
            </div>
        </form>

        {{-- TABLE CARD --}}
        <div class="card shadow-sm border-0">
            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">No Invoice</th>
                                <th>Tanggal</th>
                                <th>Pelanggan</th>
                                <th>Total</th>
                                <th>Dibayar</th>
                                <th>Metode</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($penjualans as $p)
                                <tr class="text-center">

                                    <td class="fw-bold">{{ $p->no_invoice }}</td>

                                    <td>
                                        <small>
                                            {{ \Carbon\Carbon::parse($p->tanggal_penjualan)->format('d M Y H:i') }}
                                        </small>
                                    </td>

                                    <td>
                                        {{ $p->pelanggan->nama_pelanggan ?? 'Umum' }}
                                    </td>

                                    <td class="fw-bold text-success">
                                        Rp {{ number_format($p->total) }}
                                    </td>

                                    <td>
                                        Rp {{ number_format($p->dibayar) }}
                                    </td>

                                    <td>
                                        <span class="badge bg-info text-dark">
                                            {{ strtoupper($p->metode_bayar) }}
                                        </span>
                                    </td>

                                    <td class="text-center">

                                        <a href="{{ route('penjualan.show', $p->id_penjualan) }}"
                                            class="btn btn-sm btn-outline-primary">
                                            👁
                                        </a>

                                        <a href="{{ route('penjualan.edit', $p->id_penjualan) }}"
                                            class="btn btn-sm btn-outline-warning">
                                            ✏
                                        </a>

                                        <form action="{{ route('penjualan.destroy', $p->id_penjualan) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Hapus data?')">
                                                🗑
                                            </button>
                                        </form>

                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">
                                        📭 Tidak ada data penjualan
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>
        </div>

    </div>
@endsection
