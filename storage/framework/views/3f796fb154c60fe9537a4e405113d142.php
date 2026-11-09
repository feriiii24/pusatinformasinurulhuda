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
                  <h2 class="mr-40">Informasi</h2>
                  <a href="#0" class="main-btn primary-btn btn-hover btn-sm">
                    <i class="lni lni-plus mr-5"></i> Tambah Informasi</a>
                </div>
              </div>
            <!-- end col -->
            <div class="col-md-6">
              <div class="breadcrumb-wrapper">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="#0">Informasi</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Umum
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
            <div class="col-12">
            <div class="card-style mb-30">
              <div class="title d-flex flex-wrap align-items-center justify-content-between">
                <div class="left">
                  <h6 class="text-medium mb-30">Semua Tindakan</h6>
                </div>
                <div class="right">
                  <div class="select-style-1">
                    <div class="select-position select-sm">
                      <select class="light-bg">
                        <option value="">hari ini</option>
                        <option value="">Minggu Ini</option>
                        <option value="">Bulan Ini</option>
                        <option value="">Tahun Ini</option>
                        <option value="">Tampilkan 10 Data</option>
                        <option value="">Tampilkan 50 Data</option>
                        <option value="">Tampilkan 100 Data</option>
                        <option value="">Tampilkan Semua Data</option>
                      </select>
                    </div>
                  </div>
                  <!-- end select -->
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
                    <tr>
                      <td>
                        <div class="product">
                          <div class="image">
                            <img src="<?php echo e(asset('build/assets/images/products/product-mini-1.jpg')); ?>" alt="" />
                          </div>
                          <p class="text-sm">Dokumen</p>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm">SMK</p>
                      </td>
                      <td>
                        <p class="text-sm">AFIF</p>
                      </td>
                      <td>
                        <span class="status-btn warning-btn">Pending</span>
                      </td>
                      <td>
                        <div class="action justify-content-end">
                          <button class="edit">
                            <i class="lni lni-pencil"></i>
                          </button>
                          <button class="more-btn ml-10 dropdown-toggle" id="moreAction1" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="lni lni-more-alt"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="moreAction1">
                            <li class="dropdown-item">
                              <a href="#0" class="btn btn-success w-100 d-flex align-items-center gap-2">
                                <i class="lni lni-thumbs-up"></i> SETUJU
                              </a>
                            </li>
                            <li class="dropdown-item">
                              <a href="#0" class="btn btn-danger w-100 d-flex align-items-center gap-2">
                                <i class="lni lni-trash-can"></i> TOLAK
                              </a>
                            </li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="product">
                          <div class="image">
                            <img src="<?php echo e(asset('build/assets/images/products/product-mini-2.jpg')); ?>" alt="" />
                          </div>
                          <p class="text-sm">Arm Chair</p>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm">Interior</p>
                      </td>
                      <td>
                        <p class="text-sm">$345</p>
                      </td>
                      <td>
                        <span class="status-btn warning-btn">Refund</span>
                      </td>
                      <td>
                        <div class="action justify-content-end">
                          <button class="edit">
                            <i class="lni lni-pencil"></i>
                          </button>
                          <button class="more-btn ml-10 dropdown-toggle" id="moreAction1" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="lni lni-more-alt"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="moreAction1">
                            <li class="dropdown-item">
                              <a href="#0" class="text-gray">Remove</a>
                            </li>
                            <li class="dropdown-item">
                              <a href="#0" class="text-gray">Edit</a>
                            </li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="product">
                          <div class="image">
                            <img src="<?php echo e(asset('build/assets/images/products/product-mini-3.jpg')); ?>" alt="" />
                          </div>
                          <p class="text-sm">Sofa</p>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm">Interior</p>
                      </td>
                      <td>
                        <p class="text-sm">$345</p>
                      </td>
                      <td>
                        <span class="status-btn success-btn">Completed</span>
                      </td>
                      <td>
                        <div class="action justify-content-end">
                          <button class="edit">
                            <i class="lni lni-pencil"></i>
                          </button>
                          <button class="more-btn ml-10 dropdown-toggle" id="moreAction1" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="lni lni-more-alt"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="moreAction1">
                            <li class="dropdown-item">
                              <a href="#0" class="text-gray">Remove</a>
                            </li>
                            <li class="dropdown-item">
                              <a href="#0" class="text-gray">Edit</a>
                            </li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="product">
                          <div class="image">
                            <img src="<?php echo e(asset('build/assets/images/products/product-mini-4.jpg')); ?>" alt="" />
                          </div>
                          <p class="text-sm">Kitchen</p>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm">Interior</p>
                      </td>
                      <td>
                        <p class="text-sm">$345</p>
                      </td>
                      <td>
                        <span class="status-btn close-btn">Canceled</span>
                      </td>
                      <td>
                        <div class="action justify-content-end">
                          <button class="edit">
                            <i class="lni lni-pencil"></i>
                          </button>
                          <button class="more-btn ml-10 dropdown-toggle" id="moreAction1" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="lni lni-more-alt"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="moreAction1">
                            <li class="dropdown-item">
                              <a href="#0" class="text-gray">Remove</a>
                            </li>
                            <li class="dropdown-item">
                              <a href="#0" class="text-gray">Edit</a>
                            </li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <!-- End Table -->
              </div>
            </div>
          </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        </div>
        <!-- ========== title-wrapper end ========== -->
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

</html><?php /**PATH C:\Users\Danir\pinha\resources\views\dashboard\kelolainformasi\kelolainformasitertutup.blade.php ENDPATH**/ ?>