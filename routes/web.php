<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InformasiUmumController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;
use App\Http\Controllers\PublicInformasiController;
use App\Http\Controllers\PublicInformasiAkademikController;
use App\Http\Controllers\PublicInformasiAdministrasiController;
use App\Http\Controllers\PublicInformasiPenaSantriController;
use App\Http\Controllers\PublicInformasiKegiatanController;
use App\Http\Controllers\PublicInformasiMasyarakatController;
use App\Http\Controllers\PublicInformasiUpdateController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
// routes/web.php
Route::get('/tentang', function () {
    return view('about');
})->name('about');


Route::get('/informasi', [PublicInformasiController::class, 'index'])->name('blog');

// Detail route for informasi uses numeric id (original behavior)
Route::get('/informasi/{id}', [PublicInformasiController::class, 'show'])->name('blogdetails')->where('id', '[0-9]+');
// Like endpoint for informasi (increments jumlah_suka) using numeric id
Route::post('/informasi/{id}/like', [PublicInformasiController::class, 'like'])->name('informasi.like')->where('id', '[0-9]+');



// Additional public informasi categories
Route::get('/informasi/akademik', [PublicInformasiAkademikController::class, 'index'])->name('informasi.akademik.index');
Route::get('/informasi/akademik/{id}', [PublicInformasiAkademikController::class, 'show'])->name('informasi.akademik.details')->where('id', '[0-9]+');
Route::post('/informasi/akademik/{id}/like', [PublicInformasiAkademikController::class, 'like'])->name('informasi.akademik.like')->where('id', '[0-9]+');

Route::get('/informasi/administrasi', [PublicInformasiAdministrasiController::class, 'index'])->name('informasi.administrasi.index');
Route::get('/informasi/administrasi/{id}', [PublicInformasiAdministrasiController::class, 'show'])->name('informasi.administrasi.details')->where('id', '[0-9]+');
Route::post('/informasi/administrasi/{id}/like', [PublicInformasiAdministrasiController::class, 'like'])->name('informasi.administrasi.like')->where('id', '[0-9]+');

Route::get('/informasi/penasntri', [PublicInformasiPenaSantriController::class, 'index'])->name('informasi.penasantri.index');
Route::get('/informasi/penasntri/{id}', [PublicInformasiPenaSantriController::class, 'show'])->name('informasi.penasantri.details')->where('id', '[0-9]+');
Route::post('/informasi/penasntri/{id}/like', [PublicInformasiPenaSantriController::class, 'like'])->name('informasi.penasantri.like')->where('id', '[0-9]+');

Route::get('/informasi/kegiatan', [PublicInformasiKegiatanController::class, 'index'])->name('informasi.kegiatan.index');
Route::get('/informasi/kegiatan/{id}', [PublicInformasiKegiatanController::class, 'show'])->name('informasi.kegiatan.details')->where('id', '[0-9]+');
Route::post('/informasi/kegiatan/{id}/like', [PublicInformasiKegiatanController::class, 'like'])->name('informasi.kegiatan.like')->where('id', '[0-9]+');

Route::get('/informasi/masyarakat', [PublicInformasiMasyarakatController::class, 'index'])->name('informasi.masyarakat.index');
Route::get('/informasi/masyarakat/{id}', [PublicInformasiMasyarakatController::class, 'show'])->name('informasi.masyarakat.details')->where('id', '[0-9]+');
Route::post('/informasi/masyarakat/{id}/like', [PublicInformasiMasyarakatController::class, 'like'])->name('informasi.masyarakat.like')->where('id', '[0-9]+');

Route::get('/informasi/update', [PublicInformasiUpdateController::class, 'index'])->name('informasi.update.index');
Route::get('/informasi/update/{id}', [PublicInformasiUpdateController::class, 'show'])->name('informasi.update.details')->where('id', '[0-9]+');
Route::post('/informasi/update/{id}/like', [PublicInformasiUpdateController::class, 'like'])->name('informasi.update.like')->where('id', '[0-9]+');

use App\Http\Controllers\Informasi\InformasiDokumenController;

