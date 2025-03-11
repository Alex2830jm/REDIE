<x-dashboard-layout>
    <div x-data="{
        collapseFiles: false,
        cuadroEstadistico: '',
        openForm: false,
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
            const response = await fetch(`{{ url('cuadros-estadisticos') }}/9?page=${page}`);
            const data = await response.json();
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
                    this.cuadroEstadistico = valCE;
                    $('#listFiles').empty();
                    $.get(`{{ route('archivosByCuadrosEstadisticos') }}?ce_id=${id}`, (ce) => {
                        $('#idCE').val(ce.id);
                        $('#nombreArchivo').val(ce.nombreCuadroEstadistico);
                        $('#numeroCE').val(ce.numeroCE);
                        ce.archivos.forEach((archivo) => {
                            $('#listFiles').append(`<x-card-file idFile='${archivo.id}' yearPost='${archivo.yearPost}' nameFile='${archivo.nombreArchivo}' />`);
                        });
                    })
                    $dispatch('open-modal', 'fileHistory');
                    break;
                case 'viewFile':
                    console.log(valCE);
                    $('#fileDetails').empty();
                    $.get(`{{ route('verArchivo') }}?idFile=${valCE}`, (archivo) => {
                        console.log(`<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=http://redieigecem.edomex.gob.mx/${archivo.urlFile}' width='100%' height='600px'></iframe>`);
                        $('#fileDetails').append(`<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=http://redieigecem.edomex.gob.mx/${archivo.urlFile}' width='100%' height='600px'></iframe>`);
                    });
                    $dispatch('open-modal', 'verArchivo');
                    break;
            }
        },
    }">
        <section>
            <div class="sm:flex sm:items-center sm:justify-end">
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

            <div class="flex flex-col mt-6">
                <div class="-mx-4 -my-2 overflow-x-auto">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border border-gray-200 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-cherry-800 text-gray-200 divide-y divide-gray-200">
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
                                    {{-- @foreach ($cuadrosEstadisticos as $ce)
                                        <tr>
                                            <td
                                                class="px-4 py-4 text-sm font-medium whitespace-nowrap lg:whitespace-normal">
                                                {{ $ce->numeroCE }}
                                            </td>
                                            <td
                                                class="px-4 py-4 text-sm font-medium whitespace-nowrap lg:whitespace-normal">
                                                <h4 class="text-gray-700 font-semibold">
                                                    {{ $ce->nombreCuadroEstadistico }}
                                                </h4>
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap lg:whitespace-normal">
                                                {{ $ce->gradoDesagregacion }}
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap lg:whitespace-normal">
                                                {{ $ce->frecuenciaAct }}
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap lg:whitespace-normal">
                                                <h4 class="text-gray-700 font-semibold"> {{ $ce->informante->nombreDI }}
                                                </h4>
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap lg:whitespace-normal">
                                                <button id="fileHistory_{{ $ce->id }}"
                                                    value="{{ $ce->nombreCuadroEstadistico }}"
                                                    @click="contentCE(event)"
                                                    class="inline-flex items-center px-4 py-2 bg-blue-500 transition ease-in-out delay-75 hover:bg-blue-600 text-white text-sm font-medium rounded-md hover:-translate-y-1 hover:scale-110">
                                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" class="h-5 w-5 mr-2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                                                    </svg>
                                                    Archivos
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                    <template x-for="ce in cuadrosEstadisticos.data" :key="ce.id">
                                        <tr>
                                            <td
                                                class="px-4 py-4 text-sm font-medium whitespace-nowrap lg:whitespace-normal">
                                                <span x-text="ce.numeroCE"></span>
                                            </td>
                                            <td
                                                class="px-4 py-4 text-sm font-medium whitespace-nowrap lg:whitespace-normal">
                                                <h4 class="text-gray-700 font-semibold"
                                                    x-text="ce.nombreCuadroEstadistico"></h4>
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap lg:whitespace-normal"
                                                x-text="ce.gradoDesagregacion">

                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap lg:whitespace-normal"
                                                x-text="ce.frecuenciaAct">

                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap lg:whitespace-normal">
                                                <h4 class="text-gray-700 font-semibold" x-text="ce.informante.nombreDI">
                                                </h4>
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap lg:whitespace-normal">
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
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                        </svg>

                        <span>Anterior</span>
                    </button>

                    <button type="button" @click="nextPage"
                        class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100">
                        <span>Siguiente</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </button>
                </div>
            </div>
        </section>
    </div>
</x-dashboard-layout>
