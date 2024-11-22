<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>REDIE - Inicio de Sesión</title>
</head>

<body>
    <div class="bg-zinc-50">
        <div class="flex justify-center h-screen">
            <div class="hidden bg-cover lg:block lg:w-2/3"
                style="background-image: url('https://wallpapers.com/images/hd/random-background-3840-x-2095-iucanxbl8i4j2uva.jpg')">
                <div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-40">
                    <div>
                        <h2 class="text-2xl font-bold text-white sm:text-3xl">
                            Dirección de Estadística
                        </h2>
                        <p class="max-w-xl mt-3 text-gray-300">
                            Bienvenido al Repositorio Digital de Información Estadística
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
                <div class="flex-1">
                    <div class="text-center">
                        <div class="flex justify-center mx-auto">
                            <img src="https://logodix.com/logo/1305364.png" alt="" class="w-auto h-7 sm:h-20">
                        </div>
                        <p class="mt-3 text-gray-500">Inicia sesión con tu perfil se acceso</p>
                    </div>
                    <div class="mt-8">
                        <form action="">
                            <div>
                                <label for="username"
                                    class="relative block rounded-md border border-gray-200 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                                    <input type="text" id="username"
                                        class="peer border-none px-4 py-3 bg-transparent placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0"
                                        placeholder="username" name="username" />
                                    <span
                                        class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                                        <div class="relative flex items-center">
                                            <svg x mlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="size-4 absolute left-0 ml-3 text-gray-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                            </svg>
                                            <label class="block w-full pl-10 text-gray-700 mr-3">Usuario</label>
                                        </div>
                                    </span>
                                </label>
                            </div>
                            <div class="mt-6">
                                <label for="password"
                                    class="relative block rounded-md border border-gray-200 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                                    <input type="password" id="password"
                                        class="peer border-none px-4 py-3 bg-transparent placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0"
                                        placeholder="password" />
                                    <span
                                        class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                                        <div class="relative flex items-center">
                                            <!-- Ícono SVG -->
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="size-4 absolute left-0 ml-3 text-gray-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                            </svg>
                                            <label class="block w-full pl-10 text-gray-700 mr-3">
                                                Contraseña
                                            </label>
                                        </div>

                                    </span>
                                </label>
                            </div>
                            <div class="mt-6">
                                {{-- <input type="submit" value="Entrar" class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-300
                                    transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:bg-blue-400
                                    focus:ring focus:ring-blue-300 focus:ring-opacity-50">   --}}
                                <a href='{{ url('tailwind') }}'
                                    class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-300
                                transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:bg-blue-400
                                focus:ring focus:ring-blue-300 focus:ring-opacity-50">Iniciar
                                    Sesión</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
