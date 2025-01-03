<x-guest-layout>


    <div class="flex h-screen flex-col">

        <img class="mx-auto pt-12" src="{{ Vite::asset('resources/assets/img/logo_PGII.png') }}" alt="Logo SMA">
        <div class="align-center flex flex-grow items-center justify-between p-32">
            <div class="w-1/3 text-wrap text-white">
                <h4 class="text-3xl font-extrabold">Sekolah Islam yang Bermutu, Bermartabat, dan Terpuji.</h4>

                <h5 class="mb-2 mt-8">Misi:</h5>
                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-24 overflow-hidden rounded-lg">
                        <!-- Item 1 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <h4 class="absolute block w-full text-sm text-gray-200">
                                1. Menerapkan nilai-nilai keislaman dalam proses pembelajaran</h4>
                        </div>
                        <!-- Item 2 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <h4 class="absolute block w-full text-sm text-gray-200">
                                2. Meningkatkan potensi, kecerdasan minat sesuai dengan tingkat perkembangan dan
                                kemampuan peserta didik untuk melanjutkan pendidikan kejenjang yang lebih tinggi</h4>
                        </div>
                        <!-- Item 3 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <h4 class="absolute block w-full text-sm text-gray-200">
                                3. Menerapkan manajemen yang amanah, transparan, akuntabel dan profesional</h4>
                        </div>
                        <!-- Item 4 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <h4 class="absolute block w-full text-sm text-gray-200">
                                4. Menumbuh kembangkan budaya organisasi yang partisipatif, sinergik, kompetitif, dan
                                kolaboratif
                            </h4>
                        </div>
                        <!-- Item 5 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <h4 class="absolute block w-full text-sm text-gray-200">
                                5. Mendidik generasi menuju generasi yang sholeh, cerdas, bermanfaat bagi diri dan
                                lingkungan
                            </h4>
                        </div>
                        <!-- Item 6 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <h4 class="absolute block w-full text-sm text-gray-200">
                                6. Mewujudkan lembaga yang berwawasan da’wah dan bernuansa pasantren
                            </h4>
                        </div>
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex space-x-3">
                        <button type="button" class="h-1 w-6 rounded-lg" aria-current="true" aria-label="Slide 1"
                            data-carousel-slide-to="0"></button>
                        <button type="button" class="h-1 w-6 rounded-lg" aria-current="false" aria-label="Slide 2"
                            data-carousel-slide-to="1"></button>
                        <button type="button" class="h-1 w-6 rounded-lg" aria-current="false" aria-label="Slide 3"
                            data-carousel-slide-to="2"></button>
                        <button type="button" class="h-1 w-6 rounded-lg" aria-current="false" aria-label="Slide 4"
                            data-carousel-slide-to="3"></button>
                        <button type="button" class="h-1 w-6 rounded-lg" aria-current="false" aria-label="Slide 5"
                            data-carousel-slide-to="4"></button>
                        <button type="button" class="h-1 w-6 rounded-lg" aria-current="false" aria-label="Slide 6"
                            data-carousel-slide-to="5"></button>
                    </div>
                </div>

                {{-- <p class="mt-4 text-sm text-gray-200">Mengintegrasikan Nilai Keislaman, Kecerdasan, dan Profesionalisme
                    untuk Masa Depan yang Terpuji</p> --}}
            </div>
            <form class="h-fit w-1/4 justify-end rounded-lg bg-white p-4" method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <p class="text-sm text-slate-500">Selamat Datang, Calon Murid Baru!</p>
                    <h5 class="mt-2 text-xl font-bold">Silahkan Masuk!</h5>
                </div>

                <div class="mt-4 flex">
                    <a href="{{ route('auth.google.redirect') }}"
                        class="flex w-full items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 shadow-sm hover:cursor-pointer hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25"
                            viewBox="0 0 48 48">
                            <path fill="#FFC107"
                                d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z">
                            </path>
                            <path fill="#FF3D00"
                                d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z">
                            </path>
                            <path fill="#4CAF50"
                                d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z">
                            </path>
                            <path fill="#1976D2"
                                d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z">
                            </path>
                        </svg>
                        <span class="ms-4 text-sm font-medium text-gray-700">Sign in with Google</span>
                    </a>
                </div>


                {{-- <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="mt-1 block w-full" type="email" name="email"
                        :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="mt-1 block w-full" type="password" name="password" required
                        autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="mt-4 block">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div> --}}

                {{-- <div class="mt-4 flex items-center justify-end">
                    @if (Route::has('password.request'))
                        <a class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div> --}}
            </form>
        </div>
    </div>
</x-guest-layout>
