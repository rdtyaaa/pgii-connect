<x-admin-layout>
    @slot('title')
        Dashboard
    @endslot
    <div class="grid h-fit w-full grid-cols-4 gap-4 px-8 pb-24">
        <!-- Total Pendaftar -->
        <div class="rounded-lg border border-gray-200 bg-white p-6 dark:border-gray-700 dark:bg-gray-800">
            <svg class="mb-3 h-7 w-7 text-gray-500 dark:text-gray-400" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path
                    d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
            </svg>

            <a href="#">
                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                    {{ $totalPendaftar }}</h5>
            </a>
            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Total Pendaftar</p>
            {{-- <p class="text-sm text-gray-400 dark:text-gray-500">Sisa: {{ $sisaPendaftar }} belum membeli formulir</p> --}}
        </div>

        <!-- Pembelian Formulir -->
        <div class="rounded-lg border border-gray-200 bg-white p-6 dark:border-gray-700 dark:bg-gray-800">
            <svg class="mb-3 h-7 w-7 text-gray-500 dark:text-gray-400" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path d="M12 7.5a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z" />
                <path fill-rule="evenodd"
                    d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 0 1 1.5 14.625v-9.75ZM8.25 9.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM18.75 9a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V9.75a.75.75 0 0 0-.75-.75h-.008ZM4.5 9.75A.75.75 0 0 1 5.25 9h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H5.25a.75.75 0 0 1-.75-.75V9.75Z"
                    clip-rule="evenodd" />
            </svg>

            <a href="#">
                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                    {{ $pembelianFormulir }}</h5>
            </a>
            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Pembelian Formulir</p>
            <p class="text-sm text-gray-400 dark:text-gray-500">Sisa: {{ $sisaPendaftar }} belum
                membeli formulir</p>
        </div>

        <!-- Wawancara Dijadwalkan -->
        <div class="rounded-lg border border-gray-200 bg-white p-6 dark:border-gray-700 dark:bg-gray-800">
            <svg class="mb-3 h-7 w-7 text-gray-500 dark:text-gray-400" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path d="M8.25 4.5a3.75 3.75 0 1 1 7.5 0v8.25a3.75 3.75 0 1 1-7.5 0V4.5Z" />
                <path
                    d="M6 10.5a.75.75 0 0 1 .75.75v1.5a5.25 5.25 0 1 0 10.5 0v-1.5a.75.75 0 0 1 1.5 0v1.5a6.751 6.751 0 0 1-6 6.709v2.291h3a.75.75 0 0 1 0 1.5h-7.5a.75.75 0 0 1 0-1.5h3v-2.291a6.751 6.751 0 0 1-6-6.709v-1.5A.75.75 0 0 1 6 10.5Z" />
            </svg>

            <a href="#">
                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                    {{ $wawancaraDijadwalkan }}</h5>
            </a>
            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Wawancara Dijadwalkan</p>
            <p class="text-sm text-gray-400 dark:text-gray-500">Sisa: {{ $sisaWawancara }} belum dijadwalkan wawancara
            </p>
        </div>

        <!-- Peserta Diterima -->
        <div class="rounded-lg border border-gray-200 bg-white p-6 dark:border-gray-700 dark:bg-gray-800">
            <svg class="mb-3 h-7 w-7 text-gray-500 dark:text-gray-400" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd"
                    d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z"
                    clip-rule="evenodd" />
                <path fill-rule="evenodd"
                    d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375Zm9.586 4.594a.75.75 0 0 0-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 0 0-1.06 1.06l1.5 1.5a.75.75 0 0 0 1.116-.062l3-3.75Z"
                    clip-rule="evenodd" />
            </svg>

            <a href="#">
                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                    {{ $pesertaDiterima }}</h5>
            </a>
            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Peserta Diterima</p>
            <p class="text-sm text-gray-400 dark:text-gray-500">Sisa: {{ $sisaPesertaDiterima }}
                belum diterima</p>
        </div>

        <!-- Chart for School Origins -->
        <div class="col-span-2 rounded-lg border border-gray-200 bg-white p-6 dark:border-gray-700 dark:bg-gray-800">
            <canvas id="schoolChart"></canvas>
            <script>
                const ctx = document.getElementById('schoolChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: @json($sekolah->pluck('school_origin')),
                        datasets: [{
                            label: 'Pendaftar per Sekolah',
                            data: @json($sekolah->pluck('total')),
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                enabled: true
                            }
                        }
                    }
                });
            </script>
        </div>

        <!-- Chart for Gender -->
        <div class="col-span-2 rounded-lg border border-gray-200 bg-white p-6 dark:border-gray-700 dark:bg-gray-800">
            <canvas id="genderChart"></canvas>
            <script>
                const genderCtx = document.getElementById('genderChart').getContext('2d');
                new Chart(genderCtx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Male', 'Female'],
                        datasets: [{
                            label: 'Pendaftar berdasarkan Gender',
                            data: [
                                @json($gender->where('gender', 'M')->first()->total ?? 0),
                                @json($gender->where('gender', 'F')->first()->total ?? 0)
                            ],
                            backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 159, 64, 0.2)'],
                            borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 159, 64, 1)'],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                enabled: true
                            }
                        }
                    }
                });
            </script>
        </div>

        <!-- Chart for Special Needs -->
        <div class="col-span-2 rounded-lg border border-gray-200 bg-white p-6 dark:border-gray-700 dark:bg-gray-800">
            <canvas id="specialNeedsChart"></canvas>
            <script>
                const specialNeedsCtx = document.getElementById('specialNeedsChart').getContext('2d');
                new Chart(specialNeedsCtx, {
                    type: 'bar',
                    data: {
                        labels: ['With Special Needs', 'Without Special Needs'],
                        datasets: [{
                            label: 'Pendaftar dengan Kebutuhan Khusus',
                            data: [
                                @json($specialNeeds->where('special_needs', 'Ya')->first()->total ?? 0),
                                @json($specialNeeds->where('special_needs', 'Tidak')->first()->total ?? 0)
                            ],
                            backgroundColor: 'rgba(153, 102, 255, 0.2)',
                            borderColor: 'rgba(153, 102, 255, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                enabled: true
                            }
                        }
                    }
                });
            </script>
        </div>
    </div>
</x-admin-layout>
