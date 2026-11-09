<!DOCTYPE html>
<html lang="en">

<head>
    <!--mulai partials  head -->
    @include('partials.head')
    <!--akhir partials head -->
    <title>Kontak PINHA | Pusat Informasi Nurul Huda</title>

</head>

<body class="bg-[#FCFCFC] dark:bg-black __className_f367f3">
    <script>!function () { try { var d = document.documentElement, c = d.classList; c.remove('light', 'dark'); var e = localStorage.getItem('theme'); if (e) { c.add(e || '') } else { c.add('dark'); } if (e === 'light' || e === 'dark' || !e) d.style.colorScheme = e || 'dark' } catch (t) { } }();</script>
    <!--mulai partials  header -->
    @include('partials.header')
    <!--akhir partials header -->
    <section class="relative z-10 overflow-hidden pt-28 lg:pt-[150px]">
        <div class="container">
            <div class="-mx-4 flex flex-wrap items-center">
                <div class="w-full px-4 md:w-8/12 lg:w-7/12">
                    <div class="mb-8 max-w-[570px] md:mb-0 lg:mb-12">
                        <h1 class="mb-5 text-2xl font-bold text-black dark:text-white sm:text-3xl">Kontak PINHA</h1>
                        <p class="text-base font-medium leading-relaxed text-body-color">Hubungi PINHA – Pusat Informasi Nurul Huda untuk pertanyaan, saran, atau dukungan terkait akademik, administrasi, dan kegiatan santri. Tim kami siap membantu Anda dengan cepat dan profesional.</p>
                    </div>
                </div>
                <div class="w-full px-4 md:w-4/12 lg:w-5/12">
                    <div class="text-end">
                        <ul class="flex items-center md:justify-end">
                            <li class="flex items-center"><a
                                    class="pr-1 text-base font-medium text-body-color hover:text-primary"
                                    href="/">Home</a><span
                                    class="mr-3 block h-2 w-2 rotate-45 border-r-2 border-t-2 border-body-color"></span>
                            </li>
                            <li class="text-base font-medium text-primary">Kontak PINHA</li>
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
    <section id="contact" class="overflow-hidden py-16 md:py-20 lg:py-28">
        <div class="container">
            <div class="-mx-4 flex flex-wrap">
                <div class="w-full px-4 lg:w-7/12 xl:w-8/12">
                    <div class="wow fadeInUp shadow-three dark:bg-gray-dark mb-12 rounded-sm bg-white px-8 py-11 sm:p-[55px] lg:mb-5 lg:px-8 xl:p-[55px]"
                        data-wow-delay=".15s ">
                        <h2
                            class="mb-3 text-2xl font-bold text-black dark:text-white sm:text-3xl lg:text-2xl xl:text-3xl">
                            Butuh Bantuan? </h2>
                        <p class="mb-12 text-base font-medium text-body-color">Tim dukungan PINHA akan segera menghubungi Anda melalui email.</p>
                        <form>
                            <div class="-mx-4 flex flex-wrap">
                                <div class="w-full px-4 md:w-1/2">
                                    <div class="mb-8"><label for="name"
                                            class="mb-3 block text-sm font-medium text-dark dark:text-white">Nama
                                            Anda</label><input type="text" placeholder="Masukkan nama Anda"
                                            class="border-stroke dark:text-body-color-dark dark:shadow-two w-full rounded-sm border bg-[#f8f8f8] px-6 py-3 text-base text-body-color outline-none focus:border-primary dark:border-transparent dark:bg-[#2C303B] dark:focus:border-primary dark:focus:shadow-none" />
                                    </div>
                                </div>
                                <div class="w-full px-4 md:w-1/2">
                                    <div class="mb-8"><label for="email"
                                            class="mb-3 block text-sm font-medium text-dark dark:text-white">Email
                                            Anda</label><input type="email" placeholder="Masukkan email Anda"
                                            class="border-stroke dark:text-body-color-dark dark:shadow-two w-full rounded-sm border bg-[#f8f8f8] px-6 py-3 text-base text-body-color outline-none focus:border-primary dark:border-transparent dark:bg-[#2C303B] dark:focus:border-primary dark:focus:shadow-none" />
                                    </div>
                                </div>
                                <div class="w-full px-4">
                                    <div class="mb-8"><label for="message"
                                            class="mb-3 block text-sm font-medium text-dark dark:text-white">Pesan
                                            Anda</label><textarea name="message" rows="5"
                                            placeholder="Masukkan pesan Anda"
                                            class="border-stroke dark:text-body-color-dark dark:shadow-two w-full resize-none rounded-sm border bg-[#f8f8f8] px-6 py-3 text-base text-body-color outline-none focus:border-primary dark:border-transparent dark:bg-[#2C303B] dark:focus:border-primary dark:focus:shadow-none"></textarea>
                                    </div>
                                </div>
                                <div class="w-full px-4"><button
                                        class="shadow-submit dark:shadow-submit-dark rounded-sm bg-primary px-9 py-4 text-base font-medium text-white duration-300 hover:bg-primary/90">Kirim
                                        Pesan</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--mulai partials  footer -->
    @include('partials.footer')
    <!--akhir partials footer -->

    <!--mulai partials  script -->
    @include('partials.script')
    <!--akhir partials script -->
</body>

</html>