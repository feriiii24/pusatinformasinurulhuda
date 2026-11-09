<!DOCTYPE html>
<html lang="en">

<head>
  <?php echo $__env->make('dashboard.partials.head', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</head>

<body>
  <?php echo $__env->make('dashboard.partials.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

  <main class="main-wrapper">
    <?php echo $__env->make('dashboard.partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <section class="section">
      <div class="container-fluid">
        <div class="title-wrapper pt-30">
          <div class="row align-items-center">
            <div class="col-md-6">
              <div class="title">
                <h2>Edit Unit</h2>
              </div>
            </div>
          </div>
        </div>

        <div class="card-style mb-30">
          <div class="card-body">
            <form action="<?php echo e(route('dashboard.units.update', $unit->id)); ?>" method="POST">
              <?php echo csrf_field(); ?>
              <?php echo method_field('PUT'); ?>
              <div class="input-style-1">
                <label>Nama Unit</label>
                <input type="text" name="name" value="<?php echo e(old('name', $unit->name)); ?>" required />
              </div>

              <div class="mt-3">
                <button type="submit" class="main-btn primary-btn btn-hover btn-sm">Simpan</button>
                <a href="<?php echo e(route('dashboard.units.index')); ?>" class="main-btn danger-btn btn-hover btn-sm">Batal</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <?php echo $__env->make('dashboard.partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  </main>

  <?php echo $__env->make('dashboard.partials.script', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>

</html>
<?php /**PATH C:\Users\Danir\pinha\resources\views\dashboard\units\edit.blade.php ENDPATH**/ ?>