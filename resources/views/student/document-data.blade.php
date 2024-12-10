<x-app-layout>
    <div class="mx-auto -mt-24 flex justify-between">
        <div class="w-1/4 rounded-r-lg bg-white p-4 shadow-lg">
            <div>
                <div class="flex items-center">
                    <img class="h-16 w-16 rounded-lg bg-black object-cover" src="{{ Auth::user()->avatar }}"
                        alt="Avatar">

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
            <x-registration-step :currentStep="3" />
        </div>
    </div>

    <div class="mx-auto my-12 px-12">
        <div class="bg-white shadow-sm sm:rounded-lg">
            <div class="overflow-y-auto px-16 py-8 text-gray-900">
                <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="page mb-6" id="page1" data-name="Data Dokumen">
                        <h1 class="mb-4 text-2xl font-bold">Input Dokumen</h1>
                        <div class="mb-6 grid grid-cols-4 gap-6">
                            <div>
                                <h1 class="mb-2">Rapot SMP Semester 1-5 </h1>
                                <label for="dropzone-file"
                                    class="flex h-64 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500 dark:hover:bg-gray-600 dark:hover:bg-gray-800">
                                    <div class="flex flex-col items-center justify-center pb-6 pt-5">
                                        <svg class="mb-4 h-8 w-8 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF
                                            (MAX.
                                            800x400px)</p>
                                    </div>
                                    <input id="dropzone-file" name="rapot type="file" class="hidden" />
                                </label>
                            </div>
                            <div>
                                <h1 class="mb-4">Kartu Keluarga</h1>
                                <label for="dropzone-file"
                                    class="flex h-64 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500 dark:hover:bg-gray-600 dark:hover:bg-gray-800">
                                    <div class="flex flex-col items-center justify-center pb-6 pt-5">
                                        <svg class="mb-4 h-8 w-8 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF
                                            (MAX.
                                            800x400px)</p>
                                    </div>
                                    <input id="dropzone-file" name="kartu_keluarga" type="file" class="hidden" />
                                </label>
                            </div>
                            <div>
                                <h1 class="mb-4">Akte Kelahiran</h1>
                                <label for="dropzone-file"
                                    class="flex h-64 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500 dark:hover:bg-gray-600 dark:hover:bg-gray-800">
                                    <div class="flex flex-col items-center justify-center pb-6 pt-5">
                                        <svg class="mb-4 h-8 w-8 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF
                                            (MAX.
                                            800x400px)</p>
                                    </div>
                                    <input id="dropzone-file" name="akte_kelahiran" type="file" class="hidden" />
                                </label>
                            </div>
                            <div>
                                <h1 class="mb-4">Surat Keterangan Sehat</h1>
                                <label for="dropzone-file"
                                    class="flex h-64 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500 dark:hover:bg-gray-600 dark:hover:bg-gray-800">
                                    <div class="flex flex-col items-center justify-center pb-6 pt-5">
                                        <svg class="mb-4 h-8 w-8 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF
                                            (MAX.
                                            800x400px)</p>
                                    </div>
                                    <input id="dropzone-file" name="surat_sehat" type="file" class="hidden" />
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="page mb-6" id="page2" data-name="Detail Diri" style="display: none;">
                        <h1 class="mb-4 text-2xl font-bold">Data Diri</h1>
                        <div class="mb-8">
                            <h2 class="mb-4 text-lg font-semibold">Identitas Peserta</h2>
                            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                <x-input-field id="name" name="name" label="Nama Lengkap"
                                    placeholder="Misal: Anton Pargoy" :value="$student['name']" disabled />

                                <x-input-field id="nickname" name="nickname" label="Nama Panggilan"
                                    placeholder="Misal: Anton" :value="old('nickname')" required />

                                <x-input-field id="gender" name="gender" label="Jenis Kelamin"
                                    placeholder="Laki-laki/Perempuan" :value="old('gender')" required />

                                <x-input-field id="school_origin" name="school_origin" label="Asal SMP"
                                    placeholder="Misal: SMP Negeri 1" :value="old('school_origin')" required />

                                <x-input-field id="nisn" name="nisn" label="NISN" type="number"
                                    placeholder="1234567890" :value="old('nisn')" required />

                                <x-input-field id="nis" name="nis" label="NIS" type="number"
                                    placeholder="123456" :value="old('nis')" required />

                                <x-input-field id="ijazah_number" name="ijazah_number"
                                    label="Nomor Seri Ijazah Resmi" placeholder="123456789" :value="old('ijazah_number')"
                                    required />

                                <x-input-field id="skhun_number" name="skhun_number" label="Nomor Seri SKHUN"
                                    placeholder="123456789" :value="old('skhun_number')" required />

                                <x-input-field id="exam_number" name="exam_number" label="No Ujian Nasional SMP"
                                    placeholder="123456789" :value="old('exam_number')" required />

                                <x-input-field id="nik" name="nik" label="NIK" type="number"
                                    placeholder="1234567890123456" :value="old('nik')" required />

                                <x-input-field id="birth_place_date" name="birth_place_date"
                                    label="Tempat Tanggal Lahir" placeholder="Misal: Jakarta, 01-01-2000"
                                    :value="old('birth_place_date')" required />

                                <x-input-field id="religion" name="religion" label="Agama"
                                    placeholder="Misal: Islam" :value="old('religion')" required />

                                <x-input-field id="nationality" name="nationality" label="Kewarganegaraan"
                                    placeholder="Misal: WNI" :value="old('nationality')" required />

                                <x-input-field id="siblings_count" name="siblings_count"
                                    label="Jumlah Saudara Kandung" type="number" placeholder="Misal: 2"
                                    :value="old('siblings_count')" required />

                                <x-input-field id="child_position" name="child_position" label="Anak Ke-"
                                    type="number" placeholder="Misal: 1" :value="old('child_position')" required />

                                <x-input-field id="language" name="language" label="Bahasa Sehari-hari di Rumah"
                                    placeholder="Misal: Bahasa Indonesia" :value="old('language')" required />

                                <x-input-field id="special_needs" name="special_needs" label="Berkebutuhan Khusus"
                                    placeholder="Misal: Tidak" :value="old('special_needs')" required />

                                <x-input-field id="address" name="address" label="Alamat Tempat Tinggal Lengkap"
                                    placeholder="Misal: Jl. Merdeka No. 123" :value="old('address')" required />

                                <x-select-field id="transport" name="transport" label="Alat Transportasi Ke Sekolah"
                                    :value="old('transport')" required>
                                    <option value="jalan_kaki">Jalan Kaki</option>
                                    <option value="sepeda">Sepeda</option>
                                    <option value="motor_pribadi">Motor Pribadi</option>
                                    <option value="mobil_pribadi">Mobil Pribadi</option>
                                    <option value="antar_jemput_sekolah">Antar Jemput Sekolah</option>
                                    <option value="angkutan_umum">Angkutan Umum</option>
                                    <option value="ojek_motor">Ojek Motor</option>
                                </x-select-field>

                                <x-select-field id="living_with" name="living_with" label="Tinggal Bersama"
                                    :value="old('living_with')" required>
                                    <option value="orang_tua">Orang Tua</option>
                                    <option value="menumpang">Menumpang</option>
                                    <option value="asrama_kost">Asrama/Kost</option>
                                </x-select-field>

                                <x-input-field id="home_phone" name="home_phone" label="No Telepon Rumah"
                                    type="tel" placeholder="021-123456" :value="old('home_phone')" />

                                <x-input-field id="mobile_phone" name="mobile_phone" label="No Telepon HP"
                                    type="tel" placeholder="081234567890" :value="old('mobile_phone')" required />

                                <x-input-field id="email" name="email" label="Email Pribadi" type="email"
                                    placeholder="email@example.com" :value="old('email')" required />

                                <x-select-field id="kps_receiver" name="kps_receiver"
                                    label="Apakah Sebagai Penerima KPS" :value="old('kps_receiver')" required>
                                    <option value="ya">Ya</option>
                                    <option value="tidak">Tidak</option>
                                </x-select-field>

                                <x-input-field id="kps_number" name="kps_number" label="No KPS"
                                    placeholder="123456789" :value="old('kps_number')" />
                            </div>
                        </div>
                    </div>

                    {{-- Halaman 3 --}}
                    <div class="page mb-6 grid gap-6 md:grid-cols-2" id="page3" data-name="Data Orang Tua"
                        style="display: none;">
                        <div>
                            <label for="name"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">3. Nama
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
                    </div>
                    <div id="navigationButtons" class="flex justify-between">
                        <button type="button" id="prevButton" onclick="prevPage()" style="display: none;"
                            class="w-full rounded-lg bg-gray-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800 sm:w-auto"></button>
                        <button type="button" id="nextButton" onclick="nextPage()"
                            class="ms-auto w-full rounded-lg bg-green-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 sm:w-auto"></button>
                        <button type="submit" id="submitButton" style="display: none;"
                            class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('build/assets/js/form-navigation.js') }}"></script>
</x-app-layout>
