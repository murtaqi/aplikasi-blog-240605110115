<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Blog')</title>
    <!-- Google Fonts: Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
            /*padding-bottom: 80px; /* Space for the fixed footer */
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: #2e7d32 !important;
            letter-spacing: -0.025em;
        }
        .nav-link {
            font-weight: 500;
            color: #64748b !important;
            transition: color 0.2s ease;
        }
        .nav-link:hover, .nav-link.active {
            color: #2e7d32 !important;
        }
        .btn-cms {
            background-color: #2e7d32;
            color: white !important;
            border-radius: 8px;
            font-weight: 600;
            padding: 8px 16px;
            transition: all 0.2s ease;
            box-shadow: 0 4px 6px -1px rgba(46, 125, 50, 0.2);
        }
        .btn-cms:hover {
            background-color: #1b5e20;
            transform: translateY(-1px);
            box-shadow: 0 10px 15px -3px rgba(46, 125, 50, 0.3);
        }
        .footer {
            background-color: #ffffff;
            border-top: 1px solid #e2e8f0;
            padding: 24px 0;
            margin-top: 48px;
            font-size: 0.9rem;
            color: #64748b;
        }
        /* Card enhancements */
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }
        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
        }
        .text-primary-custom {
            color: #2e7d32;
        }
    </style>
</head>
<body>
    <!-- Navigation Header -->
    <header class="py-3 shadow-sm" style="background-color: #2C3E50; color: #ffffff;">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center text-center text-md-start">
            <div class="mb-2 mb-md-0">
                <a href="{{ route('home') }}" class="text-decoration-none text-white">
                    <h3 class="fw-bold mb-0" style="letter-spacing: -0.025em;">Blog Kami</h3>
                </a>
                <p class="mb-0 small text-white-50" style="font-size: 0.8rem;">Artikel terbaru seputar teknologi dan pemrograman</p>
            </div>
            <nav>
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link text-white px-3 fw-medium active">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link text-white-50 px-3 fw-medium">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link text-white-50 px-3 fw-medium">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link text-white-50 px-3 fw-medium">Tentang</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <div class="py-4 py-md-5">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="py-4 text-center text-white-50 mt-0" style="background-color: #2C3E50; font-size: 0.9rem; width: 100%; border-top: 1px solid rgba(255,255,255,0.1);">
        <div class="container">
            <p class="mb-0">© 2026 <a href="{{ route('login') }}" class="text-white-50 text-decoration-none">Blog Kami</a>. Seluruh hak cipta dilindungi.</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
