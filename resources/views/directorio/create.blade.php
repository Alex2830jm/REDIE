<x-dashboard-layout>
    <div class="md:container md:mx-auto" id="alerts" x-data="">
        <div class="px-4 my-6 text-2xl font-semibold text-gray-700">
            Registro de Dependencias y Unidades Generadoras de Información
        </div>
        <div class="flex-1 flex flex-col bg-white rounded-xl mb-20">
            <section class="bg-cream-lighter p-4 shadow">
                <form>
                    <div class="md:flex mb-8">
                        <div class="md:w-1/3">
                            <legend class="uppercase tracking-wide font-semibold">Datos de la Dependencia</legend>
                        </div>
                        <div class="md:flex-1 mt-2 mb:mt-0 md:px-3">
                            <div class="mb-4">
                                <label class="block uppercase tracking-wide text-xs font-bold">Nombre de la
                                    dependencia</label>
                                <input class="w-full border rounded-lg border-gray-400 p-3 bg-gray-100" type="text"
                                    name="nombreDependencia">
                            </div>
                            <div class="mb-4">
                                <label class="block uppercase tracking-wide text-xs font-bold">Domicilio de la
                                    dependencia</label>
                                <input class="w-full border rounded-lg border-gray-400 p-3 bg-gray-100" type="text"
                                    name="domicilioDependencia" id="domicilioDependencia">
                            </div>
                            <div class="md:flex mb-4">
                                <div class="md:flex-1 md:pr-3">
                                    <div class="flex items-center ps-4 border border-gray-200 rounded-sm">
                                        <input type="radio" name="tipo" value="Estatal" id="tipo_Estatal"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-400 focus:ring-blue-500 focus:ring-2">
                                        <label for="tipo_Estatal"
                                            class="w-full py-4 ms-2 text-sm font-medium text-gray-900">Estatal</label>
                                    </div>
                                    <div class="flex items-center ps-4 border border-gray-200 rounded-sm">
                                        <input type="radio" name="tipo" value="Federal" id="tipo_Federal"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                        <label for="tipo_Federal"
                                            class="w-full py-4 ms-2 text-sm font-medium text-gray-900">Federal</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="md:flex mb-8" id="dependenciaEstatal">
                        <div class="md:w-1/3">
                            <legend class="uppercase tracking-wide font-semibold">Datos de la Dependencia</legend>
                        </div>
                        <div class="md:flex-1 mt-2 mb:mt-0 md:px-3">
                            <div class="mb-4">
                                <label class="block uppercase tracking-wide text-xs font-bold">Nombre de la
                                    Dirección</label>
                                <input class="w-full border rounded-lg border-gray-400 p-3 bg-gray-100" type="text"
                                    id="nombreUnidad">
                            </div>
                            <div class="mb-4">
                                <label class="block uppercase tracking-wide text-xs font-bold">Domicilio de la
                                    dependencia</label>
                                <input class="w-full border rounded-lg border-gray-400 p-3 bg-gray-100" type="text"
                                    name="domicilioUnidad">
                            </div>
                            <div class="mb-4">
                                <button type="button" class="px-3 py-2 rounded-lg bg-blue-500 text-white"
                                    id="addUnidad">Agregar</button>

                                <button type="button" class="px-3 py-2 rounded-lg bg-blue-500 text-white"
                                    id="buttonUnidades" @click="$dispatch('open-modal', 'detallesUnidades')">Ver
                                    Unidades</button>
                            </div>
                        </div>
                    </div>
                    <div class="md:flex mb-8">
                        <div class="md:w-1/3">
                            <legend class="uppercase tracking-wide font-semibold">Servidores de la Dependencia</legend>
                        </div>
                        <div class="md:flex-1 mt-2 mb:mt-0 md:px-3">
                            <div class="md:flex mb-4">
                                <div class="md:flex-1 md:pr-3">
                                    <label
                                        class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Nombre
                                        completo:</label>
                                    <input class="w-full border rounded-lg border-gray-400 p-3 bg-gray-100"
                                        type="text" id="nombrePersona">
                                </div>
                            </div>
                            <div class="md:flex mb-4">
                                <div class="md:flex-1 md:pr-3">
                                    <label
                                        class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Profesión</label>
                                    <input class="w-full border rounded-lg border-gray-400 p-3 bg-gray-100"
                                        type="text" id="profesion" placeholder="Ingeniero en ...">
                                </div>
                            </div>
                            <div class="md:flex mb-4">
                                <div class="md:flex-1 md:pr-3">
                                    <label
                                        class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Área
                                        Informante</label>
                                    <select id="areaAsignada"
                                        class="w-full shadow-inner p-3 border border-gray-400 rounded-lg bg-gray-100">
                                        <option value=""> Titular de la Sependencia </option>
                                        <option value=""> Titular de la Unidad de Información, Planeación,
                                            Programación y Evaluacion o equivalente </option>
                                        <option value="">Enlace responsable de la entrega de la Información
                                        </option>
                                        <option value="">Titular de la Unidad Generadora de la Información
                                        </option>
                                    </select>
                                </div>
                                <div class="md:flex-1 md:pl-3 mt-2 md:mt-0">
                                    <label
                                        class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Cargo
                                        en el área</label>
                                    <input class="w-full border rounded-lg border-gray-400 p-3 bg-gray-100"
                                        type="text" id="cargoArea" placeholder="Jefe del área...">
                                </div>
                            </div>
                            <div class="md:flex mb-4">
                                <div class="md:flex-1 md:pr-3">
                                    <label
                                        class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Número
                                        de Telefono de Contacto</label>
                                    <input class="w-full border rounded-lg border-gray-400 p-3 bg-gray-100"
                                        type="text" id="telefono" placeholder="123 456 ext. 78">
                                </div>
                                <div class="md:flex-1 md:pl-3 mt-2 md:mt-0">
                                    <label
                                        class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Correo
                                        Electronico de Contacto</label>
                                    <input class="w-full border rounded-lg border-gray-400 p-3 bg-gray-100"
                                        type="email" id="correo" placeholder="example@mail.com">
                                </div>
                            </div>
                            <div class="mb-4">
                                <button type="button" class="px-3 py-2 rounded-lg bg-blue-500 text-white"
                                    id="addPersona">Agregar</button>

                                <button type="button" class="px-3 py-2 rounded-lg bg-blue-500 text-white"
                                    id="modalPersonasList" @click="$dispatch('open-modal', 'detallesPersonas')">Ver
                                    Detalles</button>
                            </div>
                            <div class="md:flex mb-4 justify-end">
                                <button type="button" class="px-3 py-2 rounded-lg bg-green-500 text-white">Guardar
                                    Datos de Dependencia</button>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>

        <x-modal name="detallesUnidades">
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
                    <div class="flow-root">
                        <table class="w-full text-sm text-gray-500 items-center text-center">
                            <thead class="bg-cherry-800 text-gray-200 uppercase">
                                <tr>
                                    <th scope="col" class="p-3 font-semibold tracking-wide">Nombre de la dirección
                                    </th>
                                    <th scope="col" class="p-3 font-semibold tracking-wide">Domicilio</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-400" id="unidadesList">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </x-modal>

        <x-modal name="detallesPersonas">
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
                    <div class="flow-root" id="listPersonas">

                    </div>
                </div>
            </div>
        </x-modal>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#dependenciaEstatal").hide();
            $("input[type='radio']").click(function() {
                var tipo_dependencia = $("input[type='radio']:checked").val();
                console.log(tipo_dependencia)
                if (tipo_dependencia === "Estatal") {
                    $("#dependenciaEstatal").show('blind');
                } else {
                    $("#dependenciaEstatal").hide('drop');
                }
            });

            $('#addUnidad').click(function() {
                agregarUnidad();
            });

            $("#addPersona").click(function() {
                agregarPersona();
            })
        });

        var contUnidad = 0;
        var contPersona = 0;

        function evaluar() {
            if (contUnidad >= 0) {
                $("#buttonUnidades").show()
            }
        }

        function agregarUnidad() {
            var nombreUnidad = $("#nombreUnidad").val();
            var domicilioDependencia = $("#domicilioDependencia").val();
            if (nombreUnidad != "") {
                var unidades = "<tr class='hover:bg-gray-100'>" +
                    "<td class='p-3 text-gray-500'>" + nombreUnidad + "</td>" +
                    "<td class='p-3 text-gray-500'>" + domicilioDependencia + "</td>" +
                    "</tr>";
                contUnidad++;
                $("#nombreUnidad").val("");
                $("#unidadesList").append(unidades);
            } else {
                console.log("no se registraron todos los datos")
            }
        }

        function agregarPersona() {
            var nombrePersona = $("#nombrePersona").val();
            var profesion = $("#profesion").val();
            var areaAsignada = $("#areaAsignada").val();
            var cargoArea = $("#cargoArea").val();
            var telefono = $("#telefono").val();
            var correo = $("#correo").val();

            var datosPersona = "<div class='flow-root rounded-lg border border-gray-400 py-3 shadow-sm mb-5'>" +
                "<div class='grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4'>" +
                "<dt class='font-medium text-gray-900'>Nombre de la persona servidora pública</dt>" +
                "<dd class='text-gray-700 sm:col-span-2'>" + nombrePersona + "</dd>" +
                "</div>" +
                "<div class='grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4'>" +
                "<dt class='font-medium text-gray-900'>Profesión</dt>" +
                "<dd class='text-gray-700 sm:col-span-2'>" + profesion + "</dd>" +
                "</div>" +
                "<div class='grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4'>" +
                "<dt class='font-medium text-gray-900'>Cargo en dependencia</dt>" +
                "<dd class='text-gray-700 sm:col-span-2'>" + cargoArea + "</dd>" +
                "</div>" +
                "<div class='grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4'>" +
                "<dt class='font-medium text-gray-900'>Correo Electronico</dt>" +
                "<dd class='text-gray-700 sm:col-span-2 items-center'>" + correo + "</dd>" +
                "</div>" +
                "<div class='grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4'>" +
                "<dt class='font-medium text-gray-900'>Teléfono</dt>" +
                "<dd class='text-gray-700 sm:col-span-2'>" + telefono + "</dd>" +
                "</div>" +
                "</div>";
            contPersona++;
            $("#listPersonas").append(datosPersona);
        }
    </script>
</x-dashboard-layout>
