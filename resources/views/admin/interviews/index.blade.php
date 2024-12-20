<x-admin-layout>
    @slot('title')
        Kelola Wawancara
    @endslot

    <!-- Search Form -->
    <div class="mb-4">
        <form method="GET" action="{{ route('interviews.index') }}">
            <input type="text" name="search" value="{{ request()->get('search') }}" placeholder="Search by student name"
                class="w-full rounded-lg border border-gray-300 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:text-white">
        </form>
    </div>

    <!-- Interviews Table -->
    <div class="relative overflow-x-auto border shadow sm:rounded-lg">
        <table class="min-w-full text-left text-sm text-gray-500 dark:text-gray-400">
            <thead class="border-b bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Avatar</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Scheduled At</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($interviews as $interview)
                    <tr
                        class="border-b odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800">
                        <td class="px-6 py-4">
                            <img class="h-12 w-12 rounded-full object-cover"
                                src="{{ $interview->student->user->avatar }}"
                                alt="{{ $interview->student->name }}'s Avatar" referrerpolicy="no-referrer">
                        </td>
                        <td class="px-6 py-4">
                            {{ $interview->student->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $interview->scheduled_at->translatedFormat('l, d F Y') }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('interviews.detail', $interview->id) }}"
                                class="text-blue-600 hover:underline dark:text-blue-500">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4 flex flex-col items-center">
        <span class="text-sm text-gray-700 dark:text-gray-400">
            Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $interviews->firstItem() }}</span> to
            <span class="font-semibold text-gray-900 dark:text-white">{{ $interviews->lastItem() }}</span> of <span
                class="font-semibold text-gray-900 dark:text-white">{{ $interviews->total() }}</span> Entries
        </span>

        <nav aria-label="Page navigation example" class="mt-2">
            <ul class="flex h-8 items-center -space-x-px text-sm">
                <!-- Previous Button -->
                <li>
                    <a href="{{ $interviews->previousPageUrl() }}"
                        class="ms-0 flex h-8 items-center justify-center rounded-s-lg border border-e-0 border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Previous</span>
                        <svg class="h-2.5 w-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                    </a>
                </li>

                <!-- Pagination Links -->
                @foreach ($interviews->links()->elements[0] as $page => $url)
                    <li>
                        <a href="{{ $url }}"
                            class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{ $page }}</a>
                    </li>
                @endforeach

                <!-- Next Button -->
                <li>
                    <a href="{{ $interviews->nextPageUrl() }}"
                        class="flex h-8 items-center justify-center rounded-e-lg border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
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
