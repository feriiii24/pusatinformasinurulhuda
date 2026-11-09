<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $__env->make('dashboard.partials.head', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</head>
<body>
<?php echo $__env->make('dashboard.partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<main class="main-wrapper">
    <section class="section">
        <div class="container-fluid">
            <div class="title-wrapper pt-30">
                <h2>Edit Role</h2>
            </div>
            <div class="card-style mb-30">
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
                    <div style="margin-top:12px;">
                        <button type="submit" class="main-btn primary-btn btn-hover btn-sm">Simpan Perubahan</button>
                        <a href="<?php echo e(route('dashboard.kelolarole')); ?>" class="main-btn danger-btn btn-hover btn-sm">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
<?php echo $__env->make('dashboard.partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('dashboard.partials.script', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>
</html><?php /**PATH C:\Users\Danir\pinha\resources\views\dashboard\roles\edit.blade.php ENDPATH**/ ?>