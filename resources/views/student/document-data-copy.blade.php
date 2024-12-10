<x-app-layout>
    <div class="mx-auto px-12 py-8">
        <h1 class="mb-6 text-2xl font-bold">Formulir Pendaftaran</h1>
        <form {{-- action="{{ route('register.store') }}" --}} method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Upload Dokumen --}}
            <div class="mb-8">
                <h2 class="mb-4 text-lg font-semibold">Upload Dokumen</h2>
                @foreach (['Rapot_Semester', 'KK', 'AKTE', 'SKS'] as $doc)
                    <div class="mb-4">
                        <label for="{{ $doc }}" class="block text-sm font-medium">{{ $doc }}</label>
                        <input type="file" id="{{ $doc }}" name="{{ $doc }}"
                            class="block w-full rounded-lg border-gray-300 bg-gray-50 p-2.5 text-sm focus:border-blue-500 focus:ring-blue-500" />
                    </div>
                @endforeach
            </div>

            {{-- Identitas Peserta --}}
            <div class="mb-8">
                <h2 class="mb-4 text-lg font-semibold">Identitas Peserta</h2>
                @php
                    $fields = [
                        'Nama Lengkap' => 'name',
                        'Nama Panggilan' => 'nickname',
                        'Jenis SMP' => 'school_type',
                        'Asal SMP' => 'school_origin',
                        'NISN' => 'nisn',
                        'NIS' => 'nis',
                        'Nomor Seri Ijazah Resmi' => 'ijazah_number',
                        'Nomor Seri SKHUN' => 'skhun_number',
                        'No Ujian Nasional SMP' => 'exam_number',
                        'NIK' => 'nik',
                        'Tempat Tanggal Lahir' => 'birth_place_date',
                        'Agama' => 'religion',
                        'Kewarganegaraan' => 'nationality',
                        'Jumlah Saudara Kandung' => 'siblings_count',
                        'Anak Ke-' => 'child_position',
                        'Bahasa Sehari-hari di Rumah' => 'language',
                        'Berkebutuhan Khusus' => 'special_needs',
                        'Alamat Tempat Tinggal Lengkap' => 'address',
                        'Alat Transportasi Ke Sekolah' => 'transport',
                        'Tinggal Bersama' => 'living_with',
                        'No Telepon Rumah' => 'home_phone',
                        'No Telepon HP' => 'mobile_phone',
                        'Email Pribadi' => 'email',
                        'Apakah sebagai penerima KPS' => 'kps_receiver',
                        'No KPS' => 'kps_number',
                    ];
                @endphp

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    @foreach ($fields as $label => $name)
                        <div>
                            <label for="{{ $name }}"
                                class="block text-sm font-medium">{{ $label }}</label>
                            <input type="text" id="{{ $name }}" name="{{ $name }}"
                                class="block w-full rounded-lg border-gray-300 bg-gray-50 p-2.5 text-sm focus:border-blue-500 focus:ring-blue-500" />
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Data Ayah, Ibu, Wali --}}
            @foreach (['Ayah' => 'father', 'Ibu' => 'mother', 'Wali' => 'guardian'] as $label => $prefix)
                <div class="mb-8">
                    <h2 class="mb-4 text-lg font-semibold">Data {{ $label }}</h2>
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        @foreach (['Nama', 'Tahun Lahir', 'Berkebutuhan Khusus', 'Pekerjaan', 'Pendidikan', 'Penghasilan Bulanan'] as $field)
                            <div>
                                <label for="{{ $prefix . '_' . $field }}"
                                    class="block text-sm font-medium">{{ $field }}</label>
                                <input type="text" id="{{ $prefix . '_' . $field }}"
                                    name="{{ $prefix . '_' . $field }}"
                                    class="block w-full rounded-lg border-gray-300 bg-gray-50 p-2.5 text-sm focus:border-blue-500 focus:ring-blue-500" />
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

            {{-- Data Periodik --}}
            <div class="mb-8">
                <h2 class="mb-4 text-lg font-semibold">Data Periodik</h2>
                @foreach (['Tinggi Badan', 'Berat Badan', 'Golongan Darah', 'Jarak Tempat Tinggal Ke Sekolah', 'Waktu Tempuh Ke Sekolah'] as $field)
                    <div class="mb-4">
                        <label for="periodic_{{ $field }}"
                            class="block text-sm font-medium">{{ $field }}</label>
                        <input type="text" id="periodic_{{ $field }}" name="periodic_{{ $field }}"
                            class="block w-full rounded-lg border-gray-300 bg-gray-50 p-2.5 text-sm focus:border-blue-500 focus:ring-blue-500" />
                    </div>
                @endforeach
            </div>

            {{-- Prestasi dan Beasiswa --}}
            @foreach (['Prestasi' => 'achievement', 'Beasiswa' => 'scholarship'] as $label => $prefix)
                <div class="mb-8">
                    <h2 class="mb-4 text-lg font-semibold">Data {{ $label }}</h2>
                    <div id="{{ $prefix }}-container">
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            @foreach (['Jenis ' . $label, 'Tingkat', 'Nama ' . $label, 'Tahun', 'Penyelenggara'] as $field)
                                <div>
                                    <label for="{{ $prefix }}_{{ $field }}"
                                        class="block text-sm font-medium">{{ $field }}</label>
                                    <input type="text" id="{{ $prefix }}_{{ $field }}"
                                        name="{{ $prefix }}[0][{{ $field }}]"
                                        class="block w-full rounded-lg border-gray-300 bg-gray-50 p-2.5 text-sm focus:border-blue-500 focus:ring-blue-500" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="button" onclick="add{{ ucfirst($prefix) }}()"
                        class="mt-4 rounded bg-blue-500 px-4 py-2 text-white">Tambah {{ $label }}</button>
                </div>
            @endforeach

            <button type="submit"
                class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Submit</button>
        </form>
    </div>

    <script>
        function addAchievement() {
            const container = document.getElementById('achievement-container');
            const index = container.children.length;
            const template = `
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    @foreach (['Jenis Prestasi', 'Tingkat', 'Nama Prestasi', 'Tahun', 'Penyelenggara'] as $field)
                        <div>
                            <label class="block text-sm font-medium">{{ $field }}</label>
                            <input type="text" name="achievement[${index}][{{ $field }}]"
                                class="block w-full rounded-lg border-gray-300 bg-gray-50 p-2.5 text-sm focus:ring-blue-500 focus:border-blue-500" />
                        </div>
                    @endforeach
                </div>`;
            container.insertAdjacentHTML('beforeend', template);
        }

        function addScholarship() {
            const container = document.getElementById('scholarship-container');
            const index = container.children.length;
            const template = `
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    @foreach (['Jenis Beasiswa', 'Penyelenggara', 'Tahun Mulai', 'Tahun Selesai'] as $field)
                        <div>
                            <label class="block text-sm font-medium">{{ $field }}</label>
                            <input type="text" name="scholarship[${index}][{{ $field }}]"
                                class="block w-full rounded-lg border-gray-300 bg-gray-50 p-2.5 text-sm focus:ring-blue-500 focus:border-blue-500" />
                        </div>
                    @endforeach
                </div>`;
            container.insertAdjacentHTML('beforeend', template);
        }
    </script>
</x-app-layout>
