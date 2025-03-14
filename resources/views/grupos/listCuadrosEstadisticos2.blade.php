<div x-data="{
    collapseFiles: false,
    cuadroEstadistico: '',
    openForm: false,
    loadingCuadrosEstadisticos: true,
    loadingFiles: true,
    cuadrosEstadisticos: {
        data: [],
        current_page: 1,
        last_page: 1,
        next_page_url: null,
        prev_page_url: null
    },

    init() {
        this.loadCuadrosEstadisticos();
        console.log(this.cuadrosEstadisticos);
    },

    async loadCuadrosEstadisticos(page = 1) {
        this.loadingCuadrosEstadisticos = true;
        const response = await fetch(`{{ url('cuadros-estadisticos') }}/{{ $tema->id }}?page=${page}`);
        const data = await response.json();
        this.loadingCuadrosEstadisticos = false;
        this.cuadrosEstadisticos = data.cuadrosEstadisticos;

    },

    nextPage() {
        if (this.cuadrosEstadisticos.next_page_url) {
            this.cuadrosEstadisticos.current_page++;
            this.loadCuadrosEstadisticos(this.cuadrosEstadisticos.current_page);
        }
    },

    prevPage() {
        if (this.cuadrosEstadisticos.prev_page_url) {
            this.cuadrosEstadisticos.current_page--;
            this.loadCuadrosEstadisticos(this.cuadrosEstadisticos.currentPage);
        }
    },

    async contentCE(event) {
        var idCE = event.currentTarget.id;
        var [tipo, id] = idCE.split('_');
        var valCE = event.currentTarget.value;

        this.collapseFiles = false;
        switch (tipo) {
            case 'fileHistory':
                this.loadingFiles = true;
                this.cuadroEstadistico = valCE;
                $('#listFiles').empty();
                $.get(`{{ route('archivosByCuadrosEstadisticos') }}?ce_id=${id}`, (ce) => {
                    $('#idCE').val(ce.id);
                    $('#nombreArchivo').val(ce.nombreCuadroEstadistico);
                    $('#numeroCE').val(ce.numeroCE);
                    ce.archivos.forEach((archivo) => {
                        $('#listFiles').append(`<x-card-file idFile='${archivo.id}' yearPost='${archivo.yearPost}' nameFile='${archivo.nombreArchivo}' />`);
                    });
                });
                this.loadingFiles = false;
                $dispatch('open-modal', 'fileHistory');
                break;
            case 'viewFile':
                console.log(valCE);
                $('#fileDetails').empty();
                $.get(`{{ route('verArchivo') }}?idFile=${valCE}`, (archivo) => {
                    console.log(`<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=http://redieigecem.edomex.gob.mx/${archivo.urlFile}' width='100%' height='600px'></iframe>`);
                    $('#fileDetails').append(`
                                                                <iframe src='https://view.officeapps.live.com/op/embed.aspx?src=http://redieigecem.edomex.gob.mx/${archivo.urlFile}' width='100%' height='600px'></iframe>
                                                            `);
                });
                $dispatch('open-modal', 'verArchivo');
                break;
        }
    },
}">
    <section>
        <div class="sm:flex sm:items-center sm:justify-end">
            @can('inicio.AgregarCuadro')
            <button x-on:click.prevent="$dispatch('open-modal', 'formCE')"
                class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg sm:w-auto gap-x-2 hover:bg-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                </svg>
                <span>Agregar Cuadro</span>
            </button>
            @endcan
        </div>

        <div class="flex flex-col mt-6">
            <div class="-mx-4 -my-2 overflow-x-auto">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <x-tableLoader show="loadingCuadrosEstadisticos" />

                    <div x-show="!loadingCuadrosEstadisticos"
                        class="overflow-hidden border border-gray-200 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-cherry-800 text-gray-200 divide-y divide-gray-200">
                                <tr>
                                    <th scope="col" colspan="6"
                                        class="px-4 py-4 text-lg font-semibold text-center">
                                        {{ $tema->nombreGrupo }}
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" class="px-4 text-sm py-4 font-semibold text-left"> Num.
                                        Cuadro
                                    </th>
                                    <th scope="col" class="px-4 text-sm py-4 font-semibold text-left"> Nombre del
                                        cuadro
                                        estadístico </th>
                                    <th scope="col" class="px-4 text-sm py-4 font-semibold text-left"> Grado de
                                        desagregación </th>
                                    <th scope="col" class="px-4 text-sm py-4 font-semibold text-left"> Frecuencia
                                        de
                                        actualización </th>
                                    <th scope="col" class="px-4 text-sm py-4 font-semibold text-left"> Fuente
                                    </th>
                                    <th scope="col" class="px-4 text-sm py-4 font-semibold text-left"> Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <template x-for="ce in cuadrosEstadisticos.data" :key="ce.id">
                                    <tr>
                                        <td
                                            class="px-4 py-4 text-sm font-medium whitespace-nowrap lg:whitespace-normal">
                                            <span x-text="ce.numeroCE"></span>
                                        </td>
                                        <td
                                            class="px-4 py-4 text-sm font-medium whitespace-nowrap lg:whitespace-normal">
                                            <h4 class="text-gray-900 font-semibold" x-text="ce.nombreCuadroEstadistico">
                                            </h4>
                                        </td>
                                        <td class="px-4 py-4 text-sm whitespace-nowrap lg:whitespace-normal"
                                            x-text="ce.gradoDesagregacion">

                                        </td>
                                        <td class="px-4 py-4 text-sm whitespace-nowrap lg:whitespace-normal"
                                            x-text="ce.frecuenciaAct">

                                        </td>
                                        <td class="px-4 py-4 text-sm whitespace-nowrap lg:whitespace-normal">
                                            <h4 class="text-gray-900 font-semibold" x-text="ce.informante.nombreDI"></h4>
                                            <p class="" x-text="ce.informante.dependencia.nombreDI"></p>
                                        </td>
                                        <td class="px-4 py-4 text-sm whitespace-nowrap lg:whitespace-normal">
                                            @can('inicio.Archivos')
                                            <button :id="'fileHistory_' + ce.id" :value="ce.nombreCuadroEstadistico"
                                                @click="contentCE(event)"
                                                class="inline-flex items-center px-4 py-2 bg-blue-500 transition ease-in-out delay-75 hover:bg-blue-600 text-white text-sm font-medium rounded-md hover:-translate-y-1 hover:scale-110">
                                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" class="h-5 w-5 mr-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                                                </svg>
                                                Archivos
                                            </button>
                                            @endcan
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="mt-6 sm:flex sm:items-center sm:justify-between">
            <div class="text-sm text-gray-500">
                Página <span class="font-medium text-gray-700" x-text="cuadrosEstadisticos.current_page"></span>
                de <span class="font-medium text-gray-700" x-text="cuadrosEstadisticos.last_page"> </span>
            </div>
            <div class="flex items-center mt-4 gap-x-4 sm:mt-0">
                <button type="button" @click="prevPage"
                    class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>

                    <span>Anterior</span>
                </button>

                <button type="button" @click="nextPage"
                    class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100">
                    <span>Siguiente</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </button>
            </div>
        </div>
    </section>

    <x-modal name="formCE" maxWidth="7xl" focusable>
        <div class="header my-3 h-12 px-10 flex items-center justify-between">
            <h1 class="font-medium text-2xl">
                Registrar nuevo cuadro estadístico para el tema: {{ $tema->nombreGrupo }}
            </h1>

            <svg x-on:click="$dispatch('close')" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor"
                class="h-6 w-6 cursor-pointer text-2xl font-medium hover:text-red-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </div>
        <div class="m-5 px-4 py-2 rounded-lg border border-gray-300">
            <form action="{{ route('saveCE') }}" method="POST">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label for="numero_ce" class="text-sm font-semibold text-gray-700">Número del cuadro
                            estadístico</label>
                        <input type="text" id="numero_ce" name="numero_ce"
                            value="{{ $tema->numGrupo }}.{{ $cuadrosEstadisticos->count() + 1 }}"
                            class="w-full px-4 py-3 text-sm text-gray-700 bg-gray-100 border border-gray-400 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40"
                            readonly>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label for="tema_id" class="text-sm font-semibold text-gray-700">Asignado al
                            tema:</label>
                        <input type="text" id="tema_id" value="{{ $tema->nombreGrupo }}" readonly
                            class="w-full px-4 py-3 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                        <input type="hidden" name="tema_id" value="{{ $tema->id }}">
                    </div>
                </div>

                <x-autocomplete-dependencias :collection="$dependencias" typecollection="1" />

                <label for="nombreCuadroEstadistico" class="text-sm font-semibold text-gray-700">
                    Nombre del Cuadro Estadístico
                </label>
                <input type="text" name="nombreCuadroEstadistico" id="nombreCuadroEstadistico"
                    class="w-full px-4 py-3 text-sm text-gray-700 bg-gray-50 border border-gray-400 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3">
                        <label for="gradoDesagregacion" class="text-sm font-semibold text-gray-700">
                            Grado de desagregación
                        </label>
                        <select name="gradoDesagregacion" id="gradoDesagregacion"
                            class="block w-full px-4 py-3 text-sm text-gray-700 bg-gray-50 border border-gray-400 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                            <option value="Municipal"> Municipal </option>
                            <option value="Estatal"> Estatal </option>
                            <option value="Federal"> Federal </option>
                        </select>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label for="frecuenciaAct" class="text-sm font-semibold text-gray-700">
                            Frecuencia de actualización
                        </label>
                        <select name="frecuenciaAct" id="frecuenciaAct"
                            class="block w-full px-4 py-3 text-sm text-gray-700 bg-gray-50 border border-gray-400 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
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


                <div class="mt-4 sm:flex sm:items-center sm:-mx-2">
                    <button type="reset" x-on:click="$dispatch('close')"
                        class="w-full px-4 py-2 text-sm font-medium tracking-wide text-gray-700 capitalize transition-colors duration-300 transform border border-gray-200 rounded-md sm:w-1/2 sm:mx-2 hover:bg-gray-100 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-40">
                        Cancel
                    </button>

                    <button type="submit"
                        class="w-full px-4 py-2 mt-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-green-500 rounded-md sm:mt-0 sm:w-1/2 sm:mx-2 hover:bg-green-600 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                        Registrar Cuadro Estadístico
                    </button>
                </div>
            </form>
        </div>
    </x-modal>

    <x-modal name="fileHistory" maxWidth="7xl">
        <div class="header my-3 h-12 px-10 flex items-center justify-between">
            <h1 class="font-medium text-2xl">
                Historial de Archivos del Cuadro Estadístico
            </h1>

            <svg x-on:click="$dispatch('close')" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="h-6 w-6 cursor-pointer text-2xl font-medium hover:text-red-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </div>
        <div class="flex flex-col mx-3 mt-6 lg:flex-row gap-4">
            <!-- Formulario -->
            <div x-show="openForm" x-transition:enter="transition-all duration-500"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition-all duration-500" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="bg-white shadow-lg rounded-sm border border-gray-200 p-4 min-w-0 w-full lg:w-1/3">
                <form action="{{ route('guardarArchivos') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="idCE" id="idCE" value="">

                    <label for="nombreArchivo" class="block text-sm font-medium text-gray-700">Cuadro
                        Estadístico</label>
                    <input type="text" name="nombreArchivo" id="nombreArchivo" x-model="cuadroEstadistico"
                        class="w-full px-4 py-2 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40"
                        readonly>

                    <label for="numeroCE" class="block text-sm font-medium text-gray-700 mt-2">Número del Cuadro
                        Estadístico</label>
                    <input type="text" name="numeroCE" id="numeroCE" value=""
                        class="w-full px-4 py-2 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40"
                        readonly>

                    <label for="yearPost" class="block text-sm font-medium text-gray-700 mt-2">Año del
                        Archivo</label>
                    <select name="yearPost" id="yearPost"
                        class="block w-full px-4 py-2 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                        @php
                            $year = date('Y') - 2;
                            for ($i = $year; $i >= 2010; $i--) {
                                echo '<option value=' . $i . '>' . $i . '</option>';
                            }
                        @endphp
                    </select>

                    <x-input-upload />

                    <div class="flex justify-end mt-4">
                        @can('inicio.SubirArchivo')
                            <button
                                class="inline-flex items-center px-4 py-2 bg-green-500 text-white text-sm font-medium rounded-md hover:bg-green-600 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-5 w-5 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m6.75 12-3-3m0 0-3 3m3-3v6m-1.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                </svg>
                                Subir Archivo
                            </button>
                        @endcan
                    </div>
                </form>
            </div>

            <!-- Contenedor de Archivos -->

            <div :class="openForm ? 'lg:w-2/3' : 'w-full'"
                class="m-1 bg-white shadow-lg text-lg rounded-sm border border-gray-200 p-4">
                @can('inicio.AgregarArchivo')
                <button @click="openForm = !openForm"
                    class="inline-flex items-center px-4 py-2 bg-green-500 text-white text-sm font-medium rounded-md hover:bg-green-600 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-5 w-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m6.75 12-3-3m0 0-3 3m3-3v6m-1.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                    Agregar Archivo al Historial
                </button>
                @endcan

                <div x-show="!loadingFiles" id="listFiles" class="mt-4">
                    <!-- Aquí se listarán los archivos -->
                    <button @click="$dispatch('open-modal', 'verArchivo')"
                        class="inline-flex items-center px-4 py-2 bg-green-500 text-white text-sm font-medium rounded-md hover:bg-green-600 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="h-5 w-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m6.75 12-3-3m0 0-3 3m3-3v6m-1.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                        Agregar Archivo al Historial
                    </button>
                </div>
            </div>
        </div>

    </x-modal>


    <x-modal name="verArchivo" maxWidth="7xl">
        <div class="bg-white px-4 pb-5 pt-5 sm:p-6 sm:pb-4">
            <div class="sm:items-center">
                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                    <div class="mt-2" id="fileDetails">
                    </div>
                </div>
            </div>
        </div>
    </x-modal>
</div>
