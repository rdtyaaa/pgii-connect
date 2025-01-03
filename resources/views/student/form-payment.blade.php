<x-app-layout>
    @slot('midtransScript')
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    @endslot
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
            <x-registration-step :currentStep="$currentStep" />
        </div>
    </div>

    <div class="mx-auto my-12 px-12">
        <div class="bg-white shadow-sm sm:rounded-lg">
            <div class="overflow-y-auto px-16 py-8 text-gray-900">
                @if ($paymentType === 'uang_awal')
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
                                Selamat! Anda telah diterima di sekolah kami. Silahkan lanjutkan melakukan pembayaran
                                uang awal!
                            </p>
                        </div>
                    </div>
                @endif
                <h1 class="mb-4 text-2xl font-bold">Data Diri</h1>
                <div class="flex">
                    <div class="w-1/2 gap-6">
                        <div class="mb-4">
                            <label for="name" class="-:text-white mb-2 block text-sm font-medium text-gray-900">Nama
                                Lengkap</label>
                            <input type="text" id="name" name="name"
                                class="-:border-gray-600 -:bg-gray-700 -:text-white -:placeholder-gray-400 -:focus:border-blue-500 -:focus:ring-blue-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Misal: Anton Pargoy" value="{{ $student->name }}" disabled />
                        </div>
                        <div class="mb-4">
                            <label for="email"
                                class="-:text-white mb-2 block text-sm font-medium text-gray-900">Email</label>
                            <input type="text" id="email" name="email"
                                class="-:border-gray-600 -:bg-gray-700 -:text-white -:placeholder-gray-400 -:focus:border-blue-500 -:focus:ring-blue-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Misal: pargoy@gmail.com" value="{{ $student->email }}" disabled />
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="-:text-white mb-2 block text-sm font-medium text-gray-900">No.
                                Telepon</label>
                            <input type="tel" id="phone" name="phone"
                                class="-:border-gray-600 -:bg-gray-700 -:text-white -:placeholder-gray-400 -:focus:border-blue-500 -:focus:ring-blue-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Misal: 081234567890" value="{{ $student->phone }}" disabled />
                        </div>
                    </div>
                    <div id="snap-embed-container" class="flex w-1/2 items-center justify-center bg-gray-100 rounded-lg m-8">
                        <div id="snap-token" data-snap-token="{{ $snapToken }}"
                            data-payment-route="{{ route('payment.store', ['paymentType' => $paymentType]) }}"></div>
                        <div role="status" class="bg-gray-100">
                            <svg aria-hidden="true" id="loadingSpinner" style="display: none;"
                                class="h-8 w-8 animate-spin fill-blue-600 text-gray-200 dark:text-gray-600"
                                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                    fill="currentColor" />
                                <path
                                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                    fill="currentFill" />
                            </svg>
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    <style>
        #snap-embed-container iframe {
            width: 100% !important;
            height: 100% !important;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const snapTokenElement = document.getElementById("snap-token");
            const snapToken = snapTokenElement.getAttribute("data-snap-token");
            const paymentRoute = snapTokenElement.getAttribute("data-payment-route");

            if (snapToken) {
                // Embed Snap payment form
                snap.embed(snapToken, {
                    embedId: "snap-embed-container", // ID container untuk Snap Embed
                    onSuccess: function(result) {
                        console.log("Payment success:", result);
                        sendPaymentResult(result);
                    },
                    onPending: function(result) {
                        console.log("Payment pending:", result);
                        sendPaymentResult(result);
                    },
                    onError: function(result) {
                        console.error("Payment error:", result);
                        alert("Terjadi kesalahan saat pembayaran. Silakan coba lagi.");
                    },
                    onClose: function() {
                        alert("Transaksi tidak selesai. Anda menutup form pembayaran.");
                    },
                });
            }

            function sendPaymentResult(result) {
                // Tampilkan spinner loading
                document.getElementById('loadingSpinner').style.display = 'inline-block';

                fetch(paymentRoute, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                                "content"),
                        },
                        body: JSON.stringify(result),
                    })
                    .then((response) => response.json())
                    .then((data) => {
                        // Sembunyikan spinner setelah menerima response
                        document.getElementById('loadingSpinner').style.display = 'none';

                        if (data.success) {
                            // Setelah sukses, langsung redirect ke URL yang diterima
                            if (data.redirect_url) {
                                window.location.href = data.redirect_url; // Arahkan ke URL baru
                            } else {
                                window.location.reload(); // Reload halaman jika tidak ada redirect
                            }
                        } else {
                            alert("Pembayaran gagal, coba lagi.");
                        }
                    })
                    .catch((error) => {
                        // Sembunyikan spinner jika terjadi error
                        document.getElementById('loadingSpinner').style.display = 'none';

                        console.error("Error sending payment result:", error);
                        alert("Gagal mengirim hasil pembayaran. Silakan coba lagi.");
                    });
            }
        });
    </script>

</x-app-layout>