// Dashboard routes for dokumen listing and create
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard/informasidokumen', [InformasiDokumenController::class, 'index'])->name('dashboard.informasidokumen');
    Route::post('/dashboard/informasidokumen', [InformasiDokumenController::class, 'store'])->name('dashboard.informasidokumen.store');
});

// Public download and like routes
Route::get('/dokumen/{id}', [InformasiDokumenController::class, 'show'])->name('dokumen.download')->where('id', '[0-9]+');
Route::post('/dokumen/{id}/like', [InformasiDokumenController::class, 'like'])->name('dokumen.like')->where('id', '[0-9]+');

// Public dokumen listing (used by header link)
Route::get('/dokumen', function () {
    try {
        // Only show dokumen that are not marked 'tertutup'
        $informasi = \App\Models\InformasiDokumen::with('user')
            ->whereRaw("COALESCE(kategori, 'umum') != ?", ['tertutup'])
            ->orderByDesc('created_at')
            ->paginate(10);
    } catch (\Exception $e) {
        // If model/table missing, show empty paginator to avoid breaking the page
        $informasi = collect();
    }
    return view('dokumen', compact('informasi'));
})->name('informasidokumen');

// Temporary debug route: helps confirm Laravel receives requests for /dokumen
Route::get('/dokumen-test', function () {
    return response('dokumen test ok', 200);
})->name('dokumen.test');
Route::get('/kontak', function () {
    return view('contact');
})->name('contact');

// Backwards-compatibility: accept slug-based detail URLs and redirect to numeric-ID detail
Route::get('/informasi/{slug}', function ($slug) {
    $item = \App\Models\InformasiUmum::where('slug', $slug)->orWhere('id', $slug)->first();
    if ($item) {
        return redirect()->route('blogdetails', ['id' => $item->id]);
    }
    abort(404);
})->where('slug', '[A-Za-z0-9\-]+');

// Backwards-compatibility: accept slug-based like POSTs (increments jumlah_suka)
Route::post('/informasi/{slug}/like', function ($slug) {
    $item = \App\Models\InformasiUmum::where('slug', $slug)->orWhere('id', $slug)->firstOrFail();
    $item->increment('jumlah_suka');
    $item->refresh();
    return response()->json([
        'success' => true,
        'jumlah_suka' => $item->jumlah_suka ?? 0,
    ]);
})->where('slug', '[A-Za-z0-9\-]+');

// Serve legacy /images/* requests from public/landing/images/* when present
Route::get('/images/{path}', function ($path) {
    $file = public_path('landing/images/' . $path);
    if (file_exists($file)) {
        return response()->file($file);
    }
    abort(404);
})->where('path', '.*');

