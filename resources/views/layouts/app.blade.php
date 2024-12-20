<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    @isset($midtransScript)
        {!! $midtransScript !!}
    @endisset

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="flex flex-col bg-cover bg-center"
        style="background-image: url('{{ asset('build/assets/img/BGBlur.png') }}');">
        <div class="h-48" style="background-image: url('{{ asset('build/assets/img/Pattern.png') }}');">
            <img class="ps-2 pt-4" src="{{ asset('build/assets/img/logo_PGII.png') }}" alt="Logo SMA">
        </div>

        @if ($errors->has('error'))
            <div class="alert alert-danger">
                {{ $errors->first('error') }}
            </div>
        @endif

        <main class="flex-grow">
            {{ $slot }}
        </main>
    </div>
    <script src="/node_modules/flowbite/dist/flowbite.min.js"></script>
</body>

</html>
