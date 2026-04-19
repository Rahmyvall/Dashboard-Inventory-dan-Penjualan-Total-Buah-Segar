<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/logo/logo.png') }}" type="image/x-icon" />
    <title>Sign In | Total Buah Segar</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

        body {
            font-family: 'Inter', system_ui, sans-serif;
        }

        .glass {
            background: rgba(255, 255, 255, 0.10);
            backdrop-filter: blur(28px);
            -webkit-backdrop-filter: blur(28px);
            border: 1px solid rgba(255, 255, 255, 0.25);
        }

        .hero-bg {
            background-image: linear-gradient(rgba(0, 0, 0, 0.35), rgba(0, 0, 0, 0.45)),
                url('https://picsum.photos/id/292/2000/1200');
            background-size: cover;
            background-position: center;
        }

        .fade-in-up {
            animation: fadeInUp 0.9s cubic-bezier(0.25, 0.1, 0.25, 1) forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo-float {
            animation: float 4s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-15px);
            }
        }

        .input-focus {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .input-focus:focus {
            box-shadow: 0 0 0 5px rgba(16, 185, 129, 0.4);
            border-color: rgb(16 185 129);
            transform: scale(1.03);
        }

        .btn-fruit {
            transition: all 0.35s cubic-bezier(0.4, 0.0, 0.2, 1);
        }

        .btn-fruit:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px -8px rgb(16 185 129 / 0.5);
        }
    </style>
</head>

<body class="min-h-screen bg-zinc-950 text-white overflow-hidden">

    <div class="flex min-h-screen">

        <!-- KIRI: Hero Image -->
        <div class="hidden lg:flex lg:w-1/2 hero-bg relative items-center justify-center">
            <div class="absolute inset-0 bg-gradient-to-r from-emerald-900/60 to-transparent"></div>
            <div class="relative z-10 text-center px-12 max-w-md">
                <div class="inline-flex items-center gap-3 bg-white/10 backdrop-blur-md px-6 py-3 rounded-3xl mb-8">
                    <span class="text-4xl">🍓</span>
                    <span class="text-4xl">🥭</span>
                    <span class="text-4xl">🍊</span>
                </div>
                <h2 class="text-5xl font-bold leading-tight">Buah Segar<br>Setiap Hari</h2>
                <p class="mt-6 text-emerald-100 text-xl">
                    Kualitas terbaik dari petani lokal<br>langsung ke tangan konsumen
                </p>
            </div>
        </div>

        <!-- KANAN: Form Login -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 md:p-12 bg-zinc-950">
            <div class="w-full max-w-md">

                <div class="glass rounded-3xl shadow-2xl p-10 md:p-12 fade-in-up">

                    <!-- Logo -->
                    <div class="text-center mb-10">
                        <div
                            class="mx-auto w-24 h-24 bg-white/15 backdrop-blur-xl rounded-3xl flex items-center justify-center mb-6 shadow-inner logo-float">
                            <span class="text-6xl">🍓</span>
                        </div>
                        <h1 class="text-4xl font-bold tracking-tighter">Total Buah Segar</h1>
                        <p class="text-emerald-300 mt-2 text-lg">Admin Dashboard</p>
                    </div>

                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div
                            class="bg-red-500/10 border border-red-500/30 text-red-400 px-4 py-3 rounded-2xl mb-6 text-sm">
                            <ul class="space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li class="flex items-center gap-2">
                                        <i class="fa-solid fa-circle-exclamation"></i>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Success Message (contoh) -->
                    @if (session('success'))
                        <div
                            class="bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 px-4 py-3 rounded-2xl mb-6 text-sm flex items-center gap-2">
                            <i class="fa-solid fa-check-circle"></i>
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('login.post') }}" method="POST" class="space-y-7">
                        @csrf

                        <!-- ERROR MESSAGE -->
                        @if ($errors->any())
                            <div class="bg-red-500/20 text-red-300 p-3 rounded-lg text-sm">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <!-- Username -->
                        <div>
                            <label class="block text-sm font-medium text-emerald-100 mb-2">Username</label>
                            <div class="relative">
                                <div class="absolute left-5 top-1/2 -translate-y-1/2 text-emerald-400">
                                    <i class="fa-solid fa-user"></i>
                                </div>

                                <input type="text" name="username" value="{{ old('username') }}"
                                    placeholder="Masukkan username"
                                    class="w-full bg-white/10 border border-white/30 rounded-2xl py-4 pl-12 pr-5 text-white placeholder:text-emerald-200 focus:outline-none"
                                    required autofocus />
                            </div>
                        </div>

                        <!-- Password -->
                        <div>
                            <label class="block text-sm font-medium text-emerald-100 mb-2">Password</label>
                            <div class="relative">
                                <div class="absolute left-5 top-1/2 -translate-y-1/2 text-emerald-400">
                                    <i class="fa-solid fa-lock"></i>
                                </div>

                                <input type="password" id="password" name="password" placeholder="••••••••"
                                    class="w-full bg-white/10 border border-white/30 rounded-2xl py-4 pl-12 pr-12 text-white placeholder:text-emerald-200 focus:outline-none"
                                    required />

                                <button type="button" id="togglePassword"
                                    class="absolute right-5 top-1/2 -translate-y-1/2 text-emerald-400 hover:text-white transition-colors">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Tombol Login -->
                        <button type="submit"
                            class="w-full bg-emerald-500 hover:bg-emerald-600 py-4 rounded-2xl text-lg font-semibold shadow-xl mt-6 transition-all duration-300">
                            Masuk ke Dashboard
                        </button>
                    </form>
                    <!-- Divider -->
                    <div class="my-10 relative fade-in-up" style="animation-delay: 650ms">
                        <div class="border-t border-white/20"></div>
                        <div
                            class="absolute -top-3 left-1/2 -translate-x-1/2 bg-zinc-950 px-6 text-xs text-emerald-300">
                            atau masuk dengan
                        </div>
                    </div>

                    <!-- Social Login -->
                    <div class="grid grid-cols-2 gap-4 fade-in-up" style="animation-delay: 800ms">
                        <button
                            class="glass hover:bg-white/15 py-4 rounded-2xl flex items-center justify-center gap-3 border border-white/20 transition-all">
                            <i class="fa-brands fa-google text-red-400"></i>
                            <span class="font-medium">Google</span>
                        </button>
                        <button
                            class="glass hover:bg-white/15 py-4 rounded-2xl flex items-center justify-center gap-3 border border-white/20 transition-all">
                            <i class="fa-brands fa-apple"></i>
                            <span class="font-medium">Apple</span>
                        </button>
                    </div>

                    <p class="text-center text-emerald-200 text-sm mt-10 fade-in-up" style="animation-delay: 950ms">
                        Belum punya akses?
                        <a href="#" class="font-semibold text-white hover:text-emerald-300">Hubungi Super
                            Admin</a>
                    </p>
                </div>

                <p class="text-center text-zinc-500 text-xs mt-8">
                    © 2026 Total Buah Segar • Semua hak dilindungi
                </p>
            </div>
        </div>
    </div>


</body>

</html>
