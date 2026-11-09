<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Pagination\LengthAwarePaginator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // default filter/pagination params
        $period = request()->query('period', 'all');
        $perPage = (int) request()->query('per_page', 10);
        $startDate = request()->query('start_date');
        $endDate = request()->query('end_date');
        $sortBy = request()->query('sort_by', 'created_at');
        $sortDir = request()->query('sort_dir', 'desc');

        $query = Role::with('users');

        if (in_array($sortBy, ['name', 'created_at']) && in_array($sortDir, ['asc', 'desc'])) {
            $query->orderBy($sortBy, $sortDir);
        } else {
            $query->orderBy('created_at', 'desc');
        }

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
                break;
        }

        if ($startDate) {
            $query->whereDate('created_at', '>=', $startDate);
        }
        if ($endDate) {
            $query->whereDate('created_at', '<=', $endDate);
        }

        if ($perPage <= 0) {
            $collection = $query->get();
            $roles = new LengthAwarePaginator(
                $collection->forPage(1, $collection->count()),
                $collection->count(),
                $collection->count(),
                1,
                ['path' => request()->url(), 'query' => request()->query()]
            );
        } else {
            $roles = $query->paginate($perPage)->appends(request()->query());
        }

        return view('dashboard.kelolarole', compact('roles', 'period', 'perPage'));
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
            $path = $request->file('photo')->store('roles', 'public');
            $data['photo'] = $path;
        }

        Role::create($data);

        return redirect()->route('dashboard.kelolarole')->with('success', 'Role berhasil ditambahkan.');
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
        $role = Role::with('users')->findOrFail($id);
        return view('dashboard.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Bulk delete roles
     */
    public function bulkDestroy(Request $request)
    {
        $ids = $request->input('ids', []);
        if (is_string($ids)) {
            $ids = array_filter(explode(',', $ids));
        }

        if (!is_array($ids) || empty($ids)) {
            return redirect()->back()->with('error', 'Pilih setidaknya satu role untuk dihapus.');
        }

    Role::whereIn('id', $ids)->delete();

        return redirect()->route('dashboard.kelolarole')->with('success', 'Role terpilih berhasil dihapus.');
    }
}
