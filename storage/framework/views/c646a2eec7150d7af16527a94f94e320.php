<!DOCTYPE html>
<html lang="en">

<head>
    <!--mulai partials  head -->
    <?php echo $__env->make('partials.head', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <!--akhir partials head -->
    <title>Informasi PINHA | Pusat Informasi Nurul Huda</title>

</head>

<?php use Illuminate\Support\Str; ?>
<body class="bg-[#FCFCFC] dark:bg-black __className_f367f3">
    <script>!function () { try { var d = document.documentElement, c = d.classList; c.remove('light', 'dark'); var e = localStorage.getItem('theme'); if (e) { c.add(e || '') } else { c.add('dark'); } if (e === 'light' || e === 'dark' || !e) d.style.colorScheme = e || 'dark' } catch (t) { } }();</script>
    <!--mulai partials  header -->
    <?php echo $__env->make('partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <!--akhir partials header -->
    <section class="relative z-10 overflow-hidden pt-28 lg:pt-[150px]">
        <div class="container">
            <div class="-mx-4 flex flex-wrap items-center">
                <div class="w-full px-4 md:w-8/12 lg:w-7/12">
                    <div class="mb-8 max-w-[570px] md:mb-0 lg:mb-12">
                        <h1 class="mb-5 text-2xl font-bold text-black dark:text-white sm:text-3xl">Informasi PINHA</h1>
                        <p class="text-base font-medium leading-relaxed text-body-color">Temukan berbagai informasi dan berita penting seputar akademik, administrasi, kegiatan santri, serta perkembangan yayasan, yang selalu diperbarui untuk kemudahan akses dan inspirasi bagi seluruh civitas Nurul Huda.</p>
                    </div>
                </div>
                <div class="w-full px-4 md:w-4/12 lg:w-5/12">
                    <div class="text-end">
                        <ul class="flex items-center md:justify-end">
                            <li class="flex items-center"><a
                                    class="pr-1 text-base font-medium text-body-color hover:text-primary"
                                    href="/">Beranda</a><span
                                    class="mr-3 block h-2 w-2 rotate-45 border-r-2 border-t-2 border-body-color"></span>
                            </li>
                            <li class="text-base font-medium text-primary">Informasi PINHA</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div><span class="absolute left-0 top-0 z-[-1]"><svg width="287" height="254" viewBox="0 0 287 254" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.1" d="M286.5 0.5L-14.5 254.5V69.5L286.5 0.5Z" fill="url(#paint0_linear_111:578)">
                    </path>
                    <defs>
                        <linearGradient id="paint0_linear_111:578" x1="-40.5" y1="117" x2="301.926" y2="-97.1485"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#4A6CF7"></stop>
                            <stop offset="1" stop-color="#4A6CF7" stop-opacity="0"></stop>
                        </linearGradient>
                    </defs>
                </svg></span><span class="absolute right-0 top-0 z-[-1]"><svg width="628" height="258"
                    viewBox="0 0 628 258" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.1" d="M669.125 257.002L345.875 31.9983L524.571 -15.8832L669.125 257.002Z"
                        fill="url(#paint0_linear_0:1)"></path>
                    <path opacity="0.1" d="M0.0716344 182.78L101.988 -15.0769L142.154 81.4093L0.0716344 182.78Z"
                        fill="url(#paint1_linear_0:1)"></path>
                    <defs>
                        <linearGradient id="paint0_linear_0:1" x1="644" y1="221" x2="429.946" y2="37.0429"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#4A6CF7"></stop>
                            <stop offset="1" stop-color="#4A6CF7" stop-opacity="0"></stop>
                        </linearGradient>
                        <linearGradient id="paint1_linear_0:1" x1="18.3648" y1="166.016" x2="105.377" y2="32.3398"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#4A6CF7"></stop>
                            <stop offset="1" stop-color="#4A6CF7" stop-opacity="0"></stop>
                        </linearGradient>
                    </defs>
                </svg></span></div>
    </section>
    <section class="pb-[120px] pt-[120px]">
        <div class="container">
            <div class="-mx-4 flex flex-wrap justify-center">
                <?php if(isset($informasi) && $informasi->count()): ?>
                    <?php $__currentLoopData = $informasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="w-full px-4 md:w-2/3 lg:w-1/2 xl:w-1/3" style="margin-bottom:28px;">
                            <div class="wow fadeInUp hover:shadow-two dark:hover:shadow-gray-dark group relative overflow-hidden rounded-sm bg-white shadow-one duration-300 dark:bg-dark flex flex-col h-full"
                                data-wow-delay=".1s">
                                <div class="relative w-full" style="height:220px;overflow:hidden;">
                                    <a class="absolute inset-0 block w-full h-full" href="<?php echo e(($item && ($item->slug ?? $item->id)) ? route('informasi.administrasi.details', $item) : '#0'); ?>" style="display:block;width:100%;height:100%;">
                                        <?php if($item->foto_utama): ?>
                                            <img alt="image" loading="lazy" decoding="async" src="<?php echo e(asset('storage/'.$item->foto_utama)); ?>" style="width:100%;height:100%;object-fit:cover;display:block;" />
                                        <?php else: ?>
                                            <img alt="image" loading="lazy" decoding="async" src="/images/blog/blog-01.jpg" style="width:100%;height:100%;object-fit:cover;display:block;" />
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <div class="p-6 sm:p-8 md:px-6 md:py-8 lg:p-8 xl:px-5 xl:py-8 2xl:p-8 flex-1 flex flex-col justify-between">
                                    <div>
                                        <h3>
                                            <a class="mb-4 block text-xl font-bold text-black hover:text-primary dark:text-white dark:hover:text-primary sm:text-2xl js-ensure-ellipsis"
                                                href="<?php echo e(($item && ($item->slug ?? $item->id)) ? route('informasi.administrasi.details', $item) : '#0'); ?>" style="display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;"><?php echo e($item->judul_informasi); ?></a>
                                        </h3>
                                        <p class="mb-6 border-b border-body-color border-opacity-10 pb-6 text-base font-medium text-body-color dark:border-white dark:border-opacity-10 js-ensure-ellipsis" style="display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;">
                                            <?php echo e(strip_tags($item->deskripsi)); ?>

                                        </p>
                                    </div>
                                    <div class="flex items-center mt-4">
                                        <div class="mr-5 flex items-center border-r border-body-color border-opacity-10 pr-5 dark:border-white dark:border-opacity-10 xl:mr-3 xl:pr-3 2xl:mr-5 2xl:pr-5">
                                            <div class="mr-4">
                                                <div class="relative h-10 w-10 overflow-hidden rounded-full">
                                                    <?php if($item->user && $item->user->avatar): ?>
                                                        <img alt="author" loading="lazy" decoding="async" src="<?php echo e(asset('storage/'.$item->user->avatar)); ?>" class="object-cover object-center w-full h-full" />
                                                    <?php else: ?>
                                                        <img alt="author" loading="lazy" decoding="async" src="/images/blog/author-01.png" class="object-cover object-center w-full h-full" />
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="w-full">
                                                <h4 class="mb-1 text-sm font-medium text-dark dark:text-white">By <?php echo e($item->user?->name ?? 'Unknown'); ?></h4>
                                                <p class="text-xs text-body-color"><?php echo e($item->unit ?? '-'); ?></p>
                                            </div>
                                        </div>
                                        <div class="inline-block">
                                            <h4 class="mb-1 text-sm font-medium text-dark dark:text-white">Date</h4>
                                            <p class="text-xs text-body-color"><?php echo e(optional($item->tgl)->format('d M Y') ?: optional($item->created_at)->format('d M Y') ?: '-'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="w-full px-4">
                        <p class="text-center">Belum ada informasi.</p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="wow fadeInUp -mx-4 flex flex-wrap" data-wow-delay=".15s">
                <div class="w-full px-4">
                    <div class="pt-8">
                        <?php if(isset($informasi) && $informasi->total() > 6): ?>
                            <?php
                                $last = $informasi->lastPage();
                                $current = $informasi->currentPage();
                                // helper to generate visible page numbers
                                $pages = [];
                                if ($last <= 7) {
                                    for ($i = 1; $i <= $last; $i++) $pages[] = $i;
                                } else {
                                    $pages[] = 1;
                                    $pages[] = 2;
                                    if ($current > 4) $pages[] = '...';
                                    $start = max(3, $current - 1);
                                    $end = min($last - 2, $current + 1);
                                    for ($i = $start; $i <= $end; $i++) $pages[] = $i;
                                    if ($current < $last - 3) $pages[] = '...';
                                    $pages[] = $last;
                                }
                            ?>
                            <ul class="flex items-center justify-center pt-8">
                                <li class="mx-1">
                                    <a href="<?php echo e($informasi->previousPageUrl() ?: '#0'); ?>"
                                        class="flex h-9 min-w-[36px] items-center justify-center rounded-md bg-body-color bg-opacity-[15%] px-4 text-sm text-body-color transition hover:bg-primary hover:bg-opacity-100 hover:text-white <?php echo e($informasi->onFirstPage() ? 'opacity-50 pointer-events-none' : ''); ?>">Prev</a>
                                </li>
                                <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($p === '...'): ?>
                                        <li class="mx-1"><span class="flex h-9 min-w-[36px] cursor-not-allowed items-center justify-center rounded-md bg-body-color bg-opacity-[15%] px-4 text-sm text-body-color">...</span></li>
                                    <?php else: ?>
                                        <li class="mx-1"><a href="<?php echo e($informasi->url($p)); ?>" class="flex h-9 min-w-[36px] items-center justify-center rounded-md <?php echo e($p == $current ? 'bg-primary text-white' : 'bg-body-color bg-opacity-[15%] text-body-color'); ?> px-4 text-sm transition hover:bg-primary hover:bg-opacity-100 hover:text-white"><?php echo e($p); ?></a></li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <li class="mx-1">
                                    <a href="<?php echo e($informasi->nextPageUrl() ?: '#0'); ?>"
                                        class="flex h-9 min-w-[36px] items-center justify-center rounded-md bg-body-color bg-opacity-[15%] px-4 text-sm text-body-color transition hover:bg-primary hover:bg-opacity-100 hover:text-white <?php echo e($informasi->hasMorePages() ? '' : 'opacity-50 pointer-events-none'); ?>">Next</a>
                                </li>
                            </ul>
                        <?php else: ?>
                            <?php echo e($informasi->links() ?? ''); ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!--mulai partials  footer -->
    <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <!--akhir partials footer -->

    <!--mulai partials  script -->
    <?php echo $__env->make('partials.script', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <!--akhir partials script -->
    <script>
        // Ensure ellipsis only if text is actually truncated (line-clamp fallback helper)
        document.addEventListener('DOMContentLoaded', function () {
            function isOverflowing(el) {
                return el.scrollHeight > el.clientHeight || el.scrollWidth > el.clientWidth;
            }

            document.querySelectorAll('.js-ensure-ellipsis').forEach(function (el) {
                // If browser supports -webkit-line-clamp, it will visually truncate.
                // We check overflow and if true, append a visible ellipsis at the end.
                if (isOverflowing(el)) {
                    var text = el.textContent.trim();
                    // binary search to find maximum characters that fit
                    var low = 0, high = text.length, best = '';
                    while (low <= high) {
                        var mid = Math.floor((low + high) / 2);
                        el.textContent = text.slice(0, mid) + '...';
                        if (isOverflowing(el)) {
                            high = mid - 1;
                        } else {
                            best = el.textContent;
                            low = mid + 1;
                        }
                    }
                    if (best) el.textContent = best;
                }
            });
        });
    </script>
</body>

</html><?php /**PATH C:\Users\Danir\pinha\resources\views/informasi/administrasi/index.blade.php ENDPATH**/ ?>