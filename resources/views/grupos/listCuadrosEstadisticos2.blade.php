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

        <x-modal name="formCE" focusable>
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
                                        <label for="numero_ce">Numero del cuadro estadístico:</label>
                                        <input type="text" id="numero_ce" value=" {{ $numeroCE }} " name="numero_ce" readonly
                                            class="w-full px-4 py-3 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                    </div>
                                    <div class="w-full md:w-1/2 px-3">
                                        <label for="tema_id">Asignado al Tema:</label>
                                        <input type="text" id="tema_id" value="{{ $tema->nombreGrupo }}" readonly
                                            class="w-full px-4 py-3 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                        <input type="hidden" name="tema_id" value="{{ $tema->id }}">
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

    <div class="overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-200 uppercase bg-cherry-800">
                <tr>
                    <th scope="col" colspan="6" class="text-center py-2">
                        Tema: {{ $tema->nombreGrupo }}
                        <hr class=" border border-gold-400">
                    </th>
                </tr>
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
                @foreach ($cuadros_estadisticos as $ce)
                    <tr class="hover:bg-gray-50">
                        {{-- <td class="px-6 py-4"> {{ $tema->principal->id }}.{{ $tema->id }}.{{ $ce->id }} </td> --}}
                        <td class="px-6 py-6 font-normal text-gray-700"> {{ $ce->numeroCE }} </td>
                        <td class="px-6 py-4 font-normal text-gray-900">
                            {{ $ce->nombreCuadroEstadistico }}
                        </td>
                        <td class="px-6 py-4"> {{ $ce->gradoDesagregacion }} </td>
                        <td class="px-6 py-4"> {{ $ce->frecuenciaAct }} </td>
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
                                <button x-on:click.prevent="$dispatch('open-modal', 'archivosCE')">
                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        class="w-6 hover:scale-125 duration-200 hover:stroke-blue-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <x-modal name="archivosCE" focusable>
            <div class="bg-white w-full px-4 pb-5 pt-5 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-center">
                    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                        <h3 class="text-base font-semibold text-gray-900">
                            Historial de archivos
                        </h3>
                        <div class="mt-2">
                            <div class="grid grid-cols-3 gap-2 sm:gap-4">
                                <div>
                                    Año
                                </div>
                                <div>
                                    Ver
                                </div>
                                <div>
                                    Descargar
                                </div>

                                <div>
                                    2023
                                </div>
                                <div>
                                    <span
                                        class="whitespace-nowrap rounded-full border border-sky-500 px-2.5 py-0.5 text-sm text-sky-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </span>
                                </div>
                                <div>
                                    <span
                                        class="whitespace-nowrap rounded-full border border-green-500 px-2.5 py-0.5 text-sm text-green-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <button type="button" x-on:click="$dispatch('close')"
                    class="mt-3 inline-flex w-full justify-center rounded-m bg-red-500 px-3 py-2 text-sm font-semibold text-gray-100 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-red-600 sm:mt-0 sm:w-auto">Cerrar</button>
            </div>
        </x-modal>
    </div>
</section>
