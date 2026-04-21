@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')

    <div class="container-fluid py-4">

        <!-- HEADER -->
        <div class="mb-4">
            <h2 class="fw-bold mb-1">➕ Tambah Produk</h2>
            <p class="text-muted">Tambahkan produk baru ke marketplace</p>
        </div>

        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-4">

                <!-- LEFT FORM -->
                <div class="col-lg-8">

                    <div class="card border-0 shadow-lg rounded-4">

                        <div class="card-body p-4">

                            <div class="row g-3">

                                <!-- KODE -->
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Kode Produk</label>

                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="fas fa-barcode text-muted"></i>
                                        </span>

                                        <input type="text" class="form-control bg-light" value="{{ $kode_produk }}"
                                            disabled>

                                        <input type="hidden" name="kode_produk" value="{{ $kode_produk }}">
                                    </div>

                                    <small class="text-muted">Auto generate sistem</small>
                                </div>

                                <!-- NAMA -->
                                <div class="col-md-8">
                                    <label class="form-label fw-semibold">Nama Produk</label>
                                    <input type="text" name="nama_buah" class="form-control form-control-lg"
                                        placeholder="Contoh: Apel Fuji" required>
                                </div>

                                <!-- KATEGORI -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Kategori</label>
                                    <select name="id_kategori" class="form-select form-select-lg">
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($kategoris as $k)
                                            <option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- SATUAN -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Satuan</label>
                                    <select name="satuan" class="form-select form-select-lg">
                                        <option value="kg">Kg</option>
                                        <option value="buah">Buah</option>
                                        <option value="ikat">Ikat</option>
                                        <option value="dus">Dus</option>
                                        <option value="kg_box">Kg Box</option>
                                    </select>
                                </div>

                                <!-- HARGA -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Harga Beli</label>
                                    <input type="number" name="harga_beli" class="form-control" placeholder="0">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Harga Jual</label>
                                    <input type="number" name="harga_jual" class="form-control" placeholder="0">
                                </div>

                                <!-- STOK -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Stok</label>
                                    <input type="number" name="stok" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Stok Minimal</label>
                                    <input type="number" name="stok_minimal" class="form-control">
                                </div>

                                <!-- SHELF LIFE -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Shelf Life (Hari)</label>
                                    <input type="number" name="shelf_life_days" class="form-control">
                                </div>

                                <!-- STATUS -->
                                <div class="col-md-6 d-flex align-items-end">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                            checked>
                                        <label class="form-check-label fw-semibold">Aktif Produk</label>
                                    </div>
                                </div>

                                <!-- DESKRIPSI -->
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi produk..."></textarea>
                                </div>

                                <!-- FOTO -->
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Foto Produk</label>
                                    <input type="file" name="foto_file" class="form-control">
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- RIGHT SIDE (PREVIEW CARD) -->
                <div class="col-lg-4">

                    <div class="card border-0 shadow-lg rounded-4 sticky-top" style="top:20px;">

                        <div class="p-3 bg-light text-center">
                            <img src="https://via.placeholder.com/300" class="img-fluid rounded-3"
                                style="height:220px; object-fit:cover;">
                        </div>

                        <div class="card-body">

                            <span class="badge bg-danger mb-2">-5%</span>

                            <h5 class="fw-bold mb-1">Preview Produk</h5>
                            <small class="text-muted">Live preview produk</small>

                            <hr>

                            <div class="text-decoration-line-through text-muted">
                                Rp 0
                            </div>

                            <h4 class="text-success fw-bold">
                                Rp 0
                            </h4>

                            <div class="d-flex justify-content-between small mt-3">
                                <span>Stok</span>
                                <span class="fw-semibold">0</span>
                            </div>

                        </div>

                    </div>

                    <!-- BUTTON -->
                    <div class="d-grid gap-2 mt-3">

                        <button class="btn btn-primary btn-lg rounded-pill">
                            💾 Simpan Produk
                        </button>

                        <a href="{{ route('produk.index') }}" class="btn btn-light rounded-pill">
                            ← Kembali
                        </a>

                    </div>

                </div>

            </div>

        </form>

    </div>

@endsection
