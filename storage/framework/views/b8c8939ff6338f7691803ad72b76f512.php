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
                <a href="#tambahInformasikegiatan" data-bs-toggle="modal"
                                    class="main-btn primary-btn btn-hover btn-sm">
                                    <i class="lni lni-plus mr-5"></i> Tambah Informasi
                                </a>
                            </div>
                            <!-- Modal Tambah Informasi -->
              <div class="modal fade" id="tambahInformasikegiatan" tabindex="-1"
                aria-labelledby="tambahInformasikegiatanLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl"> 
                                    <div class="modal-content">
                                        <div class="modal-header">
                      <h5 class="modal-title" id="tambahInformasikegiatanLabel">Tambah Informasi Baru</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="#" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <div class="row">
                                                    <div class="col-12"> 
                                                        <div class="card-style mb-30">
                                                            <h6 class="mb-25">Informasi Kegiatan</h6>
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
                      Kegiatan
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
                      <th>
                        <h6 class="text-sm text-medium text-end">
                          Aksi <i class="lni lni-arrows-vertical"></i>
                        </h6>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($rows) && count($rows) > 0): ?>
                      <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td>
                            <div class="product">
                              <div class="image">
                                <?php if(!empty($info->foto_utama)): ?>
                                  <img src="<?php echo e(asset('storage/' . $info->foto_utama)); ?>" alt="" />
                                <?php else: ?>
                                  <img src="<?php echo e(asset('build/assets/images/products/product-mini-1.jpg')); ?>" alt="" />
                                <?php endif; ?>
                              </div>
                              <p class="text-sm"><?php echo e(Str::limit($info->judul_informasi ?? $info->judul, 60)); ?></p>
                            </div>
                          </td>
                          <td>
                            <p class="text-sm"><?php echo e(ucfirst($info->kategori ?? 'kegiatan')); ?></p>
                          </td>
                          <td>
                            <p class="text-sm"><?php echo e(optional($info->user)->name ?? ($info->penulis ?? '—')); ?></p>
                          </td>
                          <td>
                            <div class="action justify-content-end">
                              <!-- Edit button (matches Kelola Role small icon button) -->
                              <!-- trigger modal -->
                              <button type="button" class="btn btn-sm btn-light me-2" data-bs-toggle="modal" data-bs-target="#editKegiatanModal<?php echo e($info->id); ?>" title="Edit">
                                <i class="lni lni-pencil"></i>
                              </button>

                              <!-- Delete button (small icon button inside form) -->
                              <form action="<?php echo e(route('dashboard.kelolainformasi.kegiatan.destroy', $info->id)); ?>" method="POST" onsubmit="return confirm('Yakin ingin menghapus informasi ini?');" style="display:inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-light" title="Hapus" style="color:#e74c3c;border-color:transparent;background:transparent;">
                                  <i class="lni lni-trash-can"></i>
                                </button>
                              </form>
                            </div>
                            
                            <!-- Edit Kegiatan Modal -->
                            <div class="modal fade" id="editKegiatanModal<?php echo e($info->id); ?>" tabindex="-1" aria-labelledby="editKegiatanModalLabel<?php echo e($info->id); ?>" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="editKegiatanModalLabel<?php echo e($info->id); ?>">Edit Informasi - <?php echo e(Str::limit($info->judul_informasi ?? $info->judul, 40)); ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="<?php echo e(route('dashboard.kelolainformasi.kegiatan.update', $info->id)); ?>" method="POST">
                                      <?php echo csrf_field(); ?>
                                      <?php echo method_field('PUT'); ?>
                                      <div class="input-style-1">
                                        <label>Judul</label>
                                        <input type="text" name="judul" value="<?php echo e(old('judul', $info->judul_informasi ?? $info->judul)); ?>" required />
                                      </div>
                                      <div class="input-style-1">
                                        <label>Isi Informasi</label>
                                        <textarea name="isi" rows="6"><?php echo e(old('isi', $info->deskripsi ?? $info->isi ?? '')); ?></textarea>
                                      </div>
                                      <div class="input-style-1">
                                        <label>Tanggal</label>
                                        <input type="date" name="tgl" value="<?php echo e(optional($info->tgl)->format('Y-m-d') ?? ''); ?>" />
                                      </div>
                                      <div class="modal-footer mt-20">
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
                    <?php else: ?>
                      <tr>
                        <td colspan="5" class="text-center text-sm">Belum ada data Informasi Kegiatan.</td>
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

</html><?php /**PATH C:\Users\Danir\pinha\resources\views\dashboard\kelolainformasi\kelolainformasikegiatan.blade.php ENDPATH**/ ?>