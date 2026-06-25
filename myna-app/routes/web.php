<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserSettingController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;

// ── Language Switcher ────────────────────────────────────────────
Route::get('/language/{locale}', function (string $locale) {
    if (in_array($locale, ['en', 'th'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('language.switch');

// ── Public Landing ──────────────────────────────────────────────
Route::get('/', [WelcomeController::class, 'show'])->name('home');

// ── Auth (password-based) ───────────────────────────────────────
Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.login.show');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.register.show');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

// ── Forgot / Reset Password ─────────────────────────────────────
Route::get('/forgot-password',        [ForgotPasswordController::class, 'showForm'])->name('password.request');
Route::post('/forgot-password',       [ForgotPasswordController::class, 'sendLink'])->name('password.send');
Route::get('/reset-password/{token}', [ResetPasswordController::class,  'showForm'])->name('password.reset');
Route::post('/reset-password',        [ResetPasswordController::class,  'reset'])->name('password.update');

// ── Protected Routes ────────────────────────────────────────────
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('auth.logout')
    ->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/welcome', [WelcomeController::class, 'show'])->name('welcome');
    Route::post('/welcome/choice', [WelcomeController::class, 'saveChoice'])->name('welcome.saveChoice');
    Route::get('/welcome/reset', [WelcomeController::class, 'reset'])->name('welcome.reset');

    // User settings
    Route::get('/account/setting',           [UserSettingController::class, 'index'])->name('user.setting');
    Route::post('/account/setting/password', [UserSettingController::class, 'updatePassword'])->name('user.setting.password');

    // Admin settings
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/settings', [SettingController::class, 'index'])->name('settings');
        Route::post('/settings/users/{user}/reset-password', [SettingController::class, 'resetUserPassword'])->name('settings.resetPassword');
        Route::delete('/settings/users/{user}/delete',    [SettingController::class, 'deleteUser'])->name('settings.deleteUser');
        Route::get('/settings/akun/{user}',                [SettingController::class, 'showAkun'])->name('settings.akun.show');
    });
});