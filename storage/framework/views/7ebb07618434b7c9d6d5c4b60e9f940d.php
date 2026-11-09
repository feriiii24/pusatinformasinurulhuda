
    <link rel="stylesheet" href="<?php echo e(asset('landing/54a364e691822e7c.css')); ?>">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Preload + landing JS (only on the landing page). Controlled by ENABLE_LANDING_ASSETS env var -->
    <?php if((Route::currentRouteName() === 'welcome' || request()->is('/')) && env('ENABLE_LANDING_ASSETS', false)): ?>
        <link rel="preload" as="script" href="<?php echo e(asset('landing/webpack-728568c5263bfa21.js')); ?>" crossorigin="anonymous">

        <script src="<?php echo e(asset('landing/fd9d1056-16f14d1599bb12d9.js')); ?>" async crossorigin="anonymous"></script>
        <script src="<?php echo e(asset('landing/472-d7599cb3d9ef43f6.js')); ?>" async crossorigin="anonymous"></script>
        <script src="<?php echo e(asset('landing/main-app-eaadf1a90530e61b.js')); ?>" async crossorigin="anonymous"></script>
        <script src="<?php echo e(asset('landing/326-a84953a5378f2f57.js')); ?>" async crossorigin="anonymous"></script>
        <script src="<?php echo e(asset('landing/413-97fb17660127e8aa.js')); ?>" async crossorigin="anonymous"></script>
        <script src="<?php echo e(asset('landing/layout-4f2f8b013459c5b4.js')); ?>" async crossorigin="anonymous"></script>
        <script src="<?php echo e(asset('landing/723-83f55f8b7245194b.js')); ?>" async crossorigin="anonymous"></script>
        <script src="<?php echo e(asset('landing/page-f3b5e9fcb05b9d58.js')); ?>" async crossorigin="anonymous"></script>
    <?php endif; ?>

    <meta name="description" content="This is Home for Startup Nextjs Template" />

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Polyfills -->
    <script src="<?php echo e(asset('landing/polyfills-c67a75d1b6f99dc8.js')); ?>" crossorigin="anonymous" noModule></script>
<?php /**PATH C:\Users\Danir\pinha\resources\views/partials/head.blade.php ENDPATH**/ ?>