@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between mb-3">
            <h3>✏ Edit Penjualan</h3>

            <span class="badge bg-warning text-dark">
                {{ $penjualan->no_invoice }}
            </span>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('penjualan.update', $penjualan->id_penjualan) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-4">

                {{-- LEFT --}}
                <div class="col-md-7">

                    <div class="card shadow-sm">
                        <div class="card-header">👤 Pelanggan</div>

                        <div class="card-body">

                            <select name="id_pelanggan" class="form-select mb-3">
                                <option value="">Umum</option>
                                @foreach ($pelanggan as $p)
                                    <option value="{{ $p->id_pelanggan }}"
                                        {{ $penjualan->id_pelanggan == $p->id_pelanggan ? 'selected' : '' }}>
                                        {{ $p->nama_pelanggan }}
                                    </option>
                                @endforeach
                            </select>

                            {{-- SUBTOTAL --}}
                            <div class="mb-2">
                                <label>Subtotal</label>
                                <input type="number" id="subtotal" name="subtotal" class="form-control"
                                    value="{{ $penjualan->subtotal }}" required>
                            </div>

                            {{-- TOTAL (AUTO) --}}
                            <div class="mb-2">
                                <label>Total (Diskon 3%)</label>
                                <input type="number" id="total" class="form-control" value="{{ $penjualan->total }}"
                                    readonly>
                            </div>

                        </div>
                    </div>

                </div>

                {{-- RIGHT --}}
                <div class="col-md-5">

                    <div class="card shadow-sm">
                        <div class="card-header">💳 Pembayaran</div>

                        <div class="card-body">

                            <div class="mb-2">
                                <label>Dibayar</label>
                                <input type="number" id="dibayar" name="dibayar" class="form-control"
                                    value="{{ $penjualan->dibayar }}" required>
                            </div>

                            <div class="mb-2">
                                <label>Kembalian</label>
                                <input type="number" id="kembalian" class="form-control"
                                    value="{{ $penjualan->dibayar - $penjualan->total }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label>Metode</label>
                                <select name="metode_bayar" class="form-select">
                                    <option value="cash" {{ $penjualan->metode_bayar == 'cash' ? 'selected' : '' }}>Cash
                                    </option>
                                    <option value="transfer"
                                        {{ $penjualan->metode_bayar == 'transfer' ? 'selected' : '' }}>Transfer</option>
                                    <option value="qris" {{ $penjualan->metode_bayar == 'qris' ? 'selected' : '' }}>QRIS
                                    </option>
                                    <option value="kartu" {{ $penjualan->metode_bayar == 'kartu' ? 'selected' : '' }}>
                                        Kartu</option>
                                </select>
                            </div>

                            <button class="btn btn-primary w-100">
                                💾 Update Penjualan
                            </button>

                        </div>
                    </div>

                </div>

            </div>

        </form>

    </div>
    <script>
        function hitungEdit() {

            let subtotal = parseFloat(document.getElementById('subtotal').value) || 0;
            let dibayar = parseFloat(document.getElementById('dibayar').value) || 0;

            // 🔥 DISKON 3%
            let diskon = subtotal * 0.03;

            // 🔥 TOTAL
            let total = subtotal - diskon;
            if (total < 0) total = 0;

            document.getElementById('total').value = total;

            // 🔥 KEMBALIAN
            let kembali = dibayar - total;
            document.getElementById('kembalian').value = kembali > 0 ? kembali : 0;
        }

        // realtime event
        document.getElementById('subtotal').addEventListener('input', hitungEdit);
        document.getElementById('dibayar').addEventListener('input', hitungEdit);

        // auto hitung saat pertama load
        hitungEdit();
    </script>
@endsection
