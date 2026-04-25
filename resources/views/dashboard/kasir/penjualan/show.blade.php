@extends('layouts.app')

@section('content')
    <div class="container py-4">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between mb-3">
            <h3>🧾 Detail Penjualan</h3>

            <div>
                <button onclick="window.print()" class="btn btn-dark">
                    🖨 Print
                </button>

                <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">
                    ← Kembali
                </a>
            </div>
        </div>

        {{-- STRUK AREA --}}
        <div class="card shadow-sm border-0" id="printArea">
            <div class="card-body">

                <div class="text-center mb-3">
                    <h4 class="fw-bold">TOKO BUAH SEGAR</h4>
                    <small>Jl. Contoh No. 123</small>
                    <hr>
                </div>

                <table class="table table-sm">
                    <tr>
                        <td>No Invoice</td>
                        <td>: {{ $penjualan->no_invoice }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>: {{ $penjualan->tanggal_penjualan }}</td>
                    </tr>
                    <tr>
                        <td>Pelanggan</td>
                        <td>: {{ $penjualan->pelanggan->nama_pelanggan ?? 'Umum' }}</td>
                    </tr>
                    <tr>
                        <td>Kasir</td>
                        <td>: {{ $penjualan->user->name ?? '-' }}</td>
                    </tr>
                </table>

                <hr>

                <table class="table table-borderless">
                    <tr>
                        <td>Subtotal</td>
                        <td class="text-end">Rp {{ number_format($penjualan->subtotal) }}</td>
                    </tr>
                    <tr>
                        <td>Diskon</td>
                        <td class="text-end">Rp {{ number_format($penjualan->diskon) }}</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td class="text-end fw-bold">Rp {{ number_format($penjualan->total) }}</td>
                    </tr>
                    <tr>
                        <td>Dibayar</td>
                        <td class="text-end">Rp {{ number_format($penjualan->dibayar) }}</td>
                    </tr>
                    <tr>
                        <td>Kembalian</td>
                        <td class="text-end text-success fw-bold">
                            Rp {{ number_format($penjualan->dibayar - $penjualan->total) }}
                        </td>
                    </tr>
                </table>

                <hr>

                <div class="text-center">
                    <small>Metode: <b>{{ strtoupper($penjualan->metode_bayar) }}</b></small>
                    <br><br>
                    <small>Terima kasih telah berbelanja 🙏</small>
                </div>

            </div>
        </div>

    </div>
@endsection
<style>
    @media print {
        body * {
            visibility: hidden;
        }

        #printArea,
        #printArea * {
            visibility: visible;
        }

        #printArea {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }

        .btn {
            display: none !important;
        }
    }
</style>
