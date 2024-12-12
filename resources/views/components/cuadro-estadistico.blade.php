<section class="cointainer mx-auto">
    <div class="sm:flex sm:items-center sm:justify-between">
        <h2 class="text-lg font-medium text-gray-800">Cuadros Estadisticos del Tema: </h2>

        <div class="flex items-center mt-4 gap-x-3">
            <button
                class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg sm:w-auto gap-x-2 hover:bg-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                </svg>
                <span>Agregar Cuadro</span>
            </button>
        </div>
    </div>

    <div class="flex flex-col mt-6">
        <div class="overflow-x-auto sm:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="min-w-full divide-y divide-gray-200">
                            <tr>
                                <th scope="col"
                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                    No. Cuadro
                                </th>
                                <th scope="col"
                                    class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                    Nombre del Cuadro
                                </th>
                                <th scope="col"
                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                    Grado de Desagregación
                                </th>
                                <th scope="col"
                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                    Frecuencia de Actualización
                                </th>
                                <th scope="col"
                                    class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                    Fuente
                                </th>
                                <th scope="col"
                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr id="1">
                                <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap">2.2.1</td>
                                <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                    <h2 class="font-normal text-gray-800">
                                        Nacimientos registrados por municipio según mes de registro y sexo
                                    </h2>
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap">Municipal</td>
                                <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap">Semestral</td>
                                <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                    <h2 class="font-normal text-gray-800">
                                        Secretaría de Justicia y Derechos Humanos. Dirección General del Registro Civil.
                                    </h2>
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    {{-- <div class="relative group">
                                        <p class="text-slate-800 font-mono font-bold cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776" />
                                            </svg>
                                        </p>
                                        <div
                                            class="absolute -left-2 -translate-x-1/2 bottom-full opacity-0 group-hover:opacity-100 transition duration-100 transform group-hover:translate-y-0 translate-y-2 z-50">
                                            <div class="bg-slate-800/80 backdrop-blur-sm w-max max-w-xs text-white rounded-lg px-2 py-2 shadow-lg">
                                                <p class="font-bold text-md">Ver Documentos</p>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="group relative">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 hover:scale-125 duration-200 hover:stroke-blue-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776" />
                                            </svg>
                                        </button>
                                        <span
                                            class="absolute -top-10 -left-[10%] -translate-x-[50%] z-20 origin-left scale-0 px-3 rounded-lg border border-gray-300 bg-slate-800/80 text-white py-2 text-sm font-bold shadow-md transition-all duration-300 ease-in-out group-hover:scale-100">Ver Documentos<span>
                                            </span></span>
                                    </div>
                                </td>
                            </tr>
                            <tr id="1">
                                <td colspan="6">
                                    <div id="archivosCuadro_1"></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<x-slot name="scripts">
    <script languaje="javascript">
        $(document).ready(function () {
            var close = '';
            var after = '';

            $("tr").click(function () {
                $("#archivosCuadro_"+close).text();
                after = close;

                close = $(this).attr("id");
                var id = $(this).attr("id");
                if(close == after) {
                    $("archivosCuadro_"+after).text("");
                } else {
                    $("archivosCuadro_"+id).load("archivos-ce?id="+id);
                }
            })
        });
    </script>
</x-slot>
