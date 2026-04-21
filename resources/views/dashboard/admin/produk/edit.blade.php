@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')

    @php
        $diskon = 5;
        $hargaDiskon = $produk->harga_jual - ($produk->harga_jual * $diskon) / 100;
    @endphp

    <div class="container-fluid py-4">

        <!-- HEADER -->
        <div class="mb-4">
            <h3 class="fw-bold mb-1">✏️ Edit Produk</h3>
            <p class="text-muted">Perbarui data produk dengan mudah</p>
        </div>

        <form action="{{ route('produk.update', $produk->id_produk) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="row g-4">

                <!-- LEFT FORM -->
                <div class="col-md-7">

                    <div class="card border-0 shadow-sm rounded-4 p-4">

                        <div class="row g-3">

                            <!-- KODE -->
                            <div class="col-md-4">
                                <label class="form-label">Kode Produk</label>
                                <input type="text" name="kode_produk" value="{{ $produk->kode_produk }}"
                                    class="form-control rounded-3">
                            </div>

                            <!-- NAMA -->
                            <div class="col-md-8">
                                <label class="form-label">Nama Buah</label>
                                <input type="text" name="nama_buah" value="{{ $produk->nama_buah }}"
                                    class="form-control rounded-3">
                            </div>

                            <!-- KATEGORI -->
                            <div class="col-md-6">
                                <label class="form-label">Kategori</label>
                                <select name="id_kategori" class="form-select rounded-3">

                                    <option value="">- Pilih -</option>

                                    @foreach ($kategoris as $k)
                                        <option value="{{ $k->id_kategori }}"
                                            {{ $produk->id_kategori == $k->id_kategori ? 'selected' : '' }}>
                                            {{ $k->nama_kategori }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            <!-- SATUAN -->
                            <div class="col-md-6">
                                <label class="form-label">Satuan</label>
                                <select name="satuan" class="form-select rounded-3">
                                    @foreach (['kg', 'buah', 'ikat', 'dus', 'kg_box'] as $s)
                                        <option value="{{ $s }}" {{ $produk->satuan == $s ? 'selected' : '' }}>
                                            {{ strtoupper($s) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- HARGA -->
                            <div class="col-md-6">
                                <label class="form-label">Harga Jual</label>
                                <input type="number" name="harga_jual" value="{{ $produk->harga_jual }}"
                                    class="form-control rounded-3">
                            </div>

                            <!-- STOK -->
                            <div class="col-md-6">
                                <label class="form-label">Stok</label>
                                <input type="number" name="stok" value="{{ $produk->stok }}"
                                    class="form-control rounded-3">
                            </div>

                            <!-- FOTO -->
                            <div class="col-12">
                                <label class="form-label">Foto Produk</label>

                                <input type="file" name="foto_file" class="form-control rounded-3">

                                @if ($produk->foto)
                                    <div class="mt-2">
                                        <small class="text-muted">Foto saat ini:</small><br>
                                        <img src="{{ asset('storage/' . $produk->foto) }}" width="120"
                                            class="rounded shadow-sm">
                                    </div>
                                @endif
                            </div>

                        </div>

                        <!-- BUTTON -->
                        <div class="mt-4 d-flex gap-2">
                            <button class="btn btn-primary rounded-pill px-4">
                                💾 Update Produk
                            </button>

                            <a href="{{ route('produk.index') }}" class="btn btn-light rounded-pill px-4">
                                ← Kembali
                            </a>
                        </div>

                    </div>

                </div>

                <!-- RIGHT PREVIEW -->
                <div class="col-md-5">

                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden sticky-top">

                        <img src="{{ $produk->foto ? asset('storage/' . $produk->foto) : 'https://via.placeholder.com/400' }}"
                            class="w-100" style="height:250px; object-fit:cover;">

                        <div class="card-body">

                            <span class="badge bg-danger mb-2">-5%</span>

                            <h5 class="fw-bold">{{ $produk->nama_buah }}</h5>

                            <small class="text-muted">
                                {{ $produk->kategori->nama_kategori ?? '-' }}
                            </small>

                            <hr>

                            <div class="mb-2">
                                <div class="text-muted text-decoration-line-through">
                                    Rp {{ number_format($produk->harga_jual, 0, ',', '.') }}
                                </div>

                                <div class="fw-bold text-success fs-5">
                                    Rp {{ number_format($hargaDiskon, 0, ',', '.') }}
                                </div>
                            </div>

                            <div class="d-flex justify-content-between small">
                                <span>Stok</span>
                                <span class="fw-bold">
                                    {{ $produk->stok }} {{ $produk->satuan }}
                                </span>
                            </div>

                            <div class="d-flex justify-content-between small mt-1">
                                <span>Status</span>
                                <span class="badge bg-{{ $produk->is_active ? 'success' : 'secondary' }}">
                                    {{ $produk->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </form>

    </div>

@endsection
