<x-admin-layout>
    @slot('title')
        Histori Aktivitas
    @endslot
    <div class="container mx-auto">
        <div class="relative overflow-x-auto border shadow sm:rounded-lg">
            <table class="w-full text-left text-sm text-gray-500">
                <thead class="border-b bg-gray-50 text-xs uppercase text-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-3">Created At</th>
                        <th scope="col" class="px-6 py-3">User</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                        <th scope="col" class="px-6 py-3">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $log)
                        <tr class="border-b odd:bg-white even:bg-gray-50">
                            <td class="px-6 py-4">{{ $log->created_at->translatedFormat('l, d F Y H:i') }}</td>
                            <td class="px-6 py-4">{{ $log->student->name }}</td>
                            <td class="px-6 py-4">{{ $log->action }}</td>
                            <td class="px-6 py-4">{{ $log->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination with Tailwind CSS and Flowbite -->
        <div class="mt-4 flex flex-col items-center">
            <span class="text-sm text-gray-700">
                Showing <span class="font-semibold text-gray-900">{{ $logs->firstItem() }}</span> to <span
                    class="font-semibold text-gray-900">{{ $logs->lastItem() }}</span> of <span
                    class="font-semibold text-gray-900">{{ $logs->total() }}</span> Entries
            </span>

            <nav aria-label="Page navigation example" class="mt-4">
                <ul class="flex h-8 items-center -space-x-px text-sm">
                    <!-- Previous Button -->
                    <li>
                        <a href="{{ $logs->previousPageUrl() }}"
                            class="flex h-8 items-center justify-center rounded-s-lg border border-e-0 border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                            <span class="sr-only">Previous</span>
                            <svg class="h-2.5 w-2.5 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 1 1 5l4 4" />
                            </svg>
                        </a>
                    </li>

                    <!-- Page Numbers -->
                    @foreach ($logs->getUrlRange(1, $logs->lastPage()) as $page => $url)
                        <li>
                            <a href="{{ $url }}"
                                class="{{ $page == $logs->currentPage() ? 'text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100' : 'text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700' }} flex h-8 items-center justify-center px-3 leading-tight">
                                {{ $page }}
                            </a>
                        </li>
                    @endforeach

                    <!-- Next Button -->
                    <li>
                        <a href="{{ $logs->nextPageUrl() }}"
                            class="flex h-8 items-center justify-center rounded-e-lg border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                            <span class="sr-only">Next</span>
                            <svg class="h-2.5 w-2.5 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</x-admin-layout>
