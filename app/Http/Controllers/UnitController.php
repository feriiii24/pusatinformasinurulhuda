<?php

namespace App\Http\Controllers;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil filter dari query string
    $period = $request->query('period', 'all'); // today, week, month, year, all
    $perPage = (int) $request->query('per_page', 10);
    $startDate = $request->query('start_date');
    $endDate = $request->query('end_date');
    $sortBy = $request->query('sort_by', 'created_at');
    $sortDir = $request->query('sort_dir', 'desc');

        $query = Unit::with('users');

        // Role-based visibility: if current user is 'user umum' hide (return empty),
        // if 'admin unit' only show their unit, admin yayasan and super admin see all.
        $current = auth()->user();
        if ($current && optional($current->role)->name) {
            $r = strtolower(optional($current->role)->name);
            if (in_array($r, ['user umum','user_umum','user'])) {
                $collection = collect();
                $units = new LengthAwarePaginator([], 0, $perPage > 0 ? $perPage : 1, 1, ['path' => $request->url(), 'query' => $request->query()]);
                return view('dashboard.kelolaunit', compact('units', 'period', 'perPage'));
            }

            if (in_array($r, ['admin unit','admin_unit','adminunit'])) {
                // show only the unit that matches current user's unit_id
                $query->where('id', $current->unit_id);
            }
            // admin yayasan and super admin see all
        }

        // apply sorting
        if (in_array($sortBy, ['name', 'created_at']) && in_array($sortDir, ['asc', 'desc'])) {
            $query->orderBy($sortBy, $sortDir);
        } else {
            $query->orderBy('created_at', 'desc');
        }

    // terapkan filter periode
        switch ($period) {
            case 'today':
                $query->whereDate('created_at', now()->toDateString());
                break;
            case 'week':
                $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                break;
            case 'month':
                $query->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year);
                break;
            case 'year':
                $query->whereYear('created_at', now()->year);
                break;
            case 'all':
            default:
                // no filter
                break;
        }

        // apply custom date range if provided
        if ($startDate) {
            $query->whereDate('created_at', '>=', $startDate);
        }
        if ($endDate) {
            $query->whereDate('created_at', '<=', $endDate);
        }

        if ($perPage <= 0) {
            $collection = $query->get();
            $units = new LengthAwarePaginator(
                $collection->forPage(1, $collection->count()),
                $collection->count(),
                $collection->count(),
                1,
                ['path' => $request->url(), 'query' => $request->query()]
            );
        } else {
            $units = $query->paginate($perPage)->appends($request->query());
        }

        return view('dashboard.kelolaunit', compact('units', 'period', 'perPage'));
    }

    /**
     * Bulk delete units
     */
    public function bulkDestroy(Request $request)
    {
        $ids = $request->input('ids', []);
        if (is_string($ids)) {
            $ids = array_filter(explode(',', $ids));
        }

        if (!is_array($ids) || empty($ids)) {
            return redirect()->back()->with('error', 'Pilih setidaknya satu unit untuk dihapus.');
        }

        Unit::whereIn('id', $ids)->delete();

        return redirect()->route('dashboard.units.index')->with('success', 'Unit terpilih berhasil dihapus.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('units', 'public');
            $data['photo'] = $path;
        }

        Unit::create($data);

        return redirect()->route('dashboard.units.index')->with('success', 'Unit berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $unit = Unit::findOrFail($id);
        return view('dashboard.units.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $unit = Unit::findOrFail($id);
        $unit->update($data);

        return redirect()->route('dashboard.units.index')->with('success', 'Unit berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();

        return redirect()->route('dashboard.units.index')->with('success', 'Unit berhasil dihapus.');
    }
}
