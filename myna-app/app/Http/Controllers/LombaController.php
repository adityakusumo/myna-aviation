<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontingen;
use App\Models\LombaUser;

class LombaController extends Controller
{
    // ── Helper: get current user (NIAS or Lomba) and its ID key ─
    private function resolveUser(): ?array
    {
        // Lomba user (session-based)
        if (session()->has('lomba_user_id')) {
            $lombaUser = LombaUser::find(session('lomba_user_id'));
            if ($lombaUser) {
                return [
                    'user'    => $lombaUser,
                    'id_col'  => 'lomba_user_id',
                    'user_id' => $lombaUser->id,
                ];
            }
        }

        // NIAS user (standard auth)
        if (auth()->check()) {
            return [
                'user'    => auth()->user(),
                'id_col'  => 'user_id',
                'user_id' => auth()->id(),
            ];
        }

        return null;
    }

    // ── Index ─────────────────────────────────────────────────────
    public function index()
    {
        return view('lomba.index');
    }

    // ── Form A1 (Entri Kontingen) ─────────────────────────────────
    public function formA1()
    {
        $resolved = $this->resolveUser();
        if (!$resolved) {
            return redirect()->route('lomba.login')->with('error', 'Silakan login dulu.');
        }

        $kontingen = Kontingen::where($resolved['id_col'], $resolved['user_id'])->first();
        $listKota = \App\Models\MstKota::orderBy('NAMAKOTA', 'asc')->get();
        $isKontingenSaved = $kontingen ? true : false;

        return view('lomba.form_a1_kontingen', compact('kontingen', 'listKota', 'isKontingenSaved'));
    }

    // ── Form Nama Atlet ───────────────────────────────────────────
    public function formA1NamaAtlet()
    {
        $resolved = $this->resolveUser();
        if (!$resolved) {
            return redirect()->route('lomba.login')->with('error', 'Silakan login dulu.');
        }

        $kontingen = Kontingen::where($resolved['id_col'], $resolved['user_id'])->first();

        if (!$kontingen) {
            return redirect()->route('lomba.form_a1')->with('error', 'Isi data kontingen dulu.');
        }

        return view('lomba.form_a1_namaatlet', compact('kontingen'));
    }

    // ── Save Kontingen ────────────────────────────────────────────
    public function saveKontingen(Request $request)
    {
        $resolved = $this->resolveUser();
        if (!$resolved) {
            return redirect()->route('lomba.login')->with('error', 'Silakan login dulu.');
        }

        $request->validate([
            'jnsKompetisi'   => 'required|in:K,P',
            'nama_kontingen' => 'required|string',
            'jenis'          => 'required_if:jnsKompetisi,K',
            'nama_wilayah'   => 'required_if:jnsKompetisi,K',
            'provinsi'       => 'required',
        ]);

        Kontingen::updateOrCreate(
            [$resolved['id_col'] => $resolved['user_id']],
            [
                'jns_kompetisi'  => $request->jnsKompetisi,
                'nama_kontingen' => $request->nama_kontingen,
                'jenis_wilayah'  => $request->jenis,
                'nama_wilayah'   => strtoupper($request->nama_wilayah),
                'provinsi'       => strtoupper($request->provinsi),
            ]
        );

        return redirect()->route('lomba.form_a1_namaatlet')
            ->with('success', 'Data Kontingen berhasil disimpan. Sekarang silakan isi daftar atlet.');
    }
}
