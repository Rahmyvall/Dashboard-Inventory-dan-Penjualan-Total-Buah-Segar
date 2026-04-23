@extends('layouts.app')

@section('content')
    <div class="container py-4">

        {{-- HERO HEADER --}}
        <div class="card border-0 shadow-sm mb-4 overflow-hidden">

            <div class="p-4 text-white" style="background: linear-gradient(135deg,#4e73df,#1cc88a);">

                <div class="d-flex align-items-center gap-3">

                    <div class="rounded-circle bg-white text-dark d-flex align-items-center justify-content-center"
                        style="width:60px;height:60px;font-size:22px;font-weight:bold;">
                        ✏️
                    </div>

                    <div>
                        <h4 class="mb-0 fw-bold">Edit Customer</h4>
                        <small class="opacity-75">Update customer profile & segmentation</small>
                    </div>

                </div>

            </div>

        </div>

        {{-- FORM CARD --}}
        <div class="card border-0 shadow-sm">

            <div class="card-body p-4">

                <form action="{{ route('pelanggan.update', $pelanggan->id_pelanggan) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-4">

                        {{-- LEFT SECTION --}}
                        <div class="col-md-6">

                            <h6 class="fw-bold mb-3">📋 Basic Information</h6>

                            {{-- KODE --}}
                            <div class="mb-3">
                                <label class="form-label text-muted small">Customer Code</label>
                                <input type="text" class="form-control bg-light" value="{{ $pelanggan->kode_pelanggan }}"
                                    readonly>
                            </div>

                            {{-- NAMA --}}
                            <div class="mb-3">
                                <label class="form-label text-muted small">Customer Name</label>
                                <input type="text" name="nama_pelanggan" class="form-control"
                                    value="{{ old('nama_pelanggan', $pelanggan->nama_pelanggan) }}">
                            </div>

                            {{-- ALAMAT --}}
                            <div class="mb-3">
                                <label class="form-label text-muted small">Address</label>
                                <textarea name="alamat" class="form-control" rows="3">{{ old('alamat', $pelanggan->alamat) }}</textarea>
                            </div>

                        </div>

                        {{-- RIGHT SECTION --}}
                        <div class="col-md-6">

                            <h6 class="fw-bold mb-3">📞 Contact & Segment</h6>

                            {{-- TELEPON --}}
                            <div class="mb-3">
                                <label class="form-label text-muted small">Phone</label>
                                <input type="text" name="telepon" class="form-control"
                                    value="{{ old('telepon', $pelanggan->telepon) }}">
                            </div>

                            {{-- EMAIL --}}
                            <div class="mb-3">
                                <label class="form-label text-muted small">Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $pelanggan->email) }}">
                            </div>

                            {{-- TIPE --}}
                            <div class="mb-3">
                                <label class="form-label text-muted small">Customer Segment</label>

                                <select name="tipe_pelanggan" class="form-select">

                                    <option value="retail" {{ $pelanggan->tipe_pelanggan == 'retail' ? 'selected' : '' }}>
                                        🟢 Retail
                                    </option>

                                    <option value="grosir" {{ $pelanggan->tipe_pelanggan == 'grosir' ? 'selected' : '' }}>
                                        🟡 Wholesale
                                    </option>

                                    <option value="corporate"
                                        {{ $pelanggan->tipe_pelanggan == 'corporate' ? 'selected' : '' }}>
                                        🔵 Corporate
                                    </option>

                                </select>

                            </div>

                        </div>

                    </div>

                    {{-- ACTION BUTTON --}}
                    <div class="d-flex justify-content-between mt-4 pt-3 border-top">

                        <a href="{{ route('pelanggan.index') }}" class="btn btn-light border px-4">
                            ← Back
                        </a>

                        <button class="btn btn-warning text-white px-4 shadow-sm">
                            💾 Update Customer
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
