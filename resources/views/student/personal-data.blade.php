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
            <x-registration-step :currentStep="1" />
        </div>
    </div>

    <div class="mx-auto my-12 px-12">
        <div class="bg-white shadow-sm sm:rounded-lg">
            <div class="overflow-y-auto px-16 py-8 text-gray-900">
                <h1 class="mb-4 text-2xl font-bold">Data Diri</h1>
                <form action="{{ route('students.store') }}" method="POST">
                    @csrf
                    <div class="mb-6 grid gap-6 md:grid-cols-2">
                        <div>
                            <label for="name"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama
                                Lengkap</label>
                            <input type="text" id="name" name="name"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                placeholder="Misal: Anton Pargoy" value="{{ old('name') }}" required />
                            @error('name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>



                        <div>
                            <label for="parent_name"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama Wali
                                Murid</label>
                            <input type="text" id="parent_name" name="parent_name"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                placeholder="Misal: Supritno" value="{{ old('parent_name') }}" required />
                            @error('parent_name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="email"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="text" id="email" name="email"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                placeholder="Misal: pargoy@gmail.com" value="{{ old('email') }}" required />
                            @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="parent_email"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Email Wali
                                Murid</label>
                            <input type="text" id="parent_email" name="parent_email"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                placeholder="Misal: supritno@gmail.com" value="{{ old('parent_email') }}" required />
                            @error('parent_email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="phone"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">No.
                                Telepon</label>
                            <input type="tel" id="phone" name="phone"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                placeholder="Misal: 081234567890" value="{{ old('phone') }}" required />
                            @error('phone')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="parent_phone"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">No. Telepon
                                Wali Murid</label>
                            <input type="tel" id="parent_phone" name="parent_phone"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                placeholder="Misal: 081234567890" value="{{ old('parent_phone') }}" required />
                            @error('parent_phone')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="school_origin"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Asal
                                Sekolah</label>
                            <input type="text" id="school_origin" name="school_origin"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                placeholder="Misal: SMA 1 Kota Bandung" value="{{ old('school_origin') }}" required />
                            @error('school_origin')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <x-select-field id="parent_type" name="parent_type" label="Sebagai:" :value="old('parent_type')" required>
                            <option value="Ayah">Ayah</option>
                            <option value="Ibu">Ibu</option>
                            <option value="Wali Murid">Wali Murid</option>
                        </x-select-field>
                        <div>
                            <label for="gender"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Jenis
                                Kelamin</label>
                            <select id="gender" name="gender"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                value="{{ old('gender') }}" required>
                                <option selected>Pilih Jenis Kelamin</option>
                                <option value="M">Laki-Laki</option>
                                <option value="W">Perempuan</option>
                            </select>
                            @error('gender')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                    <div class="mb-6 flex items-start">
                        <div class="flex h-5 items-center">
                            <input id="remember" type="checkbox" value=""
                                class="focus:ring-3 h-4 w-4 rounded border border-gray-300 bg-gray-50 focus:ring-blue-300 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                required />
                        </div>
                        <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I
                            agree with the <a href="#"
                                class="text-blue-600 hover:underline dark:text-blue-500">terms and
                                conditions</a>.</label>
                        @error('remember')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit"
                        class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto">Submit</button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
