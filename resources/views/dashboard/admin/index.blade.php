@extends('layouts.app')

@section('title', 'Dashboard Administrator - Total Buah Segar')

@section('content')
    <!-- ========== section start ========== -->
    <section class="section">
        <div class="container-fluid">
            <div class="title-wrapper pt-30">
                <!-- ========== title-wrapper end ========== -->
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon purple">
                                <i class="lni lni-cart-full"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">New Orders</h6>
                                <h3 class="text-bold mb-10">34567</h3>
                                <p class="text-sm text-success">
                                    <i class="lni lni-arrow-up"></i> +2.00%
                                    <span class="text-gray">(30 days)</span>
                                </p>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>
                    <!-- End Col -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon success">
                                <i class="lni lni-dollar"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">Total Income</h6>
                                <h3 class="text-bold mb-10">$74,567</h3>
                                <p class="text-sm text-success">
                                    <i class="lni lni-arrow-up"></i> +5.45%
                                    <span class="text-gray">Increased</span>
                                </p>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>
                    <!-- End Col -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon primary">
                                <i class="lni lni-credit-cards"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">Total Expense</h6>
                                <h3 class="text-bold mb-10">$24,567</h3>
                                <p class="text-sm text-danger">
                                    <i class="lni lni-arrow-down"></i> -2.00%
                                    <span class="text-gray">Expense</span>
                                </p>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>
                    <!-- End Col -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon orange">
                                <i class="lni lni-user"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">New User</h6>
                                <h3 class="text-bold mb-10">34567</h3>
                                <p class="text-sm text-danger">
                                    <i class="lni lni-arrow-down"></i> -25.00%
                                    <span class="text-gray"> Earning</span>
                                </p>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
                <div class="row g-4">

                    <!-- CHART 1 -->
                    <div class="col-lg-7">
                        <div class="card-style mb-30"
                            style="border-radius:15px; box-shadow:0 4px 20px rgba(0,0,0,0.05); padding:20px;">

                            <!-- HEADER -->
                            <div class="d-flex justify-content-between align-items-center mb-20">
                                <div>
                                    <h6 style="color:#888;">Total Nilai Produk</h6>

                                    <h2 style="font-weight:700;">
                                        Rp {{ number_format(array_sum($totals ?? []), 0, ',', '.') }}
                                    </h2>
                                </div>

                                <select id="filterChart" class="form-select form-select-sm" style="width:auto;">
                                    <option value="year">Yearly</option>
                                    <option value="month">Monthly</option>
                                    <option value="week">Weekly</option>
                                </select>
                            </div>

                            <!-- CHART -->
                            <div style="height:350px;">
                                <canvas id="Chart1"></canvas>
                            </div>

                        </div>
                    </div>

                    <!-- CHART 2 -->
                    <div class="col-lg-5">
                        <div class="card-style mb-30"
                            style="border-radius:15px; box-shadow:0 4px 20px rgba(0,0,0,0.05); padding:20px;">

                            <!-- HEADER -->
                            <div class="d-flex justify-content-between align-items-center mb-20">
                                <div>
                                    <h6 style="font-weight:600;">Pelanggan Analytics</h6>
                                    <small class="text-muted">Distribusi pelanggan berdasarkan tipe</small>
                                </div>
                            </div>

                            <!-- SUMMARY -->
                            <div class="row mb-3 text-center">

                                <div class="col-4">
                                    <div class="fw-bold text-success">
                                        {{ \App\Models\Pelanggan::where('tipe_pelanggan', 'retail')->count() }}
                                    </div>
                                    <small class="text-muted">Retail</small>
                                </div>

                                <div class="col-4">
                                    <div class="fw-bold text-warning">
                                        {{ \App\Models\Pelanggan::where('tipe_pelanggan', 'grosir')->count() }}
                                    </div>
                                    <small class="text-muted">Grosir</small>
                                </div>

                                <div class="col-4">
                                    <div class="fw-bold text-primary">
                                        {{ \App\Models\Pelanggan::where('tipe_pelanggan', 'corporate')->count() }}
                                    </div>
                                    <small class="text-muted">Corporate</small>
                                </div>

                            </div>

                            <!-- CHART -->
                            <div style="height:320px;">
                                <canvas id="Chart2"></canvas>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="card-style calendar-card mb-30">
                                <div id="calendar-mini"></div>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-lg-7">
                            <div class="card-style mb-30">
                                <div class="title d-flex flex-wrap align-items-center justify-content-between">
                                    <div class="left">
                                        <h6 class="text-medium mb-30">Sales History</h6>
                                    </div>
                                    <div class="right">
                                        <div class="select-style-1">
                                            <div class="select-position select-sm">
                                                <select class="light-bg">
                                                    <option value="">Today</option>
                                                    <option value="">Yesterday</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end select -->
                                    </div>
                                </div>
                                <!-- End Title -->
                                <div class="table-responsive">
                                    <table class="table top-selling-table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <h6 class="text-sm text-medium">Products</h6>
                                                </th>
                                                <th class="min-width">
                                                    <h6 class="text-sm text-medium">
                                                        Category <i class="lni lni-arrows-vertical"></i>
                                                    </h6>
                                                </th>
                                                <th class="min-width">
                                                    <h6 class="text-sm text-medium">
                                                        Revenue <i class="lni lni-arrows-vertical"></i>
                                                    </h6>
                                                </th>
                                                <th class="min-width">
                                                    <h6 class="text-sm text-medium">
                                                        Status <i class="lni lni-arrows-vertical"></i>
                                                    </h6>
                                                </th>
                                                <th>
                                                    <h6 class="text-sm text-medium text-end">
                                                        Actions <i class="lni lni-arrows-vertical"></i>
                                                    </h6>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="product">
                                                        <div class="image">
                                                            <img src="assets/images/products/product-mini-1.jpg"
                                                                alt="" />
                                                        </div>
                                                        <p class="text-sm">Bedroom</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-sm">Interior</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm">$345</p>
                                                </td>
                                                <td>
                                                    <span class="status-btn close-btn">Pending</span>
                                                </td>
                                                <td>
                                                    <div class="action justify-content-end">
                                                        <button class="edit">
                                                            <i class="lni lni-pencil"></i>
                                                        </button>
                                                        <button class="more-btn ml-10 dropdown-toggle" id="moreAction1"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="lni lni-more-alt"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            aria-labelledby="moreAction1">
                                                            <li class="dropdown-item">
                                                                <a href="#0" class="text-gray">Remove</a>
                                                            </li>
                                                            <li class="dropdown-item">
                                                                <a href="#0" class="text-gray">Edit</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="product">
                                                        <div class="image">
                                                            <img src="assets/images/products/product-mini-2.jpg"
                                                                alt="" />
                                                        </div>
                                                        <p class="text-sm">Arm Chair</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-sm">Interior</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm">$345</p>
                                                </td>
                                                <td>
                                                    <span class="status-btn warning-btn">Refund</span>
                                                </td>
                                                <td>
                                                    <div class="action justify-content-end">
                                                        <button class="edit">
                                                            <i class="lni lni-pencil"></i>
                                                        </button>
                                                        <button class="more-btn ml-10 dropdown-toggle" id="moreAction1"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="lni lni-more-alt"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            aria-labelledby="moreAction1">
                                                            <li class="dropdown-item">
                                                                <a href="#0" class="text-gray">Remove</a>
                                                            </li>
                                                            <li class="dropdown-item">
                                                                <a href="#0" class="text-gray">Edit</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="product">
                                                        <div class="image">
                                                            <img src="assets/images/products/product-mini-3.jpg"
                                                                alt="" />
                                                        </div>
                                                        <p class="text-sm">Sofa</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-sm">Interior</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm">$345</p>
                                                </td>
                                                <td>
                                                    <span class="status-btn success-btn">Completed</span>
                                                </td>
                                                <td>
                                                    <div class="action justify-content-end">
                                                        <button class="edit">
                                                            <i class="lni lni-pencil"></i>
                                                        </button>
                                                        <button class="more-btn ml-10 dropdown-toggle" id="moreAction1"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="lni lni-more-alt"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            aria-labelledby="moreAction1">
                                                            <li class="dropdown-item">
                                                                <a href="#0" class="text-gray">Remove</a>
                                                            </li>
                                                            <li class="dropdown-item">
                                                                <a href="#0" class="text-gray">Edit</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="product">
                                                        <div class="image">
                                                            <img src="assets/images/products/product-mini-4.jpg"
                                                                alt="" />
                                                        </div>
                                                        <p class="text-sm">Kitchen</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-sm">Interior</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm">$345</p>
                                                </td>
                                                <td>
                                                    <span class="status-btn close-btn">Canceled</span>
                                                </td>
                                                <td>
                                                    <div class="action justify-content-end">
                                                        <button class="edit">
                                                            <i class="lni lni-pencil"></i>
                                                        </button>
                                                        <button class="more-btn ml-10 dropdown-toggle" id="moreAction1"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="lni lni-more-alt"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            aria-labelledby="moreAction1">
                                                            <li class="dropdown-item">
                                                                <a href="#0" class="text-gray">Remove</a>
                                                            </li>
                                                            <li class="dropdown-item">
                                                                <a href="#0" class="text-gray">Edit</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- End Table -->
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>

                </div>
            </div>
            <!-- end container -->
    </section>
    <!-- ========== section end ========== -->
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            let chart;

            function renderChart(labels, data) {
                const ctx = document.getElementById('Chart1').getContext('2d');

                if (chart) {
                    chart.destroy();
                }

                chart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Total Nilai Produk',
                            data: data,
                            tension: 0.4,
                            fill: true
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });
            }

            // 🔥 LOAD DATA AWAL DARI CONTROLLER
            renderChart(
                @json($labels ?? []),
                @json($totals ?? [])
            );

            // 🔥 FILTER DROPDOWN
            document.getElementById('filterChart').addEventListener('change', function() {
                let type = this.value;

                fetch(`/chart-produk?type=${type}`)
                    .then(res => res.json())
                    .then(res => {
                        renderChart(res.labels, res.data);
                    });
            });

        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const ctx = document.getElementById('Chart2');

            const chart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Retail', 'Grosir', 'Corporate'],
                    datasets: [{
                        data: [
                            {{ \App\Models\Pelanggan::where('tipe_pelanggan', 'retail')->count() }},
                            {{ \App\Models\Pelanggan::where('tipe_pelanggan', 'grosir')->count() }},
                            {{ \App\Models\Pelanggan::where('tipe_pelanggan', 'corporate')->count() }}
                        ],
                        backgroundColor: [
                            '#22c55e',
                            '#f59e0b',
                            '#3b82f6'
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });

        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const calendarEl = document.getElementById("calendar-mini");

            if (!calendarEl) {
                console.error("Calendar tidak ditemukan!");
                return;
            }

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                height: 350,

                headerToolbar: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'today'
                },

                events: [{
                        title: 'Panen Buah',
                        start: '2026-04-10'
                    },
                    {
                        title: 'Pengiriman',
                        start: '2026-04-15'
                    }
                ]
            });

            calendar.render();

        });
    </script>
    <script>
        $(document).ready(function() {

            $('#salesTable').DataTable({
                responsive: true,
                pageLength: 5,

                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                    paginate: {
                        next: "Next",
                        previous: "Prev"
                    }
                }
            });

        });
    </script>
@endpush
