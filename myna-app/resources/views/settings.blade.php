@extends('layouts.app')
@section('title', __('Settings') . ' — Admin')

@section('content')
<div class="container mb-5">
    <div class="card card-myna">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5><i class="bi bi-gear-fill me-2" style="color:var(--myna-blue);"></i>{{ __('System Settings') }}</h5>
            <a href="{{ route('home') }}" class="btn-myna btn-myna-sm btn-myna-light">
                <i class="bi bi-arrow-left me-1"></i>{{ __('Back to Home') }}
            </a>
        </div>

        <div class="card-body">
            <div class="alert alert-info">
                <i class="bi bi-info-circle me-2"></i>
                {{ __('Welcome to the admin settings panel. Manage users and system configuration here.') }}
            </div>

            <div class="row mt-4">
                <div class="col-md-6 mb-4">
                    <div class="card section-card-myna">
                        <div class="card-header">
                            <span><i class="bi bi-people me-1"></i>{{ __('User Management') }}</span>
                        </div>
                        <div class="card-body">
                            <p class="small text-muted">{{ __('Manage registered user accounts, reset passwords, or remove users.') }}</p>
                            <a href="{{ route('settings', ['tab' => 'lomba']) }}" class="btn-myna btn-myna-sm btn-myna-primary">
                                <i class="bi bi-people me-1"></i>{{ __('Manage Users') }}
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card section-card-myna">
                        <div class="card-header">
                            <span><i class="bi bi-shield-lock me-1"></i>{{ __('Account Details') }}</span>
                        </div>
                        <div class="card-body">
                            <p class="small text-muted">{{ __('View detailed account information and statistics for any user.') }}</p>
                            <a href="{{ route('settings', ['tab' => 'akun']) }}" class="btn-myna btn-myna-sm btn-myna-primary">
                                <i class="bi bi-person-gear me-1"></i>{{ __('View Accounts') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection