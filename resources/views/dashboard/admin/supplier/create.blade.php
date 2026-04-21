@extends('layouts.app')

@section('title', 'Tambah Supplier')

@section('content')
    <div class="container py-4">

        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-4">

                <h4 class="fw-bold mb-3">➕ Tambah Supplier</h4>
                <p class="text-muted mb-4">Isi data supplier dengan lengkap</p>

                {{-- ERROR --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">

                        <!-- KODE -->
                        <div class="col-md-6">
                            <label class="form-label">Kode Supplier</label>
                            <input type="text" name="kode_supplier" class="form-control" value="{{ $kode_supplier }}"
                                readonly>
                        </div>

                        <!-- NAMA -->
                        <div class="col-md-6">
                            <label class="form-label">Nama Supplier</label>
                            <input type="text" name="nama_supplier" class="form-control" required>
                        </div>

                        <!-- KOTA -->
                        <div class="col-md-6">
                            <label class="form-label">Kota</label>
                            <input type="text" name="kota" class="form-control">
                        </div>

                        <!-- TELEPON -->
                        <div class="col-md-6">
                            <label class="form-label">Telepon</label>
                            <input type="text" name="telepon" class="form-control">
                        </div>

                        <!-- EMAIL -->
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>

                        <!-- KONTAK PERSON -->
                        <div class="col-md-6">
                            <label class="form-label">Kontak Person</label>
                            <input type="text" name="kontak_person" class="form-control">
                        </div>

                        <!-- ALAMAT -->
                        <div class="col-12">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3"></textarea>
                        </div>

                        <!-- STATUS -->
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Nonaktif</option>
                            </select>
                        </div>

                        <!-- FOTO -->
                        <div class="col-md-6">
                            <label class="form-label">Foto Supplier</label>
                            <input type="file" name="foto_file" class="form-control" onchange="previewImage(event)">
                        </div>

                        <!-- PREVIEW FOTO -->
                        <div class="col-12 text-center">
                            <img id="preview" src="https://via.placeholder.com/150" class="rounded shadow-sm mt-2"
                                width="150">
                        </div>

                    </div>

                    <!-- BUTTON -->
                    <div class="mt-4 d-flex justify-content-between">
                        <a href="{{ route('supplier.index') }}" class="btn btn-secondary">
                            ← Kembali
                        </a>

                        <button class="btn btn-primary px-4">
                            💾 Simpan
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

    {{-- SCRIPT PREVIEW IMAGE --}}
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

@endsection
