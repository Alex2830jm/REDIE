<section class="cointainer mx-auto">
    <div class="sm:flex sm:items-center sm:justify-between py-3" x-data="{}">
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
            <button x-on:click.prevent="$dispatch('open-modal', 'formCE')"
                class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg sm:w-auto gap-x-2 hover:bg-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                </svg>
                <span>Agregar Cuadro</span>
            </button>

            <x-modal name="formCE" maxWidth="3xl" focusable>
                <div class="bg-white px-4 pb-5 pt-5 sm:p-6 sm:pb-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-base font-semibold text-gray-900">
                            Registrar nuevo cuadro estadístico para el tema:
                        </h3>
                        <svg x-on:click="$dispatch('close')" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            class="h-6 w-6 cursor-pointer hover:text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </div>
                    <div class="sm:flex sm:items-center">
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                            <div class="mt-2">
                                <form action="{{ route('saveCE') }}" @submit.prevent="if(validateFormCE()) $el.submit()"
                                    method="POST">
                                    @csrf
                                    <div class="flex flex-wrap -mx-3 mb-6">
                                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label for="numero_ce">Número del cuadro estadístico</label>
                                            <input type="text" id="numero_ce" value=" {{ $numeroCE }} "
                                                name="numero_ce" readonly
                                                class="w-full px-4 py-3 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                        </div>
                                        <div class="w-full md:w-1/2 px-3">
                                            <label for="tema_id">Asignado al tema: {{ $ce->nombreGrupo }} </label>
                                            <input type="text" id="tema_id" value="{{ $ce->nombreGrupo }}" readonly
                                                class="w-full px-4 py-3 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                            <input type="hidden" name="tema_id" value="{{ $ce->id }}">
                                        </div>
                                    </div>

                                    <div class="flex flex-wrap -mx-3 mb-6">
                                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label for="dependencia">Selecciona la dependencia informativa</label>
                                            <select name="dependencia" id="dependencia" @change="searchContent(event)"
                                                class="block w-full px-4 py-3 text-sm text-gray-700 bg-gray-50 border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                                <option value="">-- Selección --</option>
                                                @foreach ($dependencias as $dependencia)
                                                    <option value="{{ $dependencia->id }}">
                                                        {{ $dependencia->nombreUnidad }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label for="areas">Selecciona el área informativa</label>
                                            <select name="area_id" id="areas" x-model="selectDependencia"
                                                @change="validateSelectDependencia = true"
                                                class="block w-full px-4 py-3 text-sm text-gray-700 bg-gray-50 border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                                <option value="">-- Debes de seleccionar una dependencia --
                                                </option>
                                            </select>
                                            <p x-show="!validateSelectDependencia" class="text-red-500 font-semibold">
                                                Debes de seleccionar una dependencia de información</p>
                                        </div>
                                    </div>

                                    <label for="nombreCuadroEstadistico" class="text-sm text-gray-700">
                                        Nombre del Cuadro Estadístico
                                    </label>
                                    <input type="text" name="nombreCuadroEstadistico" x-model="nombreCE"
                                        @input="validateNombreCE = true" id="nombreCuadroEstadistico"
                                        class="w-full px-4 py-3 text-sm text-gray-700 bg-gray-50 border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                    <p x-show="!validateNombreCE" class="text-red-500 font-semibold">Debes de colocar un
                                        nombre al cuadro estadístico</p>

                                    <label for="gradoDesagregacion" class="text-sm text-gray-700">
                                        Grado de desagregación
                                    </label>
                                    {{-- <input type="text" name="gradoDesagregacion" id="gradoDesagregacion"
                                        class="w-full px-4 py-3 text-sm text-gray-700 bg-gray-50 border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40"> --}}
                                    <select name="gradoDesagregacion" x-model="selectGD" id="gradoDesagregacion"
                                        @change="validateSelectGD = true"
                                        class="block w-full px-4 py-3 text-sm text-gray-700 bg-gray-50 border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                        <option value="Municipal"> Municipal </option>
                                        <option value="Estatal"> Estatal </option>
                                        <option value="Federal"> Federal </option>
                                    </select>
                                    <p x-show="!validateSelectGD" class="text-red-500 font-semibold">Debes de
                                        seleccionar el grado de desagregación</p>

                                    <label for="frecuenciaAct" class="text-sm text-gray-700">
                                        Frecuencia de actualización
                                    </label>
                                    <select name="frecuenciaAct" id="frecuenciaAct" x-model="selectFA"
                                        @change="validateSelectFA = true"
                                        class="block w-full px-4 py-3 text-sm text-gray-700 bg-gray-50 border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                        <option value="Diaria">Diaria</option>
                                        <option value="Semanal">Semanal</option>
                                        <option value="Mensual">Mensual</option>
                                        <option value="Bimestral">Bimestral</option>
                                        <option value="Cuatrimestral">Cuatrimestral</option>
                                        <option value="Semestral">Semestral</option>
                                        <option value="Anual">Anual</option>
                                    </select>
                                    <p x-show="!validateSelectFA" class="text-red-500 font-semibold">Debes de
                                        seleccionar la frecuencia de actualización</p>

                                    <div class="mt-4 sm:flex sm:items-center sm:-mx-2">
                                        <button type="button" x-on:click="$dispatch('close')"
                                            class="w-full px-4 py-2 text-sm font-medium tracking-wide text-gray-700 capitalize transition-colors duration-300 transform border border-gray-200 rounded-md sm:w-1/2 sm:mx-2 hover:bg-gray-100 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-40">
                                            Cancel
                                        </button>

                                        <button type="submit"
                                            class="w-full px-4 py-2 mt-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-md sm:mt-0 sm:w-1/2 sm:mx-2 hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                            Registrar C.E
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </x-modal>
        </div>
    </div>

    <div class="overflow-auto rounded-lg shadow">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-sm text-gray-200 uppercase bg-cherry-800">
                <tr>
                    <th scope="col" colspan="6" class="text-center py-2">
                        Tema: {{ $ce->nombreGrupo }}
                        <hr class=" border border-gold-400">
                    </th>
                </tr>
                <tr>
                    <th scope="col" class="w-20 p-3 text-sm font-semibold tracking-wide">#</th>
                    <th scope="col" class="p-3 text-sm font-semibold tracking-wide">Nombre</th>
                    <th scope="col" class="w-24 p-3 text-sm font-semibold tracking-wide">Grado</th>
                    <th scope="col" class="w-24 p-3 text-sm font-semibold tracking-wide">Frecuencia</th>
                    <th scope="col" class="p-3 text-sm font-semibold tracking-wide">Fuente</th>
                    <th scope="col" class="w-32 p-3 text-sm font-semibold tracking-wide">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @foreach ($ce->cuadros_estadisticos as $ce)
                    <tr class="hover:bg-gray-50">
                        <td class="p-3 text-sm text-gray-500"> {{ $ce->numeroCE }} </td>
                        <td class="p-3 text-sm text-gray-800 font-semibold">
                            {{ $ce->nombreCuadroEstadistico }}
                        </td>
                        <td class="p-3 text-sm text-gray-500"> {{ $ce->gradoDesagregacion }} </td>
                        <td class="p-3 text-sm text-gray-500"> {{ $ce->frecuenciaAct }} </td>
                        <td class="p-3 text-sm text-gray-500">
                            <div class="text-sm">
                                <div class=" text-gray-800 font-semibold">
                                    {{ $ce->dependencia->nombreArea }}
                                </div>
                                <div class="text-gray-500">
                                    {{ $ce->dependencia->unidad->nombreUnidad }}
                                </div>
                            </div>
                        </td>
                        <td class="p-3 text-sm text-gray-500">
                            <div class="group relative">
                                <button id="ce_{{ $ce->id }}"
                                    x-on:click.prevent="$dispatch('open-modal', 'historialArchivos')"
                                    class="text-gray-500 px-4 py-2 rounded-lg focus:outline-none focus:ring">
                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor"class="w-5 h-5 transform transition-transform duration-300">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr id="{{ $ce->id }}" x-show="openHistorialArchivos === '{{ $ce->id }}'"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform -translate-y-4"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-4">
                        <td colspan="6" class="p-4 bg-gray-50">
                            <div id="archivosCE_{{ $ce->id }}" class="flex justify-center items-center"></div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    <x-modal name="historialArchivos" maxWidth="full" focusable>
        <div class="bg-white w-full px-4 pb-5 pt-5 sm:p-6 sm:pb-4">
            <div class="flex items-center justify-between">
                <h3 class="text-base font-semibold text-gray-900">
                    Archivos del Cuadro Estadístico
                </h3>
                <svg x-on:click="$dispatch('close')" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    class="h-6 w-6 cursor-pointer hover:text-red-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </div>
            <div class="w-full max-w-full p-4 border border-gray-200 rounded-lg shadow sm:p-8 mt-3 mb-3">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-base font-bold leading-none text-gray-900">Historial de Archivos del Cuadro
                        Estadistico
                    </h5>
                    <a x-on:click.prevent="$dispatch('open-modal', 'agregarArchivo')"
                        class="flex cursor-pointer items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-blue-500 transition-colors duration-200 hover:underline rounded-lg sm:w-auto gap-x-2">
                        <span>Agregar Cuadro</span>
                    </a>
                </div>
                <div class="flow-root">
                    <table class="w-full text-sm text-gray-500 items-center text-center">
                        <thead class="bg-cherry-800 text-gray-200 uppercase">
                            <tr>
                                <th scope="col" class="p-3 font-semibold tracking-wide">Año del rchivo</th>
                                <th scope="col" class="p-3 font-semibold tracking-wide">Ver archivo</th>
                                <th scope="col" class="p-3 font-semibold tracking-wide">Descargar archivo</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-400">
                            <tr class="hover:bg-gray-100">
                                <td class="p-3 text-gray-500">
                                    <button
                                        class="flex items-center px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-sky-600 border border-transparent rounded-full active:bg-sky-600 hover:bg-sky-700"
                                        aria-label="Year">
                                        2023
                                    </button>
                                </td>

                                <td class="p-3 text-gray-500">
                                    <button
                                        class="flex items-center px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-sky-600 border border-transparent rounded-full active:bg-sky-600 hover:bg-sky-700"
                                        aria-label="View">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>

                                    </button>
                                </td>

                                <td class="p-3 text-gray-500">
                                    <button
                                        class="flex items-center px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-full active:bg-green-600 hover:bg-green-700"
                                        aria-label="Download">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 9.75v6.75m0 0-3-3m3 3 3-3m-8.25 6a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-modal>
    <x-modal name="agregarArchivo" maxWidth="2xl" focusable>
        <div class="bg-white w-full px-4 pb-5 pt-5 sm:p-6 sm:pb-4">
            <div class="flex items-center justify-between">
                <h3 class="text-base font-semibold text-gray-900">
                    Agregar archivo al cuadro estadístico
                </h3>
                <svg x-on:click="$dispatch('close')" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    class="h-6 w-6 cursor-pointer hover:text-red-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </div>
            <div class="sm:items-center">
                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
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
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
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
                        Archivo Año 2023
                    </h3>
                    <div class="mt-2">
                        {{-- Google - Se sube a drive y se comparte a la web --}}
                        {{-- <iframe
                        src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQopmbcwRTzAUUDh8K0SeuO9iAm7YMHHUWXLW4uisc4wFGFYJ-wc3uZXjU-MbQR9w/pubhtml?widget=true&amp;headers=false"
                        frameborder="0" width="100%" height="500"></iframe> --}}

                        {{-- Microsoft - El archivo tiene que estar en el servidor --}}
                        {{-- <iframe
                            src="https://view.officeapps.live.com/op/embed.aspx?src=https://redieigecem.edomex.gob.mx/assets/archivos/HV-211.xlsx"
                            width="100%" height="650px" frameborder="0"></iframe> --}}
                    </div>
                </div>
            </div>
        </div>
    </x-modal>
</section>
