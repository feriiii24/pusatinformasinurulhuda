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
                                <a href="#tambahInformasitertutup" data-bs-toggle="modal"
                                    class="main-btn primary-btn btn-hover btn-sm">
                                    <i class="lni lni-plus mr-5"></i> Tambah Informasi
                                </a>
                            </div>
                            <!-- Modal Tambah Informasi -->
                            <div class="modal fade" id="tambahInformasitertutup" tabindex="-1"
                                aria-labelledby="tambahInformasitertutupLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl"> 
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="tambahInformasitertutupLabel">Tambah Informasi Baru</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="#" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <div class="row">
                                                    <div class="col-12"> 
                                                        <div class="card-style mb-30">
                                                            <h6 class="mb-25">Informasi Tertutup</h6>
                                                            <div class="input-style-1">
                                                                <label>Judul Informasi</label>
                                                                <input type="text" name="judul"
                                                                    placeholder="Masukkan judul informasi" required />
                                                            </div>

                                                            <div class="input-style-1">
                                                                <label>Isi Informasi</label>
                                                                <textarea name="isi" rows="4"
                                                                    placeholder="Tulis isi informasi..."
                                                                    required></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="card-style mb-30">
                                                            <h6 class="mb-25">Kategori</h6>
                                                            <div class="select-style-1">
                                                                <label>Pilih Kategori</label>
                                                                <div class="select-position">
                                                                    <select name="kategori_id" required>
                                                                        <option value="">-- Pilih kategori --</option>
                                                                        <option value="umum">Umum</option>
                                                                        <option value="tertutup">Tertutup</option>
                                                                        <option value="akademik">Akademik</option>
                                                                        <option value="administrasi">Administrasi
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card-style mb-30">
                                                            <h6 class="mb-25">Tanggal & Waktu</h6>
                                                            <div class="input-style-1">
                                                                <label>Tanggal</label>
                                                                <input type="date" name="tanggal" required />
                                                            </div>
                                                            <div class="input-style-1">
                                                                <label>Jam</label>
                                                                <input type="time" name="waktu" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="main-btn danger-btn btn-hover btn-sm"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit"
                                                        class="main-btn primary-btn btn-hover btn-sm">Simpan</button>
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

                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- ========== title-wrapper end ========== -->
                <!-- ========== cards-styles start ========== -->
                <div class="cards-styles">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="card-style-1 mb-30">
                                <div class="card-meta">
                                    <div class="image">
                                        <img src="<?php echo e(asset('build/assets/images/cards/card-style-1/admin-1.png')); ?>"
                                            alt="" />
                                    </div>
                                    <div class="text">
                                        <p class="text-sm text-medium">
                                            Posted by : <a href="#0">Hammad</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-image">
                                    <a href="#0">
                                        <img src="<?php echo e(asset('build/assets/images/cards/card-style-1/card-1.jpg')); ?>"
                                            alt="" />
                                    </a>
                                </div>
                                <div class="card-content">
                                    <h4><a href="#0"> Card Title here </a></h4>
                                    <p>
                                        With supporting text below as a natural lead-in to
                                        additional content. consectetur adipiscing elit. Integer
                                        posuere erat a ante.
                                    </p>
                                    <br>
                                    <button class="btn btn-xs btn-primary">Lihat Informasi..</button>
                                </div>
                            </div>
                            <!-- end card-->
                        </div>
                        <!-- end col -->
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="card-style-1 mb-30">
                                <div class="card-meta">
                                    <div class="image">
                                        <img src="<?php echo e(asset('build/assets/images/cards/card-style-1/admin-2.png')); ?>"
                                            alt="" />
                                    </div>
                                    <div class="text">
                                        <p class="text-sm text-medium">
                                            Posted by : <a href="#0">Mahmud</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-image">
                                    <a href="#0">
                                        <img src="<?php echo e(asset('build/assets/images/cards/card-style-1/card-2.jpg')); ?>"
                                            alt="" />
                                    </a>
                                </div>
                                <div class="card-content">
                                    <h4><a href="#0"> Card Title here </a></h4>
                                    <p>
                                        With supporting text below as a natural lead-in to
                                        additional content. consectetur adipiscing elit. Integer
                                        posuere erat a ante.
                                    </p>
                                    <br>
                                    <button class="btn btn-xs btn-primary">Lihat Informasi..</button>
                                </div>
                            </div>
                            <!-- end card-->
                        </div>
                        <!-- end col -->
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="card-style-1 mb-30">
                                <div class="card-meta">
                                    <div class="image">
                                        <img src="<?php echo e(asset('build/assets/images/cards/card-style-1/admin-3.png')); ?>"
                                            alt="" />
                                    </div>
                                    <div class="text">
                                        <p class="text-sm text-medium">
                                            Posted by : <a href="#0">Jamil Kareem</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-image">
                                    <a href="#0">
                                        <img src="<?php echo e(asset('build/assets/images/cards/card-style-1/card-3.jpg')); ?>"
                                            alt="" />
                                    </a>
                                </div>
                                <div class="card-content">
                                    <h4><a href="#0"> Card Title here </a></h4>
                                    <p>
                                        With supporting text below as a natural lead-in to
                                        additional content. consectetur adipiscing elit. Integer
                                        posuere erat a ante.
                                    </p>
                                    <br>
                                    <button class="btn btn-xs btn-primary">Lihat Informasi..</button>
                                </div>
                            </div>
                            <!-- end card-->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                    <!-- ========= card-style-1 end ========= -->
                </div>
                <!-- ========== cards-styles end ========== -->
                <!-- ========== tables-wrapper start ========== -->
                <div class="card-style mb-30">
                    <div class="title d-flex flex-wrap align-items-center justify-content-between">
                        <div class="left">
                            <h6 class="text-medium mb-30">Semua Tindakan</h6>
                        </div>
                        <div class="right">
                            <div class="select-style-1">
                                <div class="select-position select-sm">
                                    <select id="informasi-filter" class="light-bg">
                                        <option value="">Semua</option>
                                        <option value="hari_ini" <?php echo e(request('range')=='hari_ini' ? 'selected' : ''); ?>>hari ini</option>
                                        <option value="minggu_ini" <?php echo e(request('range')=='minggu_ini' ? 'selected' : ''); ?>>Minggu Ini</option>
                                        <option value="bulan_ini" <?php echo e(request('range')=='bulan_ini' ? 'selected' : ''); ?>>Bulan Ini</option>
                                        <option value="tahun_ini" <?php echo e(request('range')=='tahun_ini' ? 'selected' : ''); ?>>Tahun Ini</option>
                                        <option value="per:10" <?php echo e(request('per')=='10' ? 'selected' : ''); ?>>Tampilkan 10 Data</option>
                                        <option value="per:50" <?php echo e(request('per')=='50' ? 'selected' : ''); ?>>Tampilkan 50 Data</option>
                                        <option value="per:100" <?php echo e(request('per')=='100' ? 'selected' : ''); ?>>Tampilkan 100 Data</option>
                                        <option value="per:all" <?php echo e(request('per')=='all' ? 'selected' : ''); ?>>Tampilkan Semua Data</option>
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
                                        <h6 class="text-sm text-medium">Nama Informasi</h6>
                                    </th>
                                    <th class="min-width">
                                        <h6 class="text-sm text-medium">
                                            Penerbit <i class="lni lni-arrows-vertical"></i>
                                        </h6>
                                    </th>
                                    <th class="min-width">
                                        <h6 class="text-sm text-medium">
                                            Unit <i class="lni lni-arrows-vertical"></i>
                                        </h6>
                                    </th>
                                    <th class="min-width">
                                        <h6 class="text-sm text-medium">
                                            Lihat <i class="lni lni-arrows-vertical"></i>
                                        </h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="product">
                                            <div class="image">
                                                <img src="<?php echo e(asset('build/assets/images/products/product-mini-1.jpg')); ?>"
                                                    alt="" />
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
                                </tr>
                                <tr>
                                    <td>
                                        <div class="product">
                                            <div class="image">
                                                <img src="<?php echo e(asset('build/assets/images/products/product-mini-2.jpg')); ?>"
                                                    alt="" />
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
                                </tr>
                                <tr>
                                    <td>
                                        <div class="product">
                                            <div class="image">
                                                <img src="<?php echo e(asset('build/assets/images/products/product-mini-3.jpg')); ?>"
                                                    alt="" />
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
                                </tr>
                                <tr>
                                    <td>
                                        <div class="product">
                                            <div class="image">
                                                <img src="<?php echo e(asset('build/assets/images/products/product-mini-4.jpg')); ?>"
                                                    alt="" />
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
                                </tr>
                            </tbody>
                        </table>
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

</html><?php /**PATH C:\Users\Danir\pinha\resources\views/dashboard/informasi/informasitertutup.blade.php ENDPATH**/ ?>