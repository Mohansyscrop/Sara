<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') | Sara's Boutique Management Suite</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Fonts Matching Website -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;600;700&family=Cinzel:wght@500;600;700&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>

    <style>
        :root {
            /* Website Theme Tokens */
            --primary-purple: #3B005A;
            --dark-purple: #240038;
            --plum-dark: #190123;
            --gold: #D4AF37;
            --gold-light: #FFF1C5;
            --gold-dark: #B8860B;
            --gold-hover: #f3d79b;
            --gold-accent: #9c731a;
            --bg-ivory: #fcfaf7;
            --bg-white: #ffffff;
            --cream: #F5E6C8;
            --admin-bg: #fcfaf7;
            --admin-surface: #ffffff;
            --admin-border: #ede4d5;
            --admin-border-gold: rgba(212, 175, 55, 0.35);
            --text-main: #1f2937;
            --text-muted: #6b7280;
            --text-heading: #240038;

            --heading-font: "Playfair Display", Georgia, serif;
            --brand-font: "Cinzel", serif;
            --body-font: "Poppins", sans-serif;
            --sans-font: "Plus Jakarta Sans", sans-serif;
            --script-font: "Caveat", cursive;
        }

        body {
            background-color: var(--admin-bg);
            color: var(--text-main);
            font-family: var(--body-font);
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            font-size: 0.92rem;
        }

        /* ── Theme Matching Scrollbar ── */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #faf6ef;
        }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #f5d77f 0%, #d4af37 50%, #b8860b 100%);
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #fff3cd 0%, #f5d77f 50%, #d4af37 100%);
        }

        h1, h2, h3, h4, .font-serif, .page-title {
            font-family: var(--heading-font);
            color: var(--text-heading);
        }

        .brand-font {
            font-family: var(--brand-font);
        }

        /* ── Sidebar Styling: Website Royal Header Theme ── */
        .admin-sidebar {
            width: 275px;
            background: linear-gradient(180deg, #1b002c 0%, #240038 50%, #150022 100%);
            border-right: 1px solid rgba(212, 175, 55, 0.3);
            min-height: 100vh;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 1040;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow-y: auto;
            box-shadow: 4px 0 25px rgba(27, 0, 44, 0.35);
        }

        .admin-sidebar::-webkit-scrollbar {
            width: 5px;
        }
        .admin-sidebar::-webkit-scrollbar-track {
            background: #170024;
        }
        .admin-sidebar::-webkit-scrollbar-thumb {
            background: rgba(212, 175, 55, 0.5);
            border-radius: 10px;
        }

        .admin-sidebar-header {
            background: linear-gradient(90deg, #150022 0%, #240038 100%);
            border-bottom: 1px solid rgba(212, 175, 55, 0.3);
            padding: 1.35rem 1.25rem;
        }

        .admin-nav-link {
            color: rgba(245, 235, 252, 0.82);
            padding: 0.72rem 1rem;
            border-radius: 10px;
            font-size: 0.885rem;
            font-weight: 500;
            font-family: var(--body-font);
            display: flex;
            align-items: center;
            transition: all 0.25s ease;
            text-decoration: none;
            margin: 2px 0;
        }

        .admin-nav-link i {
            font-size: 1.05rem;
            color: #d4af37;
            transition: transform 0.2s ease, color 0.2s ease;
        }

        .admin-nav-link:hover {
            color: #ffffff;
            background: rgba(212, 175, 55, 0.15);
            transform: translateX(4px);
        }

        .admin-nav-link:hover i {
            color: #fff1c5;
            transform: scale(1.15);
        }

        .admin-nav-link.active {
            color: #1b002c !important;
            background: linear-gradient(135deg, #f5d77f 0%, #d4af37 50%, #b8860b 100%) !important;
            font-weight: 700;
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.4);
        }

        .admin-nav-link.active i {
            color: #1b002c !important;
        }

        /* Main Content wrapper */
        .admin-main-wrapper {
            margin-left: 275px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: var(--admin-bg);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .admin-navbar {
            background: #ffffff;
            border-bottom: 2px solid rgba(212, 175, 55, 0.2);
            box-shadow: 0 4px 15px rgba(36, 0, 56, 0.03);
        }

        .admin-content {
            flex: 1;
            padding: 2rem 2.25rem;
        }

        /* Custom Cards */
        .card-custom {
            background: var(--admin-surface);
            border: 1px solid var(--admin-border);
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(36, 0, 56, 0.04);
            transition: all 0.25s ease;
        }

        .card-header-custom {
            background: #faf6ef;
            border-bottom: 1px solid var(--admin-border);
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            padding: 1.15rem 1.5rem;
        }

        /* Stat Widget */
        .stat-widget {
            background: #ffffff;
            border: 1px solid var(--admin-border);
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 4px 16px rgba(36, 0, 56, 0.04);
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .stat-widget::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, var(--gold), var(--primary-purple));
            opacity: 0;
            transition: opacity 0.25s ease;
        }

        .stat-widget:hover {
            transform: translateY(-4px);
            border-color: rgba(212, 175, 55, 0.5);
            box-shadow: 0 10px 25px rgba(212, 175, 55, 0.15);
        }

        .stat-widget:hover::before {
            opacity: 1;
        }

        .stat-widget h3 {
            font-family: var(--heading-font);
            font-weight: 700;
            color: var(--primary-purple);
        }

        .stat-icon-box {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
        }

        /* Form Controls */
        .form-control, .form-select {
            background-color: #ffffff;
            border: 1px solid #d9cebe;
            color: var(--text-main);
            border-radius: 10px;
            padding: 0.68rem 1rem;
            font-family: var(--body-font);
            font-size: 0.9rem;
            transition: all 0.2s ease;
        }

        .form-control:focus, .form-select:focus {
            background-color: #ffffff;
            border-color: var(--gold);
            color: #111827;
            box-shadow: 0 0 0 0.25rem rgba(212, 175, 55, 0.22);
        }

        .form-label {
            color: #374151;
            font-weight: 600;
            font-size: 0.875rem;
            margin-bottom: 0.45rem;
            font-family: var(--body-font);
        }

        /* Tables */
        .table-custom {
            color: var(--text-main);
            margin-bottom: 0;
            font-family: var(--body-font);
        }

        .table-custom th {
            background: #faf5eb;
            color: #8c6209;
            font-family: var(--heading-font);
            font-size: 0.82rem;
            letter-spacing: 0.75px;
            font-weight: 700;
            text-transform: uppercase;
            border-bottom: 2px solid rgba(212, 175, 55, 0.25);
            padding: 1.1rem 1.25rem;
        }

        .table-custom td {
            background: #ffffff;
            border-bottom: 1px solid #f0e7d8;
            padding: 1rem 1.25rem;
            vertical-align: middle;
            color: #374151;
        }

        .table-custom tr:hover td {
            background: #fdfbf7;
        }

        /* Luxury Buttons */
        .btn-gold {
            background: linear-gradient(135deg, #d4af37 0%, #b8860b 100%);
            color: #ffffff;
            font-family: var(--body-font);
            font-weight: 600;
            border: none;
            padding: 0.65rem 1.35rem;
            border-radius: 10px;
            letter-spacing: 0.3px;
            transition: all 0.25s ease;
            box-shadow: 0 4px 12px rgba(212, 175, 55, 0.25);
        }

        .btn-gold:hover {
            background: linear-gradient(135deg, #e6c35c 0%, #c5961a 100%);
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(212, 175, 55, 0.35);
        }

        .btn-royal {
            background: linear-gradient(135deg, #3B005A 0%, #240038 100%);
            color: #ffffff;
            font-family: var(--body-font);
            font-weight: 600;
            border: none;
            padding: 0.65rem 1.35rem;
            border-radius: 10px;
            transition: all 0.25s ease;
            box-shadow: 0 4px 12px rgba(36, 0, 56, 0.2);
        }

        .btn-royal:hover {
            background: linear-gradient(135deg, #4d0275 0%, #30004a 100%);
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(36, 0, 56, 0.3);
        }

        .btn-outline-gold {
            border: 1px solid #d4af37;
            color: #9c731a;
            background: #fffdf8;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .btn-outline-gold:hover {
            background: #d4af37;
            color: #ffffff;
            border-color: #d4af37;
        }

        /* Pagination custom */
        .pagination .page-link {
            background-color: #ffffff;
            border-color: var(--admin-border);
            color: #374151;
            border-radius: 8px;
            margin: 0 2px;
        }

        .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, #d4af37 0%, #b8860b 100%);
            border-color: #b8860b;
            color: #ffffff;
            font-weight: bold;
        }

        /* Responsive Sidebar */
        @media (max-width: 991.98px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }
            .admin-sidebar.show {
                transform: translateX(0);
            }
            .admin-main-wrapper {
                margin-left: 0;
            }
            .sidebar-backdrop {
                position: fixed;
                inset: 0;
                background: rgba(36, 0, 56, 0.5);
                backdrop-filter: blur(3px);
                z-index: 1035;
                display: none;
            }
            .sidebar-backdrop.show {
                display: block;
            }
        }
    </style>
    @stack('styles')
    @yield('styles')
</head>
<body>

    @include('components.admin.sidebar')
    
    <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

    <div class="admin-main-wrapper">
        @include('components.admin.navbar')

        <main class="admin-content">
            @hasSection('breadcrumbs')
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb mb-0 py-2 px-3 rounded shadow-sm" style="background: #ffffff; border: 1px solid var(--admin-border);">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none" style="color: #c5a059; font-weight: 500;"><i class="bi bi-house-door-fill me-1"></i> Dashboard</a></li>
                        @yield('breadcrumbs')
                    </ol>
                </nav>
            @endif

            @include('components.admin.alerts')
            @yield('content')
        </main>

        <footer class="admin-footer p-3 border-top text-center text-muted small" style="background: #ffffff; border-color: var(--admin-border) !important;">
            &copy; {{ date('Y') }} Sara's Boutique Management Suite • Connected to database <code style="color: #b58d43; background: #faf5eb; padding: 2px 6px; border-radius: 4px;">sara</code>
        </footer>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Sidebar responsive toggle
        const sidebar = document.getElementById('adminSidebar');
        const toggleBtn = document.getElementById('sidebarToggleBtn');
        const closeBtn = document.getElementById('sidebarCloseBtn');
        const backdrop = document.getElementById('sidebarBackdrop');

        function toggleSidebar() {
            if (sidebar && backdrop) {
                sidebar.classList.toggle('show');
                backdrop.classList.toggle('show');
            }
        }

        if (toggleBtn) toggleBtn.addEventListener('click', toggleSidebar);
        if (closeBtn) closeBtn.addEventListener('click', toggleSidebar);
        if (backdrop) backdrop.addEventListener('click', toggleSidebar);
    </script>

    @stack('scripts')
    @yield('scripts')
</body>
</html>