// route start sidebar
Route::get('/dashboard', function () {
    // gather simple counts for dashboard widgets
    $userCount = \App\Models\User::count();
    // normalize role names by trimming, lowercasing and replacing hyphens/underscores with spaces
    $normalizeExpr = "LOWER(TRIM(REPLACE(REPLACE(name, '-', ' '), '_', ' ')))";

    $adminYayasanCount = \App\Models\User::whereHas('role', function ($q) use ($normalizeExpr) {
        $q->whereRaw("{$normalizeExpr} = ?", ['admin yayasan']);
    })->count();

    $adminUnitCount = \App\Models\User::whereHas('role', function ($q) use ($normalizeExpr) {
        $q->whereRaw("{$normalizeExpr} = ?", ['admin unit']);
    })->count();
        // count pengguna yang memiliki role 'User Umum' (accept multiple common variants)
        $akunUmumCount = \App\Models\User::whereHas('role', function ($q) use ($normalizeExpr) {
                $q->whereRaw("{$normalizeExpr} = ?", ['user umum'])
                    ->orWhereRaw("{$normalizeExpr} = ?", ['user']);
        })->count();
    // count Informasi Umum records separately
    try {
        $informasiUmumCount = \App\Models\InformasiUmum::count();
    } catch (\Exception $e) {
        // if table/model missing, default to 0 to avoid breaking dashboard
        $informasiUmumCount = 0;
    }
    // 'kategori' column may not exist yet on informasi_umum in some environments.
    // Avoid querying it to prevent SQL errors; show 0 until the column/feature is added.
    $tertutupCount = 0;
    $akademikCount = \App\Models\InformasiAkademik::count();
    $administrasiCount = \App\Models\InformasiAdministrasi::count();
    $penaSantriCount = \App\Models\InformasiPenaSantri::count();
    $kegiatanCount = \App\Models\InformasiKegiatan::count();
    $dokumenCount = \App\Models\InformasiDokumen::count();
    $masyarakatCount = \App\Models\InformasiMasyarakat::count();

    // Build activities feed: collect from all informasi types and dokumen
    $per = request()->query('per', '10');
    if ($per === 'all') {
        $limit = null;
    } elseif (str_starts_with($per, 'per:')) {
        $limit = intval(substr($per, 4)) ?: 10;
    } else {
        $limit = intval($per) > 0 ? intval($per) : 10;
    }

    $items = [];

    // helper to normalize model collections
    $collect = function ($collection, $type) {
        return $collection->map(function ($row) use ($type) {
            return (object) [
                'id' => $row->id,
                'title' => $row->judul_informasi ?? ($row->judul ?? 'Untitled'),
                'kategori' => $row->kategori ?? null,
                'user_name' => optional($row->user)->name ?? ($row->user_name ?? 'System'),
                'unit' => $row->unit ?? null,
                'type' => $type,
                'created_at' => $row->created_at ?? ($row->tgl ?? now()),
            ];
        })->all();
    };

    // Query each informasi model (exclude tertutup where possible)
    try {
        $items = array_merge($items, $collect(\App\Models\InformasiUmum::orderByDesc('created_at')->get(), 'umum'));
    } catch (\Exception $e) { /* ignore if model/table missing */ }
    foreach (['InformasiAkademik','InformasiAdministrasi','InformasiPenaSantri','InformasiKegiatan','InformasiMasyarakat','InformasiUpdate'] as $m) {
        try {
            $cls = "\\App\\Models\\$m";
            $items = array_merge($items, $collect($cls::orderByDesc('created_at')->get(), strtolower($m)));
        } catch (\Exception $e) { /* ignore missing models/tables */ }
    }

    // Include dokumen but exclude kategori tertutup
    try {
        $dok = \App\Models\InformasiDokumen::orderByDesc('created_at')->get();
        $dok = $dok->filter(function ($d) { return ($d->kategori ?? 'umum') !== 'tertutup'; });
        $items = array_merge($items, $collect($dok, 'dokumen'));
    } catch (\Exception $e) { /* ignore */ }

    // filter out items that are tertutup (defensive)
    $items = array_filter($items, function ($it) { return ($it->kategori ?? 'umum') !== 'tertutup'; });

    // sort by created_at desc
    usort($items, function ($a, $b) {
        $ta = strtotime($a->created_at);
        $tb = strtotime($b->created_at);
        return $tb <=> $ta;
    });

    if ($limit) {
        $items = array_slice($items, 0, $limit);
    }

    $activities = $items;

    return view('dashboard.dashboard', compact(
        'userCount', 'adminYayasanCount', 'adminUnitCount',
        'akunUmumCount', 'informasiUmumCount', 'tertutupCount', 'akademikCount', 'administrasiCount',
        'penaSantriCount', 'kegiatanCount', 'dokumenCount', 'masyarakatCount',
        'activities'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/blank', function () {
    return view('dashboard.blank');
})->middleware(['auth', 'verified'])->name('dashboard.blank');

Route::get('/dashboard/kelolapengguna', [UserController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.kelolapengguna');

Route::get('/dashboard/kelolaunit', [UnitController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.kelolaunit');

Route::get('/dashboard/kelolarole', [RoleController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.kelolarole');
// rote end sidebar

// route kelola informasi start

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth', 'verified'])->group(function () {
    Route::prefix('kelolainformasi')->name('kelolainformasi.')->group(function () {
        Route::get('administrasi', function () {
            $user = auth()->user();
            $role = optional($user->role)->name ?? null;
            $q = \App\Models\InformasiAdministrasi::query();
            if (! in_array($role, ['super-admin','admin-yayasan'])) {
                if ($role === 'admin-unit') {
                    $unitName = optional($user->unit)->name;
                    $q->where('unit', $unitName);
                } else {
                    // regular user: only their own
                    $q->where('user_id', $user->id);
                }
            }
            $rows = $q->orderByDesc('created_at')->get();
            return view('dashboard.kelolainformasi.kelolainformasiadministrasi', compact('rows'));
    })->name('administrasi');

        // admin actions for administrasi: edit, approve, reject
        Route::get('administrasi/{id}/edit', function ($id) {
            $user = auth()->user();
            $role = optional($user->role)->name ?? null;
            $item = \App\Models\InformasiAdministrasi::findOrFail($id);
            // allow if owner or admin-unit or admin-yayasan or super-admin
            if ($item->user_id !== $user->id && !in_array($role, ['admin-unit','admin-yayasan','super-admin'])) {
                abort(403);
            }
            return view('dashboard.kelolainformasi.editadministrasi', ['item' => $item]);
    })->name('administrasi.edit');

        // update administrasi
        Route::put('administrasi/{id}', function (
            \Illuminate\Http\Request $request, $id
        ) {
            $user = auth()->user(); $role = optional($user->role)->name ?? null;
            $item = \App\Models\InformasiAdministrasi::findOrFail($id);
            if ($item->user_id !== $user->id && !in_array($role, ['admin-unit','admin-yayasan','super-admin'])) {
                abort(403);
            }
            $data = $request->only(['judul','isi','deskripsi','tgl']);
            // map submitted fields to model attributes if present
            if (isset($data['judul'])) { $item->judul_informasi = $data['judul']; }
            if (isset($data['isi'])) { $item->deskripsi = $data['isi']; }
            if (isset($data['tgl'])) { $item->tgl = $data['tgl']; }
            $item->save();
            return redirect()->back()->with('success','Informasi diperbarui');
        })->name('administrasi.update');

        // delete (destroy) administrasi
        Route::delete('administrasi/{id}', function ($id) {
            $user = auth()->user(); $role = optional($user->role)->name ?? null;
            $item = \App\Models\InformasiAdministrasi::findOrFail($id);
            // allow deletion if owner or admin-unit/admin-yayasan/super-admin
            if ($item->user_id !== $user->id && !in_array($role, ['admin-unit','admin-yayasan','super-admin'])) {
                abort(403);
            }
            $item->delete();
            return redirect()->back()->with('success', 'Informasi dihapus');
    })->name('administrasi.destroy');

        Route::get('akademik', function () {
            $user = auth()->user(); $role = optional($user->role)->name ?? null;
            $q = \App\Models\InformasiAkademik::query();
            if (! in_array($role, ['super-admin','admin-yayasan'])) {
                if ($role === 'admin-unit') { $q->where('unit', optional($user->unit)->name); } else { $q->where('user_id', $user->id); }
            }
            $rows = $q->orderByDesc('created_at')->get();
            return view('dashboard.kelolainformasi.kelolainformasiakademik', compact('rows'));
        })->name('kelolainformasiakademik');

        // admin actions for akademik
        Route::get('akademik/{id}/edit', function ($id) {
            $user = auth()->user(); $role = optional($user->role)->name ?? null;
            $item = \App\Models\InformasiAkademik::findOrFail($id);
            if ($item->user_id !== $user->id && !in_array($role, ['admin-unit','admin-yayasan','super-admin'])) {
                abort(403);
            }
            return view('dashboard.kelolainformasi.editadministrasi', ['item' => $item]);
        })->name('akademik.edit');

        Route::put('akademik/{id}', function (\Illuminate\Http\Request $request, $id) {
            $user = auth()->user(); $role = optional($user->role)->name ?? null;
            $item = \App\Models\InformasiAkademik::findOrFail($id);
            if ($item->user_id !== $user->id && !in_array($role, ['admin-unit','admin-yayasan','super-admin'])) {
                abort(403);
            }
            $item->judul_informasi = $request->input('judul', $item->judul_informasi);
            $item->deskripsi = $request->input('isi', $item->deskripsi ?? '');
            if ($request->filled('tgl')) { $item->tgl = $request->input('tgl'); }
            $item->save();
            return redirect()->back()->with('success','Informasi diperbarui');
        })->name('akademik.update');

        Route::delete('akademik/{id}', function ($id) {
            $user = auth()->user(); $role = optional($user->role)->name ?? null;
            $item = \App\Models\InformasiAkademik::findOrFail($id);
            if ($item->user_id !== $user->id && !in_array($role, ['admin-unit','admin-yayasan','super-admin'])) {
                abort(403);
            }
            $item->delete();
            return redirect()->back()->with('success','Informasi dihapus');
        })->name('akademik.destroy');

        Route::get('dokumen', function () {
            $user = auth()->user(); $role = optional($user->role)->name ?? null;
            $q = \App\Models\InformasiDokumen::query();
            if (! in_array($role, ['super-admin','admin-yayasan'])) {
                if ($role === 'admin-unit') { $q->where('unit', optional($user->unit)->name); } else { $q->where('user_id', $user->id); }
            }
            $rows = $q->orderByDesc('created_at')->get();
            return view('dashboard.kelolainformasi.kelolainformasidokumen', compact('rows'));
        })->name('kelolainformasidokumen');

        // admin actions for dokumen
        Route::get('dokumen/{id}/edit', function ($id) {
            $user = auth()->user(); $role = optional($user->role)->name ?? null;
            $item = \App\Models\InformasiDokumen::findOrFail($id);
            if ($item->user_id !== $user->id && !in_array($role, ['admin-unit','admin-yayasan','super-admin'])) {
                abort(403);
            }
            return view('dashboard.kelolainformasi.editadministrasi', ['item' => $item]);
        })->name('dokumen.edit');

        Route::put('dokumen/{id}', function (\Illuminate\Http\Request $request, $id) {
            $user = auth()->user(); $role = optional($user->role)->name ?? null;
            $item = \App\Models\InformasiDokumen::findOrFail($id);
            if ($item->user_id !== $user->id && !in_array($role, ['admin-unit','admin-yayasan','super-admin'])) {
                abort(403);
            }
            $item->judul_informasi = $request->input('judul', $item->judul_informasi);
            $item->deskripsi = $request->input('isi', $item->deskripsi ?? '');
            if ($request->filled('tgl')) { $item->tgl = $request->input('tgl'); }
            $item->save();
            return redirect()->back()->with('success','Informasi diperbarui');
        })->name('dokumen.update');

        Route::delete('dokumen/{id}', function ($id) {
            $user = auth()->user(); $role = optional($user->role)->name ?? null;
            $item = \App\Models\InformasiDokumen::findOrFail($id);
            if ($item->user_id !== $user->id && !in_array($role, ['admin-unit','admin-yayasan','super-admin'])) {
                abort(403);
            }
            $item->delete();
            return redirect()->back()->with('success','Informasi dihapus');
        })->name('dokumen.destroy');

        Route::get('kegiatan', function () {
            $user = auth()->user(); $role = optional($user->role)->name ?? null;
            $q = \App\Models\InformasiKegiatan::query();
            if (! in_array($role, ['super-admin','admin-yayasan'])) {
                if ($role === 'admin-unit') { $q->where('unit', optional($user->unit)->name); } else { $q->where('user_id', $user->id); }
            }
            $rows = $q->orderByDesc('created_at')->get();
            return view('dashboard.kelolainformasi.kelolainformasikegiatan', compact('rows'));
        })->name('kelolainformasikegiatan');

        // admin actions for kegiatan
        Route::get('kegiatan/{id}/edit', function ($id) {
            $user = auth()->user(); $role = optional($user->role)->name ?? null;
            $item = \App\Models\InformasiKegiatan::findOrFail($id);
            if ($item->user_id !== $user->id && !in_array($role, ['admin-unit','admin-yayasan','super-admin'])) {
                abort(403);
            }
            return view('dashboard.kelolainformasi.editadministrasi', ['item' => $item]);
        })->name('kegiatan.edit');

        Route::put('kegiatan/{id}', function (\Illuminate\Http\Request $request, $id) {
            $user = auth()->user(); $role = optional($user->role)->name ?? null;
            $item = \App\Models\InformasiKegiatan::findOrFail($id);
            if ($item->user_id !== $user->id && !in_array($role, ['admin-unit','admin-yayasan','super-admin'])) {
                abort(403);
            }
            $item->judul_informasi = $request->input('judul', $item->judul_informasi);
            $item->deskripsi = $request->input('isi', $item->deskripsi ?? '');
            if ($request->filled('tgl')) { $item->tgl = $request->input('tgl'); }
            $item->save();
            return redirect()->back()->with('success','Informasi diperbarui');
        })->name('kegiatan.update');

        Route::delete('kegiatan/{id}', function ($id) {
            $user = auth()->user(); $role = optional($user->role)->name ?? null;
            $item = \App\Models\InformasiKegiatan::findOrFail($id);
            if ($item->user_id !== $user->id && !in_array($role, ['admin-unit','admin-yayasan','super-admin'])) {
                abort(403);
            }
            $item->delete();
            return redirect()->back()->with('success','Informasi dihapus');
        })->name('kegiatan.destroy');

        Route::get('masyarakat', function () {
            $user = auth()->user(); $role = optional($user->role)->name ?? null;
            $q = \App\Models\InformasiMasyarakat::query();
            if (! in_array($role, ['super-admin','admin-yayasan'])) {
                if ($role === 'admin-unit') { $q->where('unit', optional($user->unit)->name); } else { $q->where('user_id', $user->id); }
            }
            $rows = $q->orderByDesc('created_at')->get();
            return view('dashboard.kelolainformasi.kelolainformasimasyarakat', compact('rows'));
        })->name('kelolainformasimasyarakat');

        // admin actions for masyarakat
        Route::get('masyarakat/{id}/edit', function ($id) {
            $user = auth()->user(); $role = optional($user->role)->name ?? null;
            $item = \App\Models\InformasiMasyarakat::findOrFail($id);
            if ($item->user_id !== $user->id && !in_array($role, ['admin-unit','admin-yayasan','super-admin'])) {
                abort(403);
            }
            return view('dashboard.kelolainformasi.editadministrasi', ['item' => $item]);
        })->name('masyarakat.edit');

        Route::put('masyarakat/{id}', function (\Illuminate\Http\Request $request, $id) {
            $user = auth()->user(); $role = optional($user->role)->name ?? null;
            $item = \App\Models\InformasiMasyarakat::findOrFail($id);
            if ($item->user_id !== $user->id && !in_array($role, ['admin-unit','admin-yayasan','super-admin'])) {
                abort(403);
            }
            $item->judul_informasi = $request->input('judul', $item->judul_informasi);
            $item->deskripsi = $request->input('isi', $item->deskripsi ?? '');
            if ($request->filled('tgl')) { $item->tgl = $request->input('tgl'); }
            $item->save();
            return redirect()->back()->with('success','Informasi diperbarui');
        })->name('masyarakat.update');

        Route::delete('masyarakat/{id}', function ($id) {
            $user = auth()->user(); $role = optional($user->role)->name ?? null;
            $item = \App\Models\InformasiMasyarakat::findOrFail($id);
            if ($item->user_id !== $user->id && !in_array($role, ['admin-unit','admin-yayasan','super-admin'])) {
                abort(403);
            }
            $item->delete();
            return redirect()->back()->with('success','Informasi dihapus');
        })->name('masyarakat.destroy');

        Route::get('penasntri', function () {
            $user = auth()->user(); $role = optional($user->role)->name ?? null;
            $q = \App\Models\InformasiPenaSantri::query();
            if (! in_array($role, ['super-admin','admin-yayasan'])) {
                if ($role === 'admin-unit') { $q->where('unit', optional($user->unit)->name); } else { $q->where('user_id', $user->id); }
            }
            $rows = $q->orderByDesc('created_at')->get();
            return view('dashboard.kelolainformasi.kelolainformasiPenasantri', compact('rows'));
        })->name('kelolainformasiPenasantri');

        // admin actions for penasntri (pena santri)
        Route::get('penasntri/{id}/edit', function ($id) {
            $user = auth()->user(); $role = optional($user->role)->name ?? null;
            $item = \App\Models\InformasiPenaSantri::findOrFail($id);
            if ($item->user_id !== $user->id && !in_array($role, ['admin-unit','admin-yayasan','super-admin'])) {
                abort(403);
            }
            return view('dashboard.kelolainformasi.editadministrasi', ['item' => $item]);
        })->name('penasntri.edit');

        Route::put('penasntri/{id}', function (\Illuminate\Http\Request $request, $id) {
            $user = auth()->user(); $role = optional($user->role)->name ?? null;
            $item = \App\Models\InformasiPenaSantri::findOrFail($id);
            if ($item->user_id !== $user->id && !in_array($role, ['admin-unit','admin-yayasan','super-admin'])) {
                abort(403);
            }
            $item->judul_informasi = $request->input('judul', $item->judul_informasi);
            $item->deskripsi = $request->input('isi', $item->deskripsi ?? '');
            if ($request->filled('tgl')) { $item->tgl = $request->input('tgl'); }
            $item->save();
            return redirect()->back()->with('success','Informasi diperbarui');
        })->name('penasntri.update');

        Route::delete('penasntri/{id}', function ($id) {
            $user = auth()->user(); $role = optional($user->role)->name ?? null;
            $item = \App\Models\InformasiPenaSantri::findOrFail($id);
            if ($item->user_id !== $user->id && !in_array($role, ['admin-unit','admin-yayasan','super-admin'])) {
                abort(403);
            }
            $item->delete();
            return redirect()->back()->with('success','Informasi dihapus');
        })->name('penasntri.destroy');

        Route::get('tertutup', function () {
            $user = auth()->user(); $role = optional($user->role)->name ?? null;
            $q = \App\Models\InformasiUmum::query();
            // tertutup management page: only show if admin-yayasan or super-admin; otherwise deny
            if (! in_array($role, ['super-admin','admin-yayasan'])) {
                abort(403);
            }
            $rows = $q->where('kategori', 'tertutup')->orderByDesc('created_at')->get();
            return view('dashboard.kelolainformasi.kelolainformasiTertutup', compact('rows'));
        })->name('kelolainformasiTertutup');

        // admin actions for tertutup (uses InformasiUmum model with kategori=tertutup)
        Route::get('tertutup/{id}/edit', function ($id) {
            $user = auth()->user(); $role = optional($user->role)->name ?? null;
            $item = \App\Models\InformasiUmum::findOrFail($id);
            if ($item->user_id !== $user->id && !in_array($role, ['admin-unit','admin-yayasan','super-admin'])) {
                abort(403);
            }
            return view('dashboard.kelolainformasi.editadministrasi', ['item' => $item]);
        })->name('tertutup.edit');

        Route::put('tertutup/{id}', function (\Illuminate\Http\Request $request, $id) {
            $user = auth()->user(); $role = optional($user->role)->name ?? null;
            $item = \App\Models\InformasiUmum::findOrFail($id);
            if ($item->user_id !== $user->id && !in_array($role, ['admin-unit','admin-yayasan','super-admin'])) {
                abort(403);
            }
            $item->judul_informasi = $request->input('judul', $item->judul_informasi);
            $item->deskripsi = $request->input('isi', $item->deskripsi ?? '');
            if ($request->filled('tgl')) { $item->tgl = $request->input('tgl'); }
            $item->save();
            return redirect()->back()->with('success','Informasi diperbarui');
        })->name('tertutup.update');

        Route::delete('tertutup/{id}', function ($id) {
            $user = auth()->user(); $role = optional($user->role)->name ?? null;
            $item = \App\Models\InformasiUmum::findOrFail($id);
            if ($item->user_id !== $user->id && !in_array($role, ['admin-unit','admin-yayasan','super-admin'])) {
                abort(403);
            }
            $item->delete();
            return redirect()->back()->with('success','Informasi dihapus');
        })->name('tertutup.destroy');

        Route::get('umum', function () {
            $user = auth()->user(); $role = optional($user->role)->name ?? null;
            $q = \App\Models\InformasiUmum::query();
            if (! in_array($role, ['super-admin','admin-yayasan'])) {
                if ($role === 'admin-unit') { $q->where('unit', optional($user->unit)->name); } else { $q->where('user_id', $user->id); }
            }
            $rows = $q->orderByDesc('created_at')->get();
            return view('dashboard.kelolainformasi.kelolainformasiUmum', compact('rows'));
        })->name('kelolainformasiUmum');

        // admin actions for umum (InformasiUmum)
        Route::get('umum/{id}/edit', function ($id) {
            $user = auth()->user(); $role = optional($user->role)->name ?? null;
            $item = \App\Models\InformasiUmum::findOrFail($id);
            if ($item->user_id !== $user->id && !in_array($role, ['admin-unit','admin-yayasan','super-admin'])) {
                abort(403);
            }
            return view('dashboard.kelolainformasi.editadministrasi', ['item' => $item]);
        })->name('umum.edit');

        Route::put('umum/{id}', function (\Illuminate\Http\Request $request, $id) {
            $user = auth()->user(); $role = optional($user->role)->name ?? null;
            $item = \App\Models\InformasiUmum::findOrFail($id);
            if ($item->user_id !== $user->id && !in_array($role, ['admin-unit','admin-yayasan','super-admin'])) {
                abort(403);
            }
            $item->judul_informasi = $request->input('judul', $item->judul_informasi);
            $item->deskripsi = $request->input('isi', $item->deskripsi ?? '');
            if ($request->filled('tgl')) { $item->tgl = $request->input('tgl'); }
            $item->save();
            return redirect()->back()->with('success','Informasi diperbarui');
        })->name('umum.update');

        Route::delete('umum/{id}', function ($id) {
            $user = auth()->user(); $role = optional($user->role)->name ?? null;
            $item = \App\Models\InformasiUmum::findOrFail($id);
            if ($item->user_id !== $user->id && !in_array($role, ['admin-unit','admin-yayasan','super-admin'])) {
                abort(403);
            }
            $item->delete();
            return redirect()->back()->with('success','Informasi dihapus');
        })->name('umum.destroy');
    });
    Route::post('informasiumum', [InformasiUmumController::class, 'store'])
        ->name('informasi.store');
    Route::resource('units', UnitController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);
    Route::post('units/bulk-delete', [UnitController::class, 'bulkDestroy'])->name('units.bulk-delete');
    Route::resource('users', UserController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);
    Route::post('users/bulk-delete', [UserController::class, 'bulkDestroy'])->name('users.bulk-delete');
    Route::post('users/{user}/approve', [UserController::class, 'approve'])->name('users.approve');
    Route::post('users/{user}/status', [UserController::class, 'updateStatus'])->name('users.update-status');
    Route::resource('roles', RoleController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);
    Route::post('roles/bulk-delete', [RoleController::class, 'bulkDestroy'])->name('roles.bulk-delete');
});

// route kelola informasi end

// routes informasi start

Route::get('/dashboard/informasiumum', function () {
    return view('dashboard.informasi.informasiumum');
})->middleware(['auth', 'verified'])->name('dashboard.informasiumum');
Route::get('/dashboard/informasiumum', function () {
    return view('dashboard.informasi.informasiumum');
})->middleware(['auth', 'verified'])->name('dashboard.informasiumum');

Route::get('/dashboard/informasitertutup', function () {
    return view('dashboard.informasi.informasitertutup');
})->middleware(['auth', 'verified'])->name('dashboard.informasitertutup');

Route::get('/dashboard/penasantri', function () {
    return view('dashboard.informasi.penasantri');
})->middleware(['auth', 'verified'])->name('dashboard.penasantri');

Route::get('/dashboard/informasimasyarakat', function () {
    return view('dashboard.informasi.informasimasyarakat');
})->middleware(['auth', 'verified'])->name('dashboard.informasimasyarakat');

Route::get('/dashboard/informasikegiatan', function () {
    return view('dashboard.informasi.informasikegiatan');
})->middleware(['auth', 'verified'])->name('dashboard.informasikegiatan');



Route::get('/dashboard/informasiakademik', function () {
    return view('dashboard.informasi.informasiakademik');
})->middleware(['auth', 'verified'])->name('dashboard.informasiakademik');

Route::get('/dashboard/informasiadministrasi', function () {
    return view('dashboard.informasi.informasiadministrasi');
})->middleware(['auth', 'verified'])->name('dashboard.informasiadministrasi');

// informasi end

//end dashboard routes


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
Fortify::loginView(function () {
    return view('auth.login');
});
