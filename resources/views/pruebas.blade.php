<x-dashboard-layout>
    <div class="md:container md:mx-auto">
        <div class="px-4 my-6 text-2xl font-semibold text-gray-700">
            Registro de Dependencias y Unidades Generadoras de Información
        </div>
        <form action="{{ route('directorio.dependenciaStore') }}" method="POST" id="formulario_dependencias">
            @csrf
            <h3>Datos de la Dependencia</h3>
            <section>
                <div class="mt-2">
                    <label class="text-gray-700 font-semibold" for="nombreDependencia">Nombre de la
                        Dependencia</label>
                    <input id="nombreDependencia" type="text" name="nombreDependencia"
                        class="block w-full px-4 py-3 text-gray-700 bg-gray-100 border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                    <span class="text-red-800 text-base font-medium rounded-sm" id="errorNombreDep"> </span>
                </div>

                <div class="mt-2">
                    <label class="text-gray-700 font-semibold" for="domicilioDependencia">Domicilio de la
                        Dependencia</label>
                    <input id="domicilioDependencia" type="text" name="domicilioDependencia"
                        class="block w-full px-4 py-3 text-gray-700 bg-gray-100 border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                </div>
                <div class="mt-2">
                    <label class="text-gray-700 font-semibold" for="domicilioDependencia">Selecciona el tipo de
                        Dependencia</label>
                    <div class=" grid grid-cols-2 gap-4">
                        <div class="flex items-center bg-gray-100  ps-4 border border-gray-200 rounded-lg">
                            <input type="radio" name="tipo_dependencia" value="Estatal" id="tipo_Estatal"
                                class="w-4 h-4 text-blue-600 bg-gwhite border-gray-400 focus:ring-blue-500 focus:ring-2">
                            <label for="tipo_Estatal"
                                class="w-full py-4 ms-2 text-sm font-medium text-gray-900">Estatal</label>
                        </div>
                        <div class="flex items-center bg-gray-100 ps-4 border border-gray-200 rounded-lg">
                            <input type="radio" name="tipo_dependencia" value="Federal" id="tipo_Federal"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="tipo_Federal"
                                class="w-full py-4 ms-2 text-sm font-medium text-gray-900">Federal</label>
                        </div>
                    </div>
                    <span class="text-red-800 text-base font-medium rounded-sm" id="errorTipoDependencia"> </span>
                </div>
            </section>

            <h3>Datos de las Direcciones Informativas</h3>
            <section>
                <div class="mt-2">
                    <label class="text-gray-700 font-semibold" for="nombreUnidad">Nombre de la Dirección
                        Informativa</label>
                    <input id="nombreUnidad" type="text"
                        class="block w-full px-4 py-3 text-gray-700 bg-gray-100 border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                </div>

                <div class="mt-2">
                    <label class="text-gray-700 font-semibold" for="domicilioUnidad">Domicilio de la Dirección
                        Informativa</label>
                    <input id="domicilioUnidad" type="text"
                        class="block w-full px-4 py-3 text-gray-700 bg-gray-100 border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                </div>
                <div class="mt-2 justify-end">
                    <button type="button" class="px-3 py-2 rounded-lg bg-blue-500 text-white" id="addUnidad">Agregar a
                        Dependencia</button>
                </div>
                <div class="mt-2 sm:flex sm:items-center">
                    <div class="flow-root">
                        <table class="max-w-full text-sm text-gray-500 items-center text-center">
                            <thead class="bg-cherry-800 text-gray-200 uppercase">
                                <tr>
                                    <th scope="col" class="p-3 font-semibold tracking-wide">Nombre de la
                                        dirección
                                    </th>
                                    <th scope="col" class="p-3 font-semibold tracking-wide">Domicilio</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-400" id="unidadesList">
                            </tbody>
                        </table>
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
                    if (element.attr("name") === "tipo_dependencia") {
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
                var nombreUnidad = $("#nombreUnidad").val();
                var domicilioUnidad = $("#domicilioUnidad").val();
                var domicilioDependencia = $("#domicilioDependencia").val();
                if (domicilioUnidad === "") var domicilio = domicilioDependencia;
                else var domicilio = domicilioUnidad;
                if (nombreUnidad != "") {
                    var listUnidades = "<tr class='hover:bg-gray-100'>" +
                        "<td class='p-3 text-gray-500'><input type='hidden' name='indexUnidad[]' value='" +
                        contUnidad + "'>" + nombreUnidad +
                        "<input type='hidden' name='unidadInformativa[]' value='" + nombreUnidad + "'></td>" +
                        "<td class='p-3 text-gray-500'>" + domicilio +
                        "<input type='hidden' name='domicilioUnidad[]' value='" + domicilio + "'></td>" +
                        "</tr>";
                    unidades.push(nombreUnidad);
                    contUnidad++;
                    $("#nombreUnidad").val("");
                    $("#unidadesList").append(listUnidades);
                } else {
                    console.log("no se registraron todos los datos")
                }
            }

            function formularioPersonas(area, index, tipoFormulario, unidad) {
                return `
                    <div class="mb-5 p-5 rounded-lg border-2 border-cherry-800">
                        <div class="font-bold text-lg text-gray-700">${area} - ${unidad}</div>

                        <input type="hidden" name="index[]" value="${index}">
                        <input type="hidden" name="tipoPersona[]" value="${tipoFormulario}">

                        <div class="mt-2">
                            <label class="block uppercase tracking-wide text-sm font-semibold">Nombre Completo del Titular:</label>
                            <input type="text" name="nombrePersona[]" class="w-full border rounded-lg border-gray-400 p-3 bg-gray-100">
                        </div>
                        <div class="mt-2">
                            <label class="block uppercase tracking-wide text-sm font-semibold">Profesion del Titular:</label>
                            <input type="text" name="profesionPersona[]"
                                class="w-full border rounded-lg border-gray-400 p-3 bg-gray-100">
                        </div>

                        <div class="mt-2 grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block uppercase tracking-wide text-sm font-semibold">Área Informante:</label>
                                <input type="text" name="areaInformantePersona[]"
                                    class="w-full border rounded-lg border-gray-400 p-3 bg-gray-100" value="${area}" readonly>
                            </div>
                            <div>
                                <label class="block uppercase tracking-wide text-sm font-semibold">Cargo en el Área:</label>
                                <input type="text" name="cargoAreaPersona[]"
                                    class="w-full border rounded-lg border-gray-400 p-3 bg-gray-100" value="">
                            </div>
                        </div>

                        <div class="mt-2 grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block uppercase tracking-wide text-sm font-semibold">Número Telefónico de Contacto:</label>
                                <input type="text" name="telefonoContactoPersona[]"
                                    class="w-full border rounded-lg border-gray-400 p-3 bg-gray-100">
                            </div>
                            <div>
                                <label class="block uppercase tracking-wide text-sm font-semibold">Correo Electrónico de Contacto:</label>
                                <input type="text" name="correoContactoPersona[]"
                                    class="w-full border rounded-lg border-gray-400 p-3 bg-gray-100">
                            </div>
                        </div>
                    </div>
                `;
            }

            function personasByDependencia() {
                const content = $("#personasInformantesDependencia").empty();
                const tipo_dependencia = $("input[type='radio']:checked").val();
                const dependencia = $("#nombreDependencia").val();
                const tipoFormulario = "dependencia"
                var areas = tipo_dependencia === "Federal" ?
                    ["Titular de Dependencia", "Titular de la Unidad Generadora de la Información"] :
                    [
                        "Titular de Dependencia",
                        "Titular de la Unidad de Información, Planeación, Programación y Evaluación o equivalente",
                        "Enlace responsable de la entrega de la Información"
                    ];
                areas.forEach((area, index) => {
                    content.append(formularioPersonas(area, index, tipoFormulario, dependencia));
                })
            }

            function personasByUnidad() {
                const content = $("#personasInformantesUnidad").empty();
                const areas = ["Titular de Dependencia", "Titular de la Unidad Generadora de la Información"];
                
                unidades.forEach((unidad, index) => {
                    areas.forEach((area, i)  => {
                        content.append(formularioPersonas(area, index, "unidad", unidad));
                    })
                })
            }
        })
    </script>
</x-dashboard-layout>
