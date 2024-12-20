<x-admin-layout>
    @slot('title')
        Pengaturan
    @endslot
    @if (session('status'))
        @if (session('status') == 'success')
            <div class="mb-4 rounded-lg bg-green-50 p-4 text-sm text-green-800 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">Success alert!</span> {{ session('message') }}
            </div>
        @elseif (session('status') == 'error')
            <div class="mb-4 rounded-lg bg-red-50 p-4 text-sm text-red-800 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <span class="font-medium">Error alert!</span> {{ session('message') }}
            </div>
        @elseif (session('status') == 'warning')
            <div class="mb-4 rounded-lg bg-yellow-50 p-4 text-sm text-yellow-800 dark:bg-gray-800 dark:text-yellow-300"
                role="alert">
                <span class="font-medium">Warning alert!</span> {{ session('message') }}
            </div>
        @else
            <div class="mb-4 rounded-lg bg-blue-50 p-4 text-sm text-blue-800 dark:bg-gray-800 dark:text-blue-400"
                role="alert">
                <span class="font-medium">Info alert!</span> {{ session('message') }}
            </div>
        @endif
    @endif


    <form action="{{ route('settings.update') }}" method="POST" class="grid grid-cols-2 gap-4">
        @csrf
        @method('PUT')

        <!-- School Email -->
        <div class="col-span-2 sm:col-span-1">
            <label for="school_email" class="mb-2 block text-sm font-medium text-gray-700">School Email</label>
            <input type="email" name="school_email" id="school_email"
                class="block w-full rounded-md border px-3 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                value="{{ $settings['school_email'] ?? '' }}" required>
        </div>

        <!-- School Phone -->
        <div class="col-span-2 sm:col-span-1">
            <label for="school_phone" class="mb-2 block text-sm font-medium text-gray-700">School Phone</label>
            <input type="text" name="school_phone" id="school_phone"
                class="block w-full rounded-md border px-3 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                value="{{ $settings['school_phone'] ?? '' }}" required>
        </div>

        <!-- Save Button -->
        <div class="col-span-2 flex justify-end">
            <button type="submit"
                class="rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                Save Settings
            </button>
        </div>
    </form>
</x-admin-layout>
