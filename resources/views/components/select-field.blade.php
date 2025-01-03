<div>
    <label for="{{ $id }}" class="mb-2 block text-sm font-medium text-gray-900 -:text-white">
        {{ $label }}
    </label>
    <select id="{{ $id }}" name="{{ $name }}"
        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 -:border-gray-600 -:bg-gray-700 -:text-white -:placeholder-gray-400 -:focus:border-blue-500 -:focus:ring-blue-500"
        value="{{ old($name, $value ?? '') }}" {{ $attributes }}>
        <option selected disabled>{{ $placeholder ?? 'Pilih salah satu' }}</option>
        {{ $slot }}
    </select>
    @error($name)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
