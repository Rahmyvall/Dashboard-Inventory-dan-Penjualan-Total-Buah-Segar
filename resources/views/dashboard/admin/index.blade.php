@extends('layouts.app')

@section('title', 'Dashboard Administrator - Total Buah Segar')

@section('content')
    <div class="container-fluid px-3 px-md-4 px-xl-5 py-4 min-h-screen bg-gray-50 dark:bg-gray-950 transition-colors">

        <!-- ==================== HEADER ==================== -->
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div class="d-flex align-items-center gap-4">
                <div class="bg-gradient-to-br from-emerald-500 to-green-600 p-4 rounded-3xl text-white shadow-xl"
                    style="font-size: 2.2rem;">
                    🍓
                </div>
                <div>
                    <h1 class="mb-1 fw-bold text-3xl text-gray-800 dark:text-white">Dashboard Administrator</h1>
                    <p class="text-muted mb-0 dark:text-gray-400">Total Buah Segar • Selamat datang kembali, Admin! 👋</p>
                </div>
            </div>

            <div class="text-end">
                <div class="text-muted small dark:text-gray-400">{{ \Carbon\Carbon::now()->format('l, d F Y') }}</div>
                <div
                    class="badge bg-emerald-100 text-emerald-700 dark:bg-emerald-900 dark:text-emerald-300 px-3 py-1 rounded-pill">
                    Online</div>
            </div>
        </div>

        <!-- ==================== STATISTIK CARDS ==================== -->
        <div class="row g-4 mb-2">
            <!-- Card 1 -->
            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6">
                <div
                    class="card border-0 shadow-xl h-100 overflow-hidden hover:shadow-2xl transition-all duration-300 rounded-3xl bg-white dark:bg-gray-900">
                    <div class="card-body p-5">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <p class="text-muted small mb-2 dark:text-gray-400">Pesanan Baru</p>
                                <h3 class="fw-bold mb-1 text-4xl text-gray-800 dark:text-white">34,567</h3>
                                <p class="text-emerald-600 dark:text-emerald-400 small d-flex align-items-center gap-1">
                                    <i class="fas fa-arrow-trend-up"></i> +2.00%
                                    <span class="text-muted dark:text-gray-500">(30 hari)</span>
                                </p>
                            </div>
                            <div
                                class="p-4 rounded-2xl bg-emerald-100 dark:bg-emerald-950 text-emerald-600 dark:text-emerald-400 fs-1">
                                🛍️</div>
                        </div>
                    </div>
                    <div class="h-1.5 bg-gradient-to-r from-emerald-400 to-green-500"></div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6">
                <div
                    class="card border-0 shadow-xl h-100 overflow-hidden hover:shadow-2xl transition-all duration-300 rounded-3xl bg-white dark:bg-gray-900">
                    <div class="card-body p-5">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <p class="text-muted small mb-2 dark:text-gray-400">Total Pendapatan</p>
                                <h3 class="fw-bold mb-1 text-4xl text-emerald-600 dark:text-emerald-400">Rp 87,4jt</h3>
                                <p class="text-emerald-600 dark:text-emerald-400 small d-flex align-items-center gap-1">
                                    <i class="fas fa-arrow-trend-up"></i> +5.45%
                                    <span class="text-muted dark:text-gray-500">Bulan ini</span>
                                </p>
                            </div>
                            <div
                                class="p-4 rounded-2xl bg-emerald-100 dark:bg-emerald-950 text-emerald-600 dark:text-emerald-400 fs-1">
                                💰</div>
                        </div>
                    </div>
                    <div class="h-1.5 bg-gradient-to-r from-emerald-500 to-teal-500"></div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6">
                <div
                    class="card border-0 shadow-xl h-100 overflow-hidden hover:shadow-2xl transition-all duration-300 rounded-3xl bg-white dark:bg-gray-900">
                    <div class="card-body p-5">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <p class="text-muted small mb-2 dark:text-gray-400">Total Stok</p>
                                <h3 class="fw-bold mb-1 text-4xl text-gray-800 dark:text-white">1,284 kg</h3>
                                <p class="text-amber-600 dark:text-amber-400 small d-flex align-items-center gap-1">
                                    <i class="fas fa-arrow-trend-down"></i> -12 kg
                                    <span class="text-muted dark:text-gray-500">Hari ini</span>
                                </p>
                            </div>
                            <div
                                class="p-4 rounded-2xl bg-amber-100 dark:bg-amber-950 text-amber-600 dark:text-amber-400 fs-1">
                                📦</div>
                        </div>
                    </div>
                    <div class="h-1.5 bg-gradient-to-r from-amber-400 to-orange-500"></div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6">
                <div
                    class="card border-0 shadow-xl h-100 overflow-hidden hover:shadow-2xl transition-all duration-300 rounded-3xl bg-white dark:bg-gray-900">
                    <div class="card-body p-5">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <p class="text-muted small mb-2 dark:text-gray-400">Hampir Expired</p>
                                <h3 class="fw-bold mb-1 text-4xl text-red-600 dark:text-red-400">18</h3>
                                <p class="text-red-600 dark:text-red-400 small">Perlu perhatian segera!</p>
                            </div>
                            <div class="p-4 rounded-2xl bg-red-100 dark:bg-red-950 text-red-600 dark:text-red-400 fs-1">⏰
                            </div>
                        </div>
                    </div>
                    <div class="h-1.5 bg-gradient-to-r from-red-400 to-rose-500"></div>
                </div>
            </div>
        </div>

        <!-- ==================== 4 CHART SECTION ==================== -->
        <div class="row g-4 mb-5">

            <!-- Chart 1 -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-xl rounded-3xl overflow-hidden h-100 bg-white dark:bg-gray-900">
                    <div class="card-header bg-white dark:bg-gray-900 border-0 pt-4 pb-0 px-5">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="fw-semibold text-gray-700 dark:text-gray-200">Pendapatan Tahunan</h5>
                                <p class="text-emerald-600 dark:text-emerald-400 fw-bold fs-4 mb-0">Rp 245,479 jt</p>
                            </div>
                            <select
                                class="form-select w-auto rounded-2xl border-0 bg-gray-100 dark:bg-gray-800 dark:text-white">
                                <option>Yearly</option>
                            </select>
                        </div>
                    </div>
                    <div class="p-4 flex-grow-1">
                        <canvas id="Chart1" style="width: 100%; height: 360px;"></canvas>
                    </div>
                </div>
            </div>

            <!-- Chart 2 -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-xl rounded-3xl overflow-hidden h-100 bg-white dark:bg-gray-900">
                    <div class="card-header bg-white dark:bg-gray-900 border-0 pt-4 pb-0 px-5">
                        <h5 class="fw-semibold text-gray-700 dark:text-gray-200">Penjualan Bulanan</h5>
                    </div>
                    <div class="p-4 flex-grow-1">
                        <canvas id="Chart2" style="width: 100%; height: 360px;"></canvas>
                    </div>
                </div>
            </div>

            <!-- Chart 3 -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-lg rounded-4 h-100">

                    <!-- Header -->
                    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center px-4 py-3">
                        <div>
                            <h6 class="fw-semibold mb-1">Komposisi Kategori</h6>
                            <small class="text-muted">Distribusi berdasarkan data kategori</small>
                        </div>

                        <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">
                            📊 Chart
                        </span>
                    </div>

                    <!-- Body -->
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">

                        <!-- Chart -->
                        <div style="width: 100%; max-width: 320px;">
                            <canvas id="Chart3"></canvas>
                        </div>

                        <!-- Info kecil -->
                        <small class="text-muted mt-3">
                            Klik chart untuk melihat detail kategori
                        </small>

                    </div>

                </div>
            </div>

            <!-- Chart 4 -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-xl rounded-3xl overflow-hidden h-100 bg-white dark:bg-gray-900">

                    <div class="card-header bg-white dark:bg-gray-900 border-0 pt-4 pb-0 px-5">
                        <h5 class="fw-semibold text-gray-700 dark:text-gray-200">
                            📦 Trend Stok vs Minimal Stok
                        </h5>
                    </div>

                    <div class="p-4">
                        <canvas id="Chart4" style="width: 100%; height: 360px;"></canvas>
                    </div>

                </div>
            </div>

        </div>

        <!-- ==================== TABEL PESANAN TERBARU ==================== -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0  rounded-3xl overflow-hidden bg-white dark:bg-gray-900">
                    <div
                        class="card-header bg-white dark:bg-gray-900 border-0 pt-4 pb-3 px-5 d-flex justify-content-between align-items-center">
                        <h5 class="fw-semibold text-gray-700 dark:text-gray-200 mb-0">Pesanan Terbaru</h5>
                        <a href="#" class="text-emerald-600 dark:text-emerald-400 fw-medium small">Lihat Semua Pesanan
                            →</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0 align-middle">
                                <thead class="bg-gray-100 dark:bg-gray-800">
                                    <tr>
                                        <th class="ps-5 text-gray-600 dark:text-gray-300">ID Pesanan</th>
                                        <th class="text-gray-600 dark:text-gray-300">Produk</th>
                                        <th class="text-gray-600 dark:text-gray-300">Pelanggan</th>
                                        <th class="text-center text-gray-600 dark:text-gray-300">Jumlah</th>
                                        <th class="text-end text-gray-600 dark:text-gray-300">Total</th>
                                        <th class="text-center text-gray-600 dark:text-gray-300">Status</th>
                                        <th class="text-center text-gray-600 dark:text-gray-300">Tanggal</th>
                                        <th class="pe-5 text-end text-gray-600 dark:text-gray-300">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700 dark:text-gray-300">
                                    <!-- Isi tabel tetap sama, hanya warna teks yang disesuaikan -->
                                    <tr>
                                        <td class="ps-5 fw-medium">#TS-7842</td>
                                        <td>Strawberry Premium (2 kg)</td>
                                        <td>Budi Santoso</td>
                                        <td class="text-center">3</td>
                                        <td class="text-end fw-semibold">Rp 285,000</td>
                                        <td class="text-center"><span
                                                class="badge bg-success rounded-pill px-3 py-1">Selesai</span></td>
                                        <td class="text-center text-muted dark:text-gray-500">18 Apr 2026</td>
                                        <td class="pe-5 text-end">
                                            <button
                                                class="btn btn-sm btn-outline-secondary dark:border-gray-600 dark:text-gray-300">Detail</button>
                                        </td>
                                    </tr>
                                    <!-- Tambahkan 3 baris lainnya seperti sebelumnya (saya singkat di sini) -->
                                    <!-- ... (sama seperti kode sebelumnya) ... -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const isDark = document.documentElement.classList.contains('dark');

            // Chart 1
            new Chart(document.getElementById('Chart1'), {
                type: 'line',
                data: {
                    /* data sama */
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                        'Dec'
                    ],
                    datasets: [{
                        label: 'Pendapatan',
                        data: [620, 810, 760, 890, 950, 870, 910, 780, 930, 900, 980, 1150],
                        borderColor: '#10b981',
                        backgroundColor: isDark ? 'rgba(16, 185, 129, 0.15)' :
                            'rgba(16, 185, 129, 0.08)',
                        borderWidth: 5,
                        tension: 0.4,
                        pointRadius: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            grid: {
                                color: isDark ? 'rgba(255,255,255,0.08)' : 'rgba(0,0,0,0.06)',
                                display: true
                            }
                        },
                        x: {
                            grid: {
                                color: isDark ? 'rgba(255,255,255,0.08)' : 'rgba(0,0,0,0.06)'
                            }
                        }
                    }
                }
            });

            // Chart 4 - Bar
            new Chart(document.getElementById('Chart4'), {
                type: 'line',
                data: {
                    labels: chartLabelsProduk.length ? chartLabelsProduk : ['Tidak Ada Data'],

                    datasets: [{
                            label: 'Stok Produk',
                            data: chartStokProduk.length ? chartStokProduk : [0],
                            borderColor: '#10b981',
                            borderWidth: 4,
                            tension: 0.3
                        },
                        {
                            label: 'Stok Minimal',
                            data: chartStokProduk.map(() => 10), // fallback sederhana
                            borderColor: '#ef4444',
                            borderWidth: 4,
                            tension: 0.3
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,

                    plugins: {
                        legend: {
                            position: 'top',
                            align: 'end',
                            labels: {
                                color: isDark ? '#e5e7eb' : '#374151'
                            }
                        }
                    },

                    scales: {
                        y: {
                            grid: {
                                color: isDark ? 'rgba(255,255,255,0.08)' : 'rgba(0,0,0,0.06)'
                            }
                        },
                        x: {
                            grid: {
                                color: isDark ? 'rgba(255,255,255,0.08)' : 'rgba(0,0,0,0.06)'
                            }
                        }
                    }
                }
            });

        });
    </script>
    <script>
        const chartLabelsProduk = @json($labelsProduk ?? []);
        const chartStokProduk = @json($stokProduk ?? []);
    </script>
@endpush
