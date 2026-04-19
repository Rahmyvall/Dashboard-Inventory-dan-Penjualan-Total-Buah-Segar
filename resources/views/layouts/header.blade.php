<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/logosaja.png') }}" type="image/x-icon" />
    <title>@yield('title', 'Total Buah Segar')</title>
    <!-- CSS Bootstrap + Custom -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    @stack('styles')
    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/lineicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('adminassets/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/main.css') }}" />
    <style>
        /* ==================== TOGGLE THEME ==================== */
        .theme-toggle {
            background: #f1f1f1;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .theme-toggle:hover {
            transform: scale(1.1);
            background: #e0e0e0;
        }

        .theme-toggle svg {
            fill: #333;
            width: 20px;
            height: 20px;
        }

        /* ==================== DARK MODE ==================== */
        body.dark-mode {
            background-color: #121212;
            color: #e0e0e0;
        }

        body.dark-mode .theme-toggle {
            background: #2a2a2a;
        }

        body.dark-mode .theme-toggle:hover {
            background: #3a3a3a;
        }

        body.dark-mode .theme-toggle svg {
            fill: #ffffff;
        }

        /* ==================== TYPOGRAPHY & TITLES ==================== */
        body.dark-mode h1,
        body.dark-mode h2,
        body.dark-mode .page-title,
        body.dark-mode .main-title h2,
        body.dark-mode .header-title {
            color: #ffffff !important;
        }

        /* Breadcrumb */
        body.dark-mode .breadcrumb,
        body.dark-mode .breadcrumb a {
            color: #aaaaaa !important;
        }

        body.dark-mode .breadcrumb .active {
            color: #ffffff !important;
        }

        /* Header Background */
        body.dark-mode .page-header,
        body.dark-mode .header,
        body.dark-mode .card-header {
            background-color: #1e1e1e !important;
        }

        /* ==================== SIDEBAR & NAVIGATION ==================== */
        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: inherit;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background-color: rgba(59, 130, 246, 0.1);
            color: #3b82f6;
        }

        /* Icon Hover Effect */
        .icon-hover svg {
            transition: all 0.3s ease;
        }

        .icon-hover:hover svg {
            transform: scale(1.15) rotate(8deg);
            color: #3b82f6;
        }

        /* ==================== CARDS ==================== */
        .small-box {
            height: 100%;
            transition: transform 0.2s ease;
        }

        .small-box:hover {
            transform: translateY(-3px);
        }

        /* ==================== RESPONSIVE IMPROVEMENT ==================== */
        @media (max-width: 768px) {
            .nav-link {
                padding: 10px 14px;
                gap: 10px;
            }

            .theme-toggle {
                width: 36px;
                height: 36px;
            }
        }

        /* Optional: Smooth transition untuk seluruh halaman */
        * {
            transition: background-color 0.3s ease, color 0.3s ease;
        }
    </style>
</head>
