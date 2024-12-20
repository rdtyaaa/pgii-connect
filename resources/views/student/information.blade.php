<x-app-layout>
    <div class="mx-auto -mt-24 flex justify-between">
        <div class="w-1/4 rounded-r-lg bg-white p-4 shadow-lg">
            <div>
                <div class="flex items-center">
                    <img class="h-16 w-16 rounded-lg bg-black object-cover" src="{{ Auth::user()->avatar }}" alt="Avatar"
                        referrerpolicy="no-referrer">

                    {{-- Cewek --}}
                    {{-- <img class="h-16 w-16 rounded-lg bg-yellow-400 object-cover"
                            src='https://avataaars.io/?avatarStyle=Transparent&topType=Hijab&accessoriesType=Blank&hatColor=Black&clotheType=BlazerSweater&eyeType=Happy&eyebrowType=DefaultNatural&mouthType=Smile&skinColor=Pale' /> --}}

                    {{-- Cowok --}}
                    {{-- <img class="h-16 w-16 object-cover bg-black rounded-lg" src='https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairDreads01&accessoriesType=Blank&hairColor=Black&facialHairType=Blank&clotheType=BlazerSweater&eyeType=Happy&eyebrowType=DefaultNatural&mouthType=Smile&skinColor=Pale'/> --}}

                    <div class="ms-4">
                        <h5 class="font-bold">{{ implode(' ', array_slice(explode(' ', Auth::user()->name), 0, 2)) }}
                        </h5>
                        <p class="text-sm text-slate-500">{{ Auth::user()->email }}</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="item-center mt-4 flex cursor-pointer p-4 text-gray-600" type="submit">
                        <svg class="me-8 h-6 w-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                        </svg>
                        Logout</button>
                </form>
            </div>
        </div>
        <div class="item-center ms-12 flex w-full flex-wrap rounded-l-lg bg-white p-4 shadow-lg">
            <h4 class="w-full text-lg font-bold">Tahapan Registrasi</h4>
            <x-registration-step :currentStep="4" />
        </div>
    </div>

    <div class="mx-auto my-12 px-12">
        <div class="bg-white shadow-sm sm:rounded-lg">
            <div class="overflow-y-auto px-16 py-8 text-gray-900">
                <h1 class="mb-4 text-2xl font-bold">Informasi Wawancara</h1>
                <h1 class="mb-4 text-xl font-semibold">Peserta</h1>
                <div class="mb-6 grid gap-6 md:grid-cols-2">
                    <div class="mb-4">
                        <label for="name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama
                            Lengkap</label>
                        <input type="text" id="name" name="name"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            placeholder="Misal: Anton Pargoy" value="{{ $student->name }}" disabled />
                    </div>
                    <div class="mb-4">
                        <label for="email"
                            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="text" id="email" name="email"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            placeholder="Misal: pargoy@gmail.com" value="{{ $student->email }}" disabled />
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">No.
                            Telepon</label>
                        <input type="tel" id="phone" name="phone"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            placeholder="Misal: 081234567890" value="{{ $student->phone }}" disabled />
                    </div>
                    <div class="mb-4">
                        <label for="status"
                            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Status
                            Wawancara</label>
                        <input type="text" id="status" name="status"
                            class="@if (strtolower($scheduledInterview->status) === 'ditolak') bg-red-300
                            @elseif(strtolower($scheduledInterview->status) === 'diterima') bg-green-300
                            @elseif(strtolower($scheduledInterview->status) === 'dijadwalkan') bg-yellow-300
                            @else bg-gray-300 @endif block w-full rounded-lg border p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            value="{{ ucwords(strtolower($scheduledInterview->status)) }}" disabled />
                    </div>

                </div>
                @if ($scheduledInterview)
                    @if ($scheduledInterview->status == 'dijadwalkan')
                        <!-- Jadwal wawancara -->
                        <div id="alert-1"
                            class="mb-4 flex items-center rounded-lg border border-blue-300 bg-blue-50 p-4 text-sm text-blue-800"
                            role="alert">
                            <svg class="mr-2 h-6 w-6 text-blue-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium">Wawancara telah dijadwalkan:</span>
                            <p class="ml-1">
                                {{ $scheduledInterview->scheduled_at->translatedFormat('l, d-m-Y') }}. Silahkan datang
                                ke sekolah.
                            </p>
                        </div>
                        <p class="text-sm text-gray-700">
                            Jika ada kendala, silahkan hubungi admin melalui email
                            <a href="mailto:{{ $settings['school_email'] ?? 'admin@sekolah.com' }}"
                                class="text-blue-600 hover:underline">
                                {{ $settings['school_email'] ?? 'admin@sekolah.com' }}
                            </a>
                            atau telepon
                            <a href="tel:{{ $settings['school_phone'] ?? '+6281234567890' }}"
                                class="text-blue-600 hover:underline">
                                {{ $settings['school_phone'] ?? '0812-3456-7890' }}
                            </a>.
                        </p>
                    @elseif ($scheduledInterview->status == 'diterima')
                        <!-- Diterima -->
                        <div id="alert-2"
                            class="mb-4 flex items-center justify-between rounded-lg border border-green-300 bg-green-50 p-4 text-sm text-green-800"
                            role="alert">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                </svg>

                                <span class="ms-2 font-medium">Selamat! Anda diterima:</span>
                                <p class="ml-1">
                                    Selamat! Anda telah diterima di sekolah kami. Silahkan lanjutkan ke tahap
                                    selanjutnya
                                    dengan mengklik tombol berikut.
                                </p>
                            </div>
                            <a href="{{ route('payment', ['paymentType' => 'uang_awal']) }}"
                                class="inline-block rounded bg-green-600 px-4 py-2 text-white hover:bg-green-700">Lanjutkan</a>
                        </div>
                    @elseif ($scheduledInterview->status == 'ditolak')
                        <!-- Ditolak -->
                        <div id="alert-3"
                            class="mb-4 flex items-center rounded-lg border border-red-300 bg-red-50 p-4 text-sm text-red-800"
                            role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                            </svg>

                            <span class="ms-2 font-medium">Maaf, kamu belum diterima:</span>
                            <p class="ml-1">
                                Maaf, kamu belum diterima di sekolah kami. Jangan putus semangat! Terus berusaha dan
                                semoga kesempatan berikutnya akan lebih baik.
                            </p>
                        </div>
                    @endif
                @else
                    <p class="mt-4 text-gray-500">Belum ada jadwal wawancara.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
