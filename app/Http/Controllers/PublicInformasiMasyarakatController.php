<?php

namespace App\Http\Controllers;

use App\Models\InformasiMasyarakat;
use Illuminate\Http\Request;

class PublicInformasiMasyarakatController extends Controller
{
    public function index()
    {
        $informasi = InformasiMasyarakat::query()->latest()->paginate(6);
        return view('informasi.masyarakat.index', compact('informasi'));
    }

    public function show($id)
    {
        $item = InformasiMasyarakat::findOrFail($id);
        $item->increment('jumlah_penonton');
        return view('informasi.masyarakat.details', ['informasi' => $item]);
    }

    public function like($id)
    {
        $item = InformasiMasyarakat::findOrFail($id);
        $item->increment('jumlah_suka');
        return response()->json(['success' => true, 'jumlah_suka' => $item->jumlah_suka]);
    }
}
