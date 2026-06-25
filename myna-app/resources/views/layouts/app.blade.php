<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', __('Myna Aviation')) — Myna Aviation</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --myna-blue: #1277BD;
            --myna-dark: #1a2332;
            --myna-light-gray: #f5f7fa;
            --myna-border: #e8ecf0;
            --myna-red: #d50032;
            --myna-text-muted: #8a94a6;
            --myna-gold: #c8a84e;
        }

        body {
            font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, sans-serif;
            color: var(--myna-dark);
            background: #fff;
        }

        ::selection { background: var(--myna-blue); color: #fff; }

        a { color: var(--myna-blue); transition: color .15s; }
        a:hover { color: var(--myna-dark); }

        /* Brand Bar */
        .brand-bar {
            width: 100%;
            height: 3px;
            background: linear-gradient(to right, var(--myna-red) 0%, var(--myna-red) 50%, var(--myna-blue) 50%, var(--myna-blue) 100%);
        }

        /* Navbar */
        .navbar-myna {
            background: #fff;
            border-bottom: 1px solid var(--myna-border);
            padding: .6rem 0;
        }
        .navbar-myna .navbar-brand {
            color: var(--myna-dark);
            font-weight: 700;
            font-size: 1.15rem;
            display: flex;
            align-items: center;
            gap: .6rem;
        }
        .navbar-myna .navbar-brand img {
            height: 36px;
            width: auto;
        }
        .navbar-myna .navbar-brand span.accent {
            color: var(--myna-blue);
        }
        .navbar-myna .nav-link {
            color: var(--myna-dark) !important;
            font-size: .8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .04em;
            padding: .5rem .85rem !important;
            border-bottom: 2px solid transparent;
            transition: all .15s ease;
        }
        .navbar-myna .nav-link:hover {
            border-bottom-color: var(--myna-blue);
        }
        .navbar-myna .nav-link.active {
            border-bottom: 3px solid var(--myna-dark);
        }

        /* Lang Switcher */
        .lang-switch {
            display: inline-flex;
            gap: 2px;
            background: var(--myna-light-gray);
            border-radius: 4px;
            padding: 2px;
        }
        .lang-switch a {
            padding: .2rem .55rem;
            font-size: .72rem;
            font-weight: 600;
            text-transform: uppercase;
            text-decoration: none;
            border-radius: 3px;
            color: var(--myna-text-muted);
            transition: all .15s;
        }
        .lang-switch a.active,
        .lang-switch a:hover {
            background: var(--myna-blue);
            color: #fff;
        }

        .user-badge-myna {
            background: var(--myna-light-gray);
            border: 1px solid var(--myna-border);
            border-radius: 4px;
            padding: .2rem .6rem;
            font-size: .75rem;
            color: var(--myna-dark);
            display: inline-flex;
            align-items: center;
            gap: .4rem;
        }
        .user-badge-myna .role-tag {
            background: var(--myna-blue);
            color: #fff;
            border-radius: 3px;
            padding: 1px 6px;
            font-size: .65rem;
            font-weight: 700;
        }

        /* Buttons */
        .btn-myna {
            display: inline-block;
            padding: .5rem 1.2rem;
            border: 2px solid var(--myna-blue);
            font-size: .78rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .1em;
            transition: all .1s ease-in-out;
            text-decoration: none;
            cursor: pointer;
            line-height: 1.4;
        }
        .btn-myna-primary {
            background: var(--myna-dark);
            color: var(--myna-blue);
            border-color: var(--myna-blue);
        }
        .btn-myna-primary:hover {
            background: var(--myna-blue);
            color: #fff;
        }
        .btn-myna-light {
            background: transparent;
            color: var(--myna-blue);
            border-color: var(--myna-blue);
        }
        .btn-myna-light:hover {
            background: var(--myna-blue);
            color: #fff;
        }
        .btn-myna-danger {
            background: transparent;
            color: #dc3545;
            border-color: #dc3545;
        }
        .btn-myna-danger:hover {
            background: #dc3545;
            color: #fff;
        }
        .btn-myna-sm {
            padding: .25rem .7rem;
            font-size: .68rem;
        }

        /* Cards */
        .card-myna {
            border: none;
            box-shadow: 0 1px 4px rgba(26,35,50,.08);
        }
        .card-myna .card-header {
            background: #fff;
            border-bottom: 1px solid var(--myna-border);
            padding: .85rem 1.25rem;
        }
        .card-myna .card-header h5 {
            font-weight: 700;
            font-size: .85rem;
            text-transform: uppercase;
            letter-spacing: .05em;
            color: var(--myna-dark);
            margin: 0;
        }

        .section-card-myna {
            border: 1px solid var(--myna-border);
        }
        .section-card-myna .card-header {
            background: var(--myna-light-gray);
            border-bottom: 1px solid var(--myna-border);
            padding: .5rem .85rem;
        }
        .section-card-myna .card-header span {
            font-size: .72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .04em;
            color: var(--myna-dark);
        }

        /* Tables */
        .table-myna thead {
            background: var(--myna-dark);
            color: #fff;
            font-size: .72rem;
            text-transform: uppercase;
            letter-spacing: .04em;
        }
        .table-myna thead th {
            border-bottom: none;
            font-weight: 700;
            padding: .5rem .6rem;
        }
        .table-myna tbody tr:hover { background: #f0f4f8; }
        .table-myna td, .table-myna th { vertical-align: middle; }

        /* Form labels */
        .form-label {
            font-weight: 600;
            color: var(--myna-dark);
            font-size: .78rem;
            margin-bottom: .25rem;
        }

        /* Nav tabs */
        .nav-tabs .nav-link {
            color: #6c757d;
            background: transparent;
            border: none;
            border-bottom: 2px solid transparent;
            font-size: .78rem;
            font-weight: 600;
            padding: .5rem .85rem;
        }
        .nav-tabs .nav-link.active {
            color: var(--myna-dark) !important;
            background: transparent !important;
            border-bottom: 3px solid var(--myna-dark) !important;
        }

        /* Alerts */
        .alert { border-left: 3px solid; }
        .alert-success { border-left-color: #198754; }
        .alert-danger  { border-left-color: #dc3545; }
        .alert-warning { border-left-color: #ffc107; }
        .alert-info    { border-left-color: var(--myna-blue); }

        /* Footer */
        .footer-myna {
            background: var(--myna-dark);
            color: rgba(255,255,255,.7);
            padding: 3rem 0 0;
            margin-top: 4rem;
        }
        .footer-myna .footer-block span {
            font-size: .75rem;
            font-weight: 700;
            text-transform: uppercase;
            color: #fff;
            display: block;
            margin-bottom: .6rem;
        }
        .footer-myna .footer-block ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .footer-myna .footer-block ul li { margin-bottom: .4rem; }
        .footer-myna .footer-block ul li a {
            font-size: .78rem;
            color: rgba(255,255,255,.55);
            text-decoration: none;
        }
        .footer-myna .footer-block ul li a:hover { color: var(--myna-blue); }
        .footer-myna .copyright-bar {
            background: rgba(0,0,0,.2);
            padding: 1.2em 0;
            margin-top: 2.5rem;
        }
        .footer-myna .copyright-bar p {
            font-size: .75rem;
            color: rgba(255,255,255,.5);
            margin: 0;
        }

        /* Pagination */
        .pagination .page-link {
            color: var(--myna-dark);
            border-color: var(--myna-border);
            font-size: .78rem;
        }
        .pagination .page-item.active .page-link {
            background: var(--myna-dark);
            border-color: var(--myna-dark);
        }
    </style>
    @stack('styles')
</head>
<body>

    {{-- Brand Bar --}}
    <div class="brand-bar"></div>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-myna">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/myna_logo.jpg') }}" alt="Myna Aviation">
                Myna <span class="accent">Aviation</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navMain">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') || request()->routeIs('welcome') ? 'active' : '' }}"
                           href="{{ route('home') }}">{{ __('Home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#about">{{ __('About') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#services">{{ __('Services') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#contact">{{ __('Contact') }}</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-2">
                    {{-- Language Switcher --}}
                    <div class="lang-switch me-2">
                        <a href="{{ route('language.switch', 'en') }}"
                           class="{{ app()->getLocale() === 'en' ? 'active' : '' }}">EN</a>
                        <a href="{{ route('language.switch', 'th') }}"
                           class="{{ app()->getLocale() === 'th' ? 'active' : '' }}">TH</a>
                    </div>

                    @auth
                        <div class="user-badge-myna d-none d-md-inline-flex">
                            <i class="bi bi-person-circle"></i>
                            <span>{{ Auth::user()->nama }}</span>
                            <span class="role-tag">{{ Auth::user()->role === 'admin' ? 'Admin' : 'Member' }}</span>
                        </div>
                        @if(Auth::user()->role === 'admin')
                        <a href="{{ route('settings') }}" class="btn-myna btn-myna-sm btn-myna-light">
                            <i class="bi bi-gear"></i>
                        </a>
                        @endif
                        <a href="{{ route('user.setting') }}" class="btn-myna btn-myna-sm btn-myna-light">
                            <i class="bi bi-person-gear"></i>
                        </a>
                        <form method="POST" action="{{ route('auth.logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="btn-myna btn-myna-sm btn-myna-danger">
                                <i class="bi bi-box-arrow-right"></i>
                            </button>
                        </form>
                    @else
                        <a href="{{ route('auth.login.show') }}" class="btn-myna btn-myna-sm btn-myna-primary">{{ __('Login') }}</a>
                        <a href="{{ route('auth.register.show') }}" class="btn-myna btn-myna-sm btn-myna-light">{{ __('Register') }}</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    {{-- Main --}}
    <main>
        @if(session('success'))
            <div class="container mt-3">
                <div class="alert alert-success alert-dismissible fade show mb-3">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif
        @if(session('error'))
            <div class="container mt-3">
                <div class="alert alert-danger alert-dismissible fade show mb-3">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="footer-myna">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-3 footer-block mb-3">
                    <span>{{ __('Quick Links') }}</span>
                    <ul>
                        <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                        <li><a href="{{ route('home') }}#about">{{ __('About Us') }}</a></li>
                        <li><a href="{{ route('home') }}#services">{{ __('Our Services') }}</a></li>
                        <li><a href="{{ route('home') }}#contact">{{ __('Contact') }}</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 footer-block mb-3">
                    <span>{{ __('Account') }}</span>
                    <ul>
                        @auth
                        <li><a href="{{ route('user.setting') }}">{{ __('My Account') }}</a></li>
                        @else
                        <li><a href="{{ route('auth.login.show') }}">{{ __('Login') }}</a></li>
                        <li><a href="{{ route('auth.register.show') }}">{{ __('Register') }}</a></li>
                        @endauth
                    </ul>
                </div>
                <div class="col-6 col-md-3 footer-block mb-3">
                    <span>{{ __('Language') }}</span>
                    <ul>
                        <li><a href="{{ route('language.switch', 'en') }}">{{ __('English') }}</a></li>
                        <li><a href="{{ route('language.switch', 'th') }}">{{ __('Thai') }}</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 footer-block mb-3">
                    <span>{{ __('Follow Us') }}</span>
                    <ul>
                        <li><a href="#" target="_blank">Facebook</a></li>
                        <li><a href="#" target="_blank">Instagram</a></li>
                        <li><a href="#" target="_blank">LinkedIn</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright-bar">
            <div class="container d-flex justify-content-between align-items-center flex-wrap">
                <p>&copy; {{ date('Y') }} Myna Aviation Co., Ltd. — {{ __('All rights reserved') }}</p>
                <p>
                    <a href="#" class="text-white-50 text-decoration-none small me-3">{{ __('Privacy Policy') }}</a>
                    <a href="#" class="text-white-50 text-decoration-none small">{{ __('Terms of Service') }}</a>
                </p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    @stack('scripts')
</body>
</html>
