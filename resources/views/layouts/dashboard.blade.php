<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>REDIE - @yield('tittle')</title>
</head>

<body>
    <div class="flex flex-col flex-1 w-full bg-gray-100">
        {{-- Header --}}
        <div class="md:container md:mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-12 p-4 items-center">
                <div class="col-span-1 md:col-span-3">
                    <img src="{{ asset('assets/img/logo_h1.png') }}" alt="Logo" class="w-full md:w-auto">
                </div>
                <div class="col-span-1 md:col-span-9">
                    <h2 class="text-pink-900 text-2xl md:text-4xl font-sans leading-tight">
                        Instituto de Información e Investigación Geográfica, Estadística y Catastral del Estado de
                        México IGECEM
                    </h2>
                </div>
            </div>  
        </div>
        {{-- Navbar --}}
        <nav x-data="{ isOpen: false }" class="bg-pink-800 shadow">
            <div class="px-6 py-4 container mx-auto text-white md:flex md:justify-between md:items-center">
                <div class="flex items-center text-white justify-between">
                    <a href="#" class="text-xl font-lg">
                        Dirección de Estadística
                    </a>

                    <!-- Mobile menu button -->
                    <div class="flex lg:hidden">
                        <button x-cloak @click="isOpen = !isOpen" type="button"
                            class="hover:text-gray-600  focus:outline-none focus:text-gray-600"
                            aria-label="toggle menu">
                            <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                            </svg>

                            <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']"
                    class="absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-pink-800 border border-amber-400 sm:border-0 md:mt-0 md:p-0 md:top-0 md:relative md:bg-transparent md:w-auto md:opacity-100 md:translate-x-0 md:flex md:items-center">
                    <div class="flex flex-col md:flex-row md:mx-6">
                        <a class="my-2 transition-colors duration-300 transform hover:text-zinc-400 md:mx-4 md:my-0"
                            href="#">
                            <div class="relative flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-7 left-0 ml-3">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>
                                <span class="block w-full pl-3 mr-3">Inicio</span>
                            </div>
                        </a>
                        <a class="my-2 transition-colors duration-300 transform hover:text-gray-500 md:mx-4 md:my-0"
                            href="#">
                            <div class="relative flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-7 left-0 ml-3">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z" />
                                </svg>
                                <span class="block w-full pl-3 mr-3">Herramientas</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    {{-- Contenido --}}
    <main class="h-full overflow-y-auto bg-gray-100">
        <div class="md:container md:mx-auto">
            @yield('content')
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
