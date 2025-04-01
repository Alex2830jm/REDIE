@props(['grupos' => []])
<div x-data="{
    openListGrupos: false,
    openListTemas: false,

    async cuadrosEstadisticos(event) {
        const tema_id = event.currentTarget.value;
        this.openListTemas = false;
        setTimeout(() => {
            fetch(`{{ route('cuadrosEstadisticosByTema', ['tema' => '__TEMA__']) }}`.replace('__TEMA__', tema_id))
                .then(response => response.text())
                .then(html => {
                    document.getElementById('temasBySector').innerHTML = html;
                    this.openListTemas = true;
                })
        });
    },
}">
    <div class="flex px-4 py-3 xl:hidden">
        <button x-on:click="openListGrupos = !openListGrupos" class="text-cherry-800 focus:outline-none">
            <div x-show="!openListGrupos" class="flex">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                </svg>
                <span class="text-cherry-800">Mostrar Grupos</span>
            </div>
            <div x-show="openListGrupos" class="flex">
                <svg x-show="openListGrupos" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
                <span class="text-cherry-800">Cerrar Grupos</span>
            </div>
        </button>
    </div>

    @if (session('message'))
        <script>
            Swal.fire({
                title: 'Error !!',
                text: '{{ session('message') }}',
                icon: 'warning',
                confirmButtonText: 'Aceptar'
            })
        </script>
    @endif

    <div class="px-4 py-3 md:flex md:gap-4">
        <div :class="openListGrupos ? 'translate-x-0 opacity-100' : '-translate-x-full opacity-0'"
            class="absolute inset-x-0 z-20 px-4 transition-all duration-300 ease-in-out bg-white shadow-lg xl:relative xl:opacity-100 xl:translate-x-0 xl:w-80 min-w-80 rounded-lg">

            <div class="space-y-4 font-medium text-gray-700 mb-5">
                @foreach ($grupos as $index => $grupo)
                    @php
                        $colorsBorder = [
                            'orange' => 'border-orange-500 hover:text-orange-500',
                            'sky' => 'border-sky-500 hover:text-sky-500',
                            'green' => 'border-green-500 hover:text-green-500',
                            'fuchsia' => 'border-fuchsia-500 hover:text-fuchsia-500',
                        ];

                        $colorsText = [
                            'orange' => 'text-orange-500',
                            'sky' => 'text-sky-500',
                            'green' => 'text-green-500',
                            'fuchsia' => 'text-fuchsia-500',
                        ];

                        $borderColor = $colorsBorder[$grupo->colorGrupo] ?? 'border-gray-400';
                        $textColor = $colorsText[$grupo->colorGrupo] ?? 'text-gray-500';
                    @endphp

                    <div x-data="{ openAccordionGrupo: {{ $index === 0 ? 'true' : 'false ' }} }">
                        <button x-on:click="openAccordionGrupo = !openAccordionGrupo"
                            class="flex items-center justify-between w-full p-4 font-semibold bg-white text-gray-600 border border-gray-200 border-t-4 {{ $borderColor }} rounded-lg shadow-sm transition hover:bg-gray-50">
                            <span> {{ $grupo->numGrupo }}.- {{ $grupo->nombreGrupo }} </span>
                            <svg class="w-5 h-5 transition-transform duration-300"
                                :class="openAccordionGrupo ? 'rotate-180' : ''" fill="none" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>

                        <div x-show="openAccordionGrupo" x-collapse.duration.1000ms class="mt-2 space-y-2">
                            @foreach ($grupo->sectores as $sector)
                                <div x-data="{ openAccordionSector: false }" class="ml-4 mt-2">
                                    <button x-on:click="openAccordionSector = !openAccordionSector"
                                        class="flex text-left justify-between w-full p-3 font-medium bg-white text-gray-500 border-gray-300 border-l-4 {{ $borderColor }} hover:bg-gray-50 rounded-lg transition">

                                        <span> {{ $sector->numGrupo }}.- {{ $sector->nombreGrupo }} </span>
                                        <svg class="w-5 h-5 transition-transform duration-300"
                                            :class="openAccordionSector ? 'rotate-180' : ''" fill="none"
                                            stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                    <div x-show="openAccordionSector" x-collapse.duration.1000ms
                                        class="ml-4 mt-2 space-y-1">
                                        @foreach ($sector->temas as $tema)
                                            <button value="{{ $tema->id }}" x-on:click="cuadrosEstadisticos(event)"
                                                class="w-full px-4 py-2 text-left text-sm font-medium border-l-4 {{ $borderColor }} bg-white hover:bg-gray-100 hover:bg-opacity-80 transition">
                                                {{ $tema->numGrupo }}.- {{ $tema->nombreGrupo }}
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="p-6 bg-white font-medium text-gray-700 shadow-md rounded-lg flex-1">
            <div id="temasBySector" x-show="openListTemas" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90">
            </div>
        </div>
    </div>
</div>
