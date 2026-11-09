<header class="header left-0 top-0 z-40 flex w-full items-center fixed bg-white dark:bg-dark shadow-sm">
    <div class="container">
        <div class="relative -mx-4 flex items-center justify-between">
            <div class="w-60 max-w-full px-4 xl:mr-12">
                <a class="header-logo block w-full py-8 " href="/">
                    <!-- fixed: remove duplicate alt, keep single alt at end -->
                    <img loading="lazy" width="140" height="30" decoding="async" data-nimg="1"
                        class="w-full dark:hidden" style="color:transparent"
                        src="<?php echo e(asset('landing/images/logo/pinha.svg')); ?>" alt="logo">
                    <!-- fixed: asset(...) usage -->
                    <img loading="lazy" width="140" height="30" decoding="async" data-nimg="1"
                        class="hidden w-full dark:block" style="color:transparent"
                        src="<?php echo e(asset('landing/images/logo/pinhaputih.svg')); ?>" alt="logo" />
                </a>
            </div>
            <div class="flex w-full items-center justify-between px-4">
                <div>
                    <button id="navbarToggler" aria-label="Mobile Menu"
                        class="absolute right-4 top-1/2 block translate-y-[-50%] rounded-lg px-3 py-[6px] ring-primary focus:ring-2 lg:hidden">
                        <span
                            class="relative my-1.5 block h-0.5 w-[30px] bg-black transition-all duration-300 dark:bg-white"></span>
                        <span
                            class="relative my-1.5 block h-0.5 w-[30px] bg-black transition-all duration-300 dark:bg-white"></span>
                        <span
                            class="relative my-1.5 block h-0.5 w-[30px] bg-black transition-all duration-300 dark:bg-white"></span>
                    </button>

                    <nav id="navbarCollapse"
                        class="navbar absolute right-0 z-30 w-[250px] rounded border-[.5px] border-body-color/50 bg-white px-6 py-4 duration-300 dark:border-body-color/20 dark:bg-dark lg:visible lg:static lg:w-auto lg:border-none lg:!bg-transparent lg:p-0 lg:opacity-100 invisible top-[120%] opacity-0">
                        <ul class="block lg:flex lg:space-x-12">
                <li class="group relative"><a
                    class="flex py-2 text-base lg:mr-0 lg:inline-flex lg:px-0 lg:py-6 text-primary dark:text-white"
                    href="/">Beranda</a></li>
                <li class="group relative"><a
                    class="flex py-2 text-base lg:mr-0 lg:inline-flex lg:px-0 lg:py-6 text-dark hover:text-primary dark:text-white/70 dark:hover:text-white"
                    href="<?php echo e(route('about')); ?>">Tentang</a>
                </li>
        <li class="group relative"><a
            class="flex py-2 text-base lg:mr-0 lg:inline-flex lg:px-0 lg:py-6 text-dark hover:text-primary dark:text-white/70 dark:hover:text-white"
            href="<?php echo e(route('informasidokumen')); ?>">Dokumen</a></li>
                <li class="group relative"><a
                    class="flex py-2 text-base lg:mr-0 lg:inline-flex lg:px-0 lg:py-6 text-dark hover:text-primary dark:text-white/70 dark:hover:text-white"
                    href="<?php echo e(route('contact')); ?>">Kontak</a></li>
                            <li class="group relative">
                                <p
                                    class="flex cursor-pointer items-center justify-between py-2 text-base text-dark group-hover:text-primary dark:text-white/70 dark:group-hover:text-white lg:mr-0 lg:inline-flex lg:px-0 lg:py-6">
                                    Informasi<span class="pl-3"><svg width="25" height="24" viewBox="0 0 25 24">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M6.29289 8.8427C6.68342 8.45217 7.31658 8.45217 7.70711 8.8427L12 13.1356L16.2929 8.8427C16.6834 8.45217 17.3166 8.45217 17.7071 8.8427C18.0976 9.23322 18.0976 9.86639 17.7071 10.2569L12 15.964L6.29289 10.2569C5.90237 9.86639 5.90237 9.23322 6.29289 8.8427Z"
                                                fill="currentColor"></path>
                                        </svg></span></p>
                                <div
                                    class="submenu relative left-0 top-full rounded-sm bg-white transition-[top] duration-300 group-hover:opacity-100 dark:bg-dark lg:invisible lg:absolute lg:top-[110%] lg:block lg:w-[250px] lg:p-4 lg:opacity-0 lg:shadow-lg lg:group-hover:visible lg:group-hover:top-full hidden">
                                    <a class="block rounded py-2.5 text-sm text-dark hover:text-primary dark:text-white/70 dark:hover:text-white lg:px-3"
                                        href="<?php echo e(route('blog')); ?>">Informasi Umum</a>
                                    <a class="block rounded py-2.5 text-sm text-dark hover:text-primary dark:text-white/70 dark:hover:text-white lg:px-3"
                                        href="<?php echo e(route('informasi.akademik.index')); ?>">Informasi Akademik</a>
                                    <a class="block rounded py-2.5 text-sm text-dark hover:text-primary dark:text-white/70 dark:hover:text-white lg:px-3"
                                        href="<?php echo e(route('informasi.administrasi.index')); ?>">Informasi Administrasi</a>
                                    <a class="block rounded py-2.5 text-sm text-dark hover:text-primary dark:text-white/70 dark:hover:text-white lg:px-3"
                                        href="<?php echo e(route('informasi.penasantri.index')); ?>">Informasi Pena Santri</a>
                                    <a class="block rounded py-2.5 text-sm text-dark hover:text-primary dark:text-white/70 dark:hover:text-white lg:px-3"
                                        href="<?php echo e(route('informasi.kegiatan.index')); ?>">Informasi Kegiatan</a>
                                    
                                    <a class="block rounded py-2.5 text-sm text-dark hover:text-primary dark:text-white/70 dark:hover:text-white lg:px-3"
                                        href="<?php echo e(route('informasi.masyarakat.index')); ?>">Informasi Masyarakat</a>
                                    <a class="block rounded py-2.5 text-sm text-dark hover:text-primary dark:text-white/70 dark:hover:text-white lg:px-3"
                                        href="<?php echo e(route('informasi.update.index')); ?>">Update</a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="flex items-center justify-end pr-16 lg:pr-0">
                    <a class="hidden px-7 py-3 text-base font-medium text-dark hover:opacity-70 dark:text-white md:block"
                        href="<?php echo e(route('login')); ?>">Masuk</a>
                    <a class="ease-in-up hidden rounded-sm bg-primary px-8 py-3 text-base font-medium text-white shadow-btn transition duration-300 hover:bg-opacity-90 hover:shadow-btn-hover md:block md:px-9 lg:px-6 xl:px-9"
                        href="<?php echo e(route('register')); ?>">Daftar</a>
                    <div>
                        <button aria-label="theme toggler"
                            class="flex items-center justify-center text-black rounded-full cursor-pointer bg-gray-200 dark:bg-gray-800 h-9 w-9 dark:text-white ml-4">
                            <!-- Light mode icon -->
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                class="w-6 h-6 stroke-black dark:hidden">
                                <circle cx="12" cy="12" r="5" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                            <!-- Dark mode icon -->
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                class="hidden w-6 h-6 dark:block">
                                <path d="M21 12.79A9 9 0 0111.21 3 7 7 0 1012 21a9 9 0 009-8.21z" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                        <script>
                            const themeToggler = document.querySelector('[aria-label="theme toggler"]');
                            themeToggler.addEventListener('click', () => {
                                document.documentElement.classList.toggle('dark');
                            });
                        </script>


                    </div>
                </div>
            </div>
        </div>
    </div>
</header><?php /**PATH C:\Users\Danir\pinha\resources\views/partials/header.blade.php ENDPATH**/ ?>