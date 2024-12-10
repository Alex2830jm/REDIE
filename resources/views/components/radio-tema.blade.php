<h3 class="mb-5 text-lg font-medium text-gray-900"> Temas: </h3>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @foreach ($temas as $tema)
        {{-- <button type="button" id="tema_{{ $tema->id }}" class="w-full" @click="searchContent($event)">
            <label for="tema_{{ $tema->id }}"
                class="flex cursor-pointer items-center justify-center rounded-md border border-{{ $tema->sector->grupo->colorGrupo }}-200 bg-white px-3 py-2 text-gray-900 hover:border-{{ $tema->sector->grupo->colorGrupo }}-200 has-[:checked]:ring-2 has-[:checked]:ring-{{ $tema->sector->grupo->colorGrupo }}-500 transition ease-in-out delay-75 hover:border-2 hover:translate-y-1 hover:scale-110">
                <p class="text-sm font-medium">{{ $tema->nombreTema }}</p>
            </label>
        </button> --}}
        <x-button-tema id="{{$tema->id}}" color="{{$tema->sector->grupo->colorGrupo}}" tema="{{$tema->nombreTema}}" />
    @endforeach
</div>

<div id="cuadrosEstadisticos" class="py-3" x-show="openCuadroEstadistico" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90"></div>
