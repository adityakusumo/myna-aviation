<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $userExists = User::where('email', $request->email)->exists();

        if (!$userExists) {
            return redirect()->route('auth.register.show')
                ->with('info', 'Email not registered. Please create an account first.')
                ->withInput(['email' => $request->email]);
        }

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('home')
                ->with('success', 'Welcome back, ' . Auth::user()->nama . '!');
        }

        return back()
            ->withErrors(['password' => 'The password you entered is incorrect.'])
            ->withInput(['email' => $request->email]);
    }

    public function showRegister()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        // Nationality list for global aviation company registration
        $nationalities = [
            'Thailand', 'Indonesia', 'Malaysia', 'Singapore', 'Vietnam',
            'Philippines', 'Myanmar', 'Cambodia', 'Laos', 'Brunei',
            'Japan', 'South Korea', 'China', 'Taiwan', 'Hong Kong',
            'India', 'Australia', 'New Zealand',
            'United Kingdom', 'Germany', 'France', 'Netherlands',
            'United States', 'Canada',
            'United Arab Emirates', 'Qatar', 'Saudi Arabia',
        ];
        sort($nationalities);

        return view('auth.register', compact('nationalities'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama'                  => 'required|string|max:100',
            'gender'                => 'required|in:L,P',
            'nationality'           => 'nullable|string|max:100',
            'phone'                 => 'nullable|string|max:30',
            'employee_id'           => 'nullable|string|max:50',
            'position'              => 'nullable|string|max:100',
            'email'                 => 'required|email|max:100|unique:users,email',
            'password'              => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ], [
            'nama.required'      => 'Full name is required.',
            'gender.required'    => 'Gender is required.',
            'email.required'     => 'Email is required.',
            'email.email'        => 'Invalid email format.',
            'email.unique'       => 'This email is already registered.',
            'password.required'  => 'Password is required.',
            'password.min'       => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);

        $user = User::create([
            'nama'        => strtoupper(trim($request->nama)),
            'gender'      => $request->gender,
            'nationality' => $request->nationality ?? 'Thailand',
            'phone'       => $request->phone,
            'employee_id' => strtoupper(trim($request->employee_id ?? '')),
            'position'    => $request->position,
            'role'        => 'regular',
            'email'       => strtolower(trim($request->email)),
            'password'    => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('home')
            ->with('success', 'Account created successfully! Welcome, ' . $user->nama . '.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login.show')
            ->with('success', 'You have been logged out successfully.');
    }
}
