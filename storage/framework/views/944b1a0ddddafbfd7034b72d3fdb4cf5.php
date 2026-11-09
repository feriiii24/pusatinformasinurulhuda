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
                <h2 class="mr-40">Kelola Unit</h2>
                <a href="#tambahInformasidokumen" data-bs-toggle="modal" class="main-btn primary-btn btn-hover btn-sm">
                  <i class="lni lni-plus mr-5"></i> Tambah Unit
                </a>
              </div>
              <!-- Modal Tambah Informasi -->
              <div class="modal fade" id="tambahInformasidokumen" tabindex="-1"
                aria-labelledby="tambahInformasidokumenLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl"> 
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="tambahInformasidokumenLabel">Tambah Unit Baru</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="<?php echo e(route('dashboard.units.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                          <div class="col-12">
                            <div class="card-style mb-30">
                              <h6 class="mb-25">Tambah Unit</h6>

                              <div class="input-style-1">
                                <label>Nama Unit</label>
                                <input type="text" name="name" placeholder="Masukkan nama unit" required />
                              </div>

                              <div class="input-style-1">
                                <label>Foto Unit</label>
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
                      Kelola Unit
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
              <form id="bulk-delete-form" action="<?php echo e(route('dashboard.units.bulk-delete')); ?>" method="POST">
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
                    <th>
                      <input type="checkbox" id="select-all" />
                    </th>
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
                <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td>
                      <input type="checkbox" class="row-checkbox" value="<?php echo e($unit->id); ?>" />
                    </td>
                    <td>
                      <p class="text-sm"><?php echo e(($units->currentPage() - 1) * $units->perPage() + $index + 1); ?></p>
                    </td>
                    <td>
                      <div class="product">
                        <div class="image">
                          <?php if($unit->photo ?? false): ?>
                            <img src="<?php echo e(asset('storage/' . $unit->photo)); ?>" alt="<?php echo e($unit->name); ?>" />
                          <?php else: ?>
                            <img src="<?php echo e(asset('build/assets/images/products/product-mini-4.jpg')); ?>" alt="default" />
                          <?php endif; ?>
                        </div>
                        <p class="text-sm"><?php echo e($unit->name); ?></p>
                      </div>
                    </td>
                    
                    <td>
                      <div class="action justify-content-end">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#editUnitModal<?php echo e($unit->id); ?>" title="Edit Unit">
                          <i class="lni lni-pencil"></i>
                        </button>
                      </div>

                      <!-- Edit Unit Modal -->
                      <div class="modal fade" id="editUnitModal<?php echo e($unit->id); ?>" tabindex="-1" aria-labelledby="editUnitModalLabel<?php echo e($unit->id); ?>" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="editUnitModalLabel<?php echo e($unit->id); ?>">Edit Unit - <?php echo e($unit->name); ?></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="<?php echo e(route('dashboard.units.update', $unit->id)); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="input-style-1">
                                  <label>Nama Unit</label>
                                  <input type="text" name="name" value="<?php echo e(old('name', $unit->name)); ?>" required />
                                </div>
                                <div class="input-style-1">
                                  <label>Foto Unit (opsional)</label>
                                  <input type="file" name="photo" accept="image/*" />
                                  <?php if($unit->photo): ?>
                                    <div style="margin-top:8px;"><img src="<?php echo e(asset('storage/'.$unit->photo)); ?>" style="width:100px;height:100px;object-fit:cover;border-radius:6px;" /></div>
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
              <?php echo e($units->links()); ?>

            </div>
            <!-- Inline bulk script removed; centralized script in partial handles interactions -->
            <!-- End Table -->
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
  <!-- ========== script end =========== -->
</body>

</html><?php /**PATH C:\Users\Danir\pinha\resources\views/dashboard/kelolaunit.blade.php ENDPATH**/ ?>