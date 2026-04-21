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

             <!-- ==================== SEMUA ROLE ==================== -->
             <!-- Dashboard -->
             <li class="nav-item">
                 <a href="{{ route('dashboard') }}" class="nav-link active">
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

             {{-- ==================== ADMIN ONLY ==================== --}}
             @if (auth()->user()->role == 'admin')
                 <!-- Master Data -->
                 <li class="nav-item nav-item-has-children">
                     <a href="#0" class="collapsed nav-link" data-bs-toggle="collapse"
                         data-bs-target="#ddmenu_master">
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
                         <li>
                             <a href="{{ route('kategori.index') }}">
                                 <i class="fas fa-tags"></i> Kategori Buah
                             </a>
                         </li>
                         <li>
                             <a href="{{ route('produk.index') }}">
                                 <i class="fas fa-apple-alt"></i> Produk / Buah
                             </a>
                         </li>
                         <li>
                             <a href="#">
                                 <i class="fas fa-truck"></i> Supplier
                             </a>
                         </li>
                         <li>
                             <a href="#">
                                 <i class="fas fa-users"></i> Pelanggan
                             </a>
                         </li>
                         <li>
                             <a href="{{ route('users.index') }}">
                                 <i class="fas fa-user-cog"></i> Pengguna & Karyawan
                             </a>
                         </li>
                     </ul>
                 </li>

                 <!-- Laporan -->
                 <li class="nav-item nav-item-has-children">
                     <a href="#0" class="collapsed nav-link" data-bs-toggle="collapse"
                         data-bs-target="#ddmenu_laporan">
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

                 <!-- Pengaturan -->
                 <li class="nav-item nav-item-has-children">
                     <a href="#0" class="collapsed nav-link" data-bs-toggle="collapse"
                         data-bs-target="#ddmenu_pengaturan">
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
             @endif

             {{-- ==================== GUDANG ONLY ==================== --}}
             @if (auth()->user()->role == 'gudang')
                 <!-- Pembelian -->
                 <li class="nav-item nav-item-has-children">
                     <a href="#0" class="collapsed nav-link" data-bs-toggle="collapse"
                         data-bs-target="#ddmenu_pembelian">
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
                     </ul>
                 </li>

                 <!-- Stok & Inventory -->
                 <li class="nav-item nav-item-has-children">
                     <a href="#0" class="collapsed nav-link" data-bs-toggle="collapse"
                         data-bs-target="#ddmenu_stok">
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
             @endif

             {{-- ==================== KASIR ONLY ==================== --}}
             @if (auth()->user()->role == 'kasir')
                 <!-- Penjualan -->
                 <li class="nav-item nav-item-has-children">
                     <a href="#0" class="collapsed nav-link" data-bs-toggle="collapse"
                         data-bs-target="#ddmenu_penjualan">
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
                         <li><a href="#">Transaksi Baru (Kasir)</a></li>
                         <li><a href="#">Daftar Penjualan Hari Ini</a></li>
                     </ul>
                 </li>
             @endif

             {{-- ==================== MANAGER ONLY ==================== --}}
             @if (auth()->user()->role == 'manager')
                 <!-- Laporan -->
                 <li class="nav-item nav-item-has-children">
                     <a href="#0" class="collapsed nav-link" data-bs-toggle="collapse"
                         data-bs-target="#ddmenu_laporan">
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

                 <!-- Master Data Terbatas -->
                 <li class="nav-item nav-item-has-children">
                     <a href="#0" class="collapsed nav-link" data-bs-toggle="collapse"
                         data-bs-target="#ddmenu_master">
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
                         <li><a href="#">Produk / Buah</a></li>
                         <li><a href="#">Supplier</a></li>
                         <li><a href="#">Pelanggan</a></li>
                     </ul>
                 </li>
             @endif

             <span class="divider">
                 <hr />
             </span>

         </ul>
     </nav>
     <div class="promo-box">
         <div class="promo-icon">
             <img class="mx-auto" src="{{ asset('admin/assets/images/logo/logo-icon-big.svg') }}" alt="Logo">
         </div>
         <h3>Total Buah</h3>
         <p>Total buah adalah jumlah keseluruhan buah yang dihitung atau dimiliki.</p>
         <a href="https://plainadmin.com/pro" target="_blank" rel="nofollow" class="main-btn primary-btn btn-hover">
             Total Buah
         </a>
     </div>
 </aside>
 <div class="overlay"></div>
 <!-- ======== sidebar-nav end =========== -->
