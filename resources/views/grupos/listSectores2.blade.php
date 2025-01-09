<h3 class="mb-5 text-lg font-medium text-gray-900">Sectores de: <span
        class="text-{{ $grupo->colorGrupo }}-400">{{ $grupo->nombreGrupo }}</span></h3>
<div class="border-b border-b-gray-200">
    <ul class="hidden -mb-px sm:flex items-center gap-4 text-sm font-medium">
        @foreach ($sectores as $sector)
            <li class="flex-1">
                <label for="sector_{{ $sector->id }}_{{ $numeroGrupo }}.{{ $loop->iteration }}"
                    class="curelative flex items-center justify-center gap-2 px-1 py-3 text-gray-500 cursor-pointer hover:text-{{ $grupo->colorGrupo }}-400 has-[:checked]:border-b-2 has-[:checked]:border-{{ $grupo->colorGrupo }}-500 has-[:checked]:text-{{ $grupo->colorGrupo }}-400">
                    {{ $sector->nombreGrupo }}
                    <input type="radio" name="sector_id"
                        id="sector_{{ $sector->id }}_{{ $numeroGrupo }}.{{ $loop->iteration }}"
                        value="{{ $sector->id }}" class="sr-only" @click="searchContent($event)" />
                </label>
            </li>
        @endforeach
    </ul>
</div>

<div id="temasSectorGroup" class="py-3" x-show="openTemas" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90"></div>
