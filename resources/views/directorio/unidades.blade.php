<x-dashboard-layout>
    <div class="px-4 my-6 text-2xl font-semibold text-gray-700">
        Direcctorio - {{ $dependencia->nombreDI }}
    </div>
    <div class="sm:pl-10 sm:pr-10" x-data="{
        openUnidad: false,
    
        init() {
            setTimeout(() => {
                $('#infoPersonas').load(`{{ route('directorio.infoPersonas') }}?id={{ $dependencia->id }}`, () => {
                    this.openUnidad = true;
                });
            }, 300);
        },
    
        async searchInfo(event) {
            var button = $(event.currentTarget).attr('id');
            var [type, id] = button.split('_');
            this.openUnidad = false;
            setTimeout(() => {
                $('#infoPersonas').load(`{{ route('directorio.infoPersonas') }}?id=${id}&tipo=${type}`, () => {
                    this.openUnidad = true;
                });
            }, 300);
        },

        async personaContent(event) {
            var idPersona = event.currentTarget.value;
            await $.get(`{{ url('directorio/editInfoPersona/') }}/${idPersona}`, (persona) => {
                $('#idPersona').val(persona.id);
                $('#nombrePersona').val(persona.nombrePersona);
                $('#profesionPersona').val(persona.profesionPersona)
                $('#areaPersona').val(persona.areaPersona);
                $('#cargoPersona').val(persona.cargoPersona);
                $('#telefonoPersona').val(persona.telefonoPersona);
                $('#correoPersona').val(persona.correoPersona)
            });
            $dispatch('open-modal', 'editInfoPersona');
        }
    }">        

        <div class='items-center justify-center'>
            <ul class="mx-auto mb-5 grid max-w-full w-full sm:grid-cols-3 gap-x-5 px-8">
                <li class="">
                    <input class="peer sr-only" type="radio" value="0" name="unidad"
                        id="dependencia_{{ $dependencia->id }}" @click="searchInfo($event)" />
                    <label
                        class="flex justify-center cursor-pointer rounded-full border border-gray-300 bg-white py-2 px-4 hover:bg-gray-50 focus:outline-none peer-checked:border-transparent peer-checked:ring-2 peer-checked:ring-cherry-800 transition-all duration-500 ease-in-out"
                        for="dependencia_{{ $dependencia->id }}">{{ $dependencia->nombreDI }}</label>
                </li>
                @foreach ($dependencia->unidades as $unidad)
                    <li class="">
                        <input class="peer sr-only" type="radio" value="{{ $unidad->id }}" name="unidad"
                            id="unidad_{{ $unidad->id }}" @click="searchInfo($event)" />
                        <label
                            class="flex justify-center cursor-pointer rounded-full border border-gray-300 bg-white py-2 px-4 hover:bg-gray-50 focus:outline-none peer-checked:border-transparent peer-checked:ring-2 peer-checked:ring-cherry-800 transition-all duration-500 ease-in-out"
                            for="unidad_{{ $unidad->id }}">{{ $unidad->nombreDI }}</label>
                    </li>
                @endforeach
            </ul>

            <div x-show="openUnidad" id="infoPersonas" x-transition:enter="transition-all duration-500 ease-in-out"
                x-transition:enter-start="opacity-0 translate-x-40 invisible"
                x-transition:enter-end="opacity-100 translate-x-1 visible"
                x-transition:leave="transition-all duration-500 ease-in-out"
                x-transition:leave-start="opacity-100 translate-x-1 visible"
                x-transition:leave-end="opacity-0 translate-x-40 invisible"
                class="bg-white shadow-lg p-6 border mt-2 rounded-lg mx-auto">

            </div>
        </div>
    </div>
</x-dashboard-layout>
