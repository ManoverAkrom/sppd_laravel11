<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100 scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="\img\web-logo.png">

    {{-- Native --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />

    {{-- Tailwind --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- jquerry --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <title>{{ $title }}</title>
</head>

<body class="h-full">
    @include('fragment.alert')
    <div class="min-h-full">
        <x-navbar></x-navbar>
        <x-header>{{ $title }}</x-header>

        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/apexchart.js') }}"></script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>

</html>
