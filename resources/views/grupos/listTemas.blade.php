<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @foreach ($sectorTemas->secundario as $tema)
        <x-button-tema id="{{$tema->id}}" color="{{$sectorTemas->principal->colorGrupo}}" tema="{{$tema->nombreGrupo}}" />
    @endforeach
</div>

<div id="cuadrosEstadisticos" class="py-3" x-show="openCuadroEstadistico" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90"></div>
