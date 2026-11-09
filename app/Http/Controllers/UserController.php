<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\Unit;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $perPage = (int) $request->query('per_page', 10);
        $query = User::with(['role','unit']);

        // enforce role-based visibility server-side
        $current = Auth::user();
        if ($current) {
            $roleName = strtolower(optional($current->role)->name ?? '');
            // If user is 'user umum' deny access (or show empty)
            if ($roleName === 'user umum' || $roleName === 'user_umum' || $roleName === 'user') {
                // return empty paginator
                $collection = collect();
                $users = new LengthAwarePaginator([], 0, $perPage > 0 ? $perPage : 1, 1, ['path' => $request->url(), 'query' => $request->query()]);
                $roles = Role::all();
                $units = Unit::all();
                return view('dashboard.kelolapengguna', compact('users','roles','units'));
            }

            // Admin Unit: only users in same unit
            if ($roleName === 'admin unit' || $roleName === 'admin_unit' || $roleName === 'adminunit') {
                $query->where('unit_id', $current->unit_id);
            }
            // Admin Yayasan and Super Admin see all users (no extra filter)
        }

        if ($perPage <= 0) {
            $collection = $query->get();
            $users = new LengthAwarePaginator(
                $collection->forPage(1, $collection->count()),
                $collection->count(),
                $collection->count(),
                1,
                ['path' => $request->url(), 'query' => $request->query()]
            );
        } else {
            $users = $query->paginate($perPage)->appends($request->query());
        }

        $roles = Role::all();
        $units = Unit::all();

        return view('dashboard.kelolapengguna', compact('users','roles','units'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'role_id' => 'required|exists:roles,id',
            'unit_id' => 'nullable|exists:units,id',
        ]);

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->role_id = $data['role_id'];
        $user->unit_id = $data['unit_id'] ?? null;
        $user->status = 'pending';
        $user->save();

        return redirect()->route('dashboard.kelolapengguna')->with('success', 'Pengguna baru berhasil ditambahkan dan menunggu persetujuan.');
    }

    public function bulkDestroy(Request $request)
    {
        $ids = $request->input('ids', []);
        if (is_string($ids)) {
            $ids = array_filter(explode(',', $ids));
        }

        if (!is_array($ids) || empty($ids)) {
            return redirect()->back()->with('error', 'Pilih setidaknya satu pengguna untuk dihapus.');
        }

        User::whereIn('id', $ids)->delete();

        return redirect()->route('dashboard.kelolapengguna')->with('success', 'Pengguna terpilih berhasil dihapus.');
    }

    public function approve(User $user)
    {
        // set as active and mark email verified
        $user->status = 'active';
        $user->email_verified_at = Carbon::now();
        $user->save();

        return redirect()->route('dashboard.kelolapengguna')->with('success', 'Pengguna telah disetujui.');
    }

    /**
     * Update a user's status (active, pending, rejected)
     */
    public function updateStatus(Request $request, User $user)
    {
        $current = auth()->user();
        $allowed = false;
        if ($current && optional($current->role)->name) {
            $rn = strtolower(optional($current->role)->name);
            if (in_array($rn, ['super admin','super_admin','superadmin','admin yayasan','admin_yayasan','adminyayasan'])) {
                $allowed = true;
            }
        }

        if (! $allowed) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengubah status pengguna.');
        }

        $data = $request->validate([
            'status' => 'required|in:active,pending,rejected'
        ]);

        $user->status = $data['status'];
        if ($data['status'] === 'active' && empty($user->email_verified_at)) {
            $user->email_verified_at = Carbon::now();
        }
        $user->save();

        return redirect()->route('dashboard.kelolapengguna')->with('success', 'Status pengguna diperbarui.');
    }
}
