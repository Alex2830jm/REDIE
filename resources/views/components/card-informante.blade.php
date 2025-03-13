@props([
    'collection' => [],
])


<div
    x-data='{
    dataInformante: {},

    async editDatosInformante(event) {
        const idInformante = event.currentTarget.value;
        console.log(idInformante)
        const response = await fetch(`{{ route("unidad.showInformante", ["id" => "__idInformante"]) }}`.replace("__idInformante", idInformante));
        const data = await response.json();
        this.dataInformante = data.informante;

        if(data) {
            console.log(this.dataInformante);
            $dispatch("open-modal", "editDatosInformante");
        }
    },
}'>
    @foreach ($collection as $informantes)
        <div class="flow-root rounded-lg border border-gray-400 shadow-sm mb-5">
            <dl class="divide-y divide-gray-300 text-sm">
                <div class="flex p-3 bg-cherry-800 even:bg-gray-50 sm:justify-between items-center">
                    <span class=" text-base md:text-xl lg:text-2xl text-white mx-auto"> {{ $informantes->areaPersona }}
                    </span>
                    <button value="{{ $informantes->id }}" @click="editDatosInformante(event)"
                        class="cursor-pointer relative after:content-['Editar_Datos'] after:text-white after:absolute after:text-nowrap after:scale-0 hover:after:scale-100 after:duration-200 w-10 h-10 rounded-full border border-gray-200 bg-gold-400 pointer flex items-center justify-center duration-300 hover:rounded-[50px] hover:w-36 group/button overflow-hidden active:scale-90">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor"
                            class="w-5 delay-50 duration-200 group-hover/button:-translate-y-12 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </button>
                </div>


                <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Nombre de la persona servidora pública
                    </dt>
                    <dd class="text-gray-700 sm:col-span-2"> {{ $informantes->nombrePersona }} </dd>
                </div>

                <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Profesión</dt>
                    <dd class="text-gray-700 sm:col-span-2"> {{ $informantes->profesionPersona }} </dd>
                </div>

                <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Cargo en dependencia</dt>
                    <dd class="text-gray-700 sm:col-span-2"> {{ $informantes->cargoPersona }} </dd>
                </div>
                <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Domicilio</dt>
                    <dd class="text-gray-700 sm:col-span-2"> {{ $informantes->dependencia->domicilioDI }} </dd>
                </div>
                <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Correo Electronico</dt>
                    <dd class="text-gray-700 sm:col-span-2 items-center">
                        <span> {{ $informantes->correoPersona }} </span>
                    </dd>
                </div>

                <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Teléfono</dt>
                    <dd class="text-gray-700 sm:col-span-2">
                        <span> {{ $informantes->dependencia->numTelefonoDI }} ext
                            {{ $informantes->telefonoPersona }}</span>
                    </dd>
                </div>
            </dl>
        </div>
    @endforeach

    <x-modal name="editDatosInformante" maxWidth="5xl">
        <div class="header my-3 h-12 px-10 flex items-center justify-between">
            <h1 class="font-medium text-2xl">
                Edición de la información de contacto <span x-text="dataInformante.nombrePersona"></span>
            </h1>

            <svg x-on:click="$dispatch('close')" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor"
                class="h-6 w-6 cursor-pointer text-2xl font-medium hover:text-red-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </div>
        <div class="bg-white shadow-lg rounded-sm border border-gray-200 p-5">
            <form action="{{ route('unidad.updateInformante') }}" method="POST">
                @csrf
                <input type="hidden" name="idPersona" x-model="dataInformante.id">

                <div class="mb-5">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900"> Nombre Completo
                        del Titular: </label>
                    <input type="text" id="nombrePersona" name="nombrePersona" x-model="dataInformante.nombrePersona"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900"> Profesión del
                        Titular </label>
                    <input type="text" id="profesionPersona" name="profesionPersona" x-model="dataInformante.profesionPersona"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>

                <div class="flex">
                    <div class="mb-5 mr-2 w-full sm:w-1/2">
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900"> Área
                            Informante: </label>
                        <input type="text" id="areaPersona" name="areaPersona" x-model="dataInformante.areaPersona"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            readonly>
                    </div>

                    <div class="mb-5 w-full sm:w-1/2">
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900"> Cargo en el
                            Área: </label>
                        <input type="text" id="cargoPersona" name="cargoPersona" x-model="dataInformante.cargoPersona"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                </div>

                <div class="flex">
                    <div class="mb-5 mr-2 w-full sm:w-1/2">
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900"> Número de
                            Teléfono de Contacto: </label>
                        <input type="text" id="telefonoPersona" name="telefonoPersona" x-model="dataInformante.telefonoPersona"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>

                    <div class="mb-5 w-full sm:w-1/2">
                        <label for="correoPersona" class="block mb-2 text-sm font-medium text-gray-900"> Correo
                            Electrónico de Contacto: </label>
                        <input type="text" id="correoPersona" name="correoPersona" x-model="dataInformante.correoPersona"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                </div>
                <hr class="border-2 boder-gray-400">
                <div class="flex justify-end mt-5">
                    <button type="submit"
                        class="inline-flex items-center px-3 py-2 bg-blue-500 text-white text-sm font-medium rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="h-6 w-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                        </svg>

                        Guardar Cambios de Información
                    </button>
                </div>
            </form>
        </div>
    </x-modal>
</div>
