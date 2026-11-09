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
                                <h2 class="mr-40">Informasi Pena Santri</h2>
                                <a href="#tambahInformasiPenaSantri" data-bs-toggle="modal"
                                    class="main-btn primary-btn btn-hover btn-sm">
                                    <i class="lni lni-plus mr-5"></i> Tambah Informasi Pena Santri
                                </a>
                            </div>
                            <!-- Modal Tambah Informasi -->
                            <div class="modal fade" id="tambahInformasiPenaSantri" tabindex="-1"
                                aria-labelledby="tambahInformasiPenaSantriLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl"> 
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="tambahInformasiPenaSantriLabel">Tambah Informasi Pena Santri Baru
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?php echo e(route('dashboard.informasi.store')); ?>" method="POST"
                                                enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <div class="row">
                                                    <div class="col-12"> 
                                                        <div class="card-style mb-30">
                                                            <h6 class="mb-25">Informasi Pena Santri</h6>
                                                            <div class="input-style-1">
                                                                <label>Judul Informasi</label>
                                                                <input type="text" name="judul_informasi"
                                                                    placeholder="Masukkan judul informasi" required />
                                                            </div>
                                                            <div class="input-style-1">
                                                                <label>Isi Deskripsi</label>
                                                                <textarea name="deskripsi" rows="8"
                                                                    style="min-height:220px;"
                                                                    placeholder="Deskripsikan informasi..."
                                                                    required></textarea>
                                                            </div>
                                                            <div class="input-style-1">
                                                                <label>Unit</label>
                                                                <input type="text" name="unit"
                                                                    placeholder="Masukkan unit (opsional)"
                                                                    value="<?php echo e(old('unit', optional(auth()->user()->unit)->name ?? '')); ?>"
                                                                    readonly />
                                                            </div>
                                                        </div>
                                                        <div class="card-style mb-30">
                                                            <h6 class="mb-25">Tanggal & Waktu</h6>
                                                            <div class="input-style-1">
                                                                <label>Tanggal</label>
                                                                <input type="date" name="tgl"
                                                                    value="<?php echo e(old('tgl', date('Y-m-d'))); ?>" required
                                                                    readonly />
                                                            </div>
                                                            <div class="input-style-1">
                                                                <label>Jam</label>
                                                                <input type="time" name="waktu"
                                                                    value="<?php echo e(old('waktu', date('H:i'))); ?>" required
                                                                    readonly />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="card-style mb-30">
                                                            <h6 class="mb-25">Foto</h6>
                                                            <div class="input-style-1">
                                                                <label>Foto Utama (thumbnail)</label>
                                                                <input type="file" name="foto_utama" accept="image/*" />
                                                            </div>
                                                            <div class="input-style-1">
                                                                <label>Foto Kedua (detail)</label>
                                                                <input type="file" name="foto_kedua" accept="image/*" />
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
                                            Pena Santri
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
                <?php
                    use Illuminate\Support\Str;
                    $topInformasi = \App\Models\InformasiPenaSantri::with('user')
                        ->orderByDesc('jumlah_penonton')
                        ->take(3)
                        ->get();
                ?>
                <div class="cards-styles">
                    <div class="row">
                        <?php $__currentLoopData = $topInformasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                <div class="card-style-1 mb-30" style="display:flex;flex-direction:column;height:100%;">
                                    <div class="card-meta">
                                        <div class="image">
                                            <img src="<?php echo e(asset($info->user && $info->user->avatar ? 'storage/' . $info->user->avatar : 'build/assets/images/cards/card-style-1/admin-1.png')); ?>"
                                                alt="" style="width:48px;height:48px;object-fit:cover;border-radius:50%;" />
                                        </div>
                                        <div class="text">
                                            <p class="text-sm text-medium">Posted by : <a
                                                    href="#0"><?php echo e($info->user?->name ?? 'Unknown'); ?></a></p>
                                        </div>
                                    </div>
                                    <div class="card-image">
                                        <a
                                            href="<?php echo e(($info && ($info->id)) ? route('informasi.penasantri.details', $info->id) : '#0'); ?>">
                                            <img src="<?php echo e($info->foto_utama ? asset('storage/' . $info->foto_utama) : asset('build/assets/images/cards/card-style-1/card-1.jpg')); ?>"
                                                alt="" style="width:100%;height:220px;object-fit:cover;" />
                                        </a>
                                    </div>
                                    <div class="card-content"
                                        style="flex:1;display:flex;flex-direction:column;justify-content:space-between;">
                                        <div>
                        <h4><a
                            href="<?php echo e(($info && ($info->id)) ? route('informasi.penasantri.details', $info->id) : '#0'); ?>"><?php echo e(Str::words($info->judul_informasi ?? 'Tanpa Judul', 4, '...')); ?></a>
                                            </h4>
                                            <p><?php echo e(Str::limit(strip_tags($info->deskripsi ?? ''), 120)); ?></p>
                                        </div>
                                        <div>
                                            <a href="<?php echo e(($info && ($info->id)) ? route('informasi.penasantri.details', $info->id) : '#0'); ?>"
                                                class="btn btn-xs btn-primary">Lihat Informasi..</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card-->
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <!-- end row -->
                    <!-- ========= card-style-1 end ========= -->
                </div>
                <br>
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
                                <?php
                                    $query = \App\Models\InformasiPenaSantri::with('user');
                                    if(request('range')){
                                        switch(request('range')){
                                            case 'hari_ini': $query = $query->whereDate('created_at', now()->toDateString()); break;
                                            case 'minggu_ini': $query = $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]); break;
                                            case 'bulan_ini': $query = $query->whereMonth('created_at', now()->month); break;
                                            case 'tahun_ini': $query = $query->whereYear('created_at', now()->year); break;
                                        }
                                    }
                                    if(request('per') && request('per')!='all'){
                                        $allInformasi = $query->orderByDesc('created_at')->take(intval(request('per')))->get();
                                    } else {
                                        $allInformasi = $query->orderByDesc('created_at')->get();
                                    }
                                ?>

                                <?php $__empty_1 = true; $__currentLoopData = $allInformasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <div class="product">
                                                <div class="image">
                                                    <?php if($info->foto_utama): ?>
                                                        <img src="<?php echo e(asset('storage/'.$info->foto_utama)); ?>" alt="" />
                                                    <?php else: ?>
                                                        <img src="/images/blog/blog-01.jpg" alt="" />
                                                    <?php endif; ?>
                                                </div>
                                                <p class="text-sm"><?php echo e(Str::limit(strip_tags($info->judul_informasi ?? '-'), 60)); ?></p>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-sm"><?php echo e($info->user?->name ?? '-'); ?></p>
                                        </td>
                                        <td>
                                            <p class="text-sm"><?php echo e($info->unit ?? '-'); ?></p>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(($info && ($info->id)) ? route('informasi.penasantri.details', $info->id) : '#0'); ?>" class="btn btn-xs btn-primary">Lihat</a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="4">
                                            <p class="text-center">Belum ada informasi.</p>
                                        </td>
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

</html><?php /**PATH C:\Users\Danir\pinha\resources\views\dashboard\informasi\informasipenasantri.blade.php ENDPATH**/ ?>