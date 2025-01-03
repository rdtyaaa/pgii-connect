<x-app-layout>
    <div class="mx-auto -mt-24 flex justify-between">
        <div class="w-1/4 rounded-r-lg bg-white p-4 shadow-lg">
            <div>
                <div class="flex items-center">
                    <img class="h-16 w-16 rounded-lg bg-black object-cover" src="{{ Auth::user()->avatar }}" alt="Avatar"
                        referrerpolicy="no-referrer">

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
                <form id="form-document" action="{{ route('students.store.documents') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="page mb-6" id="page1" data-name="Data Dokumen">
                        <h1 class="mb-4 text-2xl font-bold">Input Dokumen</h1>
                        <div class="mb-6 grid grid-cols-4 gap-6">
                            <div>
                                <h1 class="mb-4">Rapot SMP Semester 1-5 </h1>
                                <label for="dropzone-file-1"
                                    class="file-label relative flex h-64 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100 -:border-gray-600 -:bg-gray-700 -:hover:border-gray-500 -:hover:bg-gray-600 -:hover:bg-gray-800">
                                    <svg id="delete-icon"
                                        class="absolute right-2 top-2 hidden h-[24px] w-[24px] items-end text-red-500"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" fill="none" viewbox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6">
                                        </path>
                                    </svg>
                                    <div class="file-info flex flex-col items-center justify-center pb-6 pt-5">
                                        <svg class="mb-4 h-8 w-8 text-gray-500 -:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 -:text-gray-400"><span
                                                class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 -:text-gray-400">SVG, PNG, JPG or GIF
                                            (MAX.
                                            800x400px)</p>
                                    </div>
                                    <input id="dropzone-file-1" name="rapot" type="file" class="file-input hidden"
                                        required />
                                </label>
                                @error('rapot')
                                    <div class="mt-1 text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <h1 class="mb-4">Kartu Keluarga</h1>
                                <label for="dropzone-file-2"
                                    class="file-label relative flex h-64 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100 -:border-gray-600 -:bg-gray-700 -:hover:border-gray-500 -:hover:bg-gray-600 -:hover:bg-gray-800">
                                    <svg id="delete-icon"
                                        class="absolute right-2 top-2 hidden h-[24px] w-[24px] items-end text-red-500"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" fill="none" viewbox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6">
                                        </path>
                                    </svg>
                                    <div class="file-info flex flex-col items-center justify-center pb-6 pt-5">
                                        <svg class="mb-4 h-8 w-8 text-gray-500 -:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 -:text-gray-400"><span
                                                class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 -:text-gray-400">SVG, PNG, JPG or GIF
                                            (MAX.
                                            800x400px)</p>
                                    </div>
                                    <input id="dropzone-file-2" name="kartu_keluarga" type="file"
                                        class="file-input hidden" required />
                                </label>
                                @error('kartu_keluarga')
                                    <div class="mt-1 text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <h1 class="mb-4">Akte Kelahiran</h1>
                                <label for="dropzone-file-3"
                                    class="file-label relative flex h-64 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100 -:border-gray-600 -:bg-gray-700 -:hover:border-gray-500 -:hover:bg-gray-600 -:hover:bg-gray-800">
                                    <svg id="delete-icon"
                                        class="absolute right-2 top-2 hidden h-[24px] w-[24px] items-end text-red-500"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" fill="none" viewbox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6">
                                        </path>
                                    </svg>
                                    <div class="file-info flex flex-col items-center justify-center pb-6 pt-5">
                                        <svg class="mb-4 h-8 w-8 text-gray-500 -:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 -:text-gray-400"><span
                                                class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 -:text-gray-400">SVG, PNG, JPG or GIF
                                            (MAX.
                                            800x400px)</p>
                                    </div>
                                    <input id="dropzone-file-3" name="akte_kelahiran" type="file"
                                        class="file-input hidden" required />
                                </label>
                                @error('akte_kelahiran')
                                    <div class="mt-1 text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <h1 class="mb-4">Surat Keterangan Sehat</h1>
                                <label for="dropzone-file-4"
                                    class="file-label relative flex h-64 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100 -:border-gray-600 -:bg-gray-700 -:hover:border-gray-500 -:hover:bg-gray-600 -:hover:bg-gray-800">
                                    <svg id="delete-icon"
                                        class="absolute right-2 top-2 hidden h-[24px] w-[24px] items-end text-red-500"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" fill="none" viewbox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6">
                                        </path>
                                    </svg>
                                    <div class="file-info flex flex-col items-center justify-center pb-6 pt-5">
                                        <svg class="mb-4 h-8 w-8 text-gray-500 -:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 -:text-gray-400"><span
                                                class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 -:text-gray-400">SVG, PNG, JPG or GIF
                                            (MAX.
                                            800x400px)</p>
                                    </div>
                                    <input id="dropzone-file-4" name="surat_sehat" type="file"
                                        class="file-input hidden" value="" required />
                                </label>
                                @error('surat_sehat')
                                    <div class="mt-1 text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="page mb-6" id="page2" data-name="Detail Diri" style="display: none;">
                        <h1 class="mb-4 text-2xl font-bold">Data Diri</h1>
                        <div class="mb-8">
                            <h2 class="mb-4 text-lg font-semibold">Identitas Peserta</h2>
                            <div class="grid grid-cols-2 gap-6">
                                <x-input-field id="name" name="name" label="Nama Lengkap"
                                    placeholder="Misal: Anton Pargoy" :value="$student['name']" disabled />

                                <x-input-field id="nickname" name="nickname" label="Nama Panggilan"
                                    placeholder="Misal: Anton" :value="old('nickname')" req />

                                {{-- <x-input-field id="gender" name="gender" label="Jenis Kelamin"
                                    placeholder="Laki-laki/Perempuan" :value="$student['gender']" disabled />

                                <x-input-field id="school_origin" name="school_origin" label="Asal SMP"
                                    placeholder="Misal: SMP Negeri 1" :value="$details->school_origin" disabled /> --}}

                                <x-input-field id="nisn" name="nisn" label="NISN" type="number"
                                    placeholder="1234567890" :value="old('nisn')" req />


                                <x-input-field id="nis" name="nis" label="NIS" type="number"
                                    placeholder="123456" :value="old('nis')" req />

                                <x-input-field id="ijazah_number" name="ijazah_number"
                                    label="Nomor Seri Ijazah Resmi" placeholder="123456789" :value="old('ijazah_number')" req />

                                <x-input-field id="skhun_number" name="skhun_number" label="Nomor Seri SKHUN"
                                    placeholder="123456789" :value="old('skhun_number')" req />

                                <x-input-field id="exam_number" name="exam_number" label="No Ujian Nasional SMP"
                                    placeholder="123456789" :value="old('exam_number')" req />

                                <x-input-field id="nik" name="nik" label="NIK" type="number"
                                    placeholder="1234567890123456" :value="old('nik')" req />

                                <div>
                                    <label class="mb-2 block text-sm font-medium text-gray-900 -:text-white">
                                        Tempat, Tanggal Lahir
                                    </label>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <input type="text" id="birth_place" name="birth_place"
                                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 -:border-gray-600 -:bg-gray-700 -:text-white -:placeholder-gray-400 -:focus:border-blue-500 -:focus:ring-blue-500"
                                                placeholder="Misal: Jakarta" value="{{ old('birth_place') }}"
                                                required />
                                            @error('birth_place')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="relative max-w-sm">
                                            <div
                                                class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3.5">
                                                <svg class="h-4 w-4 text-gray-500 -:text-gray-400"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                </svg>
                                            </div>
                                            <input datepicker id="default-datepicker" name="birth_date"
                                                type="text"
                                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 ps-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 -:border-gray-600 -:bg-gray-700 -:text-white -:placeholder-gray-400 -:focus:border-blue-500 -:focus:ring-blue-500"
                                                placeholder="Select date" required>
                                            @error('birth_date')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <x-input-field id="religion" name="religion" label="Agama"
                                    placeholder="Misal: Islam" :value="old('religion')" req />

                                <x-input-field id="nationality" name="nationality" label="Kewarganegaraan"
                                    placeholder="Misal: WNI" :value="old('nationality')" req />

                                <x-input-field id="siblings_count" name="siblings_count"
                                    label="Jumlah Saudara Kandung" type="number" placeholder="Misal: 2"
                                    :value="old('siblings_count')" req />

                                <x-input-field id="child_position" name="child_position" label="Anak Ke-"
                                    type="number" placeholder="Misal: 1" :value="old('child_position')" req />

                                <x-input-field id="language" name="language" label="Bahasa Sehari-hari di Rumah"
                                    placeholder="Misal: Bahasa Indonesia" :value="old('language')" req />

                                <x-input-field id="special_needs" name="special_needs" label="Berkebutuhan Khusus"
                                    placeholder="Misal: Tidak" :value="old('special_needs')" req />

                                <x-input-field id="address" name="address" label="Alamat Tempat Tinggal Lengkap"
                                    placeholder="Misal: Jl. Merdeka No. 123" :value="old('address')" req />

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

                                {{-- <x-input-field id="mobile_phone" name="mobile_phone" label="No Telepon HP"
                                    type="tel" placeholder="081234567890" :value="$student['phone']" disabled />

                                <x-input-field id="email" name="email" label="Email Pribadi" type="email"
                                    placeholder="email@example.com" :value="$student['email']" disabled /> --}}

                                <x-select-field id="kps_receiver" name="kps_receiver"
                                    label="Apakah Sebagai Penerima KPS" :value="old('kps_receiver')" required>
                                    <option value="ya">Ya</option>
                                    <option value="tidak">Tidak</option>
                                </x-select-field>

                                <div id="kps_number-container" style="display: none;">
                                    <x-input-field id="kps_number" name="kps_number" label="No KPS"
                                        placeholder="123456789" :value="old('kps_number')" />
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Halaman 3 --}}
                    <div class="page mb-6" id="page3" data-name="Data Orang Tua" style="display: none;">
                        <!-- Data Ayah -->
                        <h3 class="mb-4 text-lg font-semibold text-gray-900 -:text-white">Data Ayah</h3>
                        <div class="grid grid-cols-2 gap-6">
                            <x-input-field id="father_name" name="father_name" label="Nama Ayah"
                                placeholder="Nama Ayah" :value="old('father_name') ?? ($parents->where('type', 'Ayah')->first()->name ?? '')" :disabled="$parents->where('type', 'Ayah')->isNotEmpty()" />
                            <x-input-field id="father_birth_year" name="father_birth_year" label="Tahun Lahir Ayah"
                                placeholder="Tahun Lahir" :value="old('father_birth_year')" type="number" req />
                            <x-select-field id="father_special_needs" name="father_special_needs"
                                label="Berkebutuhan Khusus Ayah" :value="old('father_special_needs')" required>
                                <option value="tidak">Tidak</option>
                                <option value="ya">Ya</option>
                            </x-select-field>
                            <x-input-field id="father_job" name="father_job" label="Pekerjaan Ayah"
                                placeholder="Pekerjaan" :value="old('father_job')" req />
                            <x-input-field id="father_education" name="father_education" label="Pendidikan Ayah"
                                placeholder="Pendidikan" :value="old('father_education')" req />
                            <x-input-field id="father_monthly_income" name="father_monthly_income"
                                label="Penghasilan Bulanan Ayah" placeholder="Penghasilan" :value="old('father_monthly_income')"
                                type="number" req />
                        </div>

                        <!-- Data Ibu -->
                        <h3 class="my-4 text-lg font-semibold text-gray-900 -:text-white">Data Ibu</h3>
                        <div class="grid grid-cols-2 gap-6">
                            <x-input-field id="mother_name" name="mother_name" label="Nama Ibu"
                                placeholder="Nama Ibu" :value="old('mother_name') ?? ($parents->where('type', 'Ibu')->first()->name ?? '')" :disabled="$parents->where('type', 'Ibu')->isNotEmpty()" />
                            <x-input-field id="mother_birth_year" name="mother_birth_year" label="Tahun Lahir Ibu"
                                placeholder="Tahun Lahir" :value="old('mother_birth_year')" type="number" req />
                            <x-select-field id="mother_special_needs" name="mother_special_needs"
                                label="Berkebutuhan Khusus Ibu" :value="old('mother_special_needs')" required>
                                <option value="tidak">Tidak</option>
                                <option value="ya">Ya</option>
                            </x-select-field>
                            <x-input-field id="mother_job" name="mother_job" label="Pekerjaan Ibu"
                                placeholder="Pekerjaan" :value="old('mother_job')" req />
                            <x-input-field id="mother_education" name="mother_education" label="Pendidikan Ibu"
                                placeholder="Pendidikan" :value="old('mother_education')" req />
                            <x-input-field id="mother_monthly_income" name="mother_monthly_income"
                                label="Penghasilan Bulanan Ibu" placeholder="Penghasilan" :value="old('mother_monthly_income')"
                                type="number" req />
                        </div>

                        <!-- Data Wali Murid (Opsional) -->
                        <h3 class="my-4 text-lg font-semibold text-gray-900 -:text-white">Data Wali Murid (Opsional)
                        </h3>
                        <div class="grid grid-cols-2 gap-6">
                            <x-input-field id="guardian_name" name="guardian_name" label="Nama Wali"
                                placeholder="Nama Wali" :value="old('guardian_name') ??
                                    ($parents->where('type', 'Wali Murid')->first()->name ?? '')" :disabled="$parents->where('type', 'Wali Murid')->isNotEmpty()" />
                            <x-input-field id="guardian_birth_year" name="guardian_birth_year"
                                label="Tahun Lahir Wali" placeholder="Tahun Lahir" :value="old('guardian_birth_year')"
                                type="number" />
                            <x-select-field id="guardian_special_needs" name="guardian_special_needs"
                                label="Berkebutuhan Khusus Wali" :value="old('guardian_special_needs')">
                                <option value="tidak">Tidak</option>
                                <option value="ya">Ya</option>
                            </x-select-field>
                            <x-input-field id="guardian_job" name="guardian_job" label="Pekerjaan Wali"
                                placeholder="Pekerjaan" :value="old('guardian_job')" />
                            <x-input-field id="guardian_education" name="guardian_education" label="Pendidikan Wali"
                                placeholder="Pendidikan" :value="old('guardian_education')" />
                            <x-input-field id="guardian_monthly_income" name="guardian_monthly_income"
                                label="Penghasilan Bulanan Wali" placeholder="Penghasilan" :value="old('guardian_monthly_income')"
                                type="number" />
                        </div>
                    </div>

                    <div class="page mb-6" id="page4" data-name="Data Periodik" style="display: none;">
                        <!-- Data Periodik -->
                        <h3 class="mb-4 text-lg font-semibold text-gray-900 -:text-white">Data Periodik</h3>
                        <div class="grid grid-cols-2 gap-6">
                            <x-input-field id="height" name="height" label="Tinggi Badan (cm)"
                                placeholder="Contoh: 170" :value="old('height')" type="number" req />
                            <x-input-field id="weight" name="weight" label="Berat Badan (kg)"
                                placeholder="Contoh: 60" :value="old('weight')" type="number" req />
                            <x-select-field id="blood_type" name="blood_type" label="Golongan Darah"
                                :value="old('blood_type')" required>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </x-select-field>
                            <x-input-field id="distance_to_school" name="distance_to_school"
                                label="Jarak Tempat Tinggal ke Sekolah (km)" placeholder="Contoh: 5"
                                :value="old('distance_to_school')" type="number" req />
                            <x-input-field id="travel_time" name="travel_time"
                                label="Waktu Tempuh ke Sekolah (menit)" placeholder="Contoh: 30" :value="old('travel_time')"
                                type="number" req />
                        </div>

                        <!-- Data Prestasi -->
                        <h3 class="my-4 text-lg font-semibold text-gray-900 -:text-white">Data Prestasi</h3>
                        <div>
                            <div id="achievement-container">
                                <div class="achievement-item my-4 grid grid-cols-2 gap-6">
                                    <x-input-field id="achievement_type_0" name="achievement_type[]"
                                        label="Jenis Prestasi" placeholder="Contoh: Olahraga" :value="old('achievement_type.0')" />
                                    <x-input-field id="achievement_level_0" name="achievement_level[]"
                                        label="Tingkat" placeholder="Contoh: Nasional" :value="old('achievement_level.0')" />
                                    <x-input-field id="achievement_name_0" name="achievement_name[]"
                                        label="Nama Prestasi" placeholder="Contoh: Juara 1 Renang"
                                        :value="old('achievement_name.0')" />
                                    <x-input-field id="achievement_year_0" name="achievement_year[]" label="Tahun"
                                        placeholder="Contoh: 2023" :value="old('achievement_year.0')" type="number" />
                                    <x-input-field id="achievement_organizer_0" name="achievement_organizer[]"
                                        label="Penyelenggara" placeholder="Contoh: Kemenpora" :value="old('achievement_organizer.0')" />
                                </div>
                            </div>
                        </div>
                        <button type="button" class="mt-4 rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-600"
                            id="add-achievement">
                            Tambahkan Prestasi
                        </button>

                        <!-- Data Beasiswa -->
                        <h3 class="my-4 text-lg font-semibold text-gray-900 -:text-white">Data Beasiswa</h3>
                        <div>
                            <div id="scholarship-container">
                                <div class="scholarship-item my-4 grid grid-cols-2 gap-6">
                                    <x-input-field id="scholarship_type_0" name="scholarship_type[]"
                                        label="Jenis Beasiswa" placeholder="Contoh: Bidikmisi" :value="old('scholarship_type.0')" />
                                    <x-input-field id="scholarship_organizer_0" name="scholarship_organizer[]"
                                        label="Penyelenggara" placeholder="Contoh: Kemendikbud" :value="old('scholarship_organizer.0')" />
                                    <x-input-field id="scholarship_start_year_0" name="scholarship_start_year[]"
                                        label="Tahun Mulai" placeholder="Contoh: 2020" :value="old('scholarship_start_year.0')"
                                        type="number" />
                                    <x-input-field id="scholarship_end_year_0" name="scholarship_end_year[]"
                                        label="Tahun Selesai" placeholder="Contoh: 2022" :value="old('scholarship_end_year.0')"
                                        type="number" />
                                </div>
                            </div>
                        </div>
                        <button type="button"
                            class="mt-4 rounded bg-green-500 px-4 py-2 text-white hover:bg-green-600"
                            id="add-scholarship">
                            Tambahkan Beasiswa
                        </button>
                    </div>

                    <div id="navigationButtons" class="flex justify-between">
                        <button type="button" id="prevButton" onclick="prevPage()" style="display: none;"
                            class="w-full rounded-lg bg-gray-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300 -:bg-gray-600 -:hover:bg-gray-700 -:focus:ring-gray-800 sm:w-auto"></button>
                        <button type="button" id="nextButton" onclick="nextPage()"
                            class="ms-auto w-full rounded-lg bg-green-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 -:bg-green-600 -:hover:bg-green-700 -:focus:ring-green-800 sm:w-auto"></button>
                        {{-- <button type="submit" id="submitButton" style="display: none;"
                            class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 -:bg-blue-600 -:hover:bg-blue-700 -:focus:ring-blue-800 sm:w-auto">Submit</button> --}}
                        <button id="submitButton" style="display: none;" data-modal-target="popup-modal"
                            data-modal-toggle="popup-modal"
                            class="block rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 -:bg-blue-600 -:hover:bg-blue-700 -:focus:ring-blue-800"
                            type="button">
                            Submit
                        </button>
                    </div>

                    <div id="popup-modal" tabindex="-1"
                        class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                        <div class="relative max-h-full w-full max-w-md p-4">
                            <div class="relative rounded-lg bg-white shadow -:bg-gray-700">
                                <button type="button"
                                    class="absolute end-2.5 top-3 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 -:hover:bg-gray-600 -:hover:text-white"
                                    data-modal-hide="popup-modal">
                                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-4 text-center md:p-5">
                                    <svg class="mx-auto mb-4 h-12 w-12 text-gray-400 -:text-gray-200"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <h3 class="mb text-gray-8 text-lg font-normal">Apakah data sudah
                                        sesuai?</h3>
                                    <p class="mb-6 text-sm font-normal text-gray-400">Data yang diinputkan tidak dapat
                                        diubah nantinya!</p>
                                    <button data-modal-hide="popup-modal" type="button"
                                        class="ms-3 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 -:border-gray-600 -:bg-gray-800 -:text-gray-400 -:hover:bg-gray-700 -:hover:text-white -:focus:ring-gray-700">Tidak,
                                        batalkan</button>
                                    <button data-modal-hide="popup-modal" id="submitButtonModal" type="submit"
                                        class="inline-flex items-center rounded-lg bg-blue-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 -:focus:ring-blue-800">
                                        Ya, saya yakin
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('build/assets/js/form-navigation.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const kpsReceiverSelect = document.getElementById("kps_receiver");
            const kpsNumberInput = document.getElementById("kps_number-container");
            const kpsNumberField = document.getElementById("kps_number");

            // Menambahkan event listener untuk perubahan pada select "kps_receiver"
            kpsReceiverSelect.addEventListener("change", function() {
                if (this.value === "ya") {
                    kpsNumberInput.style.display = "block"; // Menampilkan input "No KPS" jika "Ya"
                    kpsNumberField.setAttribute("required", "required"); // Menambahkan atribut required
                } else {
                    kpsNumberInput.style.display = "none"; // Menyembunyikan input "No KPS" jika "Tidak"
                    kpsNumberField.removeAttribute("required"); // Menghapus atribut required
                }
            });

            // Cek status pada saat halaman pertama kali dimuat
            if (kpsReceiverSelect.value === "ya") {
                kpsNumberInput.style.display = "block"; // Jika sebelumnya "Ya", tampilkan input "No KPS"
                kpsNumberField.setAttribute("required", "required"); // Tambahkan atribut required
            }
        });


        document.addEventListener('DOMContentLoaded', () => {
            // Tambah Prestasi
            const addAchievementButton = document.getElementById('add-achievement');
            const achievementContainer = document.getElementById('achievement-container');
            let achievementCount = 1; // Counter untuk ID unik

            addAchievementButton.addEventListener('click', () => {
                const newAchievement = `
                <div class="achievement-item my-4 grid grid-cols-2 gap-6">
                    <x-input-field id="achievement_type_${achievementCount}" name="achievement_type[]" label="Jenis Prestasi" placeholder="Contoh: Olahraga" />
                    <x-input-field id="achievement_level_${achievementCount}" name="achievement_level[]" label="Tingkat" placeholder="Contoh: Nasional" />
                    <x-input-field id="achievement_name_${achievementCount}" name="achievement_name[]" label="Nama Prestasi" placeholder="Contoh: Juara 1 Renang" />
                    <x-input-field id="achievement_year_${achievementCount}" name="achievement_year[]" label="Tahun" placeholder="Contoh: 2023" type="number" />
                    <x-input-field id="achievement_organizer_${achievementCount}" name="achievement_organizer[]" label="Penyelenggara" placeholder="Contoh: Kemenpora" />
                    <button type="button" class="col-span-2 mt-2 text-red-500 hover:underline remove-achievement">Hapus Prestasi</button>
                </div>
            `;
                achievementContainer.insertAdjacentHTML('beforeend', newAchievement);
                achievementCount++;
            });

            // Tambah Beasiswa
            const addScholarshipButton = document.getElementById('add-scholarship');
            const scholarshipContainer = document.getElementById('scholarship-container');
            let scholarshipCount = 1; // Counter untuk ID unik

            addScholarshipButton.addEventListener('click', () => {
                const newScholarship = `
                <div class="scholarship-item my-4 grid grid-cols-2 gap-6">
                    <x-input-field id="scholarship_type_${scholarshipCount}" name="scholarship_type[]" label="Jenis Beasiswa" placeholder="Contoh: Bidikmisi" />
                    <x-input-field id="scholarship_organizer_${scholarshipCount}" name="scholarship_organizer[]" label="Penyelenggara" placeholder="Contoh: Kemendikbud" />
                    <x-input-field id="scholarship_start_year_${scholarshipCount}" name="scholarship_start_year[]" label="Tahun Mulai" placeholder="Contoh: 2020" type="number" />
                    <x-input-field id="scholarship_end_year_${scholarshipCount}" name="scholarship_end_year[]" label="Tahun Selesai" placeholder="Contoh: 2022" type="number" />
                    <button type="button" class="col-span-2 mt-2 text-red-500 hover:underline remove-scholarship">Hapus Beasiswa</button>
                </div>
            `;
                scholarshipContainer.insertAdjacentHTML('beforeend', newScholarship);
                scholarshipCount++;
            });

            // Event Delegation for Remove Buttons
            document.body.addEventListener('click', (event) => {
                if (event.target.classList.contains('remove-achievement')) {
                    event.target.closest('.achievement-item').remove();
                }
                if (event.target.classList.contains('remove-scholarship')) {
                    event.target.closest('.scholarship-item').remove();
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            // Memanggil fungsi untuk setiap elemen input file berdasarkan kelasnya
            const fileInputs = document.querySelectorAll('.file-input');
            fileInputs.forEach(inputFile => {
                addFileInputListener(inputFile);
            });
        });

        function addFileInputListener(inputFile) {
            inputFile.addEventListener('change', function(event) {
                const fileLabel = event.target.closest('.file-label');
                const fileName = event.target.files[0]?.name;

                console.log('fileLabel:', fileLabel);
                console.log('fileName:', fileName);

                if (fileName) {
                    // Perbarui tampilan nama file di dalam label
                    const fileInfo = fileLabel.querySelector('.file-info');
                    fileInfo.innerHTML = `
                        <svg class="mb-4 h-[96px] w-[96px] text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7Z" clip-rule="evenodd" />
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 -:text-gray-400"><span class="font-semibold">${fileName}</span></p>
                    `;

                    let deleteIcon = fileLabel.querySelector('#delete-icon');
                    console.log('fileLabel:', fileLabel);
                    console.log('deleteIcon exists:', deleteIcon);

                    if (deleteIcon) {
                        deleteIcon.classList.remove('hidden');
                    }

                    if (deleteIcon && !deleteIcon.classList.contains('hidden')) {
                        deleteIcon.addEventListener('click', function(event) {
                            event.preventDefault();
                            inputFile.value = '';
                            resetFileLabel(fileLabel, inputFile);
                        });
                        addPreventDefaultToFileLabel(fileLabel);
                    }
                }
            });
        }

        function resetFileLabel(fileLabel, inputFile) {
            const fileInfo = fileLabel.querySelector('.file-info');
            fileInfo.innerHTML = `
                <svg class="mb-4 h-8 w-8 text-gray-500 -:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                </svg>
                <p class="mb-2 text-sm text-gray-500 -:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                <p class="text-xs text-gray-500 -:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
            `;

            // Hapus ikon delete jika ada
            const deleteIcon = fileLabel.querySelector('#delete-icon');
            if (deleteIcon) {
                deleteIcon.classList.add('hidden');
            }

            fileLabel.removeEventListener('click', preventFileLabelDefault);
        }

        // Deklarasi preventFileLabelDefault di luar agar bisa digunakan di kedua tempat
        const preventFileLabelDefault = (event) => {
            event.preventDefault();
        };

        // Fungsi untuk menambahkan preventDefault pada klik file label
        function addPreventDefaultToFileLabel(fileLabel) {
            fileLabel.addEventListener('click', preventFileLabelDefault);
        }
    </script>
</x-app-layout>
