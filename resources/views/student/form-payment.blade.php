<x-app-layout>
    @slot('midtransScript')
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    @endslot
    <div class="mx-auto -mt-24 flex justify-between">
        <div class="w-1/4 rounded-r-lg bg-white p-4 shadow-lg">
            <div>
                <div class="flex items-center">
                    <img class="h-16 w-16 rounded-lg bg-black object-cover" src="{{ Auth::user()->avatar }}"
                        alt="Avatar" referrerpolicy="no-referrer">

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
            <x-registration-step :currentStep="2" />
        </div>
    </div>

    <div class="mx-auto my-12 px-12">
        <div class="bg-white shadow-sm sm:rounded-lg">
            <div class="overflow-y-auto px-16 py-8 text-gray-900">
                <h1 class="mb-4 text-2xl font-bold">Data Diri</h1>
                <div class="flex">
                    <div class="w-1/2 gap-6">
                        <div class="mb-4">
                            <label for="name"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama
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
                            <label for="phone"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">No.
                                Telepon</label>
                            <input type="tel" id="phone" name="phone"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                placeholder="Misal: 081234567890" value="{{ $student->phone }}" disabled />
                        </div>
                    </div>
                    <div id="snap-container" class="w-1/2 rounded-lg p-8">
                        <div id="snap-token" data-snap-token="{{ $snapToken }}"
                            data-payment-route="{{ route('payment.store') }}"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        #snap-container iframe {
            width: 100% !important;
            height: 100% !important;
        }
    </style>
    <script src="{{ asset('build/assets/js/midtrans-snap.js') }}"></script>
</x-app-layout>
