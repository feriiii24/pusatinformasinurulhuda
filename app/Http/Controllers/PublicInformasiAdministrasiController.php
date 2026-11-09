<?php

namespace App\Http\Controllers;

use App\Models\InformasiAdministrasi;
use Illuminate\Http\Request;

class PublicInformasiAdministrasiController extends Controller
{
    public function index()
    {
        $informasi = InformasiAdministrasi::query()->latest()->paginate(6);
        return view('informasi.administrasi.index', compact('informasi'));
    }

    public function show($id)
    {
        $item = InformasiAdministrasi::findOrFail($id);
        $item->increment('jumlah_penonton');
        return view('informasi.administrasi.details', ['informasi' => $item]);
    }

    public function like($id)
    {
        $item = InformasiAdministrasi::findOrFail($id);
        $item->increment('jumlah_suka');
        return response()->json(['success' => true, 'jumlah_suka' => $item->jumlah_suka]);
    }
}
