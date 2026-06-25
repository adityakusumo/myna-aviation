<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Register') }} — Myna Aviation</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root { --myna-blue:#1277BD; --myna-dark:#1a2332; }
        * { box-sizing:border-box; }
        body {
            min-height:100vh; background:var(--myna-dark);
            display:flex; align-items:center; justify-content:center;
            padding:2rem 1rem; font-family:'Inter','Segoe UI',system-ui,-apple-system,sans-serif;
            margin:0; position:relative;
        }
        body::before {
            content:''; position:fixed; inset:0;
            background: radial-gradient(ellipse 70% 50% at 50% 30%, rgba(18,119,189,.1) 0%, transparent 70%);
            pointer-events:none;
        }
        .brand-bar { position:fixed; top:0; left:0; right:0; height:3px; background:linear-gradient(to right,#d50032 0%,#d50032 50%,#1277BD 50%,#1277BD 100%); z-index:100; }
        .lang-switch { position:fixed; top:12px; right:16px; z-index:101; display:flex; gap:2px; }
        .lang-switch a { padding:3px 10px; font-size:.72rem; font-weight:600; text-transform:uppercase; text-decoration:none; border-radius:3px; color:rgba(255,255,255,.5); }
        .lang-switch a.active, .lang-switch a:hover { background:rgba(255,255,255,.1); color:#fff; }
        .auth-card { width:100%; max-width:500px; background:#fff; box-shadow:0 8px 32px rgba(0,0,0,.3); position:relative; z-index:1; }
        .auth-header { padding:1.5rem 2rem; text-align:center; border-bottom:1px solid #eee; }
        .auth-header h4 { font-weight:700; color:var(--myna-dark); margin:0; font-size:1.1rem; color:#1a2332; }
        .auth-header p { color:#888; font-size:.82rem; margin:0; }
        .form-label { font-weight:600; font-size:.8rem; color:var(--myna-dark); margin-bottom:.25rem; }
        .section-title { font-size:.7rem; font-weight:700; text-transform:uppercase; letter-spacing:.5px; color:var(--myna-dark); border-bottom:1px solid #eee; padding-bottom:.4rem; margin-bottom:.8rem; margin-top:1.2rem; }
        .section-title:first-child { margin-top:0; }
        .btn-myna { display:inline-block; padding:.6rem 1rem; border:2px solid var(--myna-blue); font-size:.78rem; font-weight:600; text-transform:uppercase; letter-spacing:.1em; transition:all .1s ease-in-out; text-decoration:none; cursor:pointer; }
        .btn-myna-primary { background:var(--myna-dark); color:var(--myna-blue); border-color:var(--myna-blue); width:100%; }
        .btn-myna-primary:hover { background:var(--myna-blue); color:#fff; }
        #pwdStrengthBar { height:4px; border-radius:2px; transition:all .3s; }
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
        <h4><i class="bi bi-person-plus me-2"></i>{{ __('Register a new account') }}</h4>
        <p>Myna Aviation</p>
    </div>
    <div class="p-4">
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show py-2 small">
                <i class="bi bi-exclamation-triangle me-1"></i><strong>Periksa kembali form:</strong>
                <ul class="mb-0 mt-1 ps-3">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <form method="POST" action="{{ route('auth.register') }}" autocomplete="off">
            @csrf
            <p class="section-title"><i class="bi bi-person me-1"></i>{{ __('Profile Information') }}</p>
            <div class="mb-3">
                <label class="form-label" for="nama">{{ __('Name') }} <span class="text-danger">*</span></label>
                <input type="text" id="nama" name="nama" class="form-control text-uppercase @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required maxlength="100">
                @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('Gender') }} <span class="text-danger">*</span></label>
                <div class="d-flex gap-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gL" value="L" {{ old('gender','L')==='L'?'checked':''}} required>
                        <label class="form-check-label" for="gL">{{ __('Male') }}</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gP" value="P" {{ old('gender')==='P'?'checked':''}}>
                        <label class="form-check-label" for="gP">{{ __('Female') }}</label>
                    </div>
                </div>
                @error('gender')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="nationality">{{ __('Nationality') }} <span class="text-danger">*</span></label>
                <select name="nationality" id="nationality" class="form-select @error('nationality') is-invalid @enderror">
                    <option value="">— {{ __('Select an option') }} —</option>
                    @foreach($nationalities as $nat)<option value="{{ $nat }}" {{ old('nationality')===$nat?'selected':'' }}>{{ $nat }}</option>@endforeach
                </select>
                @error('nationality')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <p class="section-title"><i class="bi bi-briefcase me-1"></i>{{ __('Employment Details') }}</p>
            <div class="mb-3">
                <label class="form-label" for="employee_id">{{ __('Employee ID') }} <span class="text-muted fw-normal">({{ __('Optional') }})</span></label>
                <input type="text" id="employee_id" name="employee_id" class="form-control text-uppercase @error('employee_id') is-invalid @enderror" value="{{ old('employee_id') }}" maxlength="50">
                @error('employee_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="position">{{ __('Position') }} <span class="text-muted fw-normal">({{ __('Optional') }})</span></label>
                <input type="text" id="position" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position') }}" maxlength="100">
                @error('position')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-4">
                <label class="form-label" for="phone">{{ __('Phone Number') }} <span class="text-muted fw-normal">({{ __('Optional') }})</span></label>
                <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" maxlength="30" placeholder="+66 123 456 789">
                @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <p class="section-title"><i class="bi bi-shield-lock me-1"></i>{{ __('Account') }}</p>
            <div class="mb-3">
                <label class="form-label" for="email">{{ __('Email') }} <span class="text-danger">*</span></label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required maxlength="100">
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="password">{{ __('Password') }} <span class="text-danger">*</span></label>
                <div class="input-group">
                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Min 8 chars" required minlength="8">
                    <button class="btn btn-outline-secondary" type="button" id="togglePwd1"><i class="bi bi-eye" id="eye1"></i></button>
                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mt-1 bg-light rounded" style="height:4px"><div id="pwdStrengthBar" style="width:0%"></div></div>
                <div id="pwdStrengthText" class="form-text small"></div>
            </div>
            <div class="mb-4">
                <label class="form-label" for="password_confirmation">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
                <div class="input-group">
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                    <button class="btn btn-outline-secondary" type="button" id="togglePwd2"><i class="bi bi-eye" id="eye2"></i></button>
                </div>
                <div id="pwdMatchMsg" class="form-text small"></div>
            </div>
            <button type="submit" class="btn-myna btn-myna-primary py-2" id="btnDaftar"><i class="bi bi-person-check me-1"></i>{{ __('Register') }}</button>
        </form>
        <hr class="my-3" style="border-color:#eee;">
        <p class="text-center small text-muted mb-0">{{ __('Already have an account?') }} <a href="{{ route('auth.login.show') }}" class="fw-semibold text-decoration-none">{{ __('Login') }}</a></p>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function togglePassword(btnId, inputId, iconId) {
    document.getElementById(btnId).addEventListener('click', function () {
        const inp = document.getElementById(inputId);
        const icon = document.getElementById(iconId);
        inp.type = inp.type === 'password' ? 'text' : 'password';
        icon.className = inp.type === 'password' ? 'bi bi-eye' : 'bi bi-eye-slash';
    });
}
togglePassword('togglePwd1', 'password', 'eye1');
togglePassword('togglePwd2', 'password_confirmation', 'eye2');

document.getElementById('password').addEventListener('input', function () {
    const val = this.value;
    const bar = document.getElementById('pwdStrengthBar');
    const txt = document.getElementById('pwdStrengthText');
    let score = 0;
    if (val.length >= 8) score++;
    if (/[A-Z]/.test(val)) score++;
    if (/[0-9]/.test(val)) score++;
    if (/[^A-Za-z0-9]/.test(val)) score++;
    const levels = [{w:'25%',bg:'#dc3545',label:'Weak'},{w:'50%',bg:'#fd7e14',label:'Fair'},{w:'75%',bg:'#ffc107',label:'Good'},{w:'100%',bg:'#198754',label:'Strong'}];
    if (val.length===0){bar.style.width='0%';txt.textContent='';return;}
    const lvl=levels[score-1]||levels[0];
    bar.style.width=lvl.w;bar.style.background=lvl.bg;txt.textContent='Strength: '+lvl.label;txt.style.color=lvl.bg;
    const p2=document.getElementById('password_confirmation').value;
    const msg=document.getElementById('pwdMatchMsg');
    if(p2){msg.textContent=p1===p2?'✓ Passwords match':'✗ Passwords do not match';msg.style.color=p1===p2?'#198754':'#dc3545';}
});
document.getElementById('password_confirmation').addEventListener('input', function(){
    const p1=document.getElementById('password').value;
    const p2=this.value;
    const msg=document.getElementById('pwdMatchMsg');
    if(!p2){msg.textContent='';return;}
    msg.textContent=p1===p2?'✓ Passwords match':'✗ Passwords do not match';
    msg.style.color=p1===p2?'#198754':'#dc3545';
});
</script>
</body>
</html>