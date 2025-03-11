<div x-data="{
    listCuadrosEstadisticos: false,

    init() {
        this.listCuadrosEstadisticos = false;
        setTimeout(() => {
            $('#ceByTema').load(`{{ route('cuadrosEstadisticosByTema', ['ce' => $infoSector->temas->first()->id ]) }}`, () => {
                this.listCuadrosEstadisticos = true;
            });
        }, 300);
    },

    async cesByTema(event) {
        var idButton = event.currentTarget.id;
        var value = event.currentTarget.value;

        this.listCuadrosEstadisticos = false;
        setTimeout(() => {
            $('#ceByTema').load(`{{ route('cuadrosEstadisticosByTema', ['ce' => '__TEMA__'] ) }}`.replace('__TEMA__', value), () => {
                this.listCuadrosEstadisticos = true;
            });
        }, 300);
    }
}">

    <h2 class="text-xl font-bold text-center">Temas relacionados con el sector: <span
            class="text-{{ $infoSector->padre->colorGrupo }}-400"> {{ $infoSector->nombreGrupo }} </span> </h2>
    <div class="grid grid-cols-1  md:grid-cols-4 gap-6">
        @foreach ($temas as $tema)
            <label for="tema_{{ $tema->id }}"
                class="cursor-pointer items-center justify-center text-center px-4 py-2 text-gray-500 text-sm font-medium rounded-md border border-{{ $tema->padre->padre->colorGrupo }}-200 bg-white transition ease-in-out delay-75 hover:border hover:border-{{ $tema->padre->padre->colorGrupo }}-200 has-[:checked]:ring-2 has-[:checked]:ring-{{ $tema->padre->padre->colorGrupo }}-500 has-[:checked]:text-{{ $tema->padre->padre->colorGrupo }}-400">
                {{$tema->numGrupo}}.- {{ $tema->nombreGrupo }}
                <input type="radio" name="tema_id" id="tema_{{ $tema->id }}" value="{{ $tema->id }}"
                    class="sr-only" @click="cesByTema($event)">
            </label>
        @endforeach
    </div>

    <div id="ceByTema" class="py-3" x-show="listCuadrosEstadisticos"
        x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="opacity-0 scale-90 translate-y-[-20px]"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-300 transform"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-90 translate-y-[-20px]"></div>
</div>
