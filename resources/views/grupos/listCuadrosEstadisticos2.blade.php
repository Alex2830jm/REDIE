<section class="cointainer mx-auto">
    <div class="sm:flex sm:items-center sm:justify-between py-3" x-data="{ modalNewCE: false }">
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
            {{-- <button @click="modalNewCE = true" --}}
            <button x-on:click.prevent="$dispatch('open-modal', 'formCE')"
                class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg sm:w-auto gap-x-2 hover:bg-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                </svg>
                <span>Agregar Cuadro</span>
            </button>
        </div>

        <x-modal name="formCE" maxWidth="3xl" focusable>
            <div class="bg-white px-4 pb-5 pt-5 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-center">
                    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                        <h3 class="text-base font-semibold text-gray-900">
                            Registrar nuevo cuadro estadístico
                        </h3>
                        <div class="mt-2">
                            <form action="{{ route('saveCE') }}" method="POST">
                                @csrf
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label for="numero_ce">Número del cuadro estadístico</label>
                                        <input type="text" id="numero_ce" value=" {{ $numeroCE }} "
                                            name="numero_ce" readonly
                                            class="w-full px-4 py-3 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                    </div>
                                    <div class="w-full md:w-1/2 px-3">
                                        <label for="tema_id">Asignado al tema</label>
                                        <input type="text" id="tema_id" value="{{ $tema->nombreGrupo }}" readonly
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
                                                <option value="{{$dependencia->id}}"> {{ $dependencia->nombreUnidad }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label for="areas">Selecciona el área informativa</label>
                                        <select name="area_id" id="areas"
                                            class="block w-full px-4 py-3 text-sm text-gray-700 bg-gray-50 border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                            <option value="">-- Debes de seleccionar una dependencia --</option>
                                        </select>
                                    </div>
                                </div>

                                <label for="nombreCuadroEstadistico" class="text-sm text-gray-700">
                                    Nombre del Cuadro Estadístico
                                </label>
                                <input type="text" name="nombreCuadroEstadistico" id="nombreCuadroEstadistico"
                                    class="w-full px-4 py-3 text-sm text-gray-700 bg-gray-50 border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">

                                <label for="gradoDesagregacion" class="text-sm text-gray-700">
                                    Grado de desagregación
                                </label>
                                <input type="text" name="gradoDesagregacion" id="gradoDesagregacion"
                                    class="w-full px-4 py-3 text-sm text-gray-700 bg-gray-50 border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">

                                <label for="frecuenciaAct" class="text-sm text-gray-700">
                                    Frecuencia de actualización
                                </label>
                                <select name="frecuenciaAct" id="frecuenciaAct"
                                    class="block w-full px-4 py-3 text-sm text-gray-700 bg-gray-50 border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                    <option value="Diaria">Diaria</option>
                                    <option value="Semanal">Semanal</option>
                                    <option value="Mensual">Mensual</option>
                                    <option value="Bimestral">Bimestral</option>
                                    <option value="Cuatrimestral">Cuatrimestral</option>
                                    <option value="Semestral">Semestral</option>
                                    <option value="Anual">Anual</option>
                                </select>
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
                @foreach ($cuadros_estadisticos as $ce)
                    <tr class="hover:bg-gray-50">
                        <td class="p-3 text-sm text-gray-500"> {{ $ce->numeroCE }} </td>
                        <td class="p-3 text-sm text-gray-800 font-semibold whitespace-nowrap">
                            {{ $ce->nombreCuadroEstadistico }}
                        </td>
                        <td class="p-3 text-sm text-gray-500"> {{ $ce->gradoDesagregacion }} </td>
                        <td class="p-3 text-sm text-gray-500"> {{ $ce->frecuenciaAct }} </td>
                        <td class="p-3 text-sm text-gray-500 whitespace-nowrap">
                            <div class="text-sm">
                                <div class=" text-gray-800 font-semibold">
                                    {{ $ce->dependencia->nombreArea}}
                                </div>
                                <div class="text-gray-500">
                                    {{ $ce->dependencia->unidad->nombreUnidad }}
                                </div>
                            </div>
                        </td>
                        <td class="p-3 text-sm text-gray-500">
                            <div class="group relative">
                                <button id="ce_{{ $ce->id }}" @click="searchContent($event)"
                                    class="text-gray-500 px-4 py-2 rounded-lg focus:outline-none focus:ring">
                                    <svg x-bind:class="openHistorialArchivos === {{ $ce->id }} ? 'rotate-180' : ''"
                                        class="w-5 h-5 transform transition-transform duration-300" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
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

</section>
