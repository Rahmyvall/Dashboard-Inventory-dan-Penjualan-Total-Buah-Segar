@extends('layouts.app')

@section('title', 'Tambah Kategori Baru - Total Buah Segar')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-12">

                <!-- Header -->
                <div class="card shadow border-0 mb-4">
                    <div class="card-body py-5">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="bg-success bg-opacity-10 p-4 rounded-4 me-4">
                                    <i class="fas fa-plus-circle fa-3x text-success"></i>
                                </div>
                                <div>
                                    <h1 class="h3 mb-2 fw-bold text-dark">Tambah Kategori Buah Baru</h1>
                                    <p class="text-muted mb-0">Tambahkan kategori baru untuk mengorganisir produk buah segar
                                        Anda</p>
                                </div>
                            </div>
                            <a href="{{ route('kategori.index') }}" class="btn btn-outline-secondary px-4 py-2">
                                <i class="fas fa-arrow-left me-2"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Main Form Card -->
                <div class="card shadow border-0">
                    <div class="card-header bg-white py-3 border-bottom">
                        <h5 class="mb-0 fw-semibold text-dark">
                            <i class="fas fa-tag text-primary me-2"></i>
                            Formulir Tambah Kategori
                        </h5>
                    </div>

                    <div class="card-body p-5">
                        <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data"
                            id="kategoriForm">
                            @csrf

                            <!-- Nama Kategori -->
                            <div class="mb-5">
                                <label for="nama_kategori" class="form-label fw-semibold text-dark mb-2">
                                    Nama Kategori <span class="text-danger">*</span>
                                </label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light">
                                        <i class="fas fa-tag text-muted"></i>
                                    </span>
                                    <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror"
                                        id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}"
                                        placeholder="Contoh: Tropical Fruits" maxlength="50" required autofocus>
                                </div>
                                @error('nama_kategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted mt-2 d-block">Nama kategori harus unik dan maksimal 50
                                    karakter</small>
                            </div>

                            <!-- Gambar dengan Live Preview -->
                            <div class="mb-5">
                                <label class="form-label fw-semibold text-dark mb-3">Gambar Kategori</label>

                                <!-- Preview Area -->
                                <div id="imagePreview" class="mb-3 text-center d-none">
                                    <img id="previewImg" src="#" alt="Preview Gambar" class="img-thumbnail shadow-sm"
                                        style="max-height: 220px; object-fit: contain; border-radius: 12px;">
                                </div>

                                <input type="file"
                                    class="form-control form-control-lg @error('gambar') is-invalid @enderror"
                                    id="gambar" name="gambar" accept="image/jpeg,image/png,image/jpg,image/webp">
                                @error('gambar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted mt-2">
                                    Format yang diizinkan: JPG, JPEG, PNG, WEBP (maksimal 2 MB)
                                </small>
                            </div>

                            <!-- Deskripsi -->
                            <div class="mb-5">
                                <label for="deskripsi" class="form-label fw-semibold text-dark mb-2">
                                    Deskripsi Kategori
                                </label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="6"
                                    placeholder="Jelaskan secara singkat tentang kategori ini...">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted mt-2">Opsional, namun sangat disarankan untuk membantu pengguna
                                    memahami kategori.</small>
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="d-flex justify-content-end gap-3 pt-4 border-top">
                                <a href="{{ route('kategori.index') }}" class="btn btn-secondary px-5 py-3">
                                    <i class="fas fa-times me-2"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-success px-5 py-3 shadow-sm">
                                    <i class="fas fa-save me-2"></i> Simpan Kategori
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="card-footer bg-light py-3 text-center">
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            Pastikan nama kategori unik agar tidak terjadi duplikasi data
                        </small>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        // Live Preview Gambar
        document.getElementById('gambar').addEventListener('change', function(e) {
            const previewContainer = document.getElementById('imagePreview');
            const previewImg = document.getElementById('previewImg');

            if (e.target.files && e.target.files[0]) {
                const reader = new FileReader();

                reader.onload = function(event) {
                    previewImg.src = event.target.result;
                    previewContainer.classList.remove('d-none');
                }

                reader.readAsDataURL(e.target.files[0]);
            } else {
                previewContainer.classList.add('d-none');
            }
        });
    </script>
@endsection
