<x-admin-layout>
    <a href="{{ url()->previous() }}"
        class="mb-4 inline-block flex w-fit items-center gap-2 rounded-lg bg-gray-400 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-700">
        <svg class="h-6 w-6 -:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 12h14M5 12l4-4m-4 4 4 4" />
        </svg>
        Back
    </a>

    <div class="mb-4 flex items-center justify-between">
        <h1 class="text-2xl font-semibold text-gray-800 -:text-gray-200">
            {{ isset($user) ? 'Edit User' : 'Create User' }}</h1>
    </div>

    <div class="relative overflow-x-auto sm:rounded-lg">
        <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @if (isset($user))
                @method('PUT')
            @endif

            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label for="name"
                        class="mb-2 block text-sm font-medium text-gray-900 -:text-white">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name ?? '') }}"
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 -:border-gray-500 -:bg-gray-600 -:text-white"
                        required>
                </div>

                <div>
                    <label for="email"
                        class="mb-2 block text-sm font-medium text-gray-900 -:text-white">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email ?? '') }}"
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 -:border-gray-500 -:bg-gray-600 -:text-white"
                        required>
                </div>

                {{-- <div>
                    <label for="password"
                        class="mb-2 block text-sm font-medium text-gray-900 -:text-white">Password</label>
                    <input type="password" name="password" id="password"
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 -:border-gray-500 -:bg-gray-600 -:text-white"
                        {{ isset($user) ? '' : 'required' }}>
                </div> --}}

                {{-- <div>
                    <label for="avatar"
                        class="mb-2 block text-sm font-medium text-gray-900 -:text-white">Avatar</label>
                    <input type="file" name="avatar" id="avatar"
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 -:border-gray-500 -:bg-gray-600 -:text-white">
                </div> --}}

                <div>
                    <label for="role"
                        class="mb-2 block text-sm font-medium text-gray-900 -:text-white">Role</label>
                    <select name="role" id="role"
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 -:border-gray-500 -:bg-gray-600 -:text-white"
                        required>
                        <option value="user"
                            {{ isset($user) && !$user->is_admin && !$user->is_interviewer ? 'selected' : '' }}>User
                        </option>
                        <option value="interviewer"
                            {{ isset($user) && !$user->is_admin && $user->is_interviewer ? 'selected' : '' }}>
                            Interviewer</option>
                        <option value="admin"
                            {{ isset($user) && $user->is_admin && $user->is_interviewer ? 'selected' : '' }}>Admin
                        </option>
                    </select>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 -:bg-blue-600 -:hover:bg-blue-700 -:focus:ring-blue-800">
                    {{ isset($user) ? 'Update User' : 'Create User' }}
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
