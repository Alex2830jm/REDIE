


<section class="cointainer mx-auto">
    <div class="sm:flex sm:items-center sm:justify-between py-3">
        <div class="flex items-center mt-4 gap-x-3">
            <span class="absolute">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </span>

            <input type="text" placeholder="Search"
                class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
        </div>


        <div class="flex items-center mt-4 gap-x-3">
            <button
                class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg sm:w-auto gap-x-2 hover:bg-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                </svg>
                <span>Agregar Cuadro</span>
            </button>
        </div>
    </div>

    <div class="overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-200 uppercase bg-cherry-800">
                <tr>
                    <th scope="col" class="px-6 py-6">#</th>
                    <th scope="col" class="px-6 py-6">Nombre</th>
                    <th scope="col" class="px-6 py-6">Grado</th>
                    <th scope="col" class="px-6 py-6">Frecuencia</th>
                    <th scope="col" class="px-6 py-6">Fuente</th>
                    <th scope="col" class="px-6 py-6">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4"> 2.2.1 </td>
                    <td class="px-6 py-4 font-normal text-gray-900">
                        Nacimientos registrados por municipio según mes de registro y sexo
                    </td>
                    <td class="px-6 py-4">Municipal</td>
                    <td class="px-6 py-4">Mensual</td>
                    <td class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                        <div class="text-sm">
                            <div class="font-medium text-gray-700">
                                Secretaría de Justicia y Derechos Humanos. Dirección General del Registro Civil.
                            </div>
                            <div class="text-gray-400">
                                Secretaría de Justicia y Derechos Humanos
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="group relative">
                            <button id="ce_1" @click="searchContent($event)">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="w-6 hover:scale-125 duration-200 hover:stroke-blue-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr id="historialArchivos" x-show="openArchivos" 
                    x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 transform -translate-y-4"
                    x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-500"
                    x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4"
                    class="mt-4 overflow-hidden bg-gray-100 p-4 rounded-md shadow-inner">
                    
                </tr>
            </tbody>
        </table>
    </div>
</section>
