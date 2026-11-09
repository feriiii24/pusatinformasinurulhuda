<!DOCTYPE html>
<html lang="en">

<head>
	<?php echo $__env->make('partials.head', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
	<title>Informasi Update | Pusat Informasi Nurul Huda</title>

</head>

<?php use Illuminate\Support\Str; ?>
<body class="bg-[#FCFCFC] dark:bg-black __className_f367f3">
	<?php echo $__env->make('partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
	<section class="relative z-10 overflow-hidden pt-28 lg:pt-[150px]">
		<div class="container">
			<div class="-mx-4 flex flex-wrap items-center">
				<div class="w-full px-4 md:w-8/12 lg:w-7/12">
					<div class="mb-8 max-w-[570px] md:mb-0 lg:mb-12">
						<h1 class="mb-5 text-2xl font-bold text-black dark:text-white sm:text-3xl">Informasi Update</h1>
						<p class="text-base font-medium leading-relaxed text-body-color">Daftar informasi update terbaru di PINHA.</p>
					</div>
				</div>
				<div class="w-full px-4 md:w-4/12 lg:w-5/12">
					<div class="text-end">
						<ul class="flex items-center md:justify-end">
							<li class="flex items-center"><a class="pr-1 text-base font-medium text-body-color hover:text-primary" href="/">Beranda</a><span class="mr-3 block h-2 w-2 rotate-45 border-r-2 border-t-2 border-body-color"></span></li>
							<li class="text-base font-medium text-primary">Informasi Update</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="pb-[120px] pt-[120px]">
		<div class="container">
			<div class="-mx-4 flex flex-wrap justify-center">
				<?php if(isset($informasi) && $informasi->count()): ?>
					<?php $__currentLoopData = $informasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="w-full px-4 md:w-2/3 lg:w-1/2 xl:w-1/3" style="margin-bottom:28px;">
							<div class="wow fadeInUp hover:shadow-two dark:hover:shadow-gray-dark group relative overflow-hidden rounded-sm bg-white shadow-one duration-300 dark:bg-dark flex flex-col h-full" data-wow-delay=".1s">
								<div class="relative w-full" style="height:220px;overflow:hidden;">
									<a class="absolute inset-0 block w-full h-full" href="<?php echo e(($item && ($item->slug ?? $item->id)) ? route('informasi.update.details', $item) : '#0'); ?>" style="display:block;width:100%;height:100%;">
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
											<a class="mb-4 block text-xl font-bold text-black hover:text-primary dark:text-white dark:hover:text-primary sm:text-2xl js-ensure-ellipsis" href="<?php echo e(($item && ($item->slug ?? $item->id)) ? route('informasi.update.details', $item) : '#0'); ?>" style="display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;"><?php echo e($item->judul_informasi); ?></a>
										</h3>
										<p class="mb-6 border-b border-body-color border-opacity-10 pb-6 text-base font-medium text-body-color dark:border-white dark:border-opacity-10 js-ensure-ellipsis" style="display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;"><?php echo e(strip_tags($item->deskripsi)); ?></p>
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
									<a href="<?php echo e($informasi->previousPageUrl() ?: '#0'); ?>" class="flex h-9 min-w-[36px] items-center justify-center rounded-md bg-body-color bg-opacity-[15%] px-4 text-sm text-body-color transition hover:bg-primary hover:bg-opacity-100 hover:text-white <?php echo e($informasi->onFirstPage() ? 'opacity-50 pointer-events-none' : ''); ?>">Prev</a>
								</li>
								<?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($p === '...'): ?>
										<li class="mx-1"><span class="flex h-9 min-w-[36px] cursor-not-allowed items-center justify-center rounded-md bg-body-color bg-opacity-[15%] px-4 text-sm text-body-color">...</span></li>
									<?php else: ?>
										<li class="mx-1"><a href="<?php echo e($informasi->url($p)); ?>" class="flex h-9 min-w-[36px] items-center justify-center rounded-md <?php echo e($p == $current ? 'bg-primary text-white' : 'bg-body-color bg-opacity-[15%] text-body-color'); ?> px-4 text-sm transition hover:bg-primary hover:bg-opacity-100 hover:text-white"><?php echo e($p); ?></a></li>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<li class="mx-1">
									<a href="<?php echo e($informasi->nextPageUrl() ?: '#0'); ?>" class="flex h-9 min-w-[36px] items-center justify-center rounded-md bg-body-color bg-opacity-[15%] px-4 text-sm text-body-color transition hover:bg-primary hover:bg-opacity-100 hover:text-white <?php echo e($informasi->hasMorePages() ? '' : 'opacity-50 pointer-events-none'); ?>">Next</a>
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
	<?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
	<?php echo $__env->make('partials.script', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			function isOverflowing(el) { return el.scrollHeight > el.clientHeight || el.scrollWidth > el.clientWidth; }
			document.querySelectorAll('.js-ensure-ellipsis').forEach(function (el) {
				if (isOverflowing(el)) {
					var text = el.textContent.trim(); var low = 0, high = text.length, best = '';
					while (low <= high) { var mid = Math.floor((low + high) / 2); el.textContent = text.slice(0, mid) + '...'; if (isOverflowing(el)) { high = mid - 1; } else { best = el.textContent; low = mid + 1; } }
					if (best) el.textContent = best;
				}
			});
		});
	</script>
</body>

</html>

<?php /**PATH C:\Users\Danir\pinha\resources\views/informasi/update/index.blade.php ENDPATH**/ ?>