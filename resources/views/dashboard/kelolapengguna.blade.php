<!DOCTYPE html>
<html lang="en">

<head>
  @include('dashboard.partials.head')
</head>

<body>
  <!-- ======== Preloader =========== -->
  <div id="preloader">
    <div class="spinner"></div>
  </div>
  <!-- ======== Preloader =========== -->

  <!-- ======== sidebar-nav start =========== -->
  @include('dashboard.partials.sidebar')
  <!-- ======== sidebar-nav end ============ -->

  <!-- ======== main-wrapper start =========== -->
  <main class="main-wrapper">
    <!-- ========== header start ========== -->
    @include('dashboard.partials.header')
    <!-- ========== header end ========== -->
    <!-- ========== section start ========== -->
    <section class="section">
      <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
          <div class="row align-items-center">
            <div class="col-md-6">
              <div class="title d-flex align-items-center flex-wrap">
                <h2 class="mr-40">Kelola Pengguna</h2>
                <a href="#tambahInformasidokumen" data-bs-toggle="modal" class="main-btn primary-btn btn-hover btn-sm">
                  <i class="lni lni-plus mr-5"></i> Tambah Pengguna
                </a>
              </div>
              <!-- Modal Tambah Informasi -->
              <div class="modal fade" id="tambahInformasidokumen" tabindex="-1"
                aria-labelledby="tambahInformasidokumenLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl"> {{-- ubah ke modal-xl biar modal lebih lebar --}}
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="tambahInformasidokumenLabel">Tambah Pengguna
                        Baru</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                              <form action="{{ route('dashboard.users.store') }}" method="POST">
                        @csrf
                        <div class="row">
                          <div class="col-12"> {{-- full width --}}
                            <div class="card-style mb-30">
                              <h6 class="mb-25">Informasi Data Akun</h6>
                              <div class="input-style-1">
                                <label>Nama Lengkap</label>
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required />
                                @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                              </div>

                              <div class="input-style-1">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email" required />
                                @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                              </div>
                            </div>

                            <div class="card-style mb-30">
                              <h6 class="mb-25">Unit</h6>
                              <div class="select-style-1">
                                <label>Pilih Unit</label>
                                <div class="select-position">
                                  <select name="unit_id">
                                    <option value="">-- Pilih unit --</option>
                                    @if(isset($units))
                                      @foreach($units as $unit)
                                        <option value="{{ $unit->id }}" {{ old('unit_id') == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
                                      @endforeach
                                    @endif
                                  </select>
                                </div>
                              </div>
                            </div>

                            <div class="card-style mb-30">
                              <h6 class="mb-25">Role</h6>
                              <div class="select-style-1">
                                <label>Pilih Role</label>
                                <div class="select-position">
                                  <select name="role_id" required>
                                    <option value="">-- Pilih role --</option>
                                    @if(isset($roles))
                                      @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                      @endforeach
                                    @endif
                                  </select>
                                  @error('role_id') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                              </div>
                            </div>

                            <div class="card-style mb-30">
                              <h6 class="mb-25">Kata Sandi</h6>
                              <div class="input-style-1">
                                <label>Password</label>
                                <input type="password" name="password" required />
                                @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                              </div>
                              <div class="input-style-1">
                                <label>Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" required />
                              </div>
                            </div>

                            {{-- optional additional fields can be added here --}}
                          </div>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="main-btn danger-btn btn-hover btn-sm"
                            data-bs-dismiss="modal">Batal</button>
                          <button type="submit" class="main-btn primary-btn btn-hover btn-sm">Simpan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>


            </div>
            <!-- end col -->
            <div class="col-md-6">
              <div class="breadcrumb-wrapper">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="#0">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Kelola Pengguna
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
            <div class="col-12">

            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        </div>
        <!-- ========== title-wrapper end ========== -->

        <!-- ========== tables-wrapper start ========== -->
        <div class="card-style mb-30">
          <div class="title d-flex flex-wrap align-items-center justify-content-between">
            <div class="left">
              <form id="bulk-delete-form" action="{{ route('dashboard.users.bulk-delete') }}" method="POST">
                @csrf
                <input type="hidden" name="ids" id="bulk-ids" />
                <button type="submit" class="btn btn-danger btn-hover btn-sm ">Hapus Terpilih</button>
              </form>
            </div>
            <div class="right">
              <form method="GET" class="d-flex gap-2">
                <div class="select-style-1">
                  <div class="select-position select-sm">
                    <select name="period" class="light-bg">
                      <option value="all" {{ (isset($period) && $period == 'all') ? 'selected' : '' }}>Semua</option>
                      <option value="today" {{ (isset($period) && $period == 'today') ? 'selected' : '' }}>Hari Ini</option>
                      <option value="week" {{ (isset($period) && $period == 'week') ? 'selected' : '' }}>Minggu Ini</option>
                      <option value="month" {{ (isset($period) && $period == 'month') ? 'selected' : '' }}>Bulan Ini</option>
                      <option value="year" {{ (isset($period) && $period == 'year') ? 'selected' : '' }}>Tahun Ini</option>
                    </select>
                  </div>
                </div>

                <div class="select-style-1">
                  <div class="select-position select-sm">
                    <select name="per_page" class="light-bg">
                      <option value="10" {{ (isset($perPage) && $perPage == 10) ? 'selected' : '' }}>Tampilkan 10 Data</option>
                      <option value="50" {{ (isset($perPage) && $perPage == 50) ? 'selected' : '' }}>Tampilkan 50 Data</option>
                      <option value="100" {{ (isset($perPage) && $perPage == 100) ? 'selected' : '' }}>Tampilkan 100 Data</option>
                      <option value="0" {{ (isset($perPage) && $perPage == 0) ? 'selected' : '' }}>Tampilkan Semua Data</option>
                    </select>
                  </div>
                </div>

                <div>
                  <button class="btn btn-primary btn-hover btn-sm" type="submit">Filter</button>
                </div>
              </form>
              
              <!-- end select -->
            </div>
          </div>
          <!-- End Title -->
          <div class="table-responsive">
            <table class="table top-selling-table">
              <thead>
                <tr>
                  <th style="width:40px;">
                    <input type="checkbox" id="bulk-select-all" />
                  </th>
                  <th>
                    <h6 class="text-sm text-medium">Nama</h6>
                  </th>
                  <th class="min-width">
                    <h6 class="text-sm text-medium">
                      Unit <i class="lni lni-arrows-vertical"></i>
                    </h6>
                  </th>
                  <th class="min-width">
                    <h6 class="text-sm text-medium">
                      Role <i class="lni lni-arrows-vertical"></i>
                    </h6>
                  </th>
                  <th class="min-width">
                    <h6 class="text-sm text-medium">
                      Status <i class="lni lni-arrows-vertical"></i>
                    </h6>
                  </th>
                  <th>
                    <h6 class="text-sm text-medium text-end">
                      Aksi <i class="lni lni-arrows-vertical"></i>
                    </h6>
                  </th>
                </tr>
              </thead>
              <tbody>
                @php $usersList = $users ?? collect(); @endphp
                @forelse($usersList as $user)
                <tr>
                  <td>
                    <input type="checkbox" class="bulk-checkbox" value="{{ $user->id }}" />
                  </td>
                  <td>
                    <div class="product">
                      <div class="image">
                        @if(!empty($user->photo))
                        <img src="{{ asset('storage/'.$user->photo) }}" alt="" />
                        @else
                        <img src="{{ asset('build/assets/images/products/product-mini-1.jpg') }}" alt="" />
                        @endif
                      </div>
                      <p class="text-sm">{{ $user->name ?? ($user->nama_lengkap ?? '—') }}</p>
                    </div>
                  </td>
                  <td>
                    <p class="text-sm">{{ optional($user->unit)->name ?? '-' }}</p>
                  </td>
                  <td>
                    @php
                      // Support both singular relation (role) and collection (roles)
                      $roleNames = '-';
                      if (isset($user->role) && $user->role) {
                        $roleNames = $user->role->name ?? '-';
                      } elseif (isset($user->roles) && $user->roles && $user->roles->count()) {
                        $roleNames = $user->roles->pluck('name')->join(', ');
                      }
                    @endphp
                    <p class="text-sm">{{ $roleNames }}</p>
                  </td>
                  <td>
                    @php
                      // Build roles collection for checks
                      $rolesColl = collect();
                      if (isset($user->role) && $user->role) {
                        $rolesColl->push($user->role);
                      }
                      if (isset($user->roles) && $user->roles) {
                        $rolesColl = $rolesColl->merge($user->roles);
                      }

                      // determine if the current logged-in user can edit statuses
                      $current = auth()->user();
                      $canEditStatus = false;
                      if ($current && optional($current->role)->name) {
                          $cr = strtolower(optional($current->role)->name);
                          if (in_array($cr, ['super admin','super_admin','superadmin','admin yayasan','admin_yayasan','adminyayasan'])) {
                              $canEditStatus = true;
                          }
                      }

                      // determine current user's status and mapping
                      $status = strtolower((string) ($user->status ?? 'pending'));
                      $statusMap = [
                        'active' => ['class' => 'success-btn', 'label' => 'Aktif'],
                        'pending' => ['class' => 'warning-btn', 'label' => 'Tertunda'],
                        'rejected' => ['class' => 'close-btn', 'label' => 'Ditolak'],
                      ];
                      $cur = $statusMap[$status] ?? $statusMap['pending'];
                    @endphp

                    @if($canEditStatus)
                      <form method="POST" action="{{ route('dashboard.users.update-status', $user) }}" class="d-inline">
                        @csrf
                        <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                          <option value="active" {{ $status === 'active' ? 'selected' : '' }}>Aktif</option>
                          <option value="pending" {{ $status === 'pending' ? 'selected' : '' }}>Tertunda</option>
                          <option value="rejected" {{ $status === 'rejected' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                      </form>
                    @else
                      <span class="status-btn {{ $cur['class'] }}">{{ $cur['label'] }}</span>
                    @endif
                  </td>
                  <td>
                  <div class="action justify-content-end">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->id }}" title="Edit Pengguna">
                      <i class="lni lni-pencil"></i>
                    </button>

                    <!-- Edit User Modal -->
                    <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="editUserModalLabel{{ $user->id }}" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="editUserModalLabel{{ $user->id }}">Edit Pengguna - {{ $user->name ?? ($user->nama_lengkap ?? 'User') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="{{ route('dashboard.users.update', $user) }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <div class="input-style-1">
                                <label>Nama Lengkap</label>
                                <input type="text" name="name" value="{{ old('name', $user->name ?? $user->nama_lengkap) }}" required />
                              </div>
                              <div class="input-style-1">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}" required />
                              </div>
                              <div class="input-style-1">
                                <label>Foto Pengguna (opsional)</label>
                                <input type="file" name="photo" accept="image/*" />
                                @if(!empty($user->photo))
                                  <div style="margin-top:8px;"><img src="{{ asset('storage/'.$user->photo) }}" style="width:100px;height:100px;object-fit:cover;border-radius:6px;" /></div>
                                @endif
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="main-btn danger-btn btn-hover btn-sm" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="main-btn primary-btn btn-hover btn-sm">Simpan</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Removed more-actions dropdown as requested; keep only the pencil modal edit button -->
                    </div>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="6" class="text-center">Tidak ada data pengguna.</td>
                </tr>
                @endforelse
              </tbody>
            </table>
            <!-- End Table -->
            <div class="d-flex justify-content-end">
              {{ $usersList->links() ?? '' }}
            </div>
          </div>
        </div>
        <!-- ========== tables-wrapper end ========== -->
      </div>
      <!-- end container -->
    </section>
    <!-- ========== section end ========== -->

    <!-- ========== footer start =========== -->
    @include('dashboard.partials.footer')
    <!-- ========== footer end =========== -->
  </main>
  <!-- ======== main-wrapper end =========== -->

  <!-- ========== script start =========== -->
  @include('dashboard.partials.script')
  <!-- Inline bulk script removed; centralized script in partial handles interactions -->
  <!-- ========== script end =========== -->
</body>

</html>