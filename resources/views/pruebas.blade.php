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
                            <input type="radio" name="tipo" value="Estatal" id="tipo_Estatal"
                                class="w-4 h-4 text-blue-600 bg-gwhite border-gray-400 focus:ring-blue-500 focus:ring-2">
                            <label for="tipo_Estatal"
                                class="w-full py-4 ms-2 text-sm font-medium text-gray-900">Estatal</label>
                        </div>
                        <div class="flex items-center bg-gray-100 ps-4 border border-gray-200 rounded-lg">
                            <input type="radio" name="tipo" value="Federal" id="tipo_Federal"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="tipo_Federal"
                                class="w-full py-4 ms-2 text-sm font-medium text-gray-900">Federal</label>
                        </div>
                    </div>
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
            var json = [];
            var formularioDependencia = "";
            var formularioUnidad = "";

            var form = $("#formulario_dependencias");
            form.steps({
                headerTag: "h3",
                bodyTag: "section",
                transitionEffect: "slide",
                autoFocus: true,
                onStepChanged: function(event, currentIndex, newIndex) {
                    if (currentIndex === 1 && $("input[type='radio']:checked").val() === "Federal") {
                        form.steps("next");
                    }

                    if (currentIndex === 2) {
                        personasInformantesDependencia();
                        personasInformantesUnidad();
                    }

                    if (currentIndex === 3 && $("input[type='radio']:checked").val() === "Federal") {
                        $("#formulario_dependencias").submit();
                    }

                },
                onFinished: function(event, currentIndex) {
                    $("#formulario_dependencias").submit();
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
                    var unidades = "<tr class='hover:bg-gray-100'>" +
                        "<td class='p-3 text-gray-500'><input type='hidden' name='indexUnidad[]' value='"+ contUnidad +"'>" + nombreUnidad +  "<input type='hidden' name='unidadInformativa[]' value='" + nombreUnidad + "'></td>" +
                        "<td class='p-3 text-gray-500'>" + domicilio + "<input type='hidden' name='domicilioUnidad[]' value='" + domicilio + "'></td>" +
                        "</tr>";
                    json.push(nombreUnidad);
                    contUnidad++;
                    $("#nombreUnidad").val("");
                    $("#unidadesList").append(unidades);
                } else {
                    console.log("no se registraron todos los datos")
                }
            }

            function personasInformantesDependencia() {
                $("#personasInformantesDependencia").empty();

                var nombreUnidad = $("#nombreUnidad").val();
                var domicilioUnidad = $("#domicilioUnidad").val();
                var domicilioDependencia = $("#domicilioDependencia").val();
                var areasDependenciaEstatal = [
                    "Titular de Dependencia",
                    "Titular de la Unidad de Información, Planeación, Programación y Evaluacion o equivalente",
                    "Enlace responsable de la entrega de la Información",
                ];

                var areasUnidadOFederal = [
                    "Titular de Dependencia",
                    "Titular de la Unidad Generadora de la Información"
                ]

                if ($("input[type='radio']:checked").val() === "Federal") {
                    areasUnidadOFederal.forEach(function(area, index) {
                        formularioDependencia =
                            "<div class='mb-5 p-5 rounded-lg border-2 border-cherry-800'>" +
                            "<div class='font-bold text-lg text-gray-700'>" + area + "</div>" +
                            "<input type='hidden' name='index[]' value='" + index + "'>" +
                            "<div class='mt-2'>" +
                            "<label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Nombre Completo del Titular</label>" +
                            "<input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='text' name='nombrePersonaDependencia[]'>" +
                            "</div>" +
                            "<div class='mt-2'>" +
                            "<label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Profesión del Titular</label>" +
                            "<input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='text' name='profesionDependencia[]' placeholder='Ingenier@ en ...'>" +
                            "</div>" +
                            "<div class='mt-2 grid grid-cols-2 gap-4'>" +
                            "<div>" +
                            "<label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Área Informante</label>" +
                            "<input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='text' name='areaUnidad[]' value='" + area + "' readonly>" +
                            "</div>" +
                            "<div>" +
                            "<label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Cargo en el área</label>" +
                            "<input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='text' name='cargoAreaDependencia[]' placeholder='Jefe del área...'>" +
                            "</div>" +
                            "</div>" +
                            "<div class='mt-2 grid grid-cols-2 gap-4'>" +
                            "<div>" +
                            "<label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Número de Telefono de Contacto</label>" +
                            "<input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='text' name='telefonoDependencia[]' placeholder='123 456 ext. 78'>" +
                            "</div>" +
                            "<div>" +
                            "<label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Correo Electronico de Contacto</label>" +
                            "<input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='email' name='correoDependencia[]' placeholder='example@mail.com'>" +
                            "</div>" +
                            "</div>" +
                            "</div>";
                        $("#personasInformantesDependencia").append(formularioDependencia);
                    });
                } else {
                    areasDependenciaEstatal.forEach(function(area, index) {
                        formularioDependencia =
                            "<div class='mb-5 p-5 rounded-lg border-2 border-cherry-800'>" +
                            "<input type='hidden' name='indexDep[]' value='" + index + "'>" + 
                            "<div class='font-bold text-lg text-gray-700'>" + area + "</div>" +
                            "<div class='mt-2'>" +
                            "<label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Nombre Completo del Titular</label>" +
                            "<input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='text' name='nombrePersona[]'>" +
                            "</div>" +
                            "<div class='mt-2'>" +
                            "<label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Profesión del Titular</label>" +
                            "<input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='text' name='profesion[]' placeholder='Ingenier@ en ...'>" +
                            "</div>" +
                            "<div class='mt-2 grid grid-cols-2 gap-4'>" +
                            "<div>" +
                            "<label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Área Informante</label>" +
                            "<input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='text' name='area[]' value='" + area + "'>" +
                            "</div>" +
                            "<div>" +
                            "<label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Cargo en el área</label>" +
                            "<input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='text' name='cargoArea[]' placeholder='Jefe del área...'>" +
                            "</div>" +
                            "</div>" +
                            "<div class='mt-2 grid grid-cols-2 gap-4'>" +
                            "<div>" +
                            "<label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Número de Telefono de Contacto</label>" +
                            "<input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='text' name='telefono[]' placeholder='123 456 ext. 78'>" +
                            "</div>" +
                            "<div>" +
                            "<label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Correo Electronico de Contacto</label>" +
                            "<input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='email' name='correo[]' placeholder='example@mail.com'>" +
                            "</div>" +
                            "</div>" +
                            "</div>";
                        $("#personasInformantesDependencia").append(formularioDependencia);
                    });
                }
            }

            function personasInformantesUnidad() {
                $("#personasInformantesUnidad").empty();
                var areasUnidad = [
                    "Titular",
                    "Titular de la Unidad Generadora de la Información"
                ]
                console.log(json);

                json.forEach(function(unidad, index) {
                    areasUnidad.forEach(function(area, index) {
                        formularioUnidad =
                            "<div class='mb-5 p-5 rounded-lg border-2 border-cherry-800'>" +
                            "<div class='font-bold text-lg text-gray-700'>" + area + " - " +
                            unidad + "</div>" +
                            "<input type='hidden' name='indexPer[]' value='" + index + "'>" + 
                            "<div class='mt-2'>" +
                            "<label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Nombre Completo del Titular</label>" +
                            "<input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='text' name='nombrePersonaUnidad[]'>" +
                            "</div>" +
                            "<div class='mt-2'>" +
                            "<label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Profesión del Titular</label>" +
                            "<input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='text' name='profesionUnidad[]' placeholder='Ingenier@ en ...'>" +
                            "</div>" +
                            "<div class='mt-2 grid grid-cols-2 gap-4'>" +
                            "<div>" +
                            "<label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Área Informante</label>" +
                            "<input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='text' name='areaUnidad[]' value='" + area + "' readonly>" +
                            "</div>" +
                            "<div>" +
                            "<label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Cargo en el área</label>" +
                            "<input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='text' name='cargoAreaUnidad[]' placeholder='Jefe del área...'>" +
                            "</div>" +
                            "</div>" +
                            "<div class='mt-2 grid grid-cols-2 gap-4'>" +
                            "<div>" +
                            "<label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Número de Telefono de Contacto</label>" +
                            "<input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='text' name='telefonoUnidad[]' placeholder='123 456 ext. 78'>" +
                            "</div>" +
                            "<div>" +
                            "<label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Correo Electronico de Contacto</label>" +
                            "<input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='email' name='correoUnidad[]' placeholder='example@mail.com'>" +
                            "</div>" +
                            "</div>" +
                            "</div>";
                        $("#personasInformantesUnidad").append(formularioUnidad);
                    });
                })
            }
        });
    </script>
</x-dashboard-layout>
