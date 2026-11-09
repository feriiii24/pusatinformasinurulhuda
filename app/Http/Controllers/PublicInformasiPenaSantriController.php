<?php

namespace App\Http\Controllers;

use App\Models\InformasiPenaSantri;
use Illuminate\Http\Request;

class PublicInformasiPenaSantriController extends Controller
{
    public function index()
    {
        $informasi = InformasiPenaSantri::query()->latest()->paginate(6);
        // Folder is named `penasntri` in views (typo), load from that folder to avoid view not found
        return view('informasi.penasntri.index', compact('informasi'));
    }

    public function show($id)
    {
        $item = InformasiPenaSantri::findOrFail($id);
        $item->increment('jumlah_penonton');
        return view('informasi.penasntri.details', ['informasi' => $item]);
    }

    public function like($id)
    {
        $item = InformasiPenaSantri::findOrFail($id);
        $item->increment('jumlah_suka');
        return response()->json(['success' => true, 'jumlah_suka' => $item->jumlah_suka]);
    }
}
