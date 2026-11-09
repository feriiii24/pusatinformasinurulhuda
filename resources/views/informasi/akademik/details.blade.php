<!DOCTYPE html>
<html lang="en">

<head>
    <!--mulai partials  head -->
    @include('partials.head')
    <!--akhir partials head -->
    <title>Informasi Detail | Pusat Informasi Nurul Huda</title>

</head>

<body class="bg-[#FCFCFC] dark:bg-black __className_f367f3">
    <script>!function () { try { var d = document.documentElement, c = d.classList; c.remove('light', 'dark'); var e = localStorage.getItem('theme'); if (e) { c.add(e || '') } else { c.add('dark'); } if (e === 'light' || e === 'dark' || !e) d.style.colorScheme = e || 'dark' } catch (t) { } }();</script>
    <!--mulai partials  header -->
    @include('partials.header')
    <!--akhir partials header -->
    <section class="pb-[120px] pt-[150px]">
        <div class="container">
            <div class="-mx-4 flex flex-wrap justify-center">
                <div class="w-full px-4 lg:w-8/12">
                    <div>
                        <h2
                            class="mb-8 text-3xl font-bold leading-tight text-black dark:text-white sm:text-4xl sm:leading-tight">
                            {{ $informasi->judul_informasi }}
                        </h2>
                        <div
                            class="mb-10 flex flex-wrap items-center justify-between border-b border-body-color border-opacity-10 pb-4 dark:border-white dark:border-opacity-10">
                            <div class="flex flex-wrap items-center">
                                @if($informasi->user || ($informasi->user?->avatar ?? false))
                                    <div class="mb-5 mr-10 flex items-center">
                                        <div class="mr-4">
                                            <div class="relative h-10 w-10 overflow-hidden rounded-full">
                                                @if($informasi->user && $informasi->user->avatar)
                                                    <img alt="author" loading="lazy" decoding="async" data-nimg="fill"
                                                        style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent"
                                                        src="{{ asset('storage/' . $informasi->user->avatar) }}" />
                                                @else
                                                    <img alt="author" loading="lazy" decoding="async" data-nimg="fill"
                                                        style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent"
                                                        src="/images/blog/author-02.png" />
                                                @endif
                                            </div>
                                        </div>
                                        <div class="w-full"><span class="mb-1 text-base font-medium text-body-color">By
                                                <span>{{ $informasi->user?->name ?? 'Unknown' }}</span></span></div>
                                    </div>
                                @endif
                                @if($informasi->tgl || $informasi->jumlah_suka || $informasi->jumlah_penonton)
                                    <div class="mb-5 flex items-center">
                                        <p class="mr-5 flex items-center text-base font-medium text-body-color"><span
                                                class="mr-3"><!-- Calendar Icon -->
                                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg" class="fill-current"
                                                    aria-hidden="true">
                                                    <rect x="3" y="5" width="18" height="16" rx="2" stroke="currentColor"
                                                        stroke-width="1.5" fill="none" />
                                                    <path d="M16 3v4M8 3v4" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M3 10h18" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>

                                            </span>{{ optional($informasi->tgl)->format('d M Y') ?: optional($informasi->created_at)->format('d M Y') ?: '-' }}
                                        </p>
                                        <p class="mr-5 flex items-center text-base font-medium text-body-color">
                                            @php
                                                $likeParam = null;
                                                if (isset($informasi)) {
                                                    $likeParam = $informasi->slug ?? $informasi->id ?? null;
                                                }
                                            @endphp
                                            @if($likeParam)
                                                <form id="like-form" action="{{ route('informasi.akademik.like', ['id' => $likeParam]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button id="like-button" type="submit"
                                                        class="inline-flex items-center rounded-md bg-red-500 px-3 py-2 text-sm font-medium text-white hover:opacity-90 disabled:opacity-60">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            viewBox="0 0 24 24" fill="currentColor" class="mr-2">
                                                            <path
                                                                d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3 c1.74 0 3.41 0.81 4.5 2.09 C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5 c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                                                        </svg>
                                                        <span id="like-count">{{ $informasi->jumlah_suka ?? 0 }}</span>
                                                    </button>
                                                </form>
                                            @else
                                            <button
                                                class="inline-flex items-center rounded-md bg-red-500 px-3 py-2 text-sm font-medium text-white opacity-60 cursor-not-allowed"
                                                disabled>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="currentColor" class="mr-2">
                                                    <path
                                                        d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3 c1.74 0 3.41 0.81 4.5 2.09 C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5 c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                                                </svg>
                                                <span>{{ $informasi->jumlah_suka ?? 0 }}</span>
                                            </button>
                                        @endif
                                        </p>
                                        <p class="flex items-center text-base font-medium text-body-color"><span
                                                class="mr-3"><svg width="20" height="12" viewBox="0 0 20 12"
                                                    class="fill-current">
                                                    <path
                                                        d="M10.2559 3.8125C9.03711 3.8125 8.06836 4.8125 8.06836 6C8.06836 7.1875 9.06836 8.1875 10.2559 8.1875C11.4434 8.1875 12.4434 7.1875 12.4434 6C12.4434 4.8125 11.4746 3.8125 10.2559 3.8125ZM10.2559 7.09375C9.66211 7.09375 9.16211 6.59375 9.16211 6C9.16211 5.40625 9.66211 4.90625 10.2559 4.90625C10.8496 4.90625 11.3496 5.40625 11.3496 6C11.3496 6.59375 10.8496 7.09375 10.2559 7.09375Z">
                                                    </path>
                                                    <path
                                                        d="M19.7559 5.625C17.6934 2.375 14.1309 0.4375 10.2559 0.4375C6.38086 0.4375 2.81836 2.375 0.755859 5.625C0.630859 5.84375 0.630859 6.125 0.755859 6.34375C2.81836 9.59375 6.38086 11.5312 10.2559 11.5312C14.1309 11.5312 17.6934 9.59375 19.7559 6.34375C19.9121 6.125 19.9121 5.84375 19.7559 5.625ZM10.2559 10.4375C6.84961 10.4375 3.69336 8.78125 1.81836 5.96875C3.69336 3.1875 6.84961 1.53125 10.2559 1.53125C13.6621 1.53125 16.8184 3.1875 18.6934 5.96875C16.8184 8.78125 13.6621 10.4375 10.2559 10.4375Z">
                                                    </path>
                                                </svg></span>{{ $informasi->jumlah_penonton ?? 0 }}</p>
                                    </div>
                                @endif
                            </div>
                            @if($informasi->unit)
                                <div class="mb-5"><a href="#0"
                                        class="inline-flex items-center justify-center rounded-full bg-primary px-4 py-2 text-sm font-semibold text-white">{{ $informasi->unit }}</a>
                                </div>
                            @endif
                        </div>
                        <div style="text-align: justify;">
                            @php
                                $desc = $informasi->deskripsi ?? '';
                                $first_html = null;
                                if ($desc) {
                                    // Prefer the first HTML paragraph if present
                                    if (preg_match('/<p[^>]*>.*?<\/p>/is', $desc, $m)) {
                                        // use the first matched <p>...</p>
                                        $first_html = $m[0];
                                        // optional: ensure it contains the same classes as layout
                                        if (!preg_match('/<p[^>]*class=["\'].*?["\']/i', $first_html)) {
                                            // inject the class attribute into the opening <p>
                                            $first_html = preg_replace('/<p(?![^>]*class=)/i', '<p class="mb-10 text-base font-medium leading-relaxed text-body-color sm:text-lg sm:leading-relaxed lg:text-base lg:leading-relaxed xl:text-lg xl:leading-relaxed"', $first_html, 1);
                                        }
                                    } else {
                                        // fallback: split by double newline or <br> and take the first block
                                        $parts = preg_split('/\r?\n\r?\n|<br\s*\/?\s*>/i', strip_tags($desc));
                                        $part = trim($parts[0] ?? '');
                                        if ($part !== '') {
                                            $first_html = '<p class="mb-10 text-base font-medium leading-relaxed text-body-color sm:text-lg sm:leading-relaxed lg:text-base lg:leading-relaxed xl:text-lg xl:leading-relaxed">' . e($part) . '</p>';
                                        }
                                    }
                                }
                            @endphp
                            {!! $first_html ?? '' !!}
                            <div class="mb-10 w-full overflow-hidden rounded">
                                <div class="relative aspect-[97/60] w-full sm:aspect-[97/44]">
                                    @if($informasi->foto_kedua)
                                        <img alt="image" loading="lazy" decoding="async" data-nimg="fill"
                                            class="object-cover object-center"
                                            style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent"
                                            src="{{ asset('storage/' . $informasi->foto_kedua) }}" />
                                    @else
                                        <img alt="image" loading="lazy" decoding="async" data-nimg="fill"
                                            class="object-cover object-center"
                                            style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent"
                                            src="/images/blog/blog-details-02.jpg" />
                                    @endif
                                </div>
                            </div>

                            {{-- main description (HTML allowed because content may include formatting) --}}
                            <div class="mb-10" style="text-align: justify;">
                                @php
                                    $desc = $informasi->deskripsi ?? '';
                                    $para_class = 'mb-10 text-base font-medium leading-relaxed text-body-color sm:text-lg sm:leading-relaxed lg:text-base lg:leading-relaxed xl:text-lg xl:leading-relaxed';
                                @endphp

                                @if($desc)
                                    @php
                                        // If there are existing <p> tags, output them (adding classes if missing)
                                        if (preg_match_all('/<p[^>]*>.*?<\/p>/is', $desc, $matches)) {
                                            foreach ($matches[0] as $p) {
                                                if (!preg_match('/<p[^>]*class=["\'].*?["\']/i', $p)) {
                                                    $p = preg_replace('/<p(?![^>]*class=)/i', '<p class="' . $para_class . '"', $p, 1);
                                                }
                                                echo $p;
                                            }
                                        } else {
                                            // No HTML paragraphs: split plain text into readable paragraphs
                                            $text = trim(strip_tags($desc));
                                            // First try splitting by blank lines
                                            $parts = preg_split('/\r?\n\r?\n+/', $text);
                                            $paragraphs = [];
                                            foreach ($parts as $part) {
                                                $part = trim($part);
                                                if ($part === '')
                                                    continue;
                                                if (mb_strlen($part) <= 600) {
                                                    $paragraphs[] = $part;
                                                } else {
                                                    // Chunk into ~600-char pieces at sentence or space boundaries
                                                    $start = 0;
                                                    $len = mb_strlen($part);
                                                    while ($start < $len) {
                                                        $slice = mb_substr($part, $start, 600);
                                                        $pos = mb_strrpos($slice, '.');
                                                        if ($pos === false)
                                                            $pos = mb_strrpos($slice, ' ');
                                                        if ($pos === false)
                                                            $pos = mb_strlen($slice);
                                                        $chunk = trim(mb_substr($part, $start, $pos + 1));
                                                        if ($chunk === '') { // fallback
                                                            $chunk = trim(mb_substr($part, $start, 600));
                                                            $pos = mb_strlen($chunk);
                                                        }
                                                        $paragraphs[] = $chunk;
                                                        $start += $pos + 1;
                                                    }
                                                }
                                            }

                                            foreach ($paragraphs as $p) {
                                                echo '<p class="' . $para_class . '">' . e($p) . '</p>';
                                            }
                                        }
                                    @endphp
                                @endif
                            </div>

                            <div
                                class="relative z-10 mb-10 overflow-hidden rounded-md bg-primary bg-opacity-10 p-8 md:p-9 lg:p-8 xl:p-9">
                                <p class="text-center text-base font-medium italic text-body-color">Pusat Informasi
                                    Nurul Huda ( PINHA ) sebagai kiblat informasi terpercaya,cepat,dan akurat yang ada
                                    di YAYASAN PONDOK PESANTREN NURUL HUDA SUKARAJA.</p><span
                                    class="absolute left-0 top-0 z-[-1]"><svg width="132" height="109"
                                        viewBox="0 0 132 109" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5"
                                            d="M33.0354 90.11C19.9851 102.723 -3.75916 101.834 -14 99.8125V-15H132C131.456 -12.4396 127.759 -2.95278 117.318 14.5117C104.268 36.3422 78.7114 31.8952 63.2141 41.1934C47.7169 50.4916 49.3482 74.3435 33.0354 90.11Z"
                                            fill="url(#paint0_linear_111:606)"></path>
                                        <path opacity="0.5"
                                            d="M33.3654 85.0768C24.1476 98.7862 1.19876 106.079 -9.12343 108.011L-38.876 22.9988L100.816 -25.8905C100.959 -23.8126 99.8798 -15.5499 94.4164 0.87754C87.5871 21.4119 61.9822 26.677 49.5641 38.7512C37.146 50.8253 44.8877 67.9401 33.3654 85.0768Z"
                                            fill="url(#paint1_linear_111:606)"></path>
                                        <defs>
                                            <linearGradient id="paint0_linear_111:606" x1="94.7523" y1="82.0246"
                                                x2="8.40951" y2="52.0609" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="white" stop-opacity="0.06"></stop>
                                                <stop offset="1" stop-color="white" stop-opacity="0"></stop>
                                            </linearGradient>
                                            <linearGradient id="paint1_linear_111:606" x1="90.3206" y1="58.4236"
                                                x2="1.16149" y2="50.8365" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="white" stop-opacity="0.06"></stop>
                                                <stop offset="1" stop-color="white" stop-opacity="0"></stop>
                                            </linearGradient>
                                        </defs>
                                    </svg></span><span class="absolute bottom-0 right-0 z-[-1]"><svg width="53"
                                        height="30" viewBox="0 0 53 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle opacity="0.8" cx="37.5" cy="37.5" r="37.5" fill="#4A6CF7"></circle>
                                        <mask id="mask0_111:596" style="mask-type:alpha" maskUnits="userSpaceOnUse"
                                            x="0" y="0" width="75" height="75">
                                            <circle opacity="0.8" cx="37.5" cy="37.5" r="37.5" fill="#4A6CF7"></circle>
                                        </mask>
                                        <g mask="url(#mask0_111:596)">
                                            <circle opacity="0.8" cx="37.5" cy="37.5" r="37.5"
                                                fill="url(#paint0_radial_111:596)"></circle>
                                            <g opacity="0.8" filter="url(#filter0_f_111:596)">
                                                <circle cx="40.8089" cy="19.853" r="15.4412" fill="white"></circle>
                                            </g>
                                        </g>
                                        <defs>
                                            <filter id="filter0_f_111:596" x="4.36768" y="-16.5881" width="72.8823"
                                                height="72.8823" filterUnits="userSpaceOnUse"
                                                color-interpolation-filters="sRGB">
                                                <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                                                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix"
                                                    result="shape"></feBlend>
                                                <feGaussianBlur stdDeviation="10.5"
                                                    result="effect1_foregroundBlur_111:596"></feGaussianBlur>
                                            </filter>
                                            <radialGradient id="paint0_radial_111:596" cx="0" cy="0" r="1"
                                                gradientUnits="userSpaceOnUse"
                                                gradientTransform="translate(37.5 37.5) rotate(90) scale(40.2574)">
                                                <stop stop-opacity="0.47"></stop>
                                                <stop offset="1" stop-opacity="0"></stop>
                                            </radialGradient>
                                        </defs>
                                    </svg></span>
                            </div>

                            <div class="items-center justify-between sm:flex">
                                <div class="mb-5">
                                    <h4 class="mb-3 text-sm font-medium text-body-color">Popular Tags :</h4>
                                    <div class="flex items-center"><a href="#0"
                                            class="bg-gray-light mb-3 mr-3 inline-flex items-center justify-center rounded-sm px-4 py-2 text-sm text-black duration-300 hover:bg-primary hover:text-white dark:bg-[#2C303B] dark:text-white dark:hover:bg-primary">PINHA</a><a
                                            href="#0"
                                            class="bg-gray-light mb-3 mr-3 inline-flex items-center justify-center rounded-sm px-4 py-2 text-sm text-black duration-300 hover:bg-primary hover:text-white dark:bg-[#2C303B] dark:text-white dark:hover:bg-primary">NURULHUDA</a><a
                                            href="#0"
                                            class="bg-gray-light mb-3 mr-3 inline-flex items-center justify-center rounded-sm px-4 py-2 text-sm text-black duration-300 hover:bg-primary hover:text-white dark:bg-[#2C303B] dark:text-white dark:hover:bg-primary">YPPNHSUKARAJA</a>
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <h5 class="mb-3 text-sm font-medium text-body-color sm:text-right">Bagikan ke :
                                    </h5>
                                    <div class="flex items-center sm:justify-end">
                                        <a href="#0" aria-label="share-whatsapp"
                                            class="social-icon bg-gray-light dark:bg-gray-dark mb-3 inline-flex h-9 w-9 items-center justify-center rounded-sm text-body-color duration-300 hover:bg-primary hover:text-white dark:hover:bg-primary sm:ml-3">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path
                                                    d="M20.52 3.48A11.95 11.95 0 0012 0C5.373 0 .001 5.373.001 12c0 2.116.556 4.18 1.61 6.01L0 24l6.24-1.639A11.95 11.95 0 0012 24c6.627 0 12-5.373 12-12 0-1.85-.406-3.6-1.48-5.02zM12 21.5c-1.6 0-3.12-.4-4.45-1.12l-.32-.18-3.7.97.99-3.6-.21-.35A9.5 9.5 0 012.5 12c0-5.25 4.25-9.5 9.5-9.5S21.5 6.75 21.5 12 17.25 21.5 12 21.5z" />
                                                <path
                                                    d="M17.4 14.1c-.3-.15-1.78-.88-2.06-.98-.28-.1-.48-.15-.68.15s-.78.98-.96 1.18c-.17.2-.36.22-.66.07-.3-.15-1.24-.46-2.36-1.45-.87-.77-1.46-1.72-1.63-2.02-.17-.3-.02-.46.13-.61.13-.13.3-.36.45-.54.15-.18.2-.3.3-.5.1-.2 0-.37-.02-.52-.02-.16-.68-1.63-.93-2.24-.24-.58-.49-.5-.68-.51l-.58-.01c-.2 0-.52.07-.8.37s-1.05 1.03-1.05 2.51 1.08 2.9 1.23 3.1c.15.2 2.12 3.3 5.13 4.62 3.02 1.32 3.02.88 3.57.82.55-.07 1.78-.73 2.03-1.44.25-.71.25-1.32.18-1.45-.07-.14-.27-.22-.58-.37z" />
                                            </svg>
                                        </a>
                                        <a href="#0" aria-label="share-facebook"
                                            class="social-icon bg-gray-light dark:bg-gray-dark mb-3 ml-3 inline-flex h-9 w-9 items-center justify-center rounded-sm text-body-color duration-300 hover:bg-primary hover:text-white dark:hover:bg-primary">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path
                                                    d="M22 12.07C22 6.48 17.52 2 12 2S2 6.48 2 12.07C2 17.09 5.66 21.2 10.44 22v-7.03H7.9v-2.9h2.54V9.84c0-2.5 1.49-3.89 3.77-3.89 1.09 0 2.23.2 2.23.2v2.46h-1.25c-1.23 0-1.61.77-1.61 1.56v1.88h2.74l-.44 2.9h-2.3V22C18.34 21.2 22 17.09 22 12.07z" />
                                            </svg>
                                        </a>
                                        <a href="#0" aria-label="share-link"
                                            class="social-icon bg-gray-light dark:bg-gray-dark mb-3 ml-3 inline-flex h-9 w-9 items-center justify-center rounded-sm text-body-color duration-300 hover:bg-primary hover:text-white dark:hover:bg-primary">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path
                                                    d="M10.59 13.41a3 3 0 004.24 0l3.54-3.54a3 3 0 10-4.24-4.24L10.59 9.17a1 1 0 101.42 1.42L15.56 8.8a1 1 0 011.41 1.41l-3.54 3.54a5 5 0 11-7.07-7.07l1.41-1.41A5 5 0 0116.97 12.97l-1.41 1.41a3 3 0 010-4.24L14.02 9.7a1 1 0 10-1.42-1.42L9.06 12.82a3 3 0 000 4.24z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var likeForm = document.getElementById('like-form');
            if (!likeForm) return;
            var likeButton = document.getElementById('like-button');
            var likeCount = document.getElementById('like-count');

            likeForm.addEventListener('submit', function (e) {
                e.preventDefault();
                if (likeButton.disabled) return;
                likeButton.disabled = true;

                var tokenInput = likeForm.querySelector('input[name="_token"]');
                var token = tokenInput ? tokenInput.value : '';

                fetch(likeForm.action, {
                    method: 'POST',
                    credentials: 'same-origin',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({})
                }).then(function (res) {
                    if (!res.ok) throw res;
                    return res.json();
                }).then(function (data) {
                    if (data && typeof data.jumlah_suka !== 'undefined') {
                        likeCount.textContent = data.jumlah_suka;
                    }
                }).catch(function (err) {
                    console.error('Like error', err);
                    // try to parse json error message
                    if (err && err.json) {
                        err.json().then(function (j) {
                            alert(j.message || 'Gagal memberi like.');
                        }).catch(function () { alert('Gagal memberi like.'); });
                    } else {
                        alert('Gagal memberi like.');
                    }
                }).finally(function () {
                    // small delay to avoid spamming
                    setTimeout(function () { likeButton.disabled = false; }, 800);
                });
            });
        });
    </script>
</body>

</html>