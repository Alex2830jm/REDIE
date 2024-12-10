<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Dirección de Estadística') }}</title>
    <link rel="shortcut icon" href="{{asset('assets/img/igecem.ico')}}" type="image/x-icon">
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    @if (isset($styles))
        {{ $styles }}
    @endif
</head>

<body class="bg-gray-100">
    <div class="flex flex-col flex-1 w-full">
        {{-- Header --}}
        <div class="md:container md:mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-12 p-4 items-center">
                <div class="col-span-1 md:col-span-3">
                    <img src="{{ asset('assets/img/logo_h1.png') }}" alt="Logo" class="w-full md:w-auto">
                    <hr class="hidden">
                    <span class="hidden sm:block font-light text-2xl text-center text-gold-500">Secretería de Finanzas</span>
                </div>
                <div class="col-span-1 md:col-span-9">
                    <h2 class="hidden sm:block font-montserrat font-light text-cherry-800 text-2xl sm:lg md:text-xl lg:text-4xl font-sans leading-tight">
                        Instituto de Información e Investigación Geográfica, Estadística y Catastral del Estado de
                        México IGECEM
                    </h2>
                </div>
            </div>
        </div>
        {{-- Navbar --}}
        @include('layouts.navigation')
    </div>
    {{-- Contenido --}}
    <main class="h-full mb-7">
        <div class="md:container md:mx-auto">
            {{ $slot }}
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <script src="{{ asset('assets/js/jquery-3.3.1.js') }}"></script>
    @if (isset($scripts))
        {{ $scripts }}
    @endif
</body>

</html>
