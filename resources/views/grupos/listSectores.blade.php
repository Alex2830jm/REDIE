

<h3 class="mb-5 text-lg font-medium text-gray-900">Sectores de: <span class="text-{{$grupoSectores->colorGrupo}}-400">{{ $grupoSectores->nombreGrupo }}</span></h3>

<div class="grid grid-cols-1 md:grid-cols-7 gap-6">
    @foreach ($grupoSectores->secundario as $sector)
        <x-button-sector id="{{$sector->id}}"  color="{{$grupoSectores->colorGrupo}}" nombre="{{$sector->nombreGrupo}}" />
    @endforeach
</div>

<div id="temasSectorGroup" x-show="openTemas" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90"></div>
