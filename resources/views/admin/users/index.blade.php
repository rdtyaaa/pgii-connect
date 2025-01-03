<x-admin-layout>
    @slot('title')
        Kelola Pengguna
    @endslot
    {{-- <div class="flex-cols mb-4 flex items-center justify-between">
        <h1 class="text-2xl font-semibold text-gray-800 -:text-gray-200">User Management</h1> --}}
    {{-- <a href="{{ route('users.create') }}"
            class="rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 -:bg-blue-600 -:hover:bg-blue-700 -:focus:ring-blue-800">
            Create User
        </a> --}}
    {{-- </div> --}}

    <div class="relative overflow-x-auto border shadow sm:rounded-lg">
        <table class="w-full text-left text-sm text-gray-500 -:text-gray-400 rtl:text-right">
            <thead class="border-b bg-gray-50 text-xs uppercase text-gray-700 -:bg-gray-700 -:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Avatar</th>
                    <th scope="col" class="px-6 py-3">Role</th>
                    <th scope="col" class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr
                        class="border-b odd:bg-white even:bg-gray-50 -:border-gray-700 odd:-:bg-gray-900 even:-:bg-gray-800">
                        <td class="px-6 py-4">
                            <img src="{{ $user->avatar }}" alt="Avatar" class="h-10 w-10 rounded-full"
                                referrerpolicy="no-referrer">
                        </td>
                        <td class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 -:text-white">
                            {{ $user->name }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4">
                            @if ($user->is_admin && $user->is_interviewer)
                                Admin
                            @elseif($user->is_interviewer)
                                Interviewer
                            @else
                                User
                            @endif
                        </td>
                        <td class="space-x-2 px-6 py-4">
                            <a href="{{ route('users.edit', $user->id) }}"
                                class="text-blue-600 hover:underline -:text-blue-500">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-600 hover:underline -:text-red-500">Delete</button>
                            </form>
                            {{-- <button data-modal-target="give-access-modal-{{ $user->id }}"
                                data-modal-toggle="give-access-modal-{{ $user->id }}"
                                class="text-green-600 hover:underline -:text-green-500">Give Access</button> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4 flex flex-col items-center">
        <span class="text-sm text-gray-700 -:text-gray-400">
            Showing <span class="font-semibold text-gray-900 -:text-white">{{ $users->firstItem() }}</span> to <span
                class="font-semibold text-gray-900 -:text-white">{{ $users->lastItem() }}</span> of <span
                class="font-semibold text-gray-900 -:text-white">{{ $users->total() }}</span> Entries
        </span>

        <nav aria-label="Page navigation example" class="mt-2">
            <ul class="flex h-8 items-center -space-x-px text-sm">
                <!-- Previous Button -->
                <li>
                    <a href="{{ $users->previousPageUrl() }}"
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
                @foreach ($users->links()->elements[0] as $page => $url)
                    <li>
                        <a href="{{ $url }}"
                            class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 -:border-gray-700 -:bg-gray-800 -:text-gray-400 -:hover:bg-gray-700 -:hover:text-white">{{ $page }}</a>
                    </li>
                @endforeach

                <!-- Next Button -->
                <li>
                    <a href="{{ $users->nextPageUrl() }}"
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

    @foreach ($users as $user)
        <!-- Modal -->
        <div id="give-access-modal-{{ $user->id }}" tabindex="-1" aria-hidden="true"
            class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
            <div class="relative max-h-full w-full max-w-md p-4">
                <div class="relative rounded-lg bg-white shadow -:bg-gray-700">
                    <div class="flex items-center justify-between rounded-t border-b p-4 -:border-gray-600 md:p-5">
                        <h3 class="text-xl font-semibold text-gray-900 -:text-white">Confirm Give Access</h3>
                        <button type="button"
                            class="h-8 w-8 rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 -:hover:bg-gray-600 -:hover:text-white"
                            data-modal-hide="give-access-modal-{{ $user->id }}">
                            <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <form action="{{ route('users.give-access', $user->id) }}" method="POST"
                        class="space-y-4 p-4 md:p-5">
                        @csrf
                        <div>
                            <label for="password-{{ $user->id }}"
                                class="mb-2 block text-sm font-medium text-gray-900 -:text-white">Password</label>
                            <input type="password" name="password" id="password-{{ $user->id }}"
                                class="w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 -:border-gray-500 -:bg-gray-600 -:text-white"
                                required>
                        </div>
                        <button type="submit"
                            class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 -:bg-blue-600 -:hover:bg-blue-700 -:focus:ring-blue-800">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</x-admin-layout>
