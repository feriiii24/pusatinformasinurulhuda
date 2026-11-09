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
              <div class="title">
                <h2>Selamat Datang </h2>
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
                      eCommerce
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        </div>
        <!-- ========== title-wrapper end ========== -->
        <div class="row">
          <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
              <div class="icon" style="background-color: #FFF3E0; color: #FF9800;">
                <i class="lni lni-user"></i>
              </div>
                <div class="content">
                <h6 class="mb-10">Semua Akun</h6>
                <h3 class="text-bold mb-10"><?php echo e($userCount ?? 0); ?></h3>
              </div>
            </div>
            <!-- End Icon Cart -->
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
              <div class="icon" style="background-color: #FFE5E5; color: #FF6B6B;">
                <i class="lni lni-user"></i>
              </div>
                <div class="content">
                <h6 class="mb-10">Semua Akun Admin yayasan</h6>
                <h3 class="text-bold mb-10"><?php echo e($adminYayasanCount ?? 0); ?></h3>
                
              </div>
            </div>
            <!-- End Icon Cart -->
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
              <div class="icon blue" style="background-color: #D9EFFF; color: #4DA6FF;">
                <i class="lni lni-user"></i>
              </div>
                <div class="content">
                <h6 class="mb-10">Semua Akun Admin Unit</h6>
                <h3 class="text-bold mb-10"><?php echo e($adminUnitCount ?? 0); ?></h3>
              </div>
            </div>
            <!-- End Icon Cart -->
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
              <div class="icon orange" style="background-color: #E8DAFF; color: #A084FF;">
                <i class="lni lni-user"></i>
              </div>
                <div class="content">
                <h6 class="mb-10">Semua akun Umum</h6>
                <h3 class="text-bold mb-10"><?php echo e($akunUmumCount ?? 0); ?></h3>
              </div>
            </div>
            <!-- End Icon Cart -->
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
              <div class="icon purple" style="background-color: #b5cbf5ff; color: #2b7ac4ff;">
                <i class="lni lni-folder"></i>
              </div>
                <div class="content">
                <h6 class="mb-10">Informasi Umum</h6>
                <h3 class="text-bold mb-10"><?php echo e($informasiUmumCount ?? 0); ?></h3>
              </div>
            </div>
            <!-- End Icon Cart -->
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
              <div class="icon purple" style="background-color: #b5e6f5ff; color: #2bc4b7ff;">
                <i class="lni lni-folder"></i>
              </div>
                <div class="content">
                <h6 class="mb-10">Informasi Tertutup</h6>
                <h3 class="text-bold mb-10"><?php echo e($tertutupCount ?? 0); ?></h3>
              </div>
            </div>
            <!-- End Icon Cart -->
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
              <div class="icon purple" style="background-color: #DFFFE0; color: #66BB6A;">
                <i class="lni lni-folder"></i>
              </div>
                <div class="content">
                <h6 class="mb-10">Informasi Akademik</h6>
                <h3 class="text-bold mb-10"><?php echo e($akademikCount ?? 0); ?></h3>
              </div>
            </div>
            <!-- End Icon Cart -->
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
              <div class="icon purple" style="background-color: #E0F0FF; color: #3399FF;">
                <i class="lni lni-folder"></i>
              </div>
                <div class="content">
                <h6 class="mb-10">Informasi Administrasi</h6>
                <h3 class="text-bold mb-10"><?php echo e($administrasiCount ?? 0); ?></h3>
              </div>
            </div>
            <!-- End Icon Cart -->
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
              <div class="icon purple" style="background-color: #ffe0fcff; color: #e630b8ff;">
                <i class="lni lni-folder"></i>
              </div>
                <div class="content">
                <h6 class="mb-10">Informasi Pena Santri</h6>
                <h3 class="text-bold mb-10"><?php echo e($penaSantriCount ?? 0); ?></h3>
              </div>
            </div>
            <!-- End Icon Cart -->
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
              <div class="icon purple" style="background-color: #E8EAF6; color: #7E57C2;">
                <i class="lni lni-folder"></i>
              </div>

                <div class="content">
                <h6 class="mb-10">Informasi kegiatan</h6>
                <h3 class="text-bold mb-10"><?php echo e($kegiatanCount ?? 0); ?></h3>
              </div>
            </div>
            <!-- End Icon Cart -->
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
              <div class="icon" style="background-color: #DCE8FA; color: #3A7BD5;">
                <i class="lni lni-folder"></i>
              </div>

                <div class="content">
                <h6 class="mb-10">Informasi Dokumen</h6>
                <h3 class="text-bold mb-10"><?php echo e($dokumenCount ?? 0); ?></h3>
              </div>
            </div>
            <!-- End Icon Cart -->
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
              <div class="icon purple" style="background-color: #C8E6E8; color: #317E8F;">
                <i class="lni lni-folder"></i>
              </div>

                <div class="content">
                <h6 class="mb-10">Informasi Masyarakat</h6>
                <h3 class="text-bold mb-10"><?php echo e($masyarakatCount ?? 0); ?></h3>
              </div>
            </div>
            <!-- End Icon Cart -->
          </div>


          <!-- End Col -->
          <div class="col-12">
            <div class="card-style mb-30">
              <div class="title d-flex flex-wrap align-items-center justify-content-between">
                <div class="left">
                  <h6 class="text-medium mb-30">Semua Informasi 10 Teratas</h6>
                </div>
              </div>
              <!-- End Title -->
              <div class="table-responsive">
                <table class="table top-selling-table">
                  <thead>
                    <tr>
                      <th>
                        <h6 class="text-sm text-medium">Tindakan</h6>
                      </th>
                      <th class="min-width">
                        <h6 class="text-sm text-medium">
                          Kategori <i class="lni lni-arrows-vertical"></i>
                        </h6>
                      </th>
                      <th class="min-width">
                        <h6 class="text-sm text-medium">
                          Pengguna <i class="lni lni-arrows-vertical"></i>
                        </h6>
                      </th>
                      <th class="min-width">
                        <h6 class="text-sm text-medium">
                          Tindakan <i class="lni lni-arrows-vertical"></i>
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
                    <?php if(!empty($activities) && count($activities)): ?>
                      <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $act): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td>
                            <div class="product">
                              <p class="text-sm"><?php echo e(Str::limit($act->title, 80)); ?></p>
                            </div>
                          </td>
                          <td>
                            <p class="text-sm"><?php echo e($act->unit ?? '-'); ?></p>
                          </td>
                          <td>
                            <p class="text-sm"><?php echo e($act->user_name ?? '-'); ?></p>
                          </td>
                          <td>
                            <span class="status-btn success-btn"><?php echo e(ucfirst($act->type)); ?></span>
                          </td>
                          <td>
                            <div class="action justify-content-end">
                              <?php
                                $url = '#';
                                if ($act->type === 'dokumen') {
                                  $url = route('dokumen.download', ['id' => $act->id]);
                                } else {
                                  // map types to public informasi routes
                                  $map = [
                                    'umum' => 'blogdetails',
                                    'informasiakademik' => 'informasi.akademik.details',
                                    'informasiadministrasi' => 'informasi.administrasi.details',
                                    'informasipenasansatri' => 'informasi.penasantri.details',
                                    'informasipenasantri' => 'informasi.penasantri.details',
                                    'informasikegiatan' => 'informasi.kegiatan.details',
                                    'informasimasyarakat' => 'informasi.masyarakat.details',
                                    'informasiupdate' => 'informasi.update.details',
                                  ];
                                  $typeKey = strtolower($act->type);
                                  if (isset($map[$typeKey])) {
                                    $routeName = $map[$typeKey];
                                    try {
                                      $url = route($routeName, ['id' => $act->id]);
                                    } catch (\Exception $e) {
                                      $url = '#';
                                    }
                                  } else {
                                    // fallback to blogdetails
                                    try { $url = route('blogdetails', ['id' => $act->id]); } catch (\Exception $e) { $url = '#'; }
                                  }
                                }
                              ?>
                              <a href="<?php echo e($url); ?>" class="btn btn-primary btn-sm">Lihat</a>
                            </div>
                          </td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="5" class="text-center">Belum ada tindakan hari ini.</td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
                <!-- End Table -->
              </div>
            </div>
          </div>
        </div>
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

</html><?php /**PATH C:\Users\Danir\pinha\resources\views\dashboard\dashboard.blade.php ENDPATH**/ ?>