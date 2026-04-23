@extends('layouts.app')

@section('content')
    <div class="container py-4">

        {{-- HERO HEADER --}}
        <div class="card border-0 shadow-sm mb-4 overflow-hidden">

            <div class="p-4 text-white" style="background: linear-gradient(135deg,#4e73df,#1cc88a);">

                <div class="d-flex align-items-center gap-3">

                    <div class="rounded-circle bg-white text-dark d-flex align-items-center justify-content-center"
                        style="width:60px;height:60px;font-size:22px;font-weight:bold;">
                        ➕
                    </div>

                    <div>
                        <h4 class="mb-0 fw-bold">Add New Customer</h4>
                        <small class="opacity-75">CRM • Marketing • Customer onboarding</small>
                    </div>

                </div>

            </div>

        </div>

        {{-- FORM CARD --}}
        <div class="card border-0 shadow-sm">

            <div class="card-body p-4">

                <form action="{{ route('pelanggan.store') }}" method="POST">
                    @csrf

                    <div class="row g-4">

                        {{-- LEFT --}}
                        <div class="col-md-6">

                            <h6 class="fw-bold mb-3">📋 Basic Information</h6>

                            {{-- KODE --}}
                            <div class="mb-3">
                                <label class="form-label text-muted small">Customer Code</label>
                                <input type="text" name="kode_pelanggan" class="form-control bg-light"
                                    value="{{ $kode_pelanggan }}" readonly>
                            </div>

                            {{-- NAMA --}}
                            <div class="mb-3">
                                <label class="form-label text-muted small">Customer Name</label>
                                <input type="text" name="nama_pelanggan"
                                    class="form-control @error('nama_pelanggan') is-invalid @enderror"
                                    placeholder="Enter customer name" value="{{ old('nama_pelanggan') }}">

                                @error('nama_pelanggan')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- ALAMAT --}}
                            <div class="mb-3">
                                <label class="form-label text-muted small">Address</label>
                                <textarea name="alamat" class="form-control" rows="3" placeholder="Full address">{{ old('alamat') }}</textarea>
                            </div>

                        </div>

                        {{-- RIGHT --}}
                        <div class="col-md-6">

                            <h6 class="fw-bold mb-3">📞 Contact & Segment</h6>

                            {{-- TELEPON --}}
                            <div class="mb-3">
                                <label class="form-label text-muted small">Phone</label>
                                <input type="text" name="telepon" class="form-control" placeholder="08xxxxxxxxxx"
                                    value="{{ old('telepon') }}">
                            </div>

                            {{-- EMAIL --}}
                            <div class="mb-3">
                                <label class="form-label text-muted small">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="email@domain.com"
                                    value="{{ old('email') }}">
                            </div>

                            {{-- TIPE --}}
                            <div class="mb-3">
                                <label class="form-label text-muted small">Customer Segment</label>

                                <select name="tipe_pelanggan" class="form-select">
                                    <option value="">Select segment</option>
                                    <option value="retail">🟢 Retail</option>
                                    <option value="grosir">🟡 Wholesale</option>
                                    <option value="corporate">🔵 Corporate</option>
                                </select>
                            </div>

                        </div>

                    </div>

                    {{-- ACTION --}}
                    <div class="d-flex justify-content-between mt-4 pt-3 border-top">

                        <a href="{{ route('pelanggan.index') }}" class="btn btn-light border px-4">
                            ← Back
                        </a>

                        <button class="btn btn-primary px-4 shadow-sm">
                            💾 Save Customer
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    {{-- STYLE --}}
    <style>
        .card {
            border-radius: 18px;
        }

        .form-control,
        .form-select {
            border-radius: 12px;
            padding: 10px 12px;
        }

        .btn {
            border-radius: 12px;
        }
    </style>
@endsection
