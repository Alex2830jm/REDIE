<div class="border-b border-b-gray-200">
    <h2 class="text-xl font-bold text-center">Sectores relacionados con el grupo</h2>
    <ul class="hidden -mb-px sm:flex items-center gap-4 text-sm font-medium">
        @foreach ($sectores as $sector)
            <li class="flex-1">
                <label for="sector_{{ $numeroGrupo }}.{{ $loop->iteration }}"
                    class="curelative flex items-center justify-center gap-2 px-1 py-3 text-gray-500 cursor-pointer hover:text-{{ $sector->padre->colorGrupo }}-400 has-[:checked]:border-b-2 has-[:checked]:border-{{ $sector->padre->colorGrupo }}-500 has-[:checked]:text-{{ $sector->padre->colorGrupo }}-400">
                    {{ $sector->nombreGrupo }}
                    <input type="radio" name="sector_id" id="sector_{{ $numeroGrupo }}.{{ $loop->iteration }}"
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
