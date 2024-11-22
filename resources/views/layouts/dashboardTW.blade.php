<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title> REDIE - Inicio</title>
</head>

<body>
    <div class="md:container md:mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-12 p-4 gap-4 items-center border-b-4 border-pink-900">
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
        <div class="grid grid-cols-1 md:grid-cols-12 p-4 gap-4 items-center">
            <div class="md:col-span-3">
                <h4 class="text-pink-900 text-xl font-light">
                    Dirección de Estadística
                </h4>
            </div>
            <div class="hidden sm:block col-span-1 md:col-span-4">
                <h4 class="text-yellow-600/75 text-2xl font-light">
                    Secretaría de Finanzas
                </h4>
            </div>
            <div class="col-span-1 md:col-span-5 flex items-center justify-between">
                <div class="flex items-center lg:hidden justify-between w-full">
                    <label class="font-light text-ms">Menú</label>
                    <div x-data="{ isOpen: false }" class="relative inline-block">
                        <button @click="isOpen = !isOpen" class="relative z-10 block p-2 text-gray-700 bg-white border border-transparent rounded focus:border-blue-500 focus:ring-opacity-40 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>                              
                        </button>
                        <div x-show="isOpen"
                            @click.away="isOpen = false"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="opacity-0 scale-90"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-100"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-90"
                            class="absolute right-0 z-20 w-48 py-2 mt-2 origin-top-right bg-white rounded-md shadow-xl"
                        >
                            <a href="#" class="flex items-center px-3 py-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform hover:bg-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>                                  
                                <span class="mx-1">Inicio</span>
                            </a>
                            <a href="#" class="flex items-center px-3 py-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform hover:bg-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                                </svg>
                                <span class="mx-1">Direcctorio de Dependencias</span>
                            </a>
                            <a href="#" class="flex items-center px-3 py-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform hover:bg-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z" />
                                </svg>                                  
                                <span class="mx-1">Herramientas</span>
                            </a>
                        </div>
                    </div>
                </div>
                  
                <div class="hidden lg:flex overflow-x-auto overflow-y-hidden justify-end whitespace-nowrap dark:border-gray-700">
                    <div class="flex overflow-x-auto overflow-y-hidden justify-end whitespace-nowrap dark:border-gray-700">
                        <a href="#" class="m-1 inline-flex items-center h-10 px-2 py-2 -mb-px text-center active text-gray-600 bg-transparent border-b-2 hover:text-gray-900 hover:border-gray-900 active:text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                            <span class="mx-1 text-sm sm:text-base"> Inicio </span>
                        </a>
                        <a href="#" class="m-1 inline-flex items-center h-10 px-2 py-2 -mb-px text-center active text-gray-600 bg-transparent border-b-2 hover:text-gray-900 hover:border-gray-900 active:text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                            </svg>                              
                            <span class="mx-1 text-sm sm:text-base"> Directorio de Dependencias </span>
                        </a>
                        <a href="{{ url('usuarios') }}" class="m-1 inline-flex items-center h-10 px-2 py-2 -mb-px text-center active text-gray-600 bg-transparent border-b-2 hover:text-gray-900 hover:border-gray-900 active:text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z" />
                            </svg>                                  
                            <span class="mx-1 text-sm sm:text-base">Herramientas</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="md:container md:mx-auto">
        <div class="relative w-full">
            <div class="wrapper">
                <div class="wrapper-content">
                    <!-- Contenido que quieras poner dentro del wrapper -->
                </div>
            </div>
        </div>
    </div>
    <div class="md:container md:mx-auto">
        <div class="mt-2 bg-pink-900 text-center text-white text-xl font-bold">GRUPOS DE INFORMACIÓN</div>
        <div class="grid grid-cols-1 md:grid-cols-12 p-4 gap-4 items-center">
            <div class="col-span-1 md:col-span-3">
                <div class="flex items-center p-4 mb-4 text-sm text-orange-800 border border-orange-300 rounded-lg bg-orange-50"
                    role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="flex-shrink-0 size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>
                    <div>
                        <span class="font-medium">Demografía y Sociedad</span>
                    </div>
                </div>
            </div>
            <div class="col-span-1 md:col-span-3">
                <div class="flex items-center p-4 mb-4 text-sm text-teal-800 border border-teal-300 rounded-lg bg-teal-50"
                    role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                      </svg>                      

                    <div>
                        <span class="font-medium">Economía y Sectores Productivos</span>
                    </div>
                </div>
            </div>
            <div class="col-span-1 md:col-span-3">
                <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50"
                    role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                      </svg>
                      
                    <div>
                        <span class="font-medium">Geografía y Medio Ambiente</span>
                    </div>
                </div>
            </div>
            <div class="col-span-1 md:col-span-3">
                <div class="flex items-center p-4 mb-4 text-sm text-amber-800 border border-amber-300 rounded-lg bg-amber-50"
                    role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                      </svg>
                    <div>
                        <span class="font-medium">Gobierno, Seguridad y Justicia</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
