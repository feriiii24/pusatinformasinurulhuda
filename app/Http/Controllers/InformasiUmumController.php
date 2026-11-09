<?php

namespace App\Http\Controllers;

use App\Models\InformasiUmum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformasiUmumController extends Controller
{
    /**
     * Tampilkan daftar informasi umum.
     */
    public function index()
    {
        $informasi = InformasiUmum::with('user')->latest()->paginate(10);
        return view('dashboard.kelolainformasi.informasiumum', compact('informasi'));
    }

    /**
     * Simpan informasi baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_informasi' => 'required|string|max:255',
            'deskripsi'       => 'required|string',
            'tgl'             => 'required|date',
            'unit'            => 'nullable|string|max:100',
            'foto_utama'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'foto_kedua'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload foto
        $fotoUtama = $request->file('foto_utama')?->store('informasi_umum', 'public');
        $fotoKedua = $request->file('foto_kedua')?->store('informasi_umum', 'public');

        InformasiUmum::create([
            'judul_informasi' => $request->judul_informasi,
            'deskripsi'       => $request->deskripsi,
            'tgl'             => $request->tgl,
            'unit'            => $request->unit,
            'foto_utama'      => $fotoUtama,
            'foto_kedua'      => $fotoKedua,
            'user_id'         => Auth::id(),
            'jumlah_penonton' => 0,
            'jumlah_suka'     => 0,
        ]);

    return redirect()->route('dashboard.informasiumum')
             ->with('success', 'Informasi berhasil ditambahkan.');
    }

    /**
     * Edit informasi.
     */
    public function edit(InformasiUmum $informasiUmum)
    {
        return view('dashboard.kelolainformasi.edit_informasiumum', compact('informasiUmum'));
    }

    /**
     * Update informasi.
     */
    public function update(Request $request, InformasiUmum $informasiUmum)
    {
        $request->validate([
            'judul_informasi' => 'required|string|max:255',
            'deskripsi'       => 'required|string',
            'tgl'             => 'required|date',
            'unit'            => 'nullable|string|max:100',
            'foto_utama'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'foto_kedua'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload baru jika ada
        if ($request->hasFile('foto_utama')) {
            $informasiUmum->foto_utama = $request->file('foto_utama')->store('informasi_umum', 'public');
        }
        if ($request->hasFile('foto_kedua')) {
            $informasiUmum->foto_kedua = $request->file('foto_kedua')->store('informasi_umum', 'public');
        }

        $informasiUmum->update([
            'judul_informasi' => $request->judul_informasi,
            'deskripsi'       => $request->deskripsi,
            'tgl'             => $request->tgl,
            'unit'            => $request->unit,
        ]);

    return redirect()->route('dashboard.informasiumum')
             ->with('success', 'Informasi berhasil diperbarui.');
    }

    /**
     * Hapus informasi.
     */
    public function destroy(InformasiUmum $informasiUmum)
    {
        $informasiUmum->delete();
    return redirect()->route('dashboard.informasiumum')
             ->with('success', 'Informasi berhasil dihapus.');
    }
}
