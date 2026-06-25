<?php

namespace App\Models;

use Illuminate\Auth\Passwords\CanResetPassword; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, CanResetPassword;

    protected $fillable = [
        'nama',
        'gender',
        'nationality',
        'phone',
        'employee_id',
        'position',
        'role',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
    ];

    public function nias()
    {
        return $this->hasMany(Nias::class, 'user_id');
    }

    // ── Backward-compatible accessor ────────────────────────────
    // NiasController and other legacy code still references ->namaclub.
    // After the column rename, this accessor maps it to ->nationality.
    public function getNamaclubAttribute(): ?string
    {
        return $this->nationality;
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isRegular(): bool
    {
        return $this->role === 'regular';
    }
}
