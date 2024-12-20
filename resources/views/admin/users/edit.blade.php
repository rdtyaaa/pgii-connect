<x-admin-layout>
    @slot('title')
        {{ isset($user) ? 'Edit Pengguna' : 'Tambah Pengguna' }} : {{ $user->name }}
    @endslot

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
                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name ?? '') }}"
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:text-white"
                        required>
                </div>

                <div>
                    <label for="email"
                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email ?? '') }}"
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:text-white"
                        required>
                </div>

                {{-- <div>
                    <label for="password"
                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" name="password" id="password"
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:text-white"
                        {{ isset($user) ? '' : 'required' }}>
                </div> --}}

                {{-- <div>
                    <label for="avatar"
                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Avatar</label>
                    <input type="file" name="avatar" id="avatar"
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:text-white">
                </div> --}}

                <div>
                    <label for="is_admin"
                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Role</label>
                    <select name="is_admin" id="is_admin"
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:text-white"
                        required>
                        <option value="0" {{ isset($user) && !$user->is_admin ? 'selected' : '' }}>User</option>
                        <option value="1" {{ isset($user) && $user->is_admin ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
            </div>

            <div class="mt-4 flex justify-end">
                <a href="{{ route('users.index') }}"
                    class="me-4 rounded-lg bg-gray-500 px-5 py-2.5 text-sm font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Back to Users
                </a>
                <button type="submit"
                    class="rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    {{ isset($user) ? 'Update User' : 'Create User' }}
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
