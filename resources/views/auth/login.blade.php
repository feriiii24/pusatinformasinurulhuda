<!DOCTYPE html>
<html lang="en">

<head>
    <!--mulai partials  head -->
    @include('partials.head')
    <!--akhir partials head -->
    <title>Sig In PINHA | Pusat Informasi Nurul Huda</title>

</head>

<body class="bg-[#FCFCFC] dark:bg-black __className_f367f3">
    <script>!function () { try { var d = document.documentElement, c = d.classList; c.remove('light', 'dark'); var e = localStorage.getItem('theme'); if (e) { c.add(e || '') } else { c.add('dark'); } if (e === 'light' || e === 'dark' || !e) d.style.colorScheme = e || 'dark' } catch (t) { } }();</script>
    <!--mulai partials  header -->
    @include('partials.header')
    <!--akhir partials header -->
    <section class="relative z-10 overflow-hidden pb-16 pt-36 md:pb-20 lg:pb-28 lg:pt-[180px]">
        <div class="container">
            <div class="-mx-4 flex flex-wrap">
                <div class="w-full px-4">
                    <div
                        class="shadow-three mx-auto max-w-[500px] rounded bg-white px-6 py-10 dark:bg-dark sm:p-[60px]">
                        <h3 class="mb-3 text-center text-2xl font-bold text-black dark:text-white sm:text-3xl">Masukan
                            akun anda</h3>

                        <div class="mb-8 flex items-center justify-center"><span
                                class="hidden h-[1px] w-full max-w-[70px] bg-body-color/50 sm:block"></span>
                            @if(session('throttle_expires_at'))
                                <div id="throttleAlert" class="w-full px-5 text-center text-base font-medium text-red-700">
                                    <div id="throttleMessage" class="text-red-500 text-sm">{{ $errors->first('throttle') ?? 'Terlalu banyak percobaan.' }}</div>
                                    <input type="hidden" id="throttleExpiresAt" value="{{ session('throttle_expires_at') }}" />
                                </div>
                            @else
                                <p class="w-full px-5 text-center text-base font-medium text-body-color">Masukan data valid</p>
                            @endif
                            <span class="hidden h-[1px] w-full max-w-[70px] bg-body-color/50 sm:block"></span>
                        </div>
                        <form id="loginForm" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-8">
                                <label for="email" class="mb-3 block text-sm text-dark dark:text-white">Masukan
                                    Email Anda</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                    autofocus placeholder="Masukan email anda"
                                    class="border-stroke dark:text-body-color-dark dark:shadow-two w-full rounded-sm border bg-[#f8f8f8] px-6 py-3 text-base text-body-color outline-none transition-all duration-300 focus:border-primary dark:border-transparent dark:bg-[#2C303B] dark:focus:border-primary dark:focus:shadow-none" />
                                @error('email')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-8">
                                <label for="password" class="mb-3 block text-sm text-dark dark:text-white">Masukan
                                    Kata Sandi Anda</label>
                                <input id="password" type="password" name="password" required
                                    placeholder="Masukan Kata Sandi Anda"
                                    class="border-stroke dark:text-body-color-dark dark:shadow-two w-full rounded-sm border bg-[#f8f8f8] px-6 py-3 text-base text-body-color outline-none transition-all duration-300 focus:border-primary dark:border-transparent dark:bg-[#2C303B] dark:focus:border-primary dark:focus:shadow-none" />
                                @error('password')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <button id="loginSubmit" type="submit"
                                    class="shadow-submit dark:shadow-submit-dark flex w-full items-center justify-center rounded-sm bg-primary px-9 py-4 text-base font-medium text-white duration-300 hover:bg-primary/90">
                                    <span id="loginLabel">Masuk</span>
                                </button>

                                    
                            </div>
                        </form>

                        <p class="text-center text-base font-medium text-body-color">Belum Memiliki Akun PINHA ?<!-- -->
                            <a class="text-primary hover:underline" href="{{ route('register') }}">Daftar</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute left-0 top-0 z-[-1]"><svg width="1440" height="969" viewBox="0 0 1440 969" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <mask id="mask0_95:1005" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="1440"
                    height="969">
                    <rect width="1440" height="969" fill="#090E34"></rect>
                </mask>
                <g mask="url(#mask0_95:1005)">
                    <path opacity="0.1" d="M1086.96 297.978L632.959 554.978L935.625 535.926L1086.96 297.978Z"
                        fill="url(#paint0_linear_95:1005)"></path>
                    <path opacity="0.1" d="M1324.5 755.5L1450 687V886.5L1324.5 967.5L-10 288L1324.5 755.5Z"
                        fill="url(#paint1_linear_95:1005)"></path>
                </g>
                <defs>
                    <linearGradient id="paint0_linear_95:1005" x1="1178.4" y1="151.853" x2="780.959" y2="453.581"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#4A6CF7"></stop>
                        <stop offset="1" stop-color="#4A6CF7" stop-opacity="0"></stop>
                    </linearGradient>
                    <linearGradient id="paint1_linear_95:1005" x1="160.5" y1="220" x2="1099.45" y2="1192.04"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#4A6CF7"></stop>
                        <stop offset="1" stop-color="#4A6CF7" stop-opacity="0"></stop>
                    </linearGradient>
                </defs>
            </svg></div>
    </section>
    <!--mulai partials  footer -->
    @include('partials.footer')
    <!--akhir partials footer -->

    <!--mulai partials  script -->
    @include('partials.script')
    <!--akhir partials script -->

    <script>
        (function(){
            const form = document.getElementById('loginForm');
            const submit = document.getElementById('loginSubmit');
            const label = document.getElementById('loginLabel');
            const throttleAlert = document.getElementById('throttleAlert');
            const countdownEl = document.getElementById('throttleCountdown');
            const msgEl = document.getElementById('throttleMessage');
            const expiresInput = document.getElementById('throttleExpiresAt');

            if (!form || !submit) return;

            // Prevent double submits with short in-flight expiry
            form.addEventListener('submit', function(e){
                const existing = sessionStorage.getItem('pinha:login:submitted');
                const now = Math.floor(Date.now()/1000);
                if (existing) {
                    const exp = parseInt(existing,10)||0;
                    if (exp > now) { e.preventDefault(); return; }
                    try{ sessionStorage.removeItem('pinha:login:submitted'); }catch(e){}
                }
                try{ sessionStorage.setItem('pinha:login:submitted', String(Math.floor(Date.now()/1000)+10)); }catch(e){}
                submit.disabled = true; submit.classList.add('opacity-70','cursor-not-allowed'); if(label) label.textContent='Mengirim...';
            });

            document.addEventListener('DOMContentLoaded', function(){
                // if server flashed throttle_expires_at or persisted in localStorage, use it
                let expiresAt = null;
                try{ if (expiresInput && expiresInput.value) expiresAt = parseInt(expiresInput.value,10)||null; }catch(e){}
                console.debug('throttle: hidden input expiry ->', expiresAt);
                if (!expiresAt) { try{ expiresAt = parseInt(localStorage.getItem('pinha:throttle_expires_at'),10)||null; }catch(e){ expiresAt=null; } }
                console.debug('throttle: localStorage expiry ->', expiresAt);
                if (expiresAt) { try{ localStorage.setItem('pinha:throttle_expires_at', String(expiresAt)); }catch(e){} }

                if (!expiresAt) {
                    // clear any stale submitted flag if expired
                    const existing = sessionStorage.getItem('pinha:login:submitted');
                    if (existing) { const exp = parseInt(existing,10)||0; if (exp <= Math.floor(Date.now()/1000)) { try{ sessionStorage.removeItem('pinha:login:submitted'); }catch(e){} submit.disabled=false; submit.classList.remove('opacity-70','cursor-not-allowed'); if(label) label.textContent='Masuk'; } }
                    return;
                }

                // show alert and disable submit
                if (throttleAlert) throttleAlert.style.display='block';
                submit.disabled = true; submit.classList.add('opacity-70','cursor-not-allowed'); if(label) label.textContent='Tunggu...';

                const tick = ()=>{
                    const now = Math.floor(Date.now()/1000);
                    const secs = expiresAt - now;
                    if (secs <= 0) {
                        try{ localStorage.removeItem('pinha:throttle_expires_at'); }catch(e){}
                        if (throttleAlert) throttleAlert.style.display='none';
                        try{ sessionStorage.removeItem('pinha:login:submitted'); }catch(e){}
                        submit.disabled=false; submit.classList.remove('opacity-70','cursor-not-allowed'); if(label) label.textContent='Masuk';
                        return false;
                    }
                    if (countdownEl) countdownEl.textContent = secs;
                    if (msgEl) msgEl.textContent = `Data Tidak Ditemukan. Coba lagi dalam ${secs} detik.`;
                    return true;
                };

                tick(); const interval = setInterval(()=>{ if(!tick()) clearInterval(interval); }, 1000);
            });
        })();
    </script>

</body>

</html>