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
                                <h2 class="mr-40">Informasi Dokumen</h2>
                                <a href="#tambahInformasidokumen" data-bs-toggle="modal"
                                    class="main-btn primary-btn btn-hover btn-sm">
                                    <i class="lni lni-plus mr-5"></i> Tambah Informasi Dokumen
                                </a>
                            </div>
                            <!-- Modal Tambah Informasi -->
                            <div class="modal fade" id="tambahInformasidokumen" tabindex="-1"
                                aria-labelledby="tambahInformasidokumenLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl"> 
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="tambahInformasidokumenLabel">Tambah Dokumen Baru
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?php echo e(route('dashboard.informasidokumen.store')); ?>" method="POST"
                                                enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <div class="row">
                                                    <div class="col-12"> 
                                                        <div class="card-style mb-30">
                                                            <h6 class="mb-25">Informasi Dokumen</h6>
                                                            <div class="input-style-1">
                                                                <label>Judul Informasi</label>
                                                                <input type="text" name="judul_informasi"
                                                                    placeholder="Masukkan judul informasi" required />
                                                            </div>

                                                            <div class="input-style-1">
                                                                <label>Isi Informasi</label>
                                                                <textarea name="deskripsi" rows="4"
                                                                    placeholder="Tulis isi informasi..."
                                                                    required></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="card-style mb-30">
                                                            <h6 class="mb-25">Kategori</h6>
                                                            <div class="select-style-1">
                                                                <label>Pilih Kategori</label>
                                                                <div class="select-position">
                                                                    <select name="kategori" required>
                                                                        <option value="">-- Pilih kategori --</option>
                                                                        <option value="tertutup">Tertutup</option>
                                                                        <option value="umum">Terbuka</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card-style mb-30">
                                                            <h6 class="mb-25">Tanggal & Waktu</h6>
                                                            <div class="input-style-1">
                                                                <label>Tanggal</label>
                                                                <input type="date" name="tgl"
                                                                    value="<?php echo e(date('Y-m-d')); ?>" required />
                                                            </div>
                                                            <div class="input-style-1">
                                                                <label>Jam</label>
                                                                <input type="time" name="waktu"
                                                                    value="<?php echo e(date('H:i')); ?>" required />
                                                            </div>
                                                        </div>
                                                        <div class="card-style mb-30">
                                                            <h6 class="mb-25">Unit</h6>
                                                            <div class="input-style-1">
                                                                <label>Unit</label>
                                                                <input type="text" name="unit"
                                                                    value="<?php echo e(optional(auth()->user()->unit)->name ?? ''); ?>"
                                                                    readonly />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card-style mb-30">
                                                    <h6 class="mb-25">File (PDF)</h6>
                                                    <div class="input-style-1">
                                                        <label>Unggah File</label>
                                                        <input type="file" name="file" accept="application/pdf" required />
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
                                        <option value="hari_ini" <?php echo e(request('range') == 'hari_ini' ? 'selected' : ''); ?>>
                                            hari ini</option>
                                        <option value="minggu_ini" <?php echo e(request('range') == 'minggu_ini' ? 'selected' : ''); ?>>Minggu Ini</option>
                                        <option value="bulan_ini" <?php echo e(request('range') == 'bulan_ini' ? 'selected' : ''); ?>>
                                            Bulan Ini</option>
                                        <option value="tahun_ini" <?php echo e(request('range') == 'tahun_ini' ? 'selected' : ''); ?>>
                                            Tahun Ini</option>
                                        <option value="per:10" <?php echo e(request('per') == '10' ? 'selected' : ''); ?>>Tampilkan 10
                                            Data</option>
                                        <option value="per:50" <?php echo e(request('per') == '50' ? 'selected' : ''); ?>>Tampilkan 50
                                            Data</option>
                                        <option value="per:100" <?php echo e(request('per') == '100' ? 'selected' : ''); ?>>Tampilkan
                                            100 Data</option>
                                        <option value="per:all" <?php echo e(request('per') == 'all' ? 'selected' : ''); ?>>Tampilkan
                                            Semua Data</option>
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
                                        <h6 class="text-sm text-medium">Nama Dokumen</h6>
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
                                <?php $__empty_1 = true; $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <div class="product">
                                                <div class="image">
                                                    <img src="<?php echo e(asset('build/assets/images/products/product-mini-1.jpg')); ?>"
                                                        alt="" />
                                                </div>
                                                <p class="text-sm"><?php echo e(Str::limit($r->judul_informasi ?? '-', 60)); ?>

                                                    <?php if($r->kategori == 'tertutup'): ?> <i class="lni lni-lock"
                                                    title="Tertutup"></i> <?php endif; ?></p>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-sm"><?php echo e($r->user?->name ?? '-'); ?></p>
                                        </td>
                                        <td>
                                            <p class="text-sm"><?php echo e($r->unit ?? '-'); ?></p>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('dokumen.download', $r->id)); ?>"
                                                class="btn btn-xs btn-primary">Download</a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="4" class="text-center">Belum ada data.</td>
                                    </tr>
                                <?php endif; ?>
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

</html><?php /**PATH C:\Users\Danir\pinha\resources\views/dashboard/informasi/informasidokumen.blade.php ENDPATH**/ ?>