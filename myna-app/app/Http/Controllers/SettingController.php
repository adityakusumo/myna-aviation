<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $search = request('cari');
        $users  = User::when($search, fn($q) => $q->where('nama', 'like', "%{$search}%")
                                                   ->orWhere('email', 'like', "%{$search}%"))
                      ->orderBy('nama')
                      ->paginate(20)
                      ->withQueryString();

        $akunSortCol   = in_array(request('sort_akun'), ['nama','email','role','created_at']) ? request('sort_akun') : 'nama';
        $akunSortDir   = request('dir_akun') === 'desc' ? 'desc' : 'asc';
        $akunSearch    = request('cari');
        $akunUsers = User::when($akunSearch, fn($q) => $q->where('nama',  'like', "%{$akunSearch}%")
                                                          ->orWhere('email', 'like', "%{$akunSearch}%"))
                         ->orderBy($akunSortCol, $akunSortDir)
                         ->paginate(20, ['*'], 'akun_page')
                         ->withQueryString();

        return view('settings', compact('users', 'akunUsers'));
    }

    public function resetUserPassword(User $user)
    {
        $user->update(['password' => bcrypt('Myna@1234')]);
        return redirect()->route('settings', ['tab' => 'lomba'])
            ->with('success', "Password for {$user->nama} has been reset to: Myna@1234");
    }

    public function deleteUser(User $user)
    {
        if ($user->role === 'admin') {
            return redirect()->route('settings', ['tab' => 'lomba'])
                ->with('error', 'Admin accounts cannot be deleted.');
        }
        $user->delete();
        return redirect()->route('settings', ['tab' => 'lomba'])
            ->with('success', "Account {$user->nama} has been deleted.");
    }

    public function showAkun(User $user)
    {
        return view('setting_akun_show', compact('user'));
    }
}
