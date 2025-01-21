    @props(['grupos' => []])

<div x-data="{
    //Validaciones
    selectDependencia: '',
    nombreCE: '',
    selectGD: null,
    selectFA: null,
    validateSelectDependencia: true,
    validateNombreCE: true,
    validateSelectGD: true,
    validateSelectFA: true,

    //Transiciones
    openSectores: true,
    openTemas: false,
    openCuadroEstadistico: false,
    openArchivos: false,
    openHistorialArchivos: null,
    openDrawer: false,

    validateFormCE() {
        this.validateNombreCE = this.nombreCE !== '';
        this.validateSelectDependencia = this.selectDependencia !== '';
        //this.validateSelectGD = this.selectGD !== null;
        //this.validateSelectFA = this.selectFA !== null;
        return this.validateSelectDependencia && this.validateNombreCE && this.validateSelectGD && this.validateSelectFA;
    },

    init() {
        var numberGrupo = 1;
        var grupoInitial = 2;
        setTimeout(() => {
            $('#sectorGroup').load(`{{ route('sectorsByGroup') }}?grupo_id=${grupoInitial}&grupo=${numberGrupo}`, () => {
                this.openSectores = true;
            });
        }, 300);
    },


    async searchContent(event) {
        //console.log(event.currentTarget);
        var idButton = $(event.currentTarget).attr('id');
        var [type, number] = idButton.split('_');
        var valor = $(event.currentTarget).val();
        //console.log(idButton);

        switch (type) {
            case 'grupo':
                this.openSectores = false;
                setTimeout(() => {
                    $('#sectorGroup').load(`{{ route('sectorsByGroup') }}?grupo_id=${valor}&grupo=${number}`, () => {
                        this.openSectores = true;
                    });
                }, 300);
                break;

            case 'sector':
                this.openTemas = false;
                setTimeout(() => {
                    $('#temasSectorGroup').load(`{{ route('temasBySector') }}?sector_id=${valor}&sector=${number}`, () => {
                        this.openTemas = true;
                    });
                }, 300);
                break;

            case 'tema':
                this.openCuadroEstadistico = false;
                setTimeout(() => {
                    $('#cuadrosEstadisticos').load(`{{ route('cuadrosEstadisticosByTema') }}?tema_id=${valor}&tema=${number}`, () => {
                        this.openCuadroEstadistico = true;
                    });
                }, 300);
                break;

            case 'ce':
                //console.log('ce'+valor)
                this.openDrawer = false;
                $('#filesCE').empty();
                $.get(`{{ route('archivosByCuadrosEstadisticos') }}?ce_id=${valor}`, (ce) => {
                    $('#archivo').val(ce.id);
                    console.log(ce.archivos)
                    ce.archivos.forEach((archivo) => {
                        $('#filesCE').append(`
                            <tr class='hover:bg-gray-100'>
                                <td class='p-2 text-gray-500'>
                                    <button id='archivoView_${archivo.id}' value='${archivo.nombreArchivo}' @click='searchContent($event)'
                                        class='cursor-pointer bg-white relative inline-flex items-center justify-center gap-2 text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-[#F5F5F5] hover:text-blue-400 h-9 rounded-md px-3'>
                                            <svg class='lucide lucide-newspaper text-blue-400 w-6 h-6' fill='none' viewBox='0 0 24 24' stroke-width='1.5'
                                                stroke='currentColor'>
                                                <path stroke-linecap='round' stroke-linejoin='round'
                                                    d='M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z' />
                                            </svg>
                                        ${archivo.yearPost}
                                    </button>
                                </td>
                                <td class='p-2 text-gray-500'>
                                    <a href='{{route("descargarArchivo")}}?archivo_id=${archivo.id}'
                                        class='cursor-pointer bg-white relative inline-flex items-center justify-center gap-2 text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-[#F5F5F5] hover:text-green-400 h-9 rounded-md px-3'>
                                        <svg class='lucide lucide-newspaper text-green-400 w-6 h-6' fill='none' viewBox='0 0 24 24' stroke-width='1.5'
                                            stroke='currentColor'>
                                            <path stroke-linecap='round' stroke-linejoin='round'
                                                d='M12 9.75v6.75m0 0-3-3m3 3 3-3m-8.25 6a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z' />
                                        </svg>
                                        Descargar
                                    </a>
                                </td> 
                            </tr>
                        `);
                    });
                    this.openDrawer = true;
                });
                break;

            case 'archivo':
                //console.log(type);
                $.get(`{{ route('infoCE') }}?ce_id=${valor}`, (ce) => {
                    $('#ce_id').val(ce.id);
                    $('#ce').val(ce.numeroCE);
                    $('#nombreArchivo').val(ce.nombreCuadroEstadistico);
                });
                $dispatch('open-modal', 'agregarArchivo');
                break;

            case 'archivoView':
                $('#viewFile').empty();
                $dispatch('open-modal', 'verArchivo');
                $('#viewFile').append(`<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=https://redieigecem.edomex.gob.mx/assets/archivos/HV-211.xlsx' width='100%' height='650px' frameborder='0'></iframe>`)
                //$('#viewFile').append(`<iframe src='http://onedrive.live.com/embed?src=https://redieigecem.edomex.gob.mx/assets/archivos/HV-211.xlsx' style='width:100%; height:600px;' frameborder='0'> </iframe>`)
                console.log(valor);
                break;    
            case 'dependencia':
                $.get(`{{ route('directorio.areas') }}?unidad_id=${valor}`, (areas) => {
                    $('#areas').empty();
                    $.each(areas, (index, value) => {
                        $('#areas').append('<option value=' + index + '>' + value + '</option>');
                    });
                });
                break;

            default:
                console.warn('Tipo no reconocido:', type);
                break;
        }
    },
}">
    <div class="px-4 md:flex py-3">
        <ul class="space-y space-y-6 font-medium text-gray-500 md:me-4 mb-4 md:mb-0">
            <li>
                <label for="grupo_1"
                    class="inline-flex items-center px-4 py-3 bg-white border-l-4 border-orange-500 rounded-lg w-full transition ease-in-out delay-75 sm:hover:translate-y-1 sm:hover:scale-110 sm:hover:text-orange-400 cursor-pointer has-[:checked]:border-orange-500 has-[:checked]:ring-1 has-[:checked]:ring-orange-500 has-[:checked]:text-orange-400">
                    <svg class=" w-7 h-7 me-2" viewBox="0 0 640 512">
                        <path fill="#f97316"
                            d="M360 72a40 40 0 1 0 -80 0 40 40 0 1 0 80 0zM144 208a40 40 0 1 0 0-80 40 40 0 1 0 0 80zM32 416c-17.7 0-32 14.3-32 32s14.3 32 32 32l576 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L32 416zM496 208a40 40 0 1 0 0-80 40 40 0 1 0 0 80zM200 313.5l26.9 49.9c6.3 11.7 20.8 16 32.5 9.8s16-20.8 9.8-32.5l-36.3-67.5c1.7-1.7 3.2-3.6 4.3-5.8L264 217.5l0 54.5c0 17.7 14.3 32 32 32l48 0c17.7 0 32-14.3 32-32l0-54.5 26.9 49.9c1.2 2.2 2.6 4.1 4.3 5.8l-36.3 67.5c-6.3 11.7-1.9 26.2 9.8 32.5s26.2 1.9 32.5-9.8L440 313.5l0 38.5c0 17.7 14.3 32 32 32l48 0c17.7 0 32-14.3 32-32l0-38.5 26.9 49.9c6.3 11.7 20.8 16 32.5 9.8s16-20.8 9.8-32.5l-37.9-70.3c-15.3-28.5-45.1-46.3-77.5-46.3l-19.5 0c-16.3 0-31.9 4.5-45.4 12.6l-33.6-62.3c-15.3-28.5-45.1-46.3-77.5-46.3l-19.5 0c-32.4 0-62.1 17.8-77.5 46.3l-33.6 62.3c-13.5-8.1-29.1-12.6-45.4-12.6l-19.5 0c-32.4 0-62.1 17.8-77.5 46.3L18.9 340.6c-6.3 11.7-1.9 26.2 9.8 32.5s26.2 1.9 32.5-9.8L88 313.5 88 352c0 17.7 14.3 32 32 32l48 0c17.7 0 32-14.3 32-32l0-38.5z" />
                    </svg>
                    <p class="has-[:checked]:text-orange-400">Demografía y Sociedad</p>
                    <input type="radio" name="grupo_id" id="grupo_1" value="2" class="sr-only"
                        @click="searchContent($event)" />
                </label>
            </li>
            <li>
                <label for="grupo_2"
                    class="inline-flex items-center px-4 py-3 bg-white border-l-4 border-sky-500 rounded-lg w-full transition ease-in-out delay-75 sm:hover:translate-y-1 sm:hover:scale-110 sm:hover:text-sky-400 cursor-pointer has-[:checked]:border-sky-500  has-[:checked]:ring-1 has-[:checked]:ring-sky-500 has-[:checked]:text-sky-400">
                    <svg class="w-7 h-7 me-2" viewBox="0 0 576 512">
                        <path fill="#0ea5e9"
                            d="M312 24l0 10.5c6.4 1.2 12.6 2.7 18.2 4.2c12.8 3.4 20.4 16.6 17 29.4s-16.6 20.4-29.4 17c-10.9-2.9-21.1-4.9-30.2-5c-7.3-.1-14.7 1.7-19.4 4.4c-2.1 1.3-3.1 2.4-3.5 3c-.3 .5-.7 1.2-.7 2.8c0 .3 0 .5 0 .6c.2 .2 .9 1.2 3.3 2.6c5.8 3.5 14.4 6.2 27.4 10.1l.9 .3s0 0 0 0c11.1 3.3 25.9 7.8 37.9 15.3c13.7 8.6 26.1 22.9 26.4 44.9c.3 22.5-11.4 38.9-26.7 48.5c-6.7 4.1-13.9 7-21.3 8.8l0 10.6c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-11.4c-9.5-2.3-18.2-5.3-25.6-7.8c-2.1-.7-4.1-1.4-6-2c-12.6-4.2-19.4-17.8-15.2-30.4s17.8-19.4 30.4-15.2c2.6 .9 5 1.7 7.3 2.5c13.6 4.6 23.4 7.9 33.9 8.3c8 .3 15.1-1.6 19.2-4.1c1.9-1.2 2.8-2.2 3.2-2.9c.4-.6 .9-1.8 .8-4.1l0-.2c0-1 0-2.1-4-4.6c-5.7-3.6-14.3-6.4-27.1-10.3l-1.9-.6c-10.8-3.2-25-7.5-36.4-14.4c-13.5-8.1-26.5-22-26.6-44.1c-.1-22.9 12.9-38.6 27.7-47.4c6.4-3.8 13.3-6.4 20.2-8.2L264 24c0-13.3 10.7-24 24-24s24 10.7 24 24zM568.2 336.3c13.1 17.8 9.3 42.8-8.5 55.9L433.1 485.5c-23.4 17.2-51.6 26.5-80.7 26.5L192 512 32 512c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l36.8 0 44.9-36c22.7-18.2 50.9-28 80-28l78.3 0 16 0 64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0-16 0c-8.8 0-16 7.2-16 16s7.2 16 16 16l120.6 0 119.7-88.2c17.8-13.1 42.8-9.3 55.9 8.5zM193.6 384c0 0 0 0 0 0l-.9 0c.3 0 .6 0 .9 0z" />
                    </svg>
                    <p class="has-[:checked]:text-sky-400">Economía y Sectores Productivos</p>
                    <input type="radio" name="grupo_" id="grupo_2" value="14" class="sr-only"
                        @click="searchContent($event)" />
                </label>
            </li>
            <li>
                <label for="grupo_3"
                    class="inline-flex items-center px-4 py-3 bg-white border-l-4 border-green-500 rounded-lg w-full transition ease-in-out delay-75 sm:hover:translate-y-1 sm:hover:scale-110 sm:hover:text-green-400 cursor-pointer has-[:checked]:border-green-500  has-[:checked]:ring-1 has-[:checked]:ring-green-500 has-[:checked]:text-green-400">
                    <svg class="w-6 h-6 me-2" viewBox="0 0 512 512">
                        <path fill="#22c55e"
                            d="M57.7 193l9.4 16.4c8.3 14.5 21.9 25.2 38 29.8L163 255.7c17.2 4.9 29 20.6 29 38.5l0 39.9c0 11 6.2 21 16 25.9s16 14.9 16 25.9l0 39c0 15.6 14.9 26.9 29.9 22.6c16.1-4.6 28.6-17.5 32.7-33.8l2.8-11.2c4.2-16.9 15.2-31.4 30.3-40l8.1-4.6c15-8.5 24.2-24.5 24.2-41.7l0-8.3c0-12.7-5.1-24.9-14.1-33.9l-3.9-3.9c-9-9-21.2-14.1-33.9-14.1L257 256c-11.1 0-22.1-2.9-31.8-8.4l-34.5-19.7c-4.3-2.5-7.6-6.5-9.2-11.2c-3.2-9.6 1.1-20 10.2-24.5l5.9-3c6.6-3.3 14.3-3.9 21.3-1.5l23.2 7.7c8.2 2.7 17.2-.4 21.9-7.5c4.7-7 4.2-16.3-1.2-22.8l-13.6-16.3c-10-12-9.9-29.5 .3-41.3l15.7-18.3c8.8-10.3 10.2-25 3.5-36.7l-2.4-4.2c-3.5-.2-6.9-.3-10.4-.3C163.1 48 84.4 108.9 57.7 193zM464 256c0-36.8-9.6-71.4-26.4-101.5L412 164.8c-15.7 6.3-23.8 23.8-18.5 39.8l16.9 50.7c3.5 10.4 12 18.3 22.6 20.9l29.1 7.3c1.2-9 1.8-18.2 1.8-27.5zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z" />
                    </svg>
                    <p class="has-[:checked]:text-green-400">Geografía y Medio Ambiente</p>
                    <input type="radio" name="grupo_id" id="grupo_3" value="32" class="sr-only"
                        @click="searchContent($event)" />
                </label>
            </li>
            <li>
                <label for="grupo_4"
                    class="inline-flex items-center px-4 py-3 bg-white border-l-4 border-fuchsia-500 rounded-lg w-full transition ease-in-out delay-75 sm:hover:translate-y-1 sm:hover:scale-110 sm:hover:text-fuchsia-400 cursor-pointer has-[:checked]:border-fuchsia-500  has-[:checked]:ring-1 has-[:checked]:ring-fuchsia-500 has-[:checked]:text-fuchsia-400">
                    <svg class="w-7 h-7 me-2" viewBox="0 0 576 512">
                        <path fill="#d946ef"
                            d="M0 48C0 21.5 21.5 0 48 0L336 0c26.5 0 48 21.5 48 48l0 159-42.4 17L304 224l-32 0c-8.8 0-16 7.2-16 16l0 32 0 24.2 0 7.8c0 .9 .1 1.7 .2 2.6c2.3 58.1 24.1 144.8 98.7 201.5c-5.8 2.5-12.2 3.9-18.9 3.9l-96 0 0-80c0-26.5-21.5-48-48-48s-48 21.5-48 48l0 80-96 0c-26.5 0-48-21.5-48-48L0 48zM80 224c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm80 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zM64 112l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16L80 96c-8.8 0-16 7.2-16 16zM176 96c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm80 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zM423.1 225.7c5.7-2.3 12.1-2.3 17.8 0l120 48C570 277.4 576 286.2 576 296c0 63.3-25.9 168.8-134.8 214.2c-5.9 2.5-12.6 2.5-18.5 0C313.9 464.8 288 359.3 288 296c0-9.8 6-18.6 15.1-22.3l120-48zM527.4 312L432 273.8l0 187.8c68.2-33 91.5-99 95.4-149.7z" />
                    </svg>
                    <p class="has-[:checked]:text-fuchsia-400">Gobierno, Seguridad y Justicia</p>
                    <input type="radio" name="grupo_id" id="grupo_4" value="37" class="sr-only"
                        @click="searchContent($event)" />
                </label>
            </li>
        </ul>
        <div class="p-6 bg-gray-50 text-medium text-gray-500 rounded-lg w-full">
            <div id="sectorGroup" x-show="openSectores" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90">
            </div>
        </div>
    </div>
</div>
