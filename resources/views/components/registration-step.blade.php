<div class="mb-4 mt-2 flex w-full gap-4">
        @foreach(range(1, 6) as $step)
            <div class="my-auto w-1/5 rounded-lg
                {{ $currentStep == $step ? 'bg-yellow-300' : ($currentStep > $step ? 'bg-green-400' : 'bg-gray-300') }}
                p-4 shadow-md">
                <h5 class="font-semibold">Tahap {{ $step }}</h5>
                <p class="text-sm text-slate-700">
                    @switch($step)
                        @case(1)
                            Input Data Diri
                            @break
                        @case(2)
                            Pembayaran Form
                            @break
                        @case(3)
                            Input Dokumen
                            @break
                        @case(4)
                            Informasi Wawancara
                            @break
                        @case(5)
                            Pembayaran Uang Muka
                            @break
                        @case(6)
                            Selamat Datang!
                            @break
                    @endswitch
                </p>
            </div>
        @endforeach
    </div>
