<div x-data="{
    collapseFiles: false,
    cuadroEstadistico: '',

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
                        $('#listFiles').append(`
                            <x-card-file idFile='${archivo.id}' yearPost='${archivo.yearPost}' nameFile='${archivo.nombreArchivo}' />
                        `);
                    });
                })
                $dispatch('open-modal', 'fileHistory');
                break;

            case 'selectDependencia':
                var [tipoDependencia, idDependencia] = valCE.split('_');
                if (tipoDependencia === 'estatal') {
                    $.get(`{{ route('unidadesCE') }}?dependencia_id=${idDependencia}`, (unidades) => {
                        $('#unidades').empty();
                        $.each(unidades, (index, value) => {
                            $('#unidades').append('<option value=' + value.id + '>' + value.unidad + '</option>').prop('disabled', false);
                        });
                    });
                } else if (tipoDependencia === 'federal') {
                    $('#unidades').empty();
                    $('#unidades').append('<option>Dependencia Federal</option>').prop('disabled', true);
                }
                break;
            case 'viewFile':
                $('#file').empty();
                $('#file').append(`<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=https://redieigecem.edomex.gob.mx/storage/1-1_2023.xlsx' width='100%' height='650px' frameborder='0'></iframe>`)
                //$('#file').append(`<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=https://redieigecem.edomex.gob.mx{{ urlencode(asset('/storage/Hechos Vitales/1.1/1.1_2023.xlsx')) }}' width='800' height='600'></iframe>`)
                $dispatch('open-modal', 'verArchivo');

                break;
        }
    }

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
                                    <th scope="col" colspan="6" class="px-4 py-4 text-lg font-semibold text-center">
                                        {{ $tema->nombreGrupo }}
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" class="px-4 text-sm py-4 font-semibold text-left"> Num. Cuadro
                                    </th>
                                    <th scope="col" class="px-4 text-sm py-4 font-semibold text-left"> Nombre del
                                        cuadro
                                        estadístico </th>
                                    <th scope="col" class="px-4 text-sm py-4 font-semibold text-left"> Grado de
                                        desagregación </th>
                                    <th scope="col" class="px-4 text-sm py-4 font-semibold text-left"> Frecuencia de
                                        actualización </th>
                                    <th scope="col" class="px-4 text-sm py-4 font-semibold text-left"> Fuente </th>
                                    <th scope="col" class="px-4 text-sm py-4 font-semibold text-left"> Acciones </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($cuadrosEstadisticos as $ce)
                                    <tr>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap lg:whitespace-normal">
                                            {{ $ce->numeroCE }}
                                        </td>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap lg:whitespace-normal">
                                            <h4 class="text-gray-700 font-semibold"> {{ $ce->nombreCuadroEstadistico }}
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
                                                value="{{ $ce->nombreCuadroEstadistico }}" @click="contentCE(event)"
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                        <form action="{{ route('saveCE') }}" method="POST">
                            @csrf
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label for="numero_ce">Número del cuadro estadístico</label>
                                    <input type="text" id="numero_ce" name="numero_ce"
                                        class="w-full px-4 py-3 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                </div>
                                <div class="w-full md:w-1/2 px-3">
                                    <label for="tema_id">Asignado al tema:</label>
                                    <input type="text" id="tema_id" value="{{ $tema->nombreGrupo }}" readonly
                                        class="w-full px-4 py-3 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                    <input type="hidden" name="tema_id" value="{{ $tema->id }}">
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label for="dependencia">Selecciona la dependencia informativa</label>
                                    <select name="dependencia" id="selectDependencia" @change="contentCE(event)"
                                        class="block w-full px-4 py-3 text-sm text-gray-700 bg-gray-50 border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                        <option value="">-- Selección --</option>
                                        @foreach ($dependencias as $dependencia)
                                            <option
                                                value="{{ $dependencia->tipoDI === 'Estatal' ? 'estatal_' . $dependencia->id : 'federal_' . $dependencia->id }}">
                                                {{ $dependencia->nombreDI }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label for="unidades">Selecciona el área informativa</label>
                                    <select name="unidad_id" id="unidades"
                                        class="block w-full px-4 py-3 text-sm text-gray-700 bg-gray-50 border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                        <option value="">-- Debes de seleccionar una dependencia --
                                        </option>
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
                            <select name="gradoDesagregacion" id="gradoDesagregacion"
                                class="block w-full px-4 py-3 text-sm text-gray-700 bg-gray-50 border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                <option value="Municipal"> Municipal </option>
                                <option value="Estatal"> Estatal </option>
                                <option value="Federal"> Federal </option>
                            </select>

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
        <div class="flex flex-col mx-3 mt-6 lg:flex-row">
            <div class="w-full lg:w-1/3 m-1 ">
                <div class="bg-white shadow-lg rounded-sm border border-gray-200">
                    <form action="{{ route('guardarArchivos') }}" method="post" enctype="multipart/form-data"
                        class="p-4">
                        @csrf
                        <input type="hidden" name="idCE" id="idCE" value="">

                        <label for="nombreArchivo">Cuadro Estadístico</label>
                        <input type="text" name="nombreArchivo" id="nombreArchivo" x-model="cuadroEstadistico"
                            class="w-full px-4 py-3 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40"
                            readonly>

                        <label for="numeroCE">Número del Cuadro Estadístico</label>
                        <input type="text" name="numeroCE" id="numeroCE" value=""
                            class="w-full px-4 py-3 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40"
                            readonly>

                        <label for="yearPost">Año del Archivo</label>
                        <select name="yearPost" id="yearPost"
                            class="block w-full px-4 py-3 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                            @php
                                $year = date('Y') - 2;
                                for ($i = $year; $i >= 2010; $i--) {
                                    echo '<option value=' . $i . '>' . $i . '</option>';
                                }
                            @endphp
                        </select>

                        <x-input-upload />

                        <div class="flex justify-end text-end mt-3">
                            <button
                                class="inline-flex items-center px-3 py-2 bg-green-500 text-white text-sm font-medium rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-6 w-6 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m6.75 12-3-3m0 0-3 3m3-3v6m-1.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                </svg>
                                Subir Archivo
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="w-full lg:w-2/3 m-1 bg-white shadow-lg text-lg rounded-sm border border-gray-200"
                id="listFiles">
            </div>
        </div>
    </x-modal>


    <x-modal name="verArchivo" maxWidth="7xl">
        <div class="bg-white px-4 pb-5 pt-5 sm:p-6 sm:pb-4">
            <div class="sm:items-center">
                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                    <div class="mt-2" id="file">
                        <iframe
                            src="https://view.officeapps.live.com/op/embed.aspx?src=https://redieigecem.edomex.gob.mx{{ urlencode(asset('/storage/Hechos Vitales/1.1/1.1_2023.xlsx')) }}"
                            width=800" height="600"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </x-modal>
</div>
