@extends('layouts.app')
@section('title', __('Account Details') . ' — ' . $user->nama)

@section('content')
<div class="container mb-5">
    <div class="card card-myna">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5><i class="bi bi-person-circle me-2"></i>{{ __('Account Details') }}</h5>
            <a href="{{ route('settings', ['tab' => 'akun']) }}" class="btn-myna btn-myna-sm btn-myna-light">
                <i class="bi bi-arrow-left me-1"></i>{{ __('Back') }}
            </a>
        </div>

        <div class="card-body">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card section-card-myna h-100">
                        <div class="card-header">
                            <span><i class="bi bi-person me-1"></i>{{ __('Profile Information') }}</span>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-3 mb-4">
                                <div style="width:56px;height:56px;border-radius:50%;background:var(--myna-dark);color:#fff;display:flex;align-items:center;justify-content:center;font-size:1.4rem;font-weight:700;flex-shrink:0;">
                                    {{ strtoupper(substr($user->nama, 0, 1)) }}
                                </div>
                                <div>
                                    <div class="fw-bold fs-5">{{ $user->nama }}</div>
                                    <span class="badge {{ $user->role === 'admin' ? 'bg-danger' : 'bg-secondary' }}">{{ $user->role === 'admin' ? 'Admin' : 'Regular' }}</span>
                                </div>
                            </div>
                            <table class="table table-sm table-borderless mb-0">
                                <tr><td class="text-muted small" style="width:130px">{{ __('Email') }}</td><td>{{ $user->email }}</td></tr>
                                <tr><td class="text-muted small">{{ __('Gender') }}</td><td>{{ $user->gender === 'L' ? __('Male') : ($user->gender === 'P' ? __('Female') : '—') }}</td></tr>
                                <tr><td class="text-muted small">{{ __('Registered') }}</td><td class="small">{{ $user->created_at?->format('d/m/Y H:i') ?? '—' }}</td></tr>
                                <tr><td class="text-muted small">{{ __('Updated') }}</td><td class="small">{{ $user->updated_at?->format('d/m/Y H:i') ?? '—' }}</td></tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card section-card-myna h-100">
                        <div class="card-header">
                            <span><i class="bi bi-gear me-1"></i>{{ __('Actions') }}</span>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-column gap-2">
                                @if($user->role !== 'admin')
                                <button type="button" class="btn-myna btn-myna-sm btn-myna-primary"
                                        onclick="confirmResetPwd({{ $user->id }}, '{{ addslashes($user->nama) }}')">
                                    <i class="bi bi-key me-1"></i>{{ __('Reset Password') }}
                                </button>
                                <button type="button" class="btn-myna btn-myna-sm btn-myna-danger"
                                        onclick="confirmDelete({{ $user->id }}, '{{ addslashes($user->nama) }}')">
                                    <i class="bi bi-trash me-1"></i>{{ __('Delete') }} {{ __('Account') }}
                                </button>
                                @else
                                <div class="alert alert-info small mb-0">
                                    <i class="bi bi-shield-lock me-1"></i>{{ __('Admin accounts cannot be modified.') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form id="form_reset_pwd" method="POST" style="display:none;">@csrf</form>
<form id="form_delete" method="POST" style="display:none;">@csrf @method('DELETE')</form>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmResetPwd(userId, nama) {
    Swal.fire({
        title: 'Reset Password?',
        html: 'Password for <strong>' + nama + '</strong> will be reset.',
        icon: 'question', showCancelButton: true,
        confirmButtonColor: '#1a2332', cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, Reset!', cancelButtonText: 'Cancel',
    }).then(result => {
        if (result.isConfirmed) {
            const form = document.getElementById('form_reset_pwd');
            form.action = '/settings/users/' + userId + '/reset-password';
            form.submit();
        }
    });
}

function confirmDelete(userId, nama) {
    Swal.fire({
        title: 'Delete Account?', html: 'Account <strong>' + nama + '</strong> will be permanently deleted.',
        icon: 'warning', showCancelButton: true,
        confirmButtonColor: '#1a2332', cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, Delete!', cancelButtonText: 'Cancel',
    }).then(result => {
        if (result.isConfirmed) {
            const form = document.getElementById('form_delete');
            form.action = '/settings/users/' + userId + '/delete';
            form.submit();
        }
    });
}
</script>
@endpush
@endsection