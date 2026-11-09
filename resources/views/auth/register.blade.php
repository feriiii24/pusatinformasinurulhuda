<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
    <title>Sign Up PINHA | Pusat Informasi Nurul Huda</title>
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

    @include('partials.header')

    <section class="relative z-10 overflow-hidden pb-16 pt-36 md:pb-20 lg:pb-28 lg:pt-[180px]">
        <div class="container">
            <div class="-mx-4 flex flex-wrap">
                <div class="w-full px-4">
                    <div class="shadow-three mx-auto max-w-[500px] rounded bg-white px-6 py-10 dark:bg-dark sm:p-[60px]">
                        <h3 class="mb-3 text-center text-2xl font-bold text-black dark:text-white sm:text-3xl">Buat Akun Anda</h3>
                        <p class="mb-11 text-center text-base font-medium text-body-color">Ini sepenuhnya gratis dan sangat mudah</p>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Name -->
                            <div class="mb-8">
                                <label for="name" class="mb-3 block text-sm text-dark dark:text-white">Nama Lengkap</label>
                                <input id="name" type="text" name="name" value="{{ old('name') }}" required
                                    placeholder="Masukkan nama lengkap Anda"
                                    class="border-stroke dark:text-body-color-dark dark:shadow-two w-full rounded-sm border bg-[#f8f8f8] px-6 py-3 text-base text-body-color outline-none transition-all duration-300 focus:border-primary dark:border-transparent dark:bg-[#2C303B] dark:focus:border-primary" />
                                @error('name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-8">
                                <label for="email" class="mb-3 block text-sm text-dark dark:text-white">Email Anda</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                    placeholder="Masukkan email Anda"
                                    class="border-stroke dark:text-body-color-dark dark:shadow-two w-full rounded-sm border bg-[#f8f8f8] px-6 py-3 text-base text-body-color outline-none transition-all duration-300 focus:border-primary dark:border-transparent dark:bg-[#2C303B] dark:focus:border-primary" />
                                @error('email')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-8 relative">
                                <label for="password" class="mb-3 block text-sm text-dark dark:text-white">Kata Sandi Anda</label>
                                <input id="password" type="password" name="password" required
                                    placeholder="Masukkan kata sandi Anda"
                                    class="border-stroke dark:text-body-color-dark dark:shadow-two w-full rounded-sm border bg-[#f8f8f8] px-6 py-3 text-base text-body-color outline-none transition-all duration-300 focus:border-primary dark:border-transparent dark:bg-[#2C303B] dark:focus:border-primary" />
                               
                                @error('password')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-8">
                                <label for="password_confirmation" class="mb-3 block text-sm text-dark dark:text-white">Konfirmasi Kata Sandi</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" required
                                    placeholder="Konfirmasi kata sandi Anda"
                                    class="border-stroke dark:text-body-color-dark dark:shadow-two w-full rounded-sm border bg-[#f8f8f8] px-6 py-3 text-base text-body-color outline-none transition-all duration-300 focus:border-primary dark:border-transparent dark:bg-[#2C303B] dark:focus:border-primary" />
                                @error('password_confirmation')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <button type="submit"
                                    class="shadow-submit dark:shadow-submit-dark flex w-full items-center justify-center rounded-sm bg-primary px-9 py-4 text-base font-medium text-white duration-300 hover:bg-primary/90">
                                    Daftar
                                </button>
                            </div>

                        </form>

                        <p class="text-center text-base font-medium text-body-color">Sudah punya akun PINHA? 
                            <a class="text-primary hover:underline" href="{{ route('login') }}">Masuk</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')
    @include('partials.script')


</body>
</html>
