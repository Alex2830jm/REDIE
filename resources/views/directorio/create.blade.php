<x-dashboard-layout>
    <div class="md:container md:mx-auto">
        <div class="px-4 my-6 text-2xl font-semibold text-gray-700">
            Registro de Dependencias y Unidades Generadoras de Información
        </div>
        <form action="{{ route('directorio.dependenciaStore') }}" method="POST" id="formulario_dependencias">
            @csrf
            <h3>Datos de la Dependencia</h3>
            <section>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="mt-2 md:col-span-2">
                        <div class="flex flex-wrap">
                            <div class="w-full md:w-1/3">
                                <label class="text-gray-700 font-semibold" for="numDI">Número de Dependendencia</label>
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
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Agregar Unidad Informativa a Dependencia</button>
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
                                        <th scope="col" class="p-3 font-semibold tracking-wide">Correo Electronico</th>
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
        </form>
    </div>

    <script>
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
    </script>
</x-dashboard-layout>
