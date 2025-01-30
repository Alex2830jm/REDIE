<div class="w-full max-w-lg p-4 border border-gray-200 rounded-lg shadow sm:p-8 mt-3 mb-3">
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-base font-bold leading-none text-gray-900">Historial de Archivos del Cuadro Estadistico</h5>
        <a x-on:click.prevent="$dispatch('open-modal', 'agregarArchivo')"
            class="flex cursor-pointer items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-blue-500 transition-colors duration-200 hover:underline rounded-lg sm:w-auto gap-x-2">
            <span>Agregar Cuadro</span>
        </a>
    </div>
    <div class="flow-root">
        <ul role="list" class="divide-y divide-gray-200">
            <li class="">
                <div class="flex items-center justify-between">
                    <div class="inline-flex items-center text-base font-semibold text-gray-900">
                        Año
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900">
                        Ver
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900">
                        Descargar
                    </div>
                </div>
            </li>
            <li class="py-3 sm:py-4">
                <div class="flex items-center justify-between">
                    <div
                        class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-cherry-800 rounded-full">
                        <span class="font-medium text-gray-200">2023</span>
                    </div>

                    <div class="inline-flex justify-center items-center text-base font-semibold text-gray-900">
                        <button
                            class="flex items-center px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-sky-600 border border-transparent rounded-full active:bg-sky-600 hover:bg-sky-700 focus:outline-none focus:shadow-outline-purple"
                            x-on:click="$dispatch('open-modal', 'verArchivo')">
                            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                    </div>

                    <div class="inline-flex justify-center items-center text-base font-semibold text-gray-900">
                        <button
                            class="flex items-center px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-full active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-purple"
                            aria-label="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9.75v6.75m0 0-3-3m3 3 3-3m-8.25 6a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<x-modal name="agregarArchivo" maxWidth="2xl" focusable>
    <div class="bg-white px-4 pb-5 pt-5">
        <div class="sm:items-center">
            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                <h3 class="text-base font-semibold text-gray-900">
                    Subir Archivos del Cuadro Estadístico
                </h3>
                <div class="mt-2">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="yearPost">Año del Archivo</label>
                                <select name="yearPost" id="yearPost"
                                    class="block w-full px-4 py-3 text-sm text-gray-700 bg-gray-50 border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                    <?php
                                        $year = date('Y');
                                        for($i = $year; $i >= 2010; $i--) {
                                            ?>
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label for="dependencia">Dependencía Informativa</label>
                                <select name="dependencia" id="dependencia"
                                    class="block w-full px-4 py-3 text-sm text-gray-700 bg-gray-50 border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                    <option value="Diaria">Diaria</option>
                                    <option value="Semanal">Semanal</option>
                                    <option value="Mensual">Mensual</option>
                                    <option value="Bimestral">Bimestral</option>
                                    <option value="Cuatrimestral">Cuatrimestral</option>
                                    <option value="Semestral">Semestral</option>
                                    <option value="Anual">Anual</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file"
                                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Haz click</span> para agreagar el archivo</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">XLSX, XLS o CVS</p>
                                </div>
                                <input id="dropzone-file" type="file" class="hidden" />
                            </label>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-modal>
<x-modal name="verArchivo" maxWidth="7xl" focusable>
    <div class="bg-white px-4 pb-5 pt-5 sm:p-6 sm:pb-4">
        <div class="sm:items-center">
            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                <h3 class="text-base font-semibold text-gray-900">
                    Archivo Año 2024
                </h3>
                <div class="mt-2">
                    {{-- Google - Se sube a drive y se comparte a la web --}}
                    {{-- <iframe
                        src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQopmbcwRTzAUUDh8K0SeuO9iAm7YMHHUWXLW4uisc4wFGFYJ-wc3uZXjU-MbQR9w/pubhtml?widget=true&amp;headers=false"
                        frameborder="0" width="100%" height="500"></iframe> --}}

                    {{-- Microsoft - El archivo tiene que estar en el servidor --}}
                    <iframe
                        src="https://view.officeapps.live.com/op/embed.aspx?src=https://redieigecem.edomex.gob.mx/assets/archivos/HV-211.xlsx"
                        width="100%" height="650px" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</x-modal>
