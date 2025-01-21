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
                                            <label for="tema_id">Asignado al tema:</label>
                                            <input type="text" id="tema_id" value="{{ $tema->nombreGrupo }}"
                                                readonly
                                                class="w-full px-4 py-3 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                            <input type="hidden" name="tema_id" value="{{ $tema->id }}">
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

    <div class="relative w-full h-95">
        <div class="overflow-auto rounded-lg shadow">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-sm text-gray-200 uppercase bg-cherry-800">
                    <tr>
                        <th scope="col" colspan="6" class="text-center py-2">
                            Tema: {{ $tema->nombreGrupo }}
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
                    @foreach ($tema->cuadros_estadisticos as $ce)
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


                                <button id="ce_{{ $ce->id }}" value="{{ $ce->id }}"
                                    @click="searchContent($event)"
                                    class="text-gray-500 transition-color duration-200 hover:text-{{ $ce->tema->padre->padre->colorGrupo }}-400 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div x-show="openDrawer" x-transition:enter="transition-transform transform ease-out duration-300"
            x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition-transform transform ease-in duration-300"
            x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
            class="absolute top-0 left-0 h-full w-96 bg-gray-100 p-4 shadow-lg border border-cherry-800 overflow-y-auto"
            x-cloak tabindex="-1">

            <h5 id="drawer-label" class="inline-flex items-center mb-4 text-base font-semibold text-gray-500">
                Historial de archivos
            </h5>

            <button @click="openDrawer = false"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 right-2.5 flex items-center justify-center">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Cerrar</span>
            </button>

            <table class="w-full text-sm text-gray-500 items-center text-center">
                <thead>
                    <tr>
                        <th id="ceInfo"></th>
                    </tr>
                    <tr>
                        <th scope="col" colspan="2">
                            <button id="archivo" @click="searchContent($event)" {{-- x-on:click.prevent="$dispatch('open-modal', 'agregarArchivo')" --}}
                                class="rounded-lg relative w-full h-10 cursor-pointer flex items-center border border-green-500 bg-green-500 group hover:bg-green-500 active:bg-green-500 active:border-green-500">
                                <span
                                    class="text-gray-200 font-semibold ml-8 transform group-hover:translate-x-20 hover:text-transparent transition-all duration-300">Agregar
                                    Archivo</span>
                                <span
                                    class="absolute right-0 h-full w-6 rounded-lg bg-green-500 flex items-center justify-center transform group-hover:translate-x-0 group-hover:w-full transition-all duration-300">
                                    <svg class="svg w-8 text-white"fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                    </svg>
                                </span>
                            </button>
                        </th>
                    <tr></tr>
                </thead>
                <tbody class="divide-y divide-gray-400" id="filesCE">
                </tbody>
            </table>
        </div>
    </div>

    <x-modal name="agregarArchivo" maxWidth="2xl" focusable>
        <div class="bg-white shadow px-4 pb-5 pt-5 sm:p-6 sm:pb-4">
            <div class="heading text-center font-bold text-2xl m-3 text-gray-800">Agregar Archivo al Historial
            </div>
            <div
                class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
                <form action="{{ route('guardarArchivos') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="ce_id" id="ce_id" value="" />

                    <label for="nombreArchivo">Nombre del Cuadro Estadístico</label>
                    <input type="text" name="nombreArchivo" id="nombreArchivo" value=""
                        class="w-full px-4 py-3 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40"
                        readonly>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="ce">Número de Cuadro Estadístico:</label>
                            <input type="text" name="ce" id="ce" value=""
                                class="w-full px-4 py-3 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40"
                                readonly>
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="yearPost">Año del Archivo</label>
                            <input type="text" name="yearPost" id="yearPost" value="2023"
                                class="w-full px-4 py-3 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40"
                                readonly>
                            {{-- <select name="yearPost" id="yearPost"
                                class="block w-full px-4 py-3 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                @php
                                    $year = date('Y');
                                    for ($i = $year; $i >= 2023; $i--) {
                                        echo '<option value=' . i . '>' . $i . '</option>';
                                    }
                                @endphp
                            </select> --}}
                        </div>
                    </div>

                    <x-input-upload />
                    <!-- Buttons -->
                    <div class="buttons flex justify-end mt-5">
                        <button type="submit"
                            class="btn border border-green-500 rounded-lg p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-green-500">
                            Agregar Archivo</button>
                    </div>
                </form>
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
                    <div class="mt-2" id="viewFile">
                    </div>
                </div>
            </div>
        </div>
    </x-modal>
</section>
