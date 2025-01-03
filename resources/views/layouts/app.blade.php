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

<body class="font-sans antialiased"
    style="background-image: url('https://res.cloudinary.com/dmgrpklyt/image/upload/v1735869627/pgii-connect/cbcmpya2exgn3evxbkqx.png'); background-size: cover;">
    <div class="flex flex-col bg-cover bg-center">
        <div class="h-48" style="background-image: url('https://res.cloudinary.com/dmgrpklyt/image/upload/v1735869637/pgii-connect/sxgrgiutg4wtev5ppswx.png');">
            <img class="ps-2 pt-4" src="https://res.cloudinary.com/dmgrpklyt/image/upload/v1735869628/pgii-connect/yionj4rpfyu8oujol1ro.png" alt="Logo SMA">
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
