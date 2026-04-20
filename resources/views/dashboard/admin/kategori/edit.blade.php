@extends('layouts.app')

@section('content')
    <div class="container py-5">

        <div class="row justify-content-center">
            <div class="col-lg-12">

                <!-- Card -->
                <div class="card border-0 shadow-lg rounded-4">

                    <!-- Header -->
                    <div class="card-header bg-white border-0 py-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="fw-bold mb-1">Edit Kategori</h4>
                                <small class="text-muted">
                                    Update data kategori: <strong>{{ $kategori->nama_kategori }}</strong>
                                </small>
                            </div>
                        </div>
                    </div>

                    <!-- Body -->
                    <div class="card-body p-4">

                        <form action="{{ route('kategori.update', $kategori) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Nama -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Nama Kategori</label>
                                <input type="text" name="nama_kategori"
                                    value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                                    class="form-control form-control-lg rounded-3 @error('nama_kategori') is-invalid @enderror"
                                    placeholder="Contoh: Buah Tropis">

                                @error('nama_kategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Preview Gambar -->
                            @if ($kategori->gambar)
                                <div class="mb-4 text-center">
                                    <img id="preview" src="{{ asset('storage/' . $kategori->gambar) }}"
                                        class="rounded-4 shadow-sm" style="width:150px;height:150px;object-fit:cover;">
                                    <div class="text-muted small mt-2">Gambar saat ini</div>
                                </div>
                            @else
                                <div class="mb-4 text-center">
                                    <img id="preview" src="https://via.placeholder.com/150" class="rounded-4 shadow-sm">
                                </div>
                            @endif

                            <!-- Upload -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Ganti Gambar</label>
                                <input type="file" name="gambar_file"
                                    class="form-control rounded-3 @error('gambar_file') is-invalid @enderror"
                                    onchange="previewImage(event)">

                                @error('gambar_file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <small class="text-muted">
                                    JPG, PNG, WEBP (max 2MB)
                                </small>
                            </div>

                            <!-- Deskripsi -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control rounded-3" rows="4" placeholder="Tulis deskripsi...">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
                            </div>

                            <!-- Button -->
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('kategori.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                                    Batal
                                </a>
                                <button class="btn btn-primary rounded-pill px-4 shadow-sm">
                                    💾 Update
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- Preview JS -->
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('preview');

            if (input.files && input.files[0]) {
                preview.src = URL.createObjectURL(input.files[0]);
            }
        }
    </script>
@endsection
