<?php

namespace App\Http\Controllers;

use App\Models\InformasiUpdate;
use Illuminate\Http\Request;

class PublicInformasiUpdateController extends Controller
{
    public function index()
    {
        $informasi = InformasiUpdate::query()->latest()->paginate(6);
        return view('informasi.update.index', compact('informasi'));
    }

    public function show($id)
    {
        $item = InformasiUpdate::findOrFail($id);
        $item->increment('jumlah_penonton');
        return view('informasi.update.details', ['informasi' => $item]);
    }

    public function like($id)
    {
        $item = InformasiUpdate::findOrFail($id);
        $item->increment('jumlah_suka');
        return response()->json(['success' => true, 'jumlah_suka' => $item->jumlah_suka]);
    }
}
