<x-dashboard-layout>
    <div x-data="{
        step: 1,
    }" class="px-4 py-6 mb-8 bg-white rounded-lg shadow-md space-y-6">
        <div class="flex justify-between mt-2">
            <h1 class="px-4 py-2 text-2xl font-semibold text-gray-700 flex items-center">
                <a href="{{ route('roles.index') }}" class="mr-5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>
                </a>
                Registrar Dependencia Informativa
            </h1>
        </div>
        <div x-cloak>
            <div class="flex flex-col mt-6">
                <div class="-mx-4 -my-2 overflow-x-auto">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div x-show.transition="step != 'complete'">
                            <div class="uppercase tracking-wide text-xs font-bold text-gray-500 mb-1 leading-tight">
                                <div x-text="`Paso: ${step} de 4`"></div>
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                    <div class="flex-1">
                                        <div x-show="step === 1" class="text-lg font-bold text-gray-700 leading-tight">
                                            Datos de la Dependencia Informativa
                                        </div>

                                        <div x-show="step === 2" class="text-lg font-bold text-gray-700 leading-tight">
                                            Datos de las Unidades Informativas
                                        </div>

                                        <div x-show="step === 3" class="text-lg font-bold text-gray-700 leading-tight">
                                            Datos de los informantes de la Dependencia Informativa
                                        </div>

                                        <div x-show="step === 4" class="text-lg font-bold text-gray-700 leading-tight">
                                            Datos de los informantes de cada Unidad Informativa
                                        </div>
                                    </div>

                                    <div class="flex items-center md:w-64">
                                        <div class="w-full bg-white rounded-full mr-2">
                                            <div class="rounded-full bg-green-500 text-xs leading-none h-2 text-center text-white"
                                                :style="'width: ' + parseInt(step / 4 * 100) + '%'"></div>
                                        </div>
                                        <div class="text-xs w-10 text-gray-600" x-text="parseInt(step / 4 * 100) + '%'">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('dependencia.store') }}" method="POST" id="formulario_dependencias">
                            @csrf
                            <div x-show.transition.in="step === 1">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <div class="mt-2 md:col-span-2">
                                        <div class="flex flex-wrap md:flex-nowrap gap-5">
                                            <div class="w-full md:w-1/12">
                                                <label class="text-gray-700 font-semibold" for="numDI">Número</label>
                                                <input id="numDI" type="text" name="numDI"
                                                    class="block w-full px-4 py-3 text-gray-700 bg-gray-100 border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                                                <span class="text-red-800 text-base font-medium rounded-sm"
                                                    id="errorNumDI"></span>
                                            </div>
                                            <div class="w-full md:w-11/12">
                                                <label class="text-gray-700 font-semibold" for="nombreDI">Nombre de la
                                                    Dependencia</label>
                                                <input id="nombreDI" type="text" name="nombreDI"
                                                    class="block w-full px-4 py-3 text-gray-700 bg-gray-100 border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                                                <span class="text-red-800 text-base font-medium rounded-sm"
                                                    id="errorNombreDep"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-2 md:col-span-2">
                                        <label class="text-gray-700 font-semibold" for="domicilioDI">Domicilio de la
                                            Dependencia</label>
                                        <input id="domicilioDI" type="text" name="domicilioDI"
                                            class="block w-full px-4 py-3 text-gray-700 bg-gray-100 border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                                    </div>

                                    <div class="mt-2">
                                        <label class="text-gray-700 font-semibold" for="correoDI"> Correo Electronico de
                                            Atención de
                                            Atención </label>
                                        <input id="correoDI" type="text" name="correoDI"
                                            class="block w-full px-4 py-3 text-gray-700 bg-gray-100 border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                                    </div>

                                    <div class="mt-2">
                                        <label class="text-gray-700 font-semibold" for="numTelefonoDI"> No. Teléfono de
                                            Atención
                                        </label>
                                        <input id="numTelefonoDI" type="text" name="numTelefonoDI"
                                            class="block w-full px-4 py-3 text-gray-700 bg-gray-100 border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                                    </div>

                                    <div class="mt-2 md:col-span-2">
                                        <label class="text-gray-700 font-semibold" for="tipoDI">Selecciona el tipo de
                                            Dependencia</label>
                                        <div class=" grid grid-cols-2 gap-4">
                                            <div
                                                class="flex items-center bg-gray-100  ps-4 border border-gray-200 rounded-lg">
                                                <input type="radio" name="tipoDI" value="Estatal" id="tipo_Estatal"
                                                    class="w-4 h-4 text-blue-600 bg-gwhite border-gray-400 focus:ring-blue-500 focus:ring-2">
                                                <label for="tipo_Estatal"
                                                    class="w-full py-4 ms-2 text-sm font-medium text-gray-900">Estatal</label>
                                            </div>
                                            <div
                                                class="flex items-center bg-gray-100 ps-4 border border-gray-200 rounded-lg">
                                                <input type="radio" name="tipoDI" value="Federal" id="tipo_Federal"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                                <label for="tipo_Federal"
                                                    class="w-full py-4 ms-2 text-sm font-medium text-gray-900">Federal</label>
                                            </div>
                                        </div>
                                        <span class="text-red-800 text-base font-medium rounded-sm"
                                            id="errorTipoDependencia"> </span>
                                    </div>
                                </div>
                            </div>

                            <div x-show.transition.in="step === 2">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <div class="mt-2 sm:col-span-2">
                                        <label class="text-gray-700 font-semibold" for="nombreUnidad">Nombre de la
                                            Unidad
                                            Informativa</label>
                                        <input id="nombreUnidad" type="text"
                                            class="block w-full px-4 py-3 text-gray-700 bg-gray-100 border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                                    </div>

                                    <div class="mt-2 sm:col-span-2">
                                        <label class="text-gray-700 font-semibold" for="domiclioUnidad"> Domicilio de
                                            la Unidad
                                            Informativa </label>
                                        <input id="domiclioUnidad" type="text"
                                            class="w-full px-4 py-3 text-gray-700 bg-gray-100 border border-gray-200 rounded-md focus:border-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none">
                                    </div>

                                    <div class="mt-2">
                                        <label class="text-gray-700 font-semibold" for="correoUnidad"> Correo
                                            Electronico de Información
                                        </label>
                                        <input id="correoUnidad" type="email"
                                            class="w-full px-4 py-3 text-gray-700 bg-gray-100 border border-gray-200 rounded-md focus:border-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none">
                                    </div>

                                    <div class="mt-2">
                                        <label class="text-gray-700 font-semibold" for="telefonoUnidad"> Número
                                            Telefonico de Atención
                                        </label>
                                        <input id="telefonoUnidad" type="text"
                                            class="w-full px-4 py-3 text-gray-700 bg-gray-100 border border-gray-200 rounded-md focus:border-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none">
                                    </div>

                                    <div class="flex justify-end mt-2 md:col-span-2">
                                        <button type="button" id="addUnidad"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Agregar
                                            Unidad Informativa a Dependencia</button>
                                    </div>
                                </div>

                                <div class="flex flex-col mt-6">
                                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                            <div
                                                class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                                <table
                                                    class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                                    <thead class="bg-cherry-800 text-gray-200 uppercase">
                                                        <th scope="col" class="p-3 font-semibold tracking-wide">
                                                            Nombre de la
                                                            dirección
                                                        </th>
                                                        <th scope="col" class="p-3 font-semibold tracking-wide">
                                                            Domicilio</th>
                                                        <th scope="col" class="p-3 font-semibold tracking-wide">
                                                            Correo Electronico
                                                        </th>
                                                        <th scope="col" class="p-3 font-semibold tracking-wide">No.
                                                            Teléfono</th>
                                                    </thead>
                                                    <tbody class="divide-y divide-gray-400" id="unidadesList">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-between gap-4 p-4" x-show="step != 'complete">
                                <button type="button"
                                    class="rounded bg-red-500 text-white px-4 py-2 hover:bg-red-700 flex items-center gap-2"
                                    x-show="step > 1" @click="step--">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                                    </svg>
                                    <span x-text="`Regregar al paso ${step - 1}`"></span>
                                </button>

                                <button type="button"
                                    class="rounded bg-blue-500 text-white px-4 py-2 hover:bg-blue-700 flex items-center gap-2"
                                    x-show="step < 4" @click="step++">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061A1.125 1.125 0 0 1 3 16.811V8.69ZM12.75 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061a1.125 1.125 0 0 1-1.683-.977V8.69Z" />
                                    </svg>
                                    Siguiente
                                </button>

                                <button type="submit"
                                    class="rounded bg-green-500 text-white px-4 py-2 hover:bg-green-700 flex items-center gap-2"
                                    @click="step = 'complete'" x-show="steep === 4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                                    </svg>
                                    Guardar Información de Dependencia
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- <form action="{{ route('dependencia.store') }}" method="POST" id="formulario_dependencias">
            @csrf
            <h3>Datos de la Dependencia</h3>
            <section>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="mt-2 md:col-span-2">
                        <div class="flex flex-wrap">
                            <div class="w-full md:w-1/3">
                                <label class="text-gray-700 font-semibold" for="numDI">Número de
                                    Dependendencia</label>
                                <input id="numDI" type="text" name="numDI"
                                    class="block w-full px-4 py-3 text-gray-700 bg-gray-100 border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                                <span class="text-red-800 text-base font-medium rounded-sm" id="errorNombreDep"> </span>
                            </div>
                            <div class="w-full md:w-2/3">
                                <label class="text-gray-700 font-semibold" for="nombreDI">Nombre de la
                                    Dependencia</label>
                                <input id="nombreDI" type="text" name="nombreDI"
                                    class="block w-full px-4 py-3 text-gray-700 bg-gray-100 border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                                <span class="text-red-800 text-base font-medium rounded-sm" id="errorNombreDep"> </span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-2 md:col-span-2">
                        <label class="text-gray-700 font-semibold" for="domicilioDI">Domicilio de la
                            Dependencia</label>
                        <input id="domicilioDI" type="text" name="domicilioDI"
                            class="block w-full px-4 py-3 text-gray-700 bg-gray-100 border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                    </div>

                    <div class="mt-2">
                        <label class="text-gray-700 font-semibold" for="correoDI"> Correo Electronico de Atención de
                            Atención </label>
                        <input id="correoDI" type="text" name="correoDI"
                            class="block w-full px-4 py-3 text-gray-700 bg-gray-100 border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                    </div>

                    <div class="mt-2">
                        <label class="text-gray-700 font-semibold" for="numTelefonoDI"> No. Teléfono de Atención
                        </label>
                        <input id="numTelefonoDI" type="text" name="numTelefonoDI"
                            class="block w-full px-4 py-3 text-gray-700 bg-gray-100 border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                    </div>

                    <div class="mt-2 md:col-span-2">
                        <label class="text-gray-700 font-semibold" for="tipoDI">Selecciona el tipo de
                            Dependencia</label>
                        <div class=" grid grid-cols-2 gap-4">
                            <div class="flex items-center bg-gray-100  ps-4 border border-gray-200 rounded-lg">
                                <input type="radio" name="tipoDI" value="Estatal" id="tipo_Estatal"
                                    class="w-4 h-4 text-blue-600 bg-gwhite border-gray-400 focus:ring-blue-500 focus:ring-2">
                                <label for="tipo_Estatal"
                                    class="w-full py-4 ms-2 text-sm font-medium text-gray-900">Estatal</label>
                            </div>
                            <div class="flex items-center bg-gray-100 ps-4 border border-gray-200 rounded-lg">
                                <input type="radio" name="tipoDI" value="Federal" id="tipo_Federal"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                <label for="tipo_Federal"
                                    class="w-full py-4 ms-2 text-sm font-medium text-gray-900">Federal</label>
                            </div>
                        </div>
                        <span class="text-red-800 text-base font-medium rounded-sm" id="errorTipoDependencia"> </span>
                    </div>
                </div>
            </section>

            <h3>Datos de las Unidades Generadoras de Información</h3>
            <section>
                <span class="text-lg text-gray-600 font-semibold">Agregar Unidades Generadoras de Información</span>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="mt-2 sm:col-span-2">
                        <label class="text-gray-700 font-semibold" for="nombreUnidad">Nombre de la Unidad
                            Informativa</label>
                        <input id="nombreUnidad" type="text"
                            class="block w-full px-4 py-3 text-gray-700 bg-gray-100 border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                    </div>

                    <div class="mt-2 sm:col-span-2">
                        <label class="text-gray-700 font-semibold" for="domiclioUnidad"> Domicilio de la Unidad
                            Informativa </label>
                        <input id="domiclioUnidad" type="text"
                            class="w-full px-4 py-3 text-gray-700 bg-gray-100 border border-gray-200 rounded-md focus:border-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none">
                    </div>

                    <div class="mt-2">
                        <label class="text-gray-700 font-semibold" for="correoUnidad"> Correo Electronico de Información
                        </label>
                        <input id="correoUnidad" type="email"
                            class="w-full px-4 py-3 text-gray-700 bg-gray-100 border border-gray-200 rounded-md focus:border-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none">
                    </div>

                    <div class="mt-2">
                        <label class="text-gray-700 font-semibold" for="telefonoUnidad"> Número Telefonico de Atención
                        </label>
                        <input id="telefonoUnidad" type="text"
                            class="w-full px-4 py-3 text-gray-700 bg-gray-100 border border-gray-200 rounded-md focus:border-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none">
                    </div>

                    <div class="flex justify-end mt-2 md:col-span-2">
                        <button type="button" id="addUnidad"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Agregar
                            Unidad Informativa a Dependencia</button>
                    </div>
                </div>

                <div class="flex flex-col mt-6">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-cherry-800 text-gray-200 uppercase">
                                        <th scope="col" class="p-3 font-semibold tracking-wide">Nombre de la
                                            dirección
                                        </th>
                                        <th scope="col" class="p-3 font-semibold tracking-wide">Domicilio</th>
                                        <th scope="col" class="p-3 font-semibold tracking-wide">Correo Electronico
                                        </th>
                                        <th scope="col" class="p-3 font-semibold tracking-wide">No. Teléfono</th>
                                    </thead>
                                    <tbody class="divide-y divide-gray-400" id="unidadesList">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <h3>Datos de los Titulares de la Dependencia</h3>
            <section>
                <div id="personasInformantesDependencia">
                </div>
            </section>

            <h3>Datos de los Titulares de la Dependencia</h3>
            <section>
                <div id="personasInformantesUnidad">
                </div>
            </section>
        </form> --}}
    </div>

    {{-- <script>
        $(document).ready(function() {
            var contUnidad = 0;
            var unidades = [];
            var formularioDependencia = "";
            var formularioUnidad = "";

            var form = $("#formulario_dependencias");
            form.steps({
                headerTag: "h3",
                bodyTag: "section",
                transitionEffect: "slide",
                autoFocus: true,
                labels: {
                    previous: "Anterior",
                    next: "Siguiente",
                    finish: 'Guardar Datos',
                    current: ''
                },
                onStepChanged: function(event, currentIndex, newIndex) {

                    if (currentIndex === 2) {
                        infoPersonasDI();
                    }

                    if (currentIndex === 3) {
                        infoPersonasUGI();
                    }

                },
                onStepChanging: function(event, currentIndex, newIndex) {
                    //return true;
                    return form.valid();
                },
                onFinished: function(event, currentIndex) {
                    $("#formulario_dependencias").submit();
                }
            });

            form.validate({
                rules: {
                    nombreDependencia: {
                        required: true,
                    },
                    tipo_dependencia: {
                        required: true,
                    },
                    domicilioDependencia: {
                        required: true,
                    }
                },

                messages: {
                    nombreDependencia: {
                        required: "El <span class='font-bold'>nombre</span> de la dependencia es necesario"
                    },

                    tipo_dependencia: {
                        required: "Debes de seleccionar el tipo de dependencía"
                    },

                    domicilioDependencia: {
                        required: "El <span class='font-bold'>domicilio</span> de la dependencia es necesario"
                    }
                },

                errorPlacement: function(error, element) {
                    if (element.attr("name") === "tipoDI") {
                        error.appendTo("#errorTipoDependencia");
                    } else {
                        error.insertAfter(element);
                    }

                    if (element.attr("name") === "noombreDependencia") {
                        error.appendTo("#errorNombreDep");
                    }
                }
            });

            $("#addUnidad").click(function() {
                agregarUnidad();
            });

            function agregarUnidad() {
                //Datos de la Unidad
                var nombreUnidad = $("#nombreUnidad").val();
                var domicilioUnidad = $("#domiclioUnidad").val();
                var correoUnidad = $("#correoUnidad").val();
                var telefonoUnidad = $("#telefonoUnidad").val();

                if (nombreUnidad != "" || domicilioUnidad != "" || correoUnidad != "" || telefonoUnidad != "") {
                    var listUnidades = `
                        <tr class="hover:bg-gray-100">
                            <td class="p-3 text-gray-500">
                                <input type="hidden" name="nombreDI_U[]" value="${nombreUnidad}" />
                                ${nombreUnidad}
                            </td>
                            <td class="p-3 text-gray-500">
                                <input type="hidden" name="domicilioDI_U[]" value="${domicilioUnidad}" />
                                ${domicilioUnidad}
                            </td>
                            <td class="p-3 text-gray-500">
                                <input type="hidden" name="correoDI_U[]" value"${correoUnidad}" />
                                ${correoUnidad}
                            </td>
                            <td class="p-3 text-gray-500">
                                <input type="hidden" name="numTelefonoDI_U[]" value="${telefonoUnidad}" />
                                ${telefonoUnidad}
                            </td>
                        </tr>
                    `;
                    unidades.push(nombreUnidad);
                    contUnidad++;
                    $("#nombreUnidad").val("");
                    $("#unidadesList").append(listUnidades);
                } else {
                    console.log("no se registraron todos los datos")
                }
            }

            function formularioPersonas(tipoForm, area, nombreDI, numTelefonoDI) {
                return `<x-form-personas tipoForm='${tipoForm}' area='${area}' nombreDependencia='${nombreDI}' telefonoAtencion='${numTelefonoDI}' />`
            }

            function infoPersonasDI() {
                $("#personasInformantesDependencia").empty();

                const nombreDI = $("#nombreDI").val()
                const tipoDependencia = $("input[type='radio']:checked").val();
                const numTelefonoDI = $("#numTelefonoDI").val()

                var areasInformantes = tipoDependencia === "Federal" ? ["Titular"] : [
                    "Titular - " + nombreDI,
                    "Unidad de Información, Planeación, Programación y Evaluación",
                    "Enlace Responsable de la entrega de la información"
                ]

                areasInformantes.forEach((area) => {
                    //tipoForm: DI - Dependencia Informativa, UGI - Unidad Generadora de Información
                    $("#personasInformantesDependencia").append(formularioPersonas(tipoForm = 'DI', area,
                        nombreDI, numTelefonoDI));
                })
            }


            function infoPersonasUGI() {
                $("#personasInformantesUnidad").empty();

                const numTelefonoDI = $("#numTelefonoDI").val()
                const areasInformantes = "Titular"

                unidades.forEach((unidad) => {
                    $("#personasInformantesUnidad").append(formularioPersonas(tipoForm = 'UGI',
                        areasInformantes, unidad, numTelefonoDI))
                })

            }
        })
    </script> --}}
</x-dashboard-layout>
