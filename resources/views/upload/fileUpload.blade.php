<x-dashboard-layout>
    <div class="pr-10 pl-10">
        <div class="flex px-4 my-6 justify-between">
            <h2 class="text-xl font-semibold text-gray-700">Carga Masiva de Archivos a Cuadros Estadísticos</h2>
        </div>


        <h2 class="text-lg font-semibold text-gray-500">Selecciona el año de publicación de los archivos</h2>
        <fieldset class="flex flex-wrap gap-3 mb-5">
            <legend class="sr-only">Color</legend>
            @php
                $year = date('Y') - 2;
                for ($i = $year; $i >= 2010; $i--) {
                    echo '
                        <div>
                            <label for="year' .
                        $i .
                        '" class="flex cursor-pointer items-center justify-center rounded-md border border-gray-100 bg-white px-3 py-2 text-gray-900 hover:border-gray-200 has-[:checked]:border-blue-500 has-[:checked]:bg-blue-500 has-[:checked]:text-white">
                                <input type="radio" name="yearPost" value="' .
                        $i .
                        '" id="year' .
                        $i .
                        '" class="sr-only" />

                                <p class="text-sm font-medium">' .
                        $i .
                        '</p>
                            </label>
                        </div>
                    ';
                }
            @endphp
        </fieldset>

        <label for="file_upload">
            <div
                class="cursor-pointer mb-5 p-12 flex justify-center bg-white border border-dashed border-gray-300 rounded-xl">
                <div class="text-center">
                    <span class="inline-flex justify-center items-center size-16 bg-gray-100 text-gray-800 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class=" shrink-0 size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
                        </svg>
                    </span>

                    <div class="mt-4 flex flex-wrap justify-center text-sm leading-6 text-gray-600">
                        <span class="pe-1 font-medium text-gray-800">
                            Haz click para agregar los archivos a
                        </span>
                        <span
                            class="bg-white font-semibold text-blue-600 hover:text-blue-700 rounded-lg decoration-2 hover:underline focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-600 focus-within:ring-offset-2">
                            subir
                        </span>
                    </div>
                    <p class="mt-2 text-xs text-gray-400">
                        Solo archivos .xlsx, .xls, .cvs hasta de 5 MB
                    </p>
                </div>

                <input type="file" name="file_upload" id="file_upload" multiple hidden>
            </div>
        </label>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="p-3 bg-white border border-solid border-gray-300 rounded-xl">
                <div class="mb-1 flex justify-between items-center">
                    <div class="flex items-center gap-x-3">
                        <span
                            class="size-10 flex justify-center items-center border border-gray-200 text-gray-500 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                        </span>
                        <div>
                            <p class="text-sm font-medium text-gray-800">
                                <span class=" truncate inline-block max-w-[300px] align-bottom">6.1.10.xlsx</span>
                            </p>
                            <p class="text-xs text-red-500">El archivo excede el limite del tamaño</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-x-2">
                        <button type="button"
                            class="text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="shrink-0 w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                        </button>

                        <button type="button"
                            class="text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class=" shrink-0 w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="flex items-center gap-x-3 whitespace-nowrap">
                    <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden" role="progressbar"
                        aria-valuetext="0" aria-valuemin="0" aria-valuemax="100">
                        <div
                            class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition-all duration-500">
                        </div>
                    </div>
                    <div class="w-10 text-end">
                        <span class="text-sm text-gray-800">
                            <span>100</span>%
                        </span>
                    </div>
                </div>
            </div>

            <div class="p-3 bg-white border border-solid border-gray-300 rounded-xl">
                <div class="mb-1 flex justify-between items-center">
                    <div class="flex items-center gap-x-3">
                        <span
                            class="size-10 flex justify-center items-center border border-gray-200 text-gray-500 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                        </span>
                        <div>
                            <p class="flex text-sm font-medium text-gray-800 justify-between">
                                <span class=" truncate inline-block max-w-[300px] align-bottom">6.1.10.xlsx</span>
                                <span class=" truncate inline-block max-w-[300px] align-bottom">6.1 Gobierno</span>
                                <span class=" truncate inline-block max-w-[300px] align-bottom">Año: 2019</span>
                            </p>
                            <p class="text-xs text-justify text-gray-500">
                                Plazas autorizadas, registradas en el sistema de nómina de la Dirección General de
                                Desarrollo y Administración de Personal</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-x-2">
                        <button type="button"
                            class="text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="shrink-0 w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                        </button>

                        <button type="button"
                            class="text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class=" shrink-0 w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="flex items-center gap-x-3 whitespace-nowrap">
                    <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden" role="progressbar"
                        aria-valuetext="0" aria-valuemin="0" aria-valuemax="100">
                        <div
                            class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition-all duration-500">
                        </div>
                    </div>
                    <div class="w-10 text-end">
                        <span class="text-sm text-gray-800">
                            <span>100</span>%
                        </span>
                    </div>
                </div>
            </div>

            <div class="p-3 bg-white border border-solid border-gray-300 rounded-xl">
                <div class="mb-1 flex justify-between items-center">
                    <div class="flex items-center gap-x-3">
                        <span
                            class="size-10 flex justify-center items-center border border-gray-200 text-gray-500 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                        </span>
                        <div>
                            <p class="text-sm font-medium text-gray-800">
                                <span class=" truncate inline-block max-w-[300px] align-bottom">6.1.10.xlsx</span>
                            </p>
                            <p class="text-xs text-gray-500">50 KB</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-x-2">
                        <button type="button"
                            class="text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="shrink-0 w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                        </button>

                        <button type="button"
                            class="text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class=" shrink-0 w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="flex items-center gap-x-3 whitespace-nowrap">
                    <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden" role="progressbar"
                        aria-valuetext="0" aria-valuemin="0" aria-valuemax="100">
                        <div
                            class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition-all duration-500">
                        </div>
                    </div>
                    <div class="w-10 text-end">
                        <span class="text-sm text-gray-800">
                            <span>100</span>%
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
