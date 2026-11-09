

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="card-style mb-30">
    <h6 class="mb-20">Edit Informasi Administrasi</h6>
    <form action="#" method="POST">
      <?php echo csrf_field(); ?>
      <div class="input-style-1">
        <label>Judul</label>
        <input type="text" name="judul" value="<?php echo e($item->judul_informasi ?? $item->judul); ?>" required />
      </div>
      <div class="input-style-1">
        <label>Isi Informasi</label>
        <textarea name="isi" rows="6"><?php echo e($item->deskripsi ?? $item->isi ?? ''); ?></textarea>
      </div>
      <div class="modal-footer mt-20">
        <a href="<?php echo e(url()->previous()); ?>" class="main-btn danger-btn btn-hover btn-sm">Batal</a>
        <button type="submit" class="main-btn primary-btn btn-hover btn-sm">Simpan</button>
      </div>
    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Danir\pinha\resources\views\dashboard\kelolainformasi\editadministrasi.blade.php ENDPATH**/ ?>