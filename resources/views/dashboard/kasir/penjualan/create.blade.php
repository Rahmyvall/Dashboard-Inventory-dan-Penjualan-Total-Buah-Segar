@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between mb-3">
            <h3>🛒 POS Kasir</h3>
            <span class="badge bg-primary fs-6">{{ $no_invoice }}</span>
        </div>

        {{-- ERROR VALIDASI --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('penjualan.store') }}" method="POST">
            @csrf

            <div class="row g-4">

                {{-- LEFT --}}
                <div class="col-md-7">

                    <div class="card shadow-sm">
                        <div class="card-header">👤 Pelanggan</div>

                        <div class="card-body">

                            <select name="id_pelanggan" class="form-select mb-3">
                                <option value="">Umum</option>
                                @foreach ($pelanggan as $p)
                                    <option value="{{ $p->id_pelanggan }}">
                                        {{ $p->nama_pelanggan }}
                                    </option>
                                @endforeach
                            </select>

                            {{-- SUBTOTAL --}}
                            <div class="mb-2">
                                <label>Subtotal</label>
                                <input type="number" name="subtotal" id="subtotal" class="form-control" required>
                            </div>

                            {{-- DISKON --}}
                            <div class="mb-2">
                                <label>Diskon</label>
                                <input type="number" name="diskon" id="diskon" class="form-control" value="0">
                            </div>

                            {{-- TOTAL --}}
                            <div class="mb-2">
                                <label>Total</label>
                                <input type="number" name="total" id="total" class="form-control" required readonly>
                            </div>

                        </div>
                    </div>

                </div>

                {{-- RIGHT --}}
                <div class="col-md-5">

                    <div class="card shadow-sm">
                        <div class="card-header">💳 Pembayaran</div>

                        <div class="card-body">

                            {{-- DIBAYAR --}}
                            <div class="mb-2">
                                <label>Dibayar</label>
                                <input type="number" name="dibayar" id="dibayar" class="form-control" required>
                            </div>

                            {{-- KEMBALIAN (DISPLAY SAJA) --}}
                            <div class="mb-2">
                                <label>Kembalian</label>
                                <input type="number" id="kembalian" class="form-control" readonly>
                            </div>

                            {{-- METODE --}}
                            <div class="mb-3">
                                <label>Metode Bayar</label>
                                <select name="metode_bayar" class="form-select" required>
                                    <option value="cash">Cash</option>
                                    <option value="transfer">Transfer</option>
                                    <option value="qris">QRIS</option>
                                    <option value="kartu">Kartu</option>
                                </select>
                            </div>

                            {{-- USER --}}
                            <input type="hidden" name="id_user"
                                value="{{ auth()->user()->id_user ?? auth()->user()->id }}">

                            <button class="btn btn-success w-100">
                                💾 Simpan Transaksi
                            </button>

                        </div>
                    </div>

                </div>

            </div>

        </form>

    </div>

    {{-- JS SIMPLE & STABIL --}}
    <script>
        function hitung() {

            let subtotal = parseFloat(document.getElementById('subtotal').value) || 0;
            let diskon = parseFloat(document.getElementById('diskon').value) || 0;

            let total = subtotal - diskon;
            if (total < 0) total = 0;

            document.getElementById('total').value = total;

            let dibayar = parseFloat(document.getElementById('dibayar').value) || 0;

            let kembali = dibayar - total;
            document.getElementById('kembalian').value = kembali > 0 ? kembali : 0;
        }

        document.getElementById('subtotal').addEventListener('input', hitung);
        document.getElementById('diskon').addEventListener('input', hitung);
        document.getElementById('dibayar').addEventListener('input', hitung);
    </script>

@endsection
