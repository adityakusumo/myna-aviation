@extends('layouts.app')
@section('title', __('Account Settings'))

@section('content')
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card card-myna mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5><i class="bi bi-person-gear me-2"></i>{{ __('Account Settings') }}</h5>
                    <a href="{{ route('home') }}" class="btn-myna btn-myna-sm btn-myna-light">
                        <i class="bi bi-arrow-left me-1"></i>{{ __('Back to Home') }}
                    </a>
                </div>
            </div>

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-3">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-3">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            {{-- Profile Info --}}
            <div class="card section-card-myna mb-4">
                <div class="card-header">
                    <span><i class="bi bi-person-badge me-1"></i>{{ __('Profile Information') }}</span>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12 d-flex align-items-center gap-3 mb-2">
                            <div style="width:64px;height:64px;border-radius:50%;background:var(--myna-dark);color:#fff;display:flex;align-items:center;justify-content:center;font-size:1.6rem;font-weight:700;flex-shrink:0;">
                                {{ strtoupper(substr(Auth::user()->nama, 0, 1)) }}
                            </div>
                            <div>
                                <div class="fw-bold fs-5">{{ Auth::user()->nama }}</div>
                                <div class="text-muted small">{{ Auth::user()->email }}</div>
                                <span class="badge {{ Auth::user()->role === 'admin' ? 'bg-danger' : 'bg-secondary' }} mt-1">
                                    {{ Auth::user()->role === 'admin' ? 'Admin' : 'Member' }}
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">{{ __('Name') }}</label>
                            <div class="form-control bg-light fw-semibold">{{ Auth::user()->nama }}</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">{{ __('Email') }}</label>
                            <div class="form-control bg-light">{{ Auth::user()->email }}</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">{{ __('Gender') }}</label>
                            <div class="form-control bg-light">{{ Auth::user()->gender === 'L' ? __('Male') : __('Female') }}</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">{{ __('Nationality') }}</label>
                            <div class="form-control bg-light">{{ Auth::user()->nationality ?? '—' }}</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">{{ __('Phone Number') }}</label>
                            <div class="form-control bg-light">{{ Auth::user()->phone ?? '—' }}</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">{{ __('Employee ID') }}</label>
                            <div class="form-control bg-light">{{ Auth::user()->employee_id ?? '—' }}</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">{{ __('Position') }}</label>
                            <div class="form-control bg-light">{{ Auth::user()->position ?? '—' }}</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">{{ __('Registered') }}</label>
                            <div class="form-control bg-light small">{{ Auth::user()->created_at?->format('d/m/Y H:i') ?? '—' }}</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Change Password --}}
            <div class="card section-card-myna mb-4">
                <div class="card-header">
                    <span><i class="bi bi-shield-lock me-1"></i>{{ __('Change Password') }}</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.setting.password') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label">{{ __('Current Password') }} <span class="text-danger">*</span></label>
                                <input type="password" name="current_password" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('New Password') }} <span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control" required minlength="8">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('Confirm New Password') }} <span class="text-danger">*</span></label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn-myna btn-myna-primary px-4">
                                <i class="bi bi-shield-check me-1"></i>{{ __('Save Changes') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection