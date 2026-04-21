<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Total Buah Segar - Buah Segar Langsung dari Kebun</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap');

        body {
            font-family: 'Inter', system_ui, sans-serif;
        }

        .logo-font {
            font-family: 'Space Grotesk', sans-serif;
        }

        .hero-bg {
            background: linear-gradient(180deg, rgba(22, 57, 40, 0.92), rgba(15, 23, 42, 0.95)),
                url('{{ asset('landing-page/images/header.png') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .glass {
            background: rgba(255, 255, 255, 0.09);
            backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        .gradient-text {
            background: linear-gradient(90deg, #4ade80, #facc15, #f97316);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .main-device {
            animation: floatMain 7.5s ease-in-out infinite;
            filter: drop-shadow(0 50px 100px rgba(0, 0, 0, 0.7));
        }

        @keyframes floatMain {

            0%,
            100% {
                transform: perspective(2000px) rotateX(10deg) rotateY(-12deg) translateY(0px);
            }

            50% {
                transform: perspective(2000px) rotateX(10deg) rotateY(-12deg) translateY(-30px);
            }
        }

        /* Efek hover tombol lebih smooth */
        .interactive-btn {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>
</head>

<body class="hero-bg min-h-screen text-white overflow-x-hidden">

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-50 glass border-b border-white/10">
        <div class="max-w-screen-2xl mx-auto px-8 py-6 flex items-center justify-between">
            <!-- Logo -->
            <a href="#" onclick="playClickSound()" class="flex items-center gap-2 group">
                <div
                    class="w-9 h-9 bg-gradient-to-br from-lime-400 via-emerald-500 to-green-500 rounded-2xl flex items-center justify-center text-2xl shadow-lg shadow-emerald-500/40 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                    🍇
                </div>
                <div class="flex flex-col leading-none">
                    <span class="text-3xl font-semibold tracking-tighter text-white">Total <span
                            class="text-4xl font-bold tracking-[-2.5px] gradient-text">BuahSegar</span></span>
                </div>
            </a>

            <!-- Sound Control + Login -->
            <div class="flex items-center gap-3">
                <button id="soundBtn" onclick="toggleSound()"
                    class="px-5 py-3 text-sm font-semibold rounded-2xl border border-white/30 hover:border-white/60 hover:bg-white/10 transition-all duration-300 flex items-center gap-2">
                    <i class="fas fa-volume-up text-lg" id="soundIcon"></i>
                    <span id="soundText">Suara Aktif</span>
                </button>

                <button onclick="playClickSound(); window.location.href='{{ route('login') }}'"
                    class="px-8 py-3 text-sm font-semibold rounded-2xl border border-white/30 hover:border-white/60 hover:bg-white/10 transition-all duration-300">
                    Masuk
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="min-h-screen flex items-center pt-20">
        <div class="max-w-screen-2xl mx-auto px-8 grid lg:grid-cols-2 gap-16 items-center">

            <!-- Left Side -->
            <div class="space-y-10">
                <div
                    class="inline-flex items-center gap-3 bg-white/10 px-6 py-3 rounded-3xl border border-white/20 text-sm backdrop-blur-md">
                    <div class="w-2 h-2 bg-lime-400 rounded-full animate-pulse"></div>
                    <span class="font-medium">Fresh Every Day</span>
                </div>

                <h1 class="text-6xl lg:text-7xl font-semibold leading-none tracking-tighter">
                    Mau buah yang benar-benar segar?<br>
                    <span class="gradient-text">Kami antar langsung dari kebun</span>
                </h1>

                <p class="text-xl text-gray-200 max-w-lg">
                    Dipetik pagi ini, diantar sore ini. Kualitas premium yang bikin kamu
                    nggak mau beli buah di tempat lain lagi.
                </p>
                <div class="flex flex-wrap gap-4">
                    <!-- Tombol Pesan Sekarang dengan efek suara -->
                    <button onclick="playClickSound(); window.location.href='#'"
                        class="interactive-btn px-10 py-5 bg-gradient-to-r from-lime-400 via-yellow-400 to-orange-500 text-lg font-semibold rounded-3xl text-black shadow-xl hover:scale-105 active:scale-95">
                        Pesan Sekarang
                    </button>

                    <!-- Tombol Lihat Demo -->
                    <button onclick="playClickSound(); showVideoModal()"
                        class="interactive-btn px-10 py-5 border border-white/50 hover:border-white text-lg font-semibold rounded-3xl flex items-center gap-2 hover:scale-105 active:scale-95">
                        <i class="fas fa-play"></i>
                        Lihat Demo
                    </button>
                </div>
            </div>

            <!-- Right Side -->
            <div class="relative flex justify-center lg:justify-end">
                <div class="relative w-full max-w-lg lg:max-w-xl space-y-8">
                    <div class="relative group">
                        <img src="{{ asset('landing-page/images/RyDdF-removebg-preview.png') }}"
                            class="w-full max-w-[380px] mx-auto lg:mx-0 drop-shadow-2xl main-device rounded-3xl transition-all duration-500 group-hover:scale-105 group-hover:rotate-[1deg]"
                            alt="Total Buah Segar">

                        <!-- Badge dengan efek suara hover -->
                        <div class="absolute -top-4 -right-4 flex flex-col items-end gap-3">
                            <div onclick="playHoverSound()"
                                class="glass px-6 py-3 rounded-3xl text-base font-semibold shadow-2xl flex items-center gap-2.5
                                bg-gradient-to-r from-lime-400 to-green-500 text-white border border-white/30 cursor-pointer hover:scale-110 transition-all">
                                <span class="text-xl animate-pulse">🔥</span>
                                Promo 30%
                            </div>

                            <div onclick="playHoverSound()"
                                class="glass px-6 py-3 rounded-3xl text-sm font-semibold shadow-2xl flex items-center gap-2
                                bg-gradient-to-r from-amber-400 to-orange-500 text-white border border-white/30 cursor-pointer hover:scale-105 transition-all">
                                <span class="text-lg">💰</span>
                                Diskon Besar
                            </div>

                            <div onclick="playHoverSound()"
                                class="glass px-6 py-3 rounded-3xl text-sm font-semibold shadow-2xl flex items-center gap-2
                                bg-gradient-to-r from-red-500 to-rose-600 text-white border border-white/30 cursor-pointer hover:scale-105 transition-all">
                                <span class="relative flex h-3 w-3">
                                    <span
                                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-3 w-3 bg-white"></span>
                                </span>
                                Limited Time
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- GLOBAL PARTNER NETWORK -->
    <div class="relative">

        <!-- HEADER PREMIUM CENTERED -->
        <div class="text-center mb-12 space-y-4">

            <!-- BADGE -->
            <div
                class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full
        bg-white/70 backdrop-blur-md border border-gray-200
        shadow-sm text-xs text-gray-600 mx-auto">
                <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                Live • {{ $suppliers->count() }} Verified Partners
            </div>

            <!-- TITLE (PREMIUM COLOR GRADIENT) -->
            <h2
                class="text-4xl md:text-6xl font-semibold tracking-tight
    bg-linear-to-r bg-emerald-500 via-blue-400 to-white
    bg-clip-text text-transparent drop-shadow-sm">
                Partner Network
            </h2>

            <!-- DESCRIPTION (SOFT PREMIUM TEXT) -->
            <p class="from-lime-400 text-sm md:text-lg max-w-2xl mx-auto leading-relaxed">
                Kami menghadirkan jaringan supplier terpercaya yang menyalurkan produk segar premium langsung dari
                petani dan mitra terverifikasi untuk memastikan kualitas terbaik.
            </p>

        </div>

        <!-- CAROUSEL WRAPPER -->
        <div class="relative">

            <!-- TRACK -->
            <div id="supplierCarousel" class="flex gap-6 overflow-x-auto px-6 py-6 select-none">

                @foreach ($suppliers as $supplier)
                    <div
                        class="min-w-[260px] bg-white rounded-3xl border border-gray-100
                    shadow-sm hover:shadow-xl transition-all duration-500
                    hover:-translate-y-2 group">

                        <!-- IMAGE -->
                        <div class="relative flex justify-center pt-6">

                            <div class="relative">
                                <img src="{{ $supplier->foto
                                    ? asset('storage/' . $supplier->foto)
                                    : 'https://ui-avatars.com/api/?name=' . urlencode($supplier->nama_supplier ?? 'Supplier') }}"
                                    class="w-24 h-24 rounded-full object-cover ring-4 ring-white shadow-md group-hover:scale-105 transition">

                                <span
                                    class="absolute bottom-1 right-1 w-3 h-3 bg-green-500 rounded-full ring-2 ring-white animate-pulse"></span>
                            </div>

                        </div>

                        <!-- CONTENT -->
                        <div class="px-5 pb-6 text-center">

                            <h3 class="mt-4 font-semibold text-gray-900 text-base truncate">
                                {{ $supplier->nama_supplier ?? '-' }}
                            </h3>

                            <p class="text-gray-500 text-xs mt-1">
                                📍 {{ $supplier->kota ?? '-' }}
                            </p>

                            <p class="text-gray-400 text-[11px] mt-1 truncate">
                                {{ $supplier->email ?? '-' }}
                            </p>

                            <div class="mt-3">
                                <span
                                    class="text-[10px] px-3 py-1 rounded-full font-medium
                                {{ ($supplier->status ?? '') == 'aktif'
                                    ? 'bg-green-50 text-green-600 border border-green-100'
                                    : 'bg-red-50 text-red-500 border border-red-100' }}">
                                    {{ strtoupper($supplier->status ?? 'ACTIVE') }}
                                </span>
                            </div>

                            @if (!empty($supplier->id))
                                <a href="{{ route('suppliers.products', $supplier->id) }}"
                                    class="mt-4 inline-flex items-center justify-center w-full
                                bg-gray-900 hover:bg-black text-white font-medium
                                py-2.5 rounded-xl text-sm transition">
                                    View Products
                                </a>
                            @endif

                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Audio Elements -->
    <audio id="welcomeAudio" preload="auto">
        <source src="{{ asset('landing-page/audio/selamat-datang.mp3') }}" type="audio/mpeg">
    </audio>

    <audio id="clickAudio" preload="auto">
        <source src="{{ asset('landing-page/audio/click.mp3') }}" type="audio/mpeg">
    </audio>

    <audio id="hoverAudio" preload="auto">
        <source src="{{ asset('landing-page/audio/hover.mp3') }}" type="audio/mpeg">
    </audio>

    <script>
        // Audio Elements
        const welcomeAudio = document.getElementById('welcomeAudio');
        const clickAudio = document.getElementById('clickAudio');
        const hoverAudio = document.getElementById('hoverAudio');

        let soundEnabled = true;
        let welcomePlayed = false;
        let audioUnlocked = false;

        // === FUNGSI PLAY WELCOME (dijalankan setelah unlock) ===
        function playWelcomeSound() {
            if (welcomePlayed || !soundEnabled || !welcomeAudio || !audioUnlocked) return;

            welcomeAudio.volume = 0.65;
            const playPromise = welcomeAudio.play();

            if (playPromise !== undefined) {
                playPromise.then(() => {
                    welcomePlayed = true;
                    localStorage.setItem('welcomeSoundPlayed', 'true');
                }).catch(err => {
                    console.log("Welcome sound gagal diputar:", err);
                });
            }
        }

        // Click Sound
        function playClickSound() {
            if (!soundEnabled || !clickAudio) return;
            clickAudio.currentTime = 0;
            clickAudio.volume = 0.7;
            clickAudio.play().catch(() => {});
        }

        // Hover Sound
        function playHoverSound() {
            if (!soundEnabled || !hoverAudio || !audioUnlocked) return;
            hoverAudio.currentTime = 0;
            hoverAudio.volume = 0.4;
            hoverAudio.play().catch(() => {});
        }

        // Toggle Sound Button
        function toggleSound() {
            soundEnabled = !soundEnabled;

            const icon = document.getElementById('soundIcon');
            const text = document.getElementById('soundText');

            if (soundEnabled) {
                icon.classList.remove('fa-volume-mute');
                icon.classList.add('fa-volume-up');
                text.textContent = 'Suara Aktif';
            } else {
                icon.classList.remove('fa-volume-up');
                icon.classList.add('fa-volume-mute');
                text.textContent = 'Suara Mati';
            }
        }

        // Unlock Audio Context (paling penting!)
        function unlockAudio() {
            if (audioUnlocked) return;
            audioUnlocked = true;

            // Resume semua audio (penting untuk beberapa browser)
            [welcomeAudio, clickAudio, hoverAudio].forEach(audio => {
                if (audio) audio.volume = audio.volume || 1; // pastikan tidak NaN
            });

            // Mainkan welcome sound jika belum pernah diputar
            if (!welcomePlayed && soundEnabled) {
                setTimeout(() => {
                    playWelcomeSound();
                }, 300);
            }
        }

        // Event Listeners
        window.addEventListener('load', () => {
            // Cek apakah sudah pernah diputar hari ini
            if (localStorage.getItem('welcomeSoundPlayed') === 'true') {
                welcomePlayed = true;
            }

            // Inisialisasi icon toggle (pastikan benar dari awal)
            const icon = document.getElementById('soundIcon');
            if (icon) {
                icon.classList.add('fa-volume-up');
            }
        });

        // Unlock audio setelah user interaksi pertama kali (klik di mana saja)
        document.addEventListener('click', () => {
            unlockAudio();
        }, {
            once: true
        });

        // Tambahan unlock untuk touch device
        document.addEventListener('touchstart', () => {
            unlockAudio();
        }, {
            once: true
        });

        // Hover sound hanya ke elemen penting (lebih ringan)
        const hoverElements = document.querySelectorAll('button, a[href], .interactive-btn, [onclick*="playHoverSound"]');
        hoverElements.forEach(el => {
            el.addEventListener('mouseenter', () => {
                if (soundEnabled) playHoverSound();
            });
        });

        // Bonus: klik logo juga unlock audio
        document.querySelectorAll('a[href="#"]').forEach(link => {
            link.addEventListener('click', () => unlockAudio());
        });
    </script>
    <script>
        const slider = document.getElementById("supplierCarousel");

        // duplicate untuk seamless loop
        slider.innerHTML += slider.innerHTML;

        let speed = 0.5;
        let isPaused = false;

        // AUTO SCROLL LOOP
        function autoScroll() {
            if (!isPaused) {
                slider.scrollLeft += speed;

                if (slider.scrollLeft >= slider.scrollWidth / 2) {
                    slider.scrollLeft = 0;
                }
            }

            requestAnimationFrame(autoScroll);
        }

        autoScroll();

        // pause hover (premium UX)
        slider.addEventListener("mouseenter", () => isPaused = true);
        slider.addEventListener("mouseleave", () => isPaused = false);
    </script>
    <style>
        /* HIDE SCROLLBAR GLOBAL */
        #supplierCarousel {
            scrollbar-width: none;
            /* Firefox */
            -ms-overflow-style: none;
            /* IE/Edge */
        }

        #supplierCarousel::-webkit-scrollbar {
            display: none;
            /* Chrome/Safari */
        }

        /* smooth feel lebih premium */
        #supplierCarousel {
            scroll-behavior: smooth;
        }
    </style>
</body>

</html>
