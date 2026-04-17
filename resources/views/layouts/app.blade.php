<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/logosaja.png') }}" type="image/x-icon" />
    <title>Blank Page | PlainAdmin Demo</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/lineicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('adminassets/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/main.css') }}" />
    <style>
        /* tombol */
        .theme-toggle {
            background: #f1f1f1;
            border: none;
            border-radius: 50%;
            padding: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        /* icon */
        .theme-toggle svg {
            fill: #333;
        }

        /* hover */
        .theme-toggle:hover {
            transform: scale(1.1);
        }

        /* DARK MODE */
        body.dark-mode {
            background-color: #121212;
            color: #ffffff;
        }

        body.dark-mode .theme-toggle {
            background: #2a2a2a;
        }

        body.dark-mode .theme-toggle svg {
            fill: #ffffff;
        }

        /* TITLE */
        body.dark-mode .page-title,
        body.dark-mode h1,
        body.dark-mode .title {
            color: #ffffff !important;
        }

        /* BREADCRUMB */
        body.dark-mode .breadcrumb,
        body.dark-mode .breadcrumb a,
        body.dark-mode .breadcrumb span {
            color: #cccccc !important;
        }

        /* ACTIVE breadcrumb (yang terakhir) */
        body.dark-mode .breadcrumb .active {
            color: #ffffff !important;
        }

        /* fallback universal (aman) */
        body.dark-mode .page-header,
        body.dark-mode .header-title {
            color: #ffffff !important;
        }

        /* background header */
        body.dark-mode .page-header,
        body.dark-mode .header {
            background-color: #1e1e1e !important;
        }

        /* TITLE NORMAL */
        .main-title h2 {
            color: #000;
        }

        /* DARK MODE */
        body.dark-mode .main-title h2 {
            color: #ffffff;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: inherit;
            text-decoration: none;
        }

        .nav-link:hover {
            background-color: rgba(59, 130, 246, 0.1);
            /* biru muda, sesuaikan dengan tema */
        }

        .icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        /* Animasi Hover Icon */
        .icon-hover svg {
            transition: all 0.3s ease;
        }

        .icon-hover:hover svg {
            transform: scale(1.15) rotate(8deg);
            color: #3b82f6;
            /* warna biru saat hover */
        }
    </style>
</head>

<body>
    <!-- ======== Preloader =========== -->
    <div id="preloader">
        <div class="spinner"></div>
    </div>
    <!-- ======== Preloader =========== -->

    <!-- ======== sidebar-nav start =========== -->
    <aside class="sidebar-nav-wrapper">
        <div class="navbar-logo">
            <a href="index.html" style="display: flex; align-items: center; height: 60px;">
                <img src="{{ asset('admin/assets/images/logo/logosaja.png') }}" alt="logo"
                    style="width: 140px; height: auto; display: block;">
            </a>
        </div>
        <nav class="sidebar-nav">
            <ul>

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <span class="icon icon-hover">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.25">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1v-5m10-10l2 2m-2-2v10a1 1 0 01-1 1v-5m-6 0a1 1 0 001-1v5" />
                            </svg>
                        </span>
                        <span class="text">Dashboard</span>
                    </a>
                </li>

                <!-- Master Data -->
                <li class="nav-item nav-item-has-children">
                    <a href="#0" class="collapsed nav-link" data-bs-toggle="collapse"
                        data-bs-target="#ddmenu_master" aria-controls="ddmenu_master" aria-expanded="false">
                        <span class="icon icon-hover">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.25">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2" />
                            </svg>
                        </span>
                        <span class="text">Master Data</span>
                    </a>
                    <ul id="ddmenu_master" class="collapse dropdown-nav">
                        <li><a href="#">Kategori Buah</a></li>
                        <li><a href="#">Produk / Buah</a></li>
                        <li><a href="#">Supplier</a></li>
                        <li><a href="#">Pelanggan</a></li>
                        <li><a href="#">Pengguna & Karyawan</a></li>
                    </ul>
                </li>

                <!-- Pembelian -->
                <li class="nav-item nav-item-has-children">
                    <a href="#0" class="collapsed nav-link" data-bs-toggle="collapse"
                        data-bs-target="#ddmenu_pembelian" aria-controls="ddmenu_pembelian" aria-expanded="false">
                        <span class="icon icon-hover">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.25">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </span>
                        <span class="text">Pembelian</span>
                    </a>
                    <ul id="ddmenu_pembelian" class="collapse dropdown-nav">
                        <li><a href="#">Daftar Pembelian</a></li>
                        <li><a href="#">Tambah Pembelian Baru</a></li>
                        <li><a href="#">Laporan Pembelian</a></li>
                    </ul>
                </li>

                <!-- Penjualan -->
                <li class="nav-item nav-item-has-children">
                    <a href="#0" class="collapsed nav-link" data-bs-toggle="collapse"
                        data-bs-target="#ddmenu_penjualan" aria-controls="ddmenu_penjualan" aria-expanded="false">
                        <span class="icon icon-hover">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.25">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-1a2 2 0 01-2-2H9a2 2 0 01-2-2v-1a2 2 0 012-2m0 0V9a2 2 0 012-2" />
                            </svg>
                        </span>
                        <span class="text">Penjualan</span>
                    </a>
                    <ul id="ddmenu_penjualan" class="collapse dropdown-nav">
                        <li><a href="#">Daftar Penjualan</a></li>
                        <li><a href="#">Transaksi Baru (Kasir)</a></li>
                        <li><a href="#">Laporan Penjualan</a></li>
                    </ul>
                </li>

                <!-- Stok & Inventory -->
                <li class="nav-item nav-item-has-children">
                    <a href="#0" class="collapsed nav-link" data-bs-toggle="collapse"
                        data-bs-target="#ddmenu_stok" aria-controls="ddmenu_stok" aria-expanded="false">
                        <span class="icon icon-hover">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.25">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20 13V6a2 2 0 01-2-2H6a2 2 0 01-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-4a2 2 0 01-2-2v-1a2 2 0 012-2h4a2 2 0 012 2v1a2 2 0 01-2 2z" />
                            </svg>
                        </span>
                        <span class="text">Stok & Inventory</span>
                    </a>
                    <ul id="ddmenu_stok" class="collapse dropdown-nav">
                        <li><a href="#">Stok Saat Ini</a></li>
                        <li><a href="#">Penyesuaian Stok (Opname)</a></li>
                        <li><a href="#">Monitoring Expired</a></li>
                    </ul>
                </li>

                <!-- Laporan -->
                <li class="nav-item nav-item-has-children">
                    <a href="#0" class="collapsed nav-link" data-bs-toggle="collapse"
                        data-bs-target="#ddmenu_laporan" aria-controls="ddmenu_laporan" aria-expanded="false">
                        <span class="icon icon-hover">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.25">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2" />
                            </svg>
                        </span>
                        <span class="text">Laporan</span>
                    </a>
                    <ul id="ddmenu_laporan" class="collapse dropdown-nav">
                        <li><a href="#">Laporan Penjualan</a></li>
                        <li><a href="#">Laporan Pembelian</a></li>
                        <li><a href="#">Laporan Stok</a></li>
                        <li><a href="#">Laporan Keuangan</a></li>
                    </ul>
                </li>

                <span class="divider">
                    <hr />
                </span>

                <!-- Pengaturan -->
                <li class="nav-item nav-item-has-children">
                    <a href="#0" class="collapsed nav-link" data-bs-toggle="collapse"
                        data-bs-target="#ddmenu_pengaturan" aria-controls="ddmenu_pengaturan" aria-expanded="false">
                        <span class="icon icon-hover">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.25">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 002.573-1.066c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 00.817 1.194 1.724 1.724 0 01.817 1.194c-.94 1.543.827 3.31 2.37 2.37 1.756.426 1.756 2.924 0 3.35z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </span>
                        <span class="text">Pengaturan</span>
                    </a>
                    <ul id="ddmenu_pengaturan" class="collapse dropdown-nav">
                        <li><a href="#">Pengaturan Umum</a></li>
                        <li><a href="#">Profil Perusahaan</a></li>
                    </ul>
                </li>

            </ul>
        </nav>
        <div class="promo-box">
            <div class="promo-icon">
                <img class="mx-auto" src="{{ asset('admin/assets/images/logo/logo-icon-big.svg') }}" alt="Logo">
            </div>
            <h3>Total Buah</h3>
            <p>Total buah adalah jumlah keseluruhan buah yang dihitung atau dimiliki.</p>
            <a href="https://plainadmin.com/pro" target="_blank" rel="nofollow"
                class="main-btn primary-btn btn-hover">
                Total Buah
            </a>
        </div>
    </aside>
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
        <!-- ========== header start ========== -->
        <header class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-6">
                        <div class="header-left d-flex align-items-center">
                            <div class="menu-toggle-btn mr-15">
                                <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                                    <i class="lni lni-chevron-left me-2"></i> Menu
                                </button>
                            </div>
                            <div class="header-search d-none d-md-flex">
                                <form action="#">
                                    <input type="text" placeholder="Search..." />
                                    <button><i class="lni lni-search-alt"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-6">
                        <div class="header-right">
                            <div class="notification-box ml-15 d-none d-md-flex">
                                <button class="theme-toggle" onclick="toggleTheme()" id="themeToggle">

                                    <!-- ICON MOON -->
                                    <svg id="iconMoon" xmlns="http://www.w3.org/2000/svg" width="20"
                                        height="20" viewBox="0 0 24 24">
                                        <path
                                            d="M21 12.79A9 9 0 0111.21 3c0 .34.02.67.05 1A7 7 0 1019 19c.33.03.66.05 1 .05a9 9 0 011-6.26z" />
                                    </svg>

                                    <!-- ICON SUN -->
                                    <svg id="iconSun" xmlns="http://www.w3.org/2000/svg" width="20"
                                        height="20" viewBox="0 0 24 24" style="display: none;">
                                        <path
                                            d="M12 4.5V2M12 22v-2.5M4.5 12H2M22 12h-2.5M5.64 5.64L4.22 4.22M19.78 19.78l-1.42-1.42M5.64 18.36l-1.42 1.42M19.78 4.22l-1.42 1.42M12 7a5 5 0 100 10 5 5 0 000-10z" />
                                    </svg>

                                </button>
                            </div>
                            <!-- notification end -->
                            <!-- notification start -->
                            <div class="notification-box ml-15 d-none d-md-flex">
                                <button class="dropdown-toggle" type="button" id="notification"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11 20.1667C9.88317 20.1667 8.88718 19.63 8.23901 18.7917H13.761C13.113 19.63 12.1169 20.1667 11 20.1667Z"
                                            fill="" />
                                        <path
                                            d="M10.1157 2.74999C10.1157 2.24374 10.5117 1.83333 11 1.83333C11.4883 1.83333 11.8842 2.24374 11.8842 2.74999V2.82604C14.3932 3.26245 16.3051 5.52474 16.3051 8.24999V14.287C16.3051 14.5301 16.3982 14.7633 16.564 14.9352L18.2029 16.6342C18.4814 16.9229 18.2842 17.4167 17.8903 17.4167H4.10961C3.71574 17.4167 3.5185 16.9229 3.797 16.6342L5.43589 14.9352C5.6017 14.7633 5.69485 14.5301 5.69485 14.287V8.24999C5.69485 5.52474 7.60672 3.26245 10.1157 2.82604V2.74999Z"
                                            fill="" />
                                    </svg>
                                    <span></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notification">
                                    <li>
                                        <a href="#0">
                                            <div class="image">
                                                <img src="{{ asset('admin/assets/images/lead/lead-6.png') }}"
                                                    alt="" />
                                            </div>
                                            <div class="content">
                                                <h6>
                                                    John Doe
                                                    <span class="text-regular">
                                                        comment on a product.
                                                    </span>
                                                </h6>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consect etur adipiscing
                                                    elit Vivamus tortor.
                                                </p>
                                                <span>10 mins ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#0">
                                            <div class="image">
                                                <img src="{{ asset('admin/assets/images/lead/lead-1.png') }}"
                                                    alt="" />
                                            </div>
                                            <div class="content">
                                                <h6>
                                                    Jonathon
                                                    <span class="text-regular">
                                                        like on a product.
                                                    </span>
                                                </h6>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consect etur adipiscing
                                                    elit Vivamus tortor.
                                                </p>
                                                <span>10 mins ago</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- notification end -->
                            <!-- message start -->
                            <div class="header-message-box ml-15 d-none d-md-flex">
                                <button class="dropdown-toggle" type="button" id="message"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg width="10" height="10" viewBox="0 0 22 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.74866 5.97421C7.91444 5.96367 8.08162 5.95833 8.25005 5.95833C12.5532 5.95833 16.0417 9.4468 16.0417 13.75C16.0417 13.9184 16.0364 14.0856 16.0259 14.2514C16.3246 14.138 16.6127 14.003 16.8883 13.8482L19.2306 14.629C19.7858 14.8141 20.3141 14.2858 20.129 13.7306L19.3482 11.3882C19.8694 10.4604 20.1667 9.38996 20.1667 8.25C20.1667 4.70617 17.2939 1.83333 13.75 1.83333C11.0077 1.83333 8.66702 3.55376 7.74866 5.97421Z"
                                            fill="" />
                                        <path
                                            d="M14.6667 13.75C14.6667 17.2938 11.7939 20.1667 8.25004 20.1667C7.11011 20.1667 6.03962 19.8694 5.11182 19.3482L2.76946 20.129C2.21421 20.3141 1.68597 19.7858 1.87105 19.2306L2.65184 16.8882C2.13062 15.9604 1.83338 14.89 1.83338 13.75C1.83338 10.2062 4.70622 7.33333 8.25004 7.33333C11.7939 7.33333 14.6667 10.2062 14.6667 13.75ZM5.95838 13.75C5.95838 13.2437 5.54797 12.8333 5.04171 12.8333C4.53545 12.8333 4.12504 13.2437 4.12504 13.75C4.12504 14.2563 4.53545 14.6667 5.04171 14.6667C5.54797 14.6667 5.95838 14.2563 5.95838 13.75ZM9.16671 13.75C9.16671 13.2437 8.7563 12.8333 8.25004 12.8333C7.74379 12.8333 7.33338 13.2437 7.33338 13.75C7.33338 14.2563 7.74379 14.6667 8.25004 14.6667C8.7563 14.6667 9.16671 14.2563 9.16671 13.75ZM11.4584 14.6667C11.9647 14.6667 12.375 14.2563 12.375 13.75C12.375 13.2437 11.9647 12.8333 11.4584 12.8333C10.9521 12.8333 10.5417 13.2437 10.5417 13.75C10.5417 14.2563 10.9521 14.6667 11.4584 14.6667Z"
                                            fill="" />
                                    </svg>
                                    <span></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="message">
                                    <li>
                                        <a href="#0">
                                            <div class="image">
                                                <img src="{{ asset('admin/assets/images/lead/lead-5.png') }}"
                                                    alt="" />
                                            </div>
                                            <div class="content">
                                                <h6>Jacob Jones</h6>
                                                <p>Hey!I can across your profile and ...</p>
                                                <span>10 mins ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#0">
                                            <div class="image">
                                                <img src="{{ asset('admin/assets/images/lead/lead-3.png') }}"
                                                    alt="" />
                                            </div>
                                            <div class="content">
                                                <h6>John Doe</h6>
                                                <p>Would you mind please checking out</p>
                                                <span>12 mins ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#0">
                                            <div class="image">
                                                <img src="{{ asset('admin/assets/images/lead/lead-2.png') }}"
                                                    alt="" />
                                            </div>
                                            <div class="content">
                                                <h6>Anee Lee</h6>
                                                <p>Hey! are you available for freelance?</p>
                                                <span>1h ago</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- message end -->
                            <!-- Profile Box -->
                            <div class="profile-box ml-4 d-none d-md-flex">
                                <!-- Profile Button dengan Lingkaran Avatar yang Lebih Bagus -->
                                <button
                                    class="flex items-center gap-x-3 px-3 py-2 rounded-3xl hover:bg-white/10 active:bg-white/5 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-emerald-400/30 group"
                                    type="button" id="profileDropdown" data-bs-toggle="dropdown"
                                    aria-expanded="false">

                                    <!-- Icon User Lingkaran yang lebih clean -->
                                    <div
                                        class="w-10 h-10 flex items-center justify-center rounded-full bg-gradient-to-br from-emerald-400 to-teal-500 shadow-inner">
                                        <i class="fa-solid fa-user text-white text-2xl"></i>
                                    </div>

                                    <!-- Nama & Role -->
                                    <div class="hidden lg:block text-left">
                                        <p class="text-emerald-300 text-xs mt-0.5">
                                            {{ ucfirst(auth()->user()->role ?? 'admin') }}
                                        </p>
                                    </div>

                                    <i
                                        class="fa-solid fa-chevron-down text-emerald-400 text-xs ml-2 transition-transform duration-200 group-hover:rotate-180"></i>
                                </button>

                                <!-- Dropdown Menu - Versi lebih modern -->
                                <ul class="dropdown-menu dropdown-menu-end shadow-2xl border border-gray-100/80 bg-white rounded-3xl py-2 w-80 mt-2 overflow-hidden"
                                    aria-labelledby="profileDropdown">

                                    <!-- Header Dropdown dengan avatar besar -->
                                    <li class="px-6 py-5 border-b border-gray-100">
                                        <div class="flex flex-col items-center text-center">
                                            <div
                                                class="w-24 h-24 rounded-3xl overflow-hidden border-4 border-white shadow-xl mb-4 ring-1 ring-gray-100">
                                                <img src="{{ asset('admin/assets/images/profile/profile-image.png') }}"
                                                    alt="Profile" class="w-full h-full object-cover">
                                            </div>
                                            <h4 class="font-semibold text-2xl text-gray-800 tracking-tight">
                                                {{ auth()->user()->nama_lengkap ?? 'Administrator' }}
                                            </h4>
                                            <p class="text-gray-500 text-sm mt-1">
                                                {{ ucfirst(auth()->user()->role ?? 'Admin') }}
                                            </p>
                                        </div>
                                    </li>

                                    <!-- Menu Items -->
                                    <li class="py-1 px-2">
                                        <a href="#0"
                                            class="flex items-center gap-3.5 px-5 py-3.5 text-gray-700 hover:bg-gray-50 rounded-2xl transition-colors group">
                                            <i
                                                class="lni lni-user text-2xl w-7 text-gray-400 group-hover:text-emerald-500 transition-colors"></i>
                                            <span class="font-medium">Profil Saya</span>
                                        </a>
                                    </li>

                                    <li class="py-1 px-2">
                                        <a href="#0"
                                            class="flex items-center gap-3.5 px-5 py-3.5 text-gray-700 hover:bg-gray-50 rounded-2xl transition-colors group">
                                            <i
                                                class="lni lni-cog text-2xl w-7 text-gray-400 group-hover:text-emerald-500 transition-colors"></i>
                                            <span class="font-medium">Pengaturan</span>
                                        </a>
                                    </li>
                                    <!-- Logout - Benar & Aman -->
                                    <li class="py-1 px-2">
                                        <button onclick="logoutUser()"
                                            class="flex w-full items-center gap-3.5 px-5 py-3.5 text-red-600 hover:bg-red-50 rounded-2xl transition-colors group">
                                            <i
                                                class="lni lni-exit text-2xl w-7 text-red-400 group-hover:text-red-500 transition-colors"></i>
                                            <span class="font-medium">Keluar</span>
                                        </button>
                                    </li>

                            </div>
                        </div>
                    </div>
                </div>
        </header>
        <!-- ========== header end ========== -->

        <!-- ========== section start ========== -->
        <section class="section">
            <div class="container-fluid">
                <!-- ========== title-wrapper start ========== -->
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="main-title">
                                @yield('content')
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-md-6">
                            <div class="breadcrumb-wrapper">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="#0">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Page
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- ========== title-wrapper end ========== -->
            </div>
            <!-- end container -->
        </section>
        <!-- ========== section end ========== -->

        <!-- ========== footer start =========== -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 order-last order-md-first">
                        <div class="copyright text-center text-md-start">
                            <p class="text-sm">
                                © {{ date('Y') }}
                                <strong>{{ config('app.name', 'Sistem Manajemen Buah') }}</strong> •
                                All Rights Reserved.
                            </p>
                        </div>
                    </div>
                    <!-- end col-->
                    <div class="col-md-6">
                        <div class="terms d-flex justify-content-center justify-content-md-end">
                            <a href="#0" class="text-sm">Term & Conditions</a>
                            <a href="#0" class="text-sm ml-15">Privacy & Policy</a>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </footer>
        <!-- ========== footer end =========== -->
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dynamic-pie-chart.js') }}"></script>
    <script src="{{ asset('admin/assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/fullcalendar.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jvectormap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/world-merc.js') }}"></script>
    <script src="{{ asset('admin/assets/js/polyfill.js') }}"></script>
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
    <script>
        function toggleTheme() {
            const body = document.body;
            const moon = document.getElementById("iconMoon");
            const sun = document.getElementById("iconSun");

            body.classList.toggle("dark-mode");

            if (body.classList.contains("dark-mode")) {
                moon.style.display = "none";
                sun.style.display = "block";
                localStorage.setItem("theme", "dark");
            } else {
                moon.style.display = "block";
                sun.style.display = "none";
                localStorage.setItem("theme", "light");
            }
        }

        // load saat pertama buka
        window.onload = function() {
            const moon = document.getElementById("iconMoon");
            const sun = document.getElementById("iconSun");

            if (localStorage.getItem("theme") === "dark") {
                document.body.classList.add("dark-mode");
                moon.style.display = "none";
                sun.style.display = "block";
            }
        };
    </script>
    <script>
        function logoutUser() {
            if (!confirm('Apakah Anda yakin ingin keluar dari sistem?')) return;

            fetch("{{ route('logout') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                })
                .then(response => {
                    if (response.ok) {
                        window.location.href = "{{ route('welcome') }}";
                    } else {
                        alert('Gagal logout. Silakan coba lagi.');
                    }
                })
                .catch(() => alert('Terjadi kesalahan.'));
        }
    </script>

</body>

</html>
