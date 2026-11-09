<?php

namespace App\Http\Controllers\Informasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InformasiDokumen;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class InformasiDokumenController extends Controller
{
    public function index(Request $request)
    {
        $query = InformasiDokumen::with('user');

        if ($request->has('range')) {
            switch ($request->get('range')) {
                case 'hari_ini': $query->whereDate('created_at', now()->toDateString()); break;
                case 'minggu_ini': $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]); break;
                case 'bulan_ini': $query->whereMonth('created_at', now()->month); break;
                case 'tahun_ini': $query->whereYear('created_at', now()->year); break;
            }
        }

        if ($request->has('per') && $request->get('per') !== 'all') {
            $docs = $query->orderByDesc('created_at')->take(intval($request->get('per')))->get();
        } else {
            $docs = $query->orderByDesc('created_at')->get();
        }

        return view('dashboard.informasi.informasidokumen', ['rows' => $docs]);
    }

    public function show($id)
    {
        $doc = InformasiDokumen::with('user')->findOrFail($id);

        // Access control for 'tertutup' documents
        if ($doc->kategori === 'tertutup') {
            $user = auth()->user();
            // allow if super-admin or admin yayasan (role check)
            if (! $user) abort(403);

            $roleName = optional($user->role)->name ?? null;

            $allowed = false;
            if (in_array($roleName, ['super-admin','admin-yayasan'])) {
                $allowed = true;
            }

            // allow if same unit admin
            if ($user->unit_id && $doc->user && $doc->user->unit_id && $user->unit_id == $doc->user->unit_id) {
                $allowed = true;
            }

            if (! $allowed) {
                abort(403, 'Anda tidak memiliki akses ke dokumen ini.');
            }
        }

        $doc->increment('jumlah_penonton');

        $full = storage_path('app/' . $doc->file_path);
        if (! file_exists($full)) {
            // log missing file for diagnostics and return 404
            logger()->warning('InformasiDokumen file missing', ['id' => $doc->id, 'expected_path' => $full]);
            abort(404, 'File dokumen tidak ditemukan di server.');
        }

        return response()->download($full);
    }

    public function store(Request $request)
    {
        $request->validate([
            // no application-level max size; rely on server/PHP limits if needed
            'file' => 'required|file|mimes:pdf',
            'judul_informasi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori' => 'nullable|in:umum,tertutup',
        ]);

        // compute original upload temp file info before moving it
        $uploaded = $request->file('file');
        $tmpPath = $uploaded->getPathname();
        $originalHash = file_exists($tmpPath) ? md5_file($tmpPath) : null;
        $originalSize = file_exists($tmpPath) ? filesize($tmpPath) : null;

        // prepare destination and filename
        $destDir = storage_path('app/dokumen');
        if (! is_dir($destDir)) {
            @mkdir($destDir, 0777, true);
        }

        $filename = Str::random(40) . '.' . $uploaded->getClientOriginalExtension();
        $fullDest = $destDir . DIRECTORY_SEPARATOR . $filename;
        $path = 'dokumen/' . $filename;

        // Move the uploaded temp file to the final destination (explicit move is more predictable on Windows)
        $moved = false;
        try {
            $moved = (bool) $uploaded->move($destDir, $filename);
        } catch (\Exception $e) {
            logger()->error('InformasiDokumen move failed', ['error' => $e->getMessage()]);
            $moved = false;
        }

        if (! $moved || ! file_exists($fullDest)) {
            logger()->error('InformasiDokumen upload failed: file was not moved to storage', [
                'original_name' => $uploaded->getClientOriginalName(),
                'tmp_path' => $tmpPath,
                'expected_dest' => $fullDest,
            ]);

            return redirect()->back()->with('error', 'Upload gagal: file tidak dapat disimpan. Periksa izin folder storage dan coba lagi.');
        }

        // create DB row only after file moved successfully
        $doc = InformasiDokumen::create([
            'file_path' => $path,
            'judul_informasi' => $request->input('judul_informasi'),
            'slug' => Str::slug($request->input('judul_informasi')) . '-' . Str::random(5),
            'deskripsi' => $request->input('deskripsi'),
            'kategori' => $request->input('kategori', 'umum'),
            'user_id' => auth()->id(),
            'tgl' => $request->input('tgl', now()->toDateString()),
            'unit' => $request->input('unit') ?: optional(auth()->user())->unit?->name ?? null,
        ]);

        // Log the upload for debugging: who uploaded, saved path, and created record id
        $fullPath = storage_path('app/' . $path);
        $storedHash = file_exists($fullPath) ? md5_file($fullPath) : null;
        $storedSize = file_exists($fullPath) ? filesize($fullPath) : null;
        $originalName = $uploaded->getClientOriginalName();

        logger()->info('InformasiDokumen uploaded', [
            'user_id' => auth()->id(),
            'original_name' => $originalName,
            'file_path' => $path,
            'doc_id' => $doc->id,
            'original_size' => $originalSize,
            'original_md5' => $originalHash,
            'stored_size' => $storedSize,
            'stored_md5' => $storedHash,
        ]);

        return redirect()->back()->with('success', 'Dokumen tersimpan.');
    }

    public function like($id)
    {
        $doc = InformasiDokumen::findOrFail($id);
        $doc->increment('jumlah_suka');
        return response()->json(['jumlah_suka' => $doc->jumlah_suka]);
    }
}
