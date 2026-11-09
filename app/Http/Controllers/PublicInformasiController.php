<?php

namespace App\Http\Controllers;

use App\Models\InformasiUmum;
use Illuminate\Http\Request;

class PublicInformasiController extends Controller
{
    /**
     * Show public daftar informasi (blog).
     */
    public function index(Request $request)
    {
        // Only show published items. If you later add a 'status' field to informasi_umum,
        // change ->where('status', 'published') accordingly.
    $informasi = InformasiUmum::with('user')->latest()->paginate(6);

        return view('blog', compact('informasi'));
    }

    /**
     * Show detail page (optional)
     */
    public function show($id)
    {
        // Find by numeric id (original behavior)
        $informasi = InformasiUmum::with('user')->findOrFail($id);
        // increment viewer count
        $informasi->increment('jumlah_penonton');
        return view('blogdetails', ['informasi' => $informasi]);
    }

    /**
     * Increment like count (jumlah_suka) for a given informasi.
     * Returns JSON with the new count.
     */
    public function like($id)
    {
        $informasi = InformasiUmum::findOrFail($id);
        // Use atomic increment to avoid race conditions
        $informasi->increment('jumlah_suka');

        // Reload the fresh value
        $informasi->refresh();

        return response()->json([
            'success' => true,
            'jumlah_suka' => $informasi->jumlah_suka ?? 0,
        ]);
    }
}
