<x-admin-layout>
    @slot('title')
        Pembayaran
    @endslot
    <div class="mb-4 flex grid grid-cols-2 items-center">
        <!-- Search -->
        <form method="GET" class="w-full" action="{{ route('payments.index') }}">
            <input type="text" name="search" class="w-1/2 rounded-lg border-gray-300 text-sm"
                placeholder="Search payments..." value="{{ request('search') }}">
            <button type="submit" class="ml-2 rounded-lg bg-blue-600 px-4 py-2 text-sm text-white hover:bg-blue-700">
                Search
            </button>
        </form>

        <!-- Dropdown Filter -->
        <form method="GET" class="flex justify-end" action="{{ route('payments.index') }}">
            <select name="filter" class="rounded-lg border-gray-300 text-sm">
                <option value="">All Payment Types</option>
                @foreach ($paymentTypes as $type)
                    <option value="{{ $type }}" {{ request('filter') == $type ? 'selected' : '' }}>
                        {{ $type }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="ml-2 rounded-lg bg-green-600 px-4 py-2 text-sm text-white hover:bg-green-700">
                Filter
            </button>
        </form>
    </div>

    <!-- Payment Table -->
    <div class="relative overflow-x-auto border shadow sm:rounded-lg">
        <table class="w-full text-left text-sm text-gray-500 rtl:text-right -:text-gray-400">
            <thead class="border-b bg-gray-50 text-xs uppercase text-gray-700 -:bg-gray-700 -:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Payment Date</th>
                    <th scope="col" class="px-6 py-3">Order ID</th>
                    <th scope="col" class="px-6 py-3">Snap Token</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Amount</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Payment Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr
                        class="border-b odd:bg-white even:bg-gray-50 -:border-gray-700 odd:-:bg-gray-900 even:-:bg-gray-800">
                        <td class="px-6 py-4">
                            @if ($payment->payment_date)
                                {{ $payment->payment_date->translatedFormat('l, d F Y') }}
                            @else
                                <span>-</span>
                            @endif

                        </td>
                        <td class="px-6 py-4">{{ $payment->order_id }}</td>
                        <td class="px-6 py-4">{{ $payment->snap_token }}</td>
                        <td class="px-6 py-4">{{ $payment->user->student->name }}</td>
                        <td class="px-6 py-4">Rp{{ number_format($payment->amount, 2) }}</td>
                        <td class="px-6 py-4">{{ ucfirst($payment->status) }}</td>
                        <td class="px-6 py-4">{{ ucfirst($payment->payment_type) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4 flex flex-col items-center">
        <span class="text-sm text-gray-700 -:text-gray-400">
            Showing <span class="font-semibold text-gray-900 -:text-white">{{ $payments->firstItem() }}</span> to
            <span class="font-semibold text-gray-900 -:text-white">{{ $payments->lastItem() }}</span> of <span
                class="font-semibold text-gray-900 -:text-white">{{ $payments->total() }}</span> Entries
        </span>

        <nav aria-label="Page navigation example" class="mt-2">
            <ul class="flex h-8 items-center -space-x-px text-sm">
                <!-- Previous Button -->
                <li>
                    <a href="{{ $payments->previousPageUrl() }}"
                        class="ms-0 flex h-8 items-center justify-center rounded-s-lg border border-e-0 border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 -:border-gray-700 -:bg-gray-800 -:text-gray-400 -:hover:bg-gray-700 -:hover:text-white">
                        <span class="sr-only">Previous</span>
                        <svg class="h-2.5 w-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                    </a>
                </li>

                <!-- Pagination Links -->
                @foreach ($payments->links()->elements[0] as $page => $url)
                    <li>
                        <a href="{{ $url }}"
                            class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 -:border-gray-700 -:bg-gray-800 -:text-gray-400 -:hover:bg-gray-700 -:hover:text-white">{{ $page }}</a>
                    </li>
                @endforeach

                <!-- Next Button -->
                <li>
                    <a href="{{ $payments->nextPageUrl() }}"
                        class="flex h-8 items-center justify-center rounded-e-lg border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 -:border-gray-700 -:bg-gray-800 -:text-gray-400 -:hover:bg-gray-700 -:hover:text-white">
                        <span class="sr-only">Next</span>
                        <svg class="h-2.5 w-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</x-admin-layout>
