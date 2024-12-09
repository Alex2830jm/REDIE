<h3 class="mb-5 text-lg font-medium text-gray-900"> {{ $grupo->nombreGrupo }} </h3>
<div x-data="{
    openTemas: false,
    updateTema(event) {
        const sectorId = event.target.value;
        this.openTemas = false;

        setTimeout(() => {
            $('#temasSectorGroup').load(`{{ route('temasBySector') }}?sector_id=${sectorId}`, () => {
                this.openTemas = true;
            });
        }, 300);
    }
}">

    <div class="grid grid-cols-1 md:grid-cols-7 gap-6">
        @foreach ($sectores as $sector)
            <div>
                <label for="sector_{{ $sector->id }}"
                    class="block cursor-pointer rounded-lg border border-gray-100 bg-white p-4 text-sm font-medium shadow-sm hover:border-gray-200 has-[:checked]:border-{{ $grupo->colorGrupo }}-500 has-[:checked]:ring-1 has-[:checked]:ring-blue-500 transition ease-in-out delay-75 hover:border-2 hover:translate-y-1 hover:scale-110">
                    <div>
                        <p class="text-gray-700">{{ $sector->nombreSector }}</p>
                    </div>
                    <input type="radio" name="sector_id" id="sector_{{ $sector->id }}" value="{{ $sector->id }}"
                        class="sr-only" @click="updateTema($event)">
                </label>
            </div>
        @endforeach
    </div>

    <div id="temasSectorGroup"  x-show="openTemas"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"></div>
</div>