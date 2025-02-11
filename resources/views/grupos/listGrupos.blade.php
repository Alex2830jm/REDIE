@props(['grupos' => []])
<div x-data="{
    openTemas: false,

    async temasBySector(event) {
        var idButton = event.currentTarget.id;
        var value = event.currentTarget.value;
        this.openTemas = false;
        setTimeout(() => {
            $('#temasBySector').load(`{{ route('temasBySector') }}?sector_id=${value}`, () => {
                this.openTemas = true;
            });
        }, 300);
    }
}">
    <div class="px-4 py-3 md:flex">
        <div class="space-y-6 font-medium text-gray-500 md:me-4 mb-4 md:mb-0" id="listGrupos">
            @foreach ($grupos as $index => $grupo)
                @php
                    $colors = [
                        'orange' => 'border-t-4 border-orange-400 hover:text-orange-400 focus:text-orange-400',
                        'sky' => 'border-t-4 border-sky-400 hover:text-sky-400',
                        'green' => 'border-t-4 border-green-400 hover:text-green-400',
                        'fuchsia' => 'border-t-4 border-fuchsia-400 hover:text-fuchsia-400'
                    ];

                    $borderColor = $colors[$grupo->colorGrupo] ?? 'border-t-4 border-gray-400';
                @endphp

                <div x-data="{ openAccodionGrupos_{{ $index }}: {{ $index === 0 ? 'true' : 'false' }} }">
                    <button id="button_grupo_{{ $grupo->id }}" type="button"
                        x-on:click="openAccodionGrupos_{{ $index }} = !openAccodionGrupos_{{ $index }}"
                        class="flex items-center justify-between w-full p-5 font-medium bg-white text-gray-500 border border-b-0 border-gray-200 border-t-4 {{ $borderColor }} rounded-t-xl">
                        {{ $grupo->nombreGrupo }}
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2"
                            stroke="currentColor" class="size-5 shrink-0 transition" aria-hidden="true"
                            x-bind:class="openAccodionGrupos_{{ $index }} ? 'rotate-180' : ''">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <div x-cloak x-show="openAccodionGrupos_{{ $index }}" id="content_grupo_{{ $grupo->id }}"
                        x-collapse.duration.1000ms>
                        <div class="p-5 w-64 bg-white">
                            @foreach ($grupo->sectores as $sector)
                                <button type="button" value="{{ $sector->id }}" id="{{ $sector->id }}"
                                    @click="temasBySector(event)" aria-controls="temasBySector"
                                    class="w-full px-4 py-2 mb-1 font-medium text-sm text-left cursor-pointer border-l-4 border-{{ $grupo->colorGrupo }}-400 hover:bg-{{ $grupo->colorGrupo }}-300 focus:text-{{$grupo->colorGrupo}}-400">
                                    {{ $sector->nombreGrupo }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="p-6 bg-white text-medium text-gray-500 rounded-lg w-full">
            <div id="temasBySector" x-show="openTemas" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90">
            </div>
        </div>
    </div>
</div>
