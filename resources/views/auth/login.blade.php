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
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    @php
        if ($errors->get('username')) {
            notyf()->position('x', 'center')->position('y', 'top')->addError($errors->first('username'));
        } elseif ($errors->get('password')) {
            notyf()->position('x', 'center')->position('y', 'top')->addError($errors->first('password'));
        }
    @endphp


    <div class="flex h-screen">
        <div class="hidden lg:flex items-center justify-center flex-1 bg-white text-black">
            <div class="mx-w-md text-center">
                <img src="{{ asset('assets/img/dashboards/loginImage3.svg') }}" alt="Login Image">
                <div class="wrapper-login">
                    <div class="wrapper-content">
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full bg-gray-100 lg:w-1/2 flex items-center justify-center">
            <div class="max-w-xl w-full p-6">
                <h1 class="text-5xl font-bold text-cherry-900 text-center"> Repositorio Digital de Información
                    Estadística </h1>
                <h1 class="text-2xl font-semibold text-gold-500 text-center"> Dirección de Estadística </h1>
                <h1 class="text-3xl font-semibold mv-6 text-black text-center">Bienvenido </h1>
                <h1 class="text-sm font-semibold mb-6 text-gray-500 text-center"> Iniciar Sesión </h1>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <section>
                        <label for="username" class="block text-sm font-medium text-gray-700">Usuario: </label>
                        <input type="text" id="username" name="username" value="{{ old('username') }}"
                            class="mt-1 p-2 w-full border rounded-md focus:border-gray-200 focus:outline-none focus:right-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">

                    </section>
                    <div class="relative" x-data="{ showPassword: true }">
                        <label for="password" class="block text-sm font-medium text-gray-700">Contraseña: </label>
                        <input :type="showPassword ? 'password' : 'text'" id="password" name="password" value="{{ old('password') }}"
                            class="mt-1 p-2 w-full border rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                        <div class="flex items-center absolute inset-y-0 right-0 mt-6 mr-3 text-sm leading-5">
                            <svg @click="showPassword = !showPassword"
                                :class="{ 'hidden': !showPassword, 'block': showPassword }" class="h-6 text-cherry-700"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>

                            <svg @click="showPassword = !showPassword"
                                :class="{ 'block': !showPassword, 'hidden': showPassword }" class="h-5 text-cherry-700"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </div>
                    </div>
                    <section>
                        <button type="submit"
                            class="mt-3 w-full bg-black text-white p-2 rounded-md hover:bg-gray-800  focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300">
                            Ingresar
                        </button>
                    </section>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
