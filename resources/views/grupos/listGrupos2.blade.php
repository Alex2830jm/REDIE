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
                                            <button id='archivoView_${archivo.id}' value='${archivo.urlFile}' @click='searchContent($event)'
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
                                            <a href='{{ route('descargarArchivo') }}?archivo_id=${archivo.id}'
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
                    console.log(valor);
                    break;
    
    
                case 'dependencia':
                    var [dependencia, id] = valor.split('_');
                    if (dependencia === 'estatal') {
                        $.get(`{{ route('unidadesCE') }}?dependencia_id=${id}`, (unidades) => {
                            $('#unidades').empty();
                            $.each(unidades, (index, value) => {
                                $('#unidades').append('<option value=' + value.id + '>' + value.unidad + '</option>').prop('disabled', false);
                            });
                        });
                    } else if (dependencia === 'federal') {
                        $('#unidades').empty();
                        $('#unidades').append('<option>Dependencia Federal</option>').prop('disabled', true);
                    }
                    break;
    
                default:
                    console.warn('Tipo no reconocido:', type);
                    break;
            }
        },
    }">
        <div class="px-4 md:flex py-3">
            <ul class="space-y space-y-6 font-medium text-gray-500 md:me-4 mb-4 md:mb-0" id="listGrupos">
                @foreach ($grupos as $grupo)
                    <li>
                        <label for="grupo_{{ $grupo->id }}"
                            class="inline-flex items-center px-4 py-3 cursor-pointer bg-white border-l-4 border-{{ $grupo->colorGrupo }}-500 rounded-lg w-full transition ease-in-out delay-75 hover:translate-y-1 hover:scale-100 hover:text-{{$grupo->colorGrupo}}-400 has-[:checked]:border-{{$grupo->colorGrupo}}-500 has-[:checked]:text-{{$grupo->colorGrupo}}-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 me-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>

                            <p class="has-[:checked]:text-orange-400"> {{ $grupo->nombreGrupo }} </p>
                            <input type="radio" name="grupo_id" id="grupo_{{ $grupo->id }}"
                                value="{{ $grupo->id }}" class="sr-only" @click="searchContent($event)" />
                        </label>
                    </li>
                @endforeach
            </ul>
            <div class="p-6 bg-gray-50 text-medium text-gray-500 rounded-lg w-full">
                <div id="sectorGroup" x-show="openSectores" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                </div>
            </div>
        </div>
    </div>
