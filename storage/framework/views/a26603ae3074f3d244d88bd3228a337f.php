<!DOCTYPE html>
<html lang="en">

<head>
  <?php echo $__env->make('dashboard.partials.head', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</head>

<body>
  <!-- ======== Preloader =========== -->
  <div id="preloader">
    <div class="spinner"></div>
  </div>
  <!-- ======== Preloader =========== -->

  <!-- ======== sidebar-nav start =========== -->
  <?php echo $__env->make('dashboard.partials.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  <!-- ======== sidebar-nav end ============ -->

  <!-- ======== main-wrapper start =========== -->
  <main class="main-wrapper">
    <!-- ========== header start ========== -->
    <?php echo $__env->make('dashboard.partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
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
                <div class="modal-dialog modal-xl"> 
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="tambahInformasidokumenLabel">Tambah Pengguna
                        Baru</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                              <form action="<?php echo e(route('dashboard.users.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                          <div class="col-12"> 
                            <div class="card-style mb-30">
                              <h6 class="mb-25">Informasi Data Akun</h6>
                              <div class="input-style-1">
                                <label>Nama Lengkap</label>
                                <input type="text" name="name" value="<?php echo e(old('name')); ?>" placeholder="Masukkan nama lengkap" required />
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>

                              <div class="input-style-1">
                                <label>Email</label>
                                <input type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="Masukkan email" required />
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                            </div>

                            <div class="card-style mb-30">
                              <h6 class="mb-25">Unit</h6>
                              <div class="select-style-1">
                                <label>Pilih Unit</label>
                                <div class="select-position">
                                  <select name="unit_id">
                                    <option value="">-- Pilih unit --</option>
                                    <?php if(isset($units)): ?>
                                      <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($unit->id); ?>" <?php echo e(old('unit_id') == $unit->id ? 'selected' : ''); ?>><?php echo e($unit->name); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
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
                                    <?php if(isset($roles)): ?>
                                      <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($role->id); ?>" <?php echo e(old('role_id') == $role->id ? 'selected' : ''); ?>><?php echo e($role->name); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                  </select>
                                  <?php $__errorArgs = ['role_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                              </div>
                            </div>

                            <div class="card-style mb-30">
                              <h6 class="mb-25">Kata Sandi</h6>
                              <div class="input-style-1">
                                <label>Password</label>
                                <input type="password" name="password" required />
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                              <div class="input-style-1">
                                <label>Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" required />
                              </div>
                            </div>

                            
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
              <form id="bulk-delete-form" action="<?php echo e(route('dashboard.users.bulk-delete')); ?>" method="POST" onsubmit="return confirm('Hapus Pengguna terpilih?');">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="ids" id="bulk-ids" />
                <button type="submit" class="btn btn-danger btn-hover btn-sm ">Hapus Terpilih</button>
              </form>
            </div>
            <div class="right">
              <form method="GET" class="d-flex gap-2">
                <div class="select-style-1">
                  <div class="select-position select-sm">
                    <select name="period" class="light-bg">
                      <option value="all" <?php echo e((isset($period) && $period == 'all') ? 'selected' : ''); ?>>Semua</option>
                      <option value="today" <?php echo e((isset($period) && $period == 'today') ? 'selected' : ''); ?>>Hari Ini</option>
                      <option value="week" <?php echo e((isset($period) && $period == 'week') ? 'selected' : ''); ?>>Minggu Ini</option>
                      <option value="month" <?php echo e((isset($period) && $period == 'month') ? 'selected' : ''); ?>>Bulan Ini</option>
                      <option value="year" <?php echo e((isset($period) && $period == 'year') ? 'selected' : ''); ?>>Tahun Ini</option>
                    </select>
                  </div>
                </div>

                <div class="select-style-1">
                  <div class="select-position select-sm">
                    <select name="per_page" class="light-bg">
                      <option value="10" <?php echo e((isset($perPage) && $perPage == 10) ? 'selected' : ''); ?>>Tampilkan 10 Data</option>
                      <option value="50" <?php echo e((isset($perPage) && $perPage == 50) ? 'selected' : ''); ?>>Tampilkan 50 Data</option>
                      <option value="100" <?php echo e((isset($perPage) && $perPage == 100) ? 'selected' : ''); ?>>Tampilkan 100 Data</option>
                      <option value="0" <?php echo e((isset($perPage) && $perPage == 0) ? 'selected' : ''); ?>>Tampilkan Semua Data</option>
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
                <?php $usersList = $users ?? collect(); ?>
                <?php $__empty_1 = true; $__currentLoopData = $usersList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                  <td>
                    <input type="checkbox" class="bulk-checkbox" value="<?php echo e($user->id); ?>" />
                  </td>
                  <td>
                    <div class="product">
                      <div class="image">
                        <?php if(!empty($user->photo)): ?>
                        <img src="<?php echo e(asset('storage/'.$user->photo)); ?>" alt="" />
                        <?php else: ?>
                        <img src="<?php echo e(asset('build/assets/images/products/product-mini-1.jpg')); ?>" alt="" />
                        <?php endif; ?>
                      </div>
                      <p class="text-sm"><?php echo e($user->name ?? ($user->nama_lengkap ?? '—')); ?></p>
                    </div>
                  </td>
                  <td>
                    <p class="text-sm"><?php echo e(optional($user->unit)->name ?? '-'); ?></p>
                  </td>
                  <td>
                    <?php
                      // Support both singular relation (role) and collection (roles)
                      $roleNames = '-';
                      if (isset($user->role) && $user->role) {
                        $roleNames = $user->role->name ?? '-';
                      } elseif (isset($user->roles) && $user->roles && $user->roles->count()) {
                        $roleNames = $user->roles->pluck('name')->join(', ');
                      }
                    ?>
                    <p class="text-sm"><?php echo e($roleNames); ?></p>
                  </td>
                  <td>
                    <?php
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
                    ?>

                    <?php if($canEditStatus): ?>
                      <form method="POST" action="<?php echo e(route('dashboard.users.update-status', $user)); ?>" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                          <option value="active" <?php echo e($status === 'active' ? 'selected' : ''); ?>>Aktif</option>
                          <option value="pending" <?php echo e($status === 'pending' ? 'selected' : ''); ?>>Tertunda</option>
                          <option value="rejected" <?php echo e($status === 'rejected' ? 'selected' : ''); ?>>Ditolak</option>
                        </select>
                      </form>
                    <?php else: ?>
                      <span class="status-btn <?php echo e($cur['class']); ?>"><?php echo e($cur['label']); ?></span>
                    <?php endif; ?>
                  </td>
                  <td>
                  <div class="action justify-content-end">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#editUserModal<?php echo e($user->id); ?>" title="Edit Pengguna">
                      <i class="lni lni-pencil"></i>
                    </button>

                    <!-- Edit User Modal -->
                    <div class="modal fade" id="editUserModal<?php echo e($user->id); ?>" tabindex="-1" aria-labelledby="editUserModalLabel<?php echo e($user->id); ?>" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="editUserModalLabel<?php echo e($user->id); ?>">Edit Pengguna - <?php echo e($user->name ?? ($user->nama_lengkap ?? 'User')); ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="<?php echo e(route('dashboard.users.update', $user)); ?>" method="POST" enctype="multipart/form-data">
                              <?php echo csrf_field(); ?>
                              <?php echo method_field('PUT'); ?>
                              <div class="input-style-1">
                                <label>Nama Lengkap</label>
                                <input type="text" name="name" value="<?php echo e(old('name', $user->name ?? $user->nama_lengkap)); ?>" required />
                              </div>
                              <div class="input-style-1">
                                <label>Email</label>
                                <input type="email" name="email" value="<?php echo e(old('email', $user->email)); ?>" required />
                              </div>
                              <div class="input-style-1">
                                <label>Foto Pengguna (opsional)</label>
                                <input type="file" name="photo" accept="image/*" />
                                <?php if(!empty($user->photo)): ?>
                                  <div style="margin-top:8px;"><img src="<?php echo e(asset('storage/'.$user->photo)); ?>" style="width:100px;height:100px;object-fit:cover;border-radius:6px;" /></div>
                                <?php endif; ?>
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                  <td colspan="6" class="text-center">Tidak ada data pengguna.</td>
                </tr>
                <?php endif; ?>
              </tbody>
            </table>
            <!-- End Table -->
            <div class="d-flex justify-content-end">
              <?php echo e($usersList->links() ?? ''); ?>

            </div>
          </div>
        </div>
        <!-- ========== tables-wrapper end ========== -->
      </div>
      <!-- end container -->
    </section>
    <!-- ========== section end ========== -->

    <!-- ========== footer start =========== -->
    <?php echo $__env->make('dashboard.partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <!-- ========== footer end =========== -->
  </main>
  <!-- ======== main-wrapper end =========== -->

  <!-- ========== script start =========== -->
  <?php echo $__env->make('dashboard.partials.script', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  <script>
    (function () {
      const selectAll = document.getElementById('bulk-select-all');
      const checkboxes = document.querySelectorAll('.bulk-checkbox');
      const bulkForm = document.getElementById('bulk-delete-form');
      const bulkIds = document.getElementById('bulk-ids');

      if (selectAll) {
        selectAll.addEventListener('change', function () {
          checkboxes.forEach(cb => cb.checked = selectAll.checked);
        });
      }

      if (bulkForm) {
        bulkForm.addEventListener('submit', function (e) {
          const ids = Array.from(document.querySelectorAll('.bulk-checkbox:checked')).map(cb => cb.value);
          if (ids.length === 0) {
            e.preventDefault();
            alert('Pilih minimal satu pengguna untuk dihapus');
            return false;
          }
          bulkIds.value = ids.join(',');
        });
      }
    })();
  </script>
  <!-- ========== script end =========== -->
</body>

</html><?php /**PATH C:\Users\Danir\pinha\resources\views\dashboard\kelolapengguna.blade.php ENDPATH**/ ?>