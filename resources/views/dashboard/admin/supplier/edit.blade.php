@extends('layouts.app')

@section('title', 'Edit Supplier')

@section('content')
    <div class="container py-4">

        <div class="row g-4">

            <!-- FOTO -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-4 text-center p-3">

                    <h6 class="fw-bold mb-3">Foto Supplier</h6>

                    <img id="preview"
                        src="{{ $supplier->foto ? asset('storage/' . $supplier->foto) : 'https://via.placeholder.com/300' }}"
                        class="img-fluid rounded-4 mb-3" style="height:250px; object-fit:cover;">

                    <!-- INPUT FOTO -->
                    <input type="file" name="foto_file" form="formSupplier" class="form-control"
                        onchange="previewImage(event)">

                    <small class="text-muted mt-2 d-block">
                        JPG/PNG max 2MB
                    </small>

                </div>
            </div>

            <!-- FORM -->
            <div class="col-md-8">
                <div class="card shadow-sm border-0 rounded-4">

                    <div class="card-body p-4">

                        <h4 class="fw-bold mb-3">✏️ Edit Supplier</h4>

                        {{-- ERROR --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <form id="formSupplier" action="{{ route('supplier.update', $supplier->id_supplier) }}"
                            method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <!-- 🔥 PENTING: KODE HARUS DIKIRIM -->
                            <input type="hidden" name="kode_supplier" value="{{ $supplier->kode_supplier }}">

                            <div class="row g-3">

                                <!-- KODE (DISPLAY ONLY) -->
                                <div class="col-md-6">
                                    <label class="form-label">Kode Supplier</label>
                                    <input type="text" class="form-control bg-light"
                                        value="{{ $supplier->kode_supplier }}" readonly>
                                </div>

                                <!-- STATUS -->
                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="aktif" {{ $supplier->status == 'aktif' ? 'selected' : '' }}>Aktif
                                        </option>
                                        <option value="nonaktif" {{ $supplier->status == 'nonaktif' ? 'selected' : '' }}>
                                            Nonaktif</option>
                                    </select>
                                </div>

                                <!-- NAMA -->
                                <div class="col-12">
                                    <label class="form-label">Nama Supplier</label>
                                    <input type="text" name="nama_supplier" class="form-control"
                                        value="{{ old('nama_supplier', $supplier->nama_supplier) }}" required>
                                </div>

                                <!-- KOTA -->
                                <div class="col-md-6">
                                    <label class="form-label">Kota</label>
                                    <input type="text" name="kota" class="form-control"
                                        value="{{ old('kota', $supplier->kota) }}">
                                </div>

                                <!-- TELEPON -->
                                <div class="col-md-6">
                                    <label class="form-label">Telepon</label>
                                    <input type="text" name="telepon" class="form-control"
                                        value="{{ old('telepon', $supplier->telepon) }}">
                                </div>

                                <!-- EMAIL -->
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ old('email', $supplier->email) }}">
                                </div>

                                <!-- KONTAK -->
                                <div class="col-md-6">
                                    <label class="form-label">Kontak Person</label>
                                    <input type="text" name="kontak_person" class="form-control"
                                        value="{{ old('kontak_person', $supplier->kontak_person) }}">
                                </div>

                                <!-- ALAMAT -->
                                <div class="col-12">
                                    <label class="form-label">Alamat</label>
                                    <textarea name="alamat" class="form-control" rows="3">{{ old('alamat', $supplier->alamat) }}</textarea>
                                </div>

                            </div>

                            <!-- BUTTON -->
                            <div class="mt-4 d-flex justify-content-between">

                                <a href="{{ route('supplier.index') }}" class="btn btn-secondary">
                                    ← Kembali
                                </a>

                                <button type="submit" class="btn btn-primary px-4">
                                    💾 Update
                                </button>

                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>

    {{-- PREVIEW IMAGE --}}
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('preview').src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

@endsection
