<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Login') }} — Myna Aviation</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root { --myna-blue:#1277BD; --myna-dark:#1a2332; --myna-gold:#c8a84e; }
        * { box-sizing:border-box; }
        body {
            min-height:100vh; background:var(--myna-dark);
            display:flex; align-items:center; justify-content:center;
            font-family:'Inter','Segoe UI',system-ui,-apple-system,sans-serif;
            margin:0; position:relative;
        }
        body::before {
            content:''; position:fixed; inset:0;
            background: radial-gradient(ellipse 70% 50% at 50% 30%, rgba(18,119,189,.1) 0%, transparent 70%);
            pointer-events:none;
        }
        .brand-bar {
            position:fixed; top:0; left:0; right:0; height:3px;
            background: linear-gradient(to right, #d50032 0%, #d50032 50%, #1277BD 50%, #1277BD 100%);
            z-index:100;
        }
        .auth-card {
            width:100%; max-width:420px;
            background:#fff; box-shadow:0 8px 32px rgba(0,0,0,.3);
            position:relative; z-index:1;
        }
        .auth-header { padding:2rem 2rem 1rem; text-align:center; }
        .auth-header .logo-icon {
            width:72px; height:72px; background:#fff; border-radius:50%;
            display:inline-flex; align-items:center; justify-content:center;
            overflow:hidden; padding:3px; box-shadow:0 2px 12px rgba(0,0,0,.15);
            margin-bottom:.6rem;
        }
        .auth-header .logo-icon img { width:100%; height:100%; object-fit:contain; border-radius:50%; }
        .auth-header h4 { font-weight:700; color:var(--myna-dark); margin:0; font-size:1.15rem; }
        .auth-header p { color:#888; font-size:.82rem; margin:0; }
        .form-label { font-weight:600; font-size:.8rem; color:var(--myna-dark); margin-bottom:.25rem; }
        .btn-myna {
            display:inline-block; padding:.6rem 1rem;
            border:2px solid var(--myna-blue); font-size:.78rem; font-weight:600;
            text-transform:uppercase; letter-spacing:.1em; transition:all .1s ease-in-out;
            text-decoration:none; cursor:pointer;
        }
        .btn-myna-primary { background:var(--myna-dark); color:var(--myna-blue); border-color:var(--myna-blue); width:100%; }
        .btn-myna-primary:hover { background:var(--myna-blue); color:#fff; }
        .lang-switch { position:fixed; top:12px; right:16px; z-index:101; display:flex; gap:2px; }
        .lang-switch a {
            padding:3px 10px; font-size:.72rem; font-weight:600; text-transform:uppercase;
            text-decoration:none; border-radius:3px; color:rgba(255,255,255,.5); transition:all .15s;
        }
        .lang-switch a.active, .lang-switch a:hover { background:rgba(255,255,255,.1); color:#fff; }
    </style>
</head>
<body>
<div class="brand-bar"></div>
<div class="lang-switch">
    <a href="{{ route('language.switch', 'en') }}" class="{{ app()->getLocale() === 'en' ? 'active' : '' }}">EN</a>
    <a href="{{ route('language.switch', 'th') }}" class="{{ app()->getLocale() === 'th' ? 'active' : '' }}">TH</a>
</div>
<div class="auth-card">
    <div class="auth-header">
        <div class="logo-icon"><img src="{{ asset('images/myna_logo.jpg') }}" alt="Myna Aviation"></div>
        <h4>Myna Aviation</h4>
        <p>{{ __('Login to your account') }}</p>
    </div>
    <div class="p-4 pt-0">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show py-2 small">
                <i class="bi bi-check-circle me-1"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger py-2 small">{{ session('error') }}</div>
        @endif
        <form method="POST" action="{{ route('auth.login') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="email">{{ __('Email') }}</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="password">{{ __('Password') }}</label>
                <div class="input-group">
                    <input type="password" id="password" name="password" class="form-control" placeholder="********" required>
                    <button class="btn btn-outline-secondary" type="button" id="togglePwd"><i class="bi bi-eye" id="eyeIcon"></i></button>
                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="text-end mb-1">
                <a href="{{ route('password.request') }}" class="small text-decoration-none" style="color:#888;">{{ __('Forgot your password?') }}</a>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label small" for="remember">{{ __('Remember me') }}</label>
            </div>
            <button type="submit" class="btn-myna btn-myna-primary py-2">{{ __('Login') }}</button>
        </form>
        <hr class="my-3" style="border-color:#eee;">
        <p class="text-center small text-muted mb-0">
            {{ __("Don't have an account?") }}
            <a href="{{ route('auth.register.show') }}" class="fw-semibold text-decoration-none">{{ __('Register') }}</a>
        </p>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById('togglePwd')?.addEventListener('click', function () {
    const pwd = document.getElementById('password');
    const icon = document.getElementById('eyeIcon');
    if (pwd.type === 'password') { pwd.type = 'text'; icon.className = 'bi bi-eye-slash'; }
    else { pwd.type = 'password'; icon.className = 'bi bi-eye'; }
});
</script>
</body>
</html>