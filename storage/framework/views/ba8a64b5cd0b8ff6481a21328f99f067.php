<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('partials.head', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <title>Verify Email PINHA | Pusat Informasi Nurul Huda</title>
</head>

<body class="bg-[#FCFCFC] dark:bg-black">
    <script>
        !function () {
            try {
                var d = document.documentElement, c = d.classList;
                c.remove('light', 'dark');
                var e = localStorage.getItem('theme');
                if (e) { c.add(e || '') } else { c.add('dark'); }
                if (e === 'light' || e === 'dark' || !e) d.style.colorScheme = e || 'dark'
            } catch (t) { }
        }();
    </script>

    <?php echo $__env->make('partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <section class="relative z-10 overflow-hidden pb-16 pt-36 md:pb-20 lg:pb-28 lg:pt-[180px]">
        <div class="container">
            <div class="-mx-4 flex flex-wrap">
                <div class="w-full px-4">
                    <div
                        class="shadow-three mx-auto max-w-[500px] rounded bg-white px-6 py-10 dark:bg-dark sm:p-[60px]">
                        <h3 id="typingHeader"
                            class="mb-3 text-center text-2xl font-bold text-black dark:text-white sm:text-3xl"></h3>

                        <script>
                            const text = "Akun Anda Sedang Diverifikasi..";
                            const header = document.getElementById("typingHeader");
                            let index = 0;

                            function type() {
                                if (index < text.length) {
                                    header.textContent += text.charAt(index);
                                    index++;
                                    setTimeout(type, 100); // kecepatan mengetik (ms)
                                }
                            }

                            document.addEventListener("DOMContentLoaded", type);
                        </script>


                        <div class="mb-8 px-5 text-center text-base font-medium text-body-color dark:text-gray-400">
                            <?php echo e(__('Terima kasih telah mendaftar! 1x24 jam belum ada notifikasi silahkan hubungi admin pinha di bagian halam kontak. ')); ?>

                        </div>

                        <?php if(session('status') == 'verification-link-sent'): ?>
                            <div class="mb-6 px-5 text-center text-sm font-medium text-green-600 dark:text-green-400">
                                <?php echo e(__('Tautan verifikasi baru telah dikirim ke alamat email yang Anda berikan saat pendaftaran.')); ?>

                            </div>
                        <?php endif; ?>





                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('partials.script', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</body>

</html><?php /**PATH C:\Users\Danir\pinha\resources\views\auth\verify-email.blade.php ENDPATH**/ ?>