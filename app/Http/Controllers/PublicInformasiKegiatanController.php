<?php

namespace App\Http\Controllers;

use App\Models\InformasiKegiatan;
use Illuminate\Http\Request;

class PublicInformasiKegiatanController extends Controller
{
    public function index()
    {
        $informasi = InformasiKegiatan::query()->latest()->paginate(6);
        return view('informasi.kegiatan.index', compact('informasi'));
    }

    public function show($id)
    {
        $item = InformasiKegiatan::findOrFail($id);
        $item->increment('jumlah_penonton');
        return view('informasi.kegiatan.details', ['informasi' => $item]);
    }

    public function like($id)
    {
        $item = InformasiKegiatan::findOrFail($id);
        $item->increment('jumlah_suka');
        return response()->json(['success' => true, 'jumlah_suka' => $item->jumlah_suka]);
    }
}
