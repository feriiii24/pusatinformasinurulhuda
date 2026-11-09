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
                <h2 class="mr-40">Kelola Role</h2>
                <a href="#tambahInformasidokumen" data-bs-toggle="modal" class="main-btn primary-btn btn-hover btn-sm">
                  <i class="lni lni-plus mr-5"></i> Tambah Role
                </a>
              </div>
              <!-- Modal Tambah Informasi -->
              <div class="modal fade" id="tambahInformasidokumen" tabindex="-1"
                aria-labelledby="tambahInformasidokumenLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl"> 
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="tambahInformasidokumenLabel">Tambah Role Baru</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="<?php echo e(route('dashboard.roles.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                          <div class="col-12">
                            <div class="card-style mb-30">
                              <h6 class="mb-25">Tambah Role</h6>

                              <div class="input-style-1">
                                <label>Nama Role</label>
                                <input type="text" name="name" placeholder="Masukkan nama role" required />
                              </div>

                              <div class="input-style-1">
                                <label>Foto Role</label>
                                <input type="file" name="photo" accept="image/*" />
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
                      Kelola Role
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
                    
                  <th>
                    <h6 class="text-sm text-medium">No</h6>
                  </th>
                  <th class="min-width">
                    <h6 class="text-sm text-medium">
                      Nama <i class="lni lni-arrows-vertical"></i>
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
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td>
                      <p class="text-sm"><?php echo e(($roles->currentPage() - 1) * $roles->perPage() + $index + 1); ?></p>
                    </td>
                    <td>
                      <div class="product">
                        <div class="image">
                          <?php if($role->photo ?? false): ?>
                            <img src="<?php echo e(asset('storage/' . $role->photo)); ?>" alt="<?php echo e($role->name); ?>" />
                          <?php else: ?>
                            <img src="<?php echo e(asset('build/assets/images/products/product-mini-4.jpg')); ?>" alt="default" />
                          <?php endif; ?>
                        </div>
                        <p class="text-sm"><?php echo e($role->name); ?></p>
                      </div>
                    </td>
                    
                    <td>
                      <div class="action justify-content-end">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#editRoleModal<?php echo e($role->id); ?>" title="Edit Role" aria-label="Edit Role">
                          <i class="lni lni-pencil"></i>
                        </button>
                        <!-- Delete Button -->
                        <button type="button" class="btn btn-sm btn-light" data-role-id="<?php echo e($role->id); ?>" data-role-name="<?php echo e($role->name); ?>" data-delete-url="<?php echo e(route('dashboard.roles.destroy', $role->id)); ?>" title="Hapus Role" aria-label="Hapus Role">
                            <svg class="text-danger" width="25" height="25" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                              <rect x="5" y="5" width="6" height="7" rx="1" />
                              <rect x="4" y="3" width="8" height="1" rx="0.5" />
                              <rect x="6" y="1.8" width="4" height="0.9" rx="0.45" />
                            </svg>
                        </button>
                      </div>

                      <!-- Edit Role Modal -->
                      <div class="modal fade" id="editRoleModal<?php echo e($role->id); ?>" tabindex="-1" aria-labelledby="editRoleModalLabel<?php echo e($role->id); ?>" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="editRoleModalLabel<?php echo e($role->id); ?>">Edit Role - <?php echo e($role->name); ?></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="<?php echo e(route('dashboard.roles.update', $role->id)); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="input-style-1">
                                  <label>Nama Role</label>
                                  <input type="text" name="name" value="<?php echo e(old('name', $role->name)); ?>" required />
                                </div>
                                <div class="input-style-1">
                                  <label>Foto Role (opsional)</label>
                                  <input type="file" name="photo" accept="image/*" />
                                  <?php if($role->photo): ?>
                                    <div style="margin-top:8px;"><img src="<?php echo e(asset('storage/'.$role->photo)); ?>" style="width:100px;height:100px;object-fit:cover;border-radius:6px;" /></div>
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
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
            <div class="mt-3">
              <?php echo e($roles->links()); ?>

            </div>
            <!-- centralized dashboard JS handles interactions -->
            <!-- End Table -->
          </div>
        </div>
      </div>
    </section>
    <?php echo $__env->make('dashboard.partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <!-- ========== footer end =========== -->
  </main>
  <!-- ======== main-wrapper end =========== -->

  <!-- ========== script start =========== -->
  <?php echo $__env->make('dashboard.partials.script', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  <!-- ========== script end =========== -->
</body>

</html><?php /**PATH C:\Users\Danir\pinha\resources\views/dashboard/kelolarole.blade.php ENDPATH**/ ?>