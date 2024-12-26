<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @foreach ($sectorTemas->temas as $tema)
        <label for="tema_{{ $tema->id }}_{{$sector}}.{{ $loop->iteration }}"
            class="cursor-pointer items-center justify-center text-center px-4 py-2 text-gray-500 text-sm font-medium rounded-md border border-{{ $sectorTemas->padre->colorGrupo }}-200 bg-white transition ease-in-out delay-75 hover:border hover:border-{{ $sectorTemas->padre->colorGrupo }}-200 has-[:checked]:ring-2 has-[:checked]:ring-{{ $sectorTemas->padre->colorGrupo }}-500 has-[:checked]:text-{{ $sectorTemas->padre->colorGrupo }}-400">
            {{ $tema->nombreGrupo }}
            <input type="radio" name="tema_id" id="tema_{{ $tema->id }}_{{$sector}}.{{ $loop->iteration }}" value="{{ $tema->id }}" class="sr-only"
                @click="searchContent($event)">
        </label>
    @endforeach
</div>

<div id="cuadrosEstadisticos" class="py-3" x-show="openCuadroEstadistico"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"></div>
