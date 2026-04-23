@extends('layouts.app')

@section('content')
    <div class="container py-4">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h4 class="fw-bold mb-1">👤 Customer Profile</h4>
                <small class="text-muted">CRM • Marketing • Customer Insights</small>
            </div>

            <a href="{{ route('pelanggan.index') }}" class="btn btn-light border shadow-sm">
                ← Back
            </a>

        </div>

        {{-- HERO PROFILE --}}
        <div class="card border-0 shadow-sm overflow-hidden mb-4">

            {{-- GRADIENT HEADER --}}
            <div class="p-4 text-white" style="background: linear-gradient(135deg,#4e73df,#1cc88a);">

                <div class="d-flex align-items-center gap-3">

                    {{-- AVATAR --}}
                    <div class="rounded-circle bg-white text-dark d-flex align-items-center justify-content-center"
                        style="width:70px;height:70px;font-size:26px;font-weight:700;">
                        {{ strtoupper(substr($pelanggan->nama_pelanggan, 0, 1)) }}
                    </div>

                    <div>
                        <h5 class="mb-0 fw-bold">{{ $pelanggan->nama_pelanggan }}</h5>
                        <small class="opacity-75">{{ $pelanggan->kode_pelanggan }}</small><br>

                        <span class="badge bg-dark mt-2 px-3 py-2">
                            {{ ucfirst($pelanggan->tipe_pelanggan) }}
                        </span>
                    </div>

                </div>

            </div>

            {{-- KPI MARKETING --}}
            <div class="row text-center bg-light p-3">

                <div class="col-md-4">
                    <div class="fw-bold text-dark">Active</div>
                    <small class="text-muted">Status</small>
                </div>

                <div class="col-md-4">
                    <div class="fw-bold">0</div>
                    <small class="text-muted">Orders</small>
                </div>

                <div class="col-md-4">
                    <div class="fw-bold">0</div>
                    <small class="text-muted">Revenue</small>
                </div>

            </div>

        </div>

        {{-- CONTENT GRID --}}
        <div class="row g-4">

            {{-- LEFT --}}
            <div class="col-md-6">

                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">

                        <h6 class="fw-bold mb-3">📋 Customer Information</h6>

                        <div class="mb-3">
                            <small class="text-muted">Full Name</small>
                            <div class="fw-semibold">{{ $pelanggan->nama_pelanggan }}</div>
                        </div>

                        <div class="mb-3">
                            <small class="text-muted">Address</small>
                            <div>{{ $pelanggan->alamat ?? '-' }}</div>
                        </div>

                        <div class="mb-3">
                            <small class="text-muted">Customer Code</small>
                            <div class="fw-semibold">{{ $pelanggan->kode_pelanggan }}</div>
                        </div>

                    </div>
                </div>

            </div>

            {{-- RIGHT --}}
            <div class="col-md-6">

                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">

                        <h6 class="fw-bold mb-3">📞 Contact & Segment</h6>

                        <div class="mb-3 p-3 bg-light rounded">
                            <small class="text-muted">Phone</small>
                            <div class="fw-semibold">{{ $pelanggan->telepon ?? '-' }}</div>
                        </div>

                        <div class="mb-3 p-3 bg-light rounded">
                            <small class="text-muted">Email</small>
                            <div class="fw-semibold">{{ $pelanggan->email ?? '-' }}</div>
                        </div>

                        <div class="mt-3">
                            <small class="text-muted">Segment</small><br>

                            @php
                                $color = match ($pelanggan->tipe_pelanggan) {
                                    'retail' => 'success',
                                    'grosir' => 'warning',
                                    'corporate' => 'primary',
                                    default => 'secondary',
                                };
                            @endphp

                            <span class="badge bg-{{ $color }} px-3 py-2 mt-1">
                                {{ ucfirst($pelanggan->tipe_pelanggan) }}
                            </span>

                        </div>

                    </div>
                </div>

            </div>

        </div>

        {{-- ACTION BAR --}}
        <div class="d-flex justify-content-end gap-2 mt-4">

            <a href="{{ route('pelanggan.edit', $pelanggan->id_pelanggan) }}"
                class="btn btn-warning text-white px-4 shadow-sm">
                ✏️ Edit Customer
            </a>

            <form action="{{ route('pelanggan.destroy', $pelanggan->id_pelanggan) }}" method="POST"
                onsubmit="return confirm('Delete this customer?')">

                @csrf
                @method('DELETE')

                <button class="btn btn-danger px-4 shadow-sm">
                    🗑 Delete
                </button>

            </form>

        </div>

    </div>

    {{-- STYLE --}}
    <style>
        .card {
            border-radius: 18px;
        }

        .btn {
            border-radius: 12px;
        }
    </style>
@endsection
