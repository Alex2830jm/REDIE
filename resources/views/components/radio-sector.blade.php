<h3 class="mb-5 text-lg font-medium text-gray-900">Sectores de: <span class="text-{{$grupo->colorGrupo}}-400">{{ $grupo->nombreGrupo }}</span></h3>

<div class="grid grid-cols-1 md:grid-cols-7 gap-6">
    @foreach ($sectores as $sector)
{{--         <div>
            <button type="button" id="sector_{{ $sector->id }}" class="w-full" @click="searchContent($event)">
                <label for="sector_{{ $sector->id }}"
                    class="block cursor-pointer rounded-lg border border-{{ $sector->grupo->colorGrupo }}-200 bg-white p-4 text-sm font-medium shadow-sm hover:border-{{ $sector->grupo->colorGrupo }}-200 has-[:checked]:border-{{ $sector->grupo->colorGrupo }}-500 has-[:checked]:ring-2 has-[:checked]:ring-{{ $sector->grupo->colorGrupo }}-500 transition ease-in-out delay-75 hover:border-2 hover:translate-y-1 hover:scale-110">
                    <div>
                        <p class="text-gray-700  focus:text-{{ $sector->grupo->colorGrupo }}-400">
                            {{ $sector->nombreSector }}
                        </p>
                    </div>
                </label>
            </button>
        </div> --}}
        <x-button-sector id="{{$sector->id}}"  color="{{$sector->grupo->colorGrupo}}" nombre="{{$sector->nombreSector}}" />
    @endforeach
</div>

<div id="temasSectorGroup" x-show="openTemas" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90"></div>
