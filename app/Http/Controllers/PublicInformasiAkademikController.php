<?php

namespace App\Http\Controllers;

use App\Models\InformasiAkademik;
use Illuminate\Http\Request;

class PublicInformasiAkademikController extends Controller
{
    public function index()
    {
        $informasi = InformasiAkademik::query()->latest()->paginate(6);
        return view('informasi.akademik.index', compact('informasi'));
    }

    public function show($id)
    {
        $item = InformasiAkademik::findOrFail($id);
        $item->increment('jumlah_penonton');
        return view('informasi.akademik.details', ['informasi' => $item]);
    }

    public function like($id)
    {
        $item = InformasiAkademik::findOrFail($id);
        $item->increment('jumlah_suka');
        return response()->json(['success' => true, 'jumlah_suka' => $item->jumlah_suka]);
    }
}
