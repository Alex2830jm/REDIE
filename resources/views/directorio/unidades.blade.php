<x-dashboard-layout>
    <div x-data="{
        openListUnidades: false,
        openInformantes: true,
    
        async contentUnidades(event) {
            this.openInformantes = false;
    
            const unidadId = event.currentTarget.id;
            $('#showInformantes').empty();
    
            setTimeout(() => {
                $('#showInformantes').load(`{{ route('unidad.show') }}?unidad_id=${unidadId}`);
                this.openInformantes = true;
            }, 1000);
    
            await $.get(`{{ route('unidad.edit') }}??unidad_id=${unidadId}`, (dependencia) => {
                $('#nombreDI').html(dependencia.nombreDI);
                $('#domicilioDI').html(dependencia.domicilioDI);
                $('#numTelefonoDI').html(dependencia.numTelefonoDI);
                $('#correoDI').html(dependencia.correoDI);
    
                $('#id_di').val(dependencia.id);
                $('#nombreDIEdit').val(dependencia.nombreDI);
                $('#domicilioDIEdit').val(dependencia.domicilioDI);
                $('#numTelefonoDIEdit').val(dependencia.numTelefonoDI);
                $('#correoDIEdit').val(dependencia.correoDI);
            });
    
        },
    }">

        <div class="sm:px-10">
            <div class="container mx-auto p-5 grid grid-cols-1 sm:grid-cols-2">
                <div class="relative flex justify-center">
                    <div
                        class="w-60 h-60 bg-white shadow rounded-3xl text-gray-700 hover:text-gold-400 p-4 flex flex-col gap-3 hover:shadow-2xl transition-shadow">
                        <div class="flex w-52 h-32 bg-cherry-800 rounded-2xl text-white items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-20 w-20">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                            </svg>
                        </div>
                        <div class="">
                            <p class="font-extrabold text-lg text-center" id="nombreDI"> {{ $dependencia->nombreDI }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="relative flex flex-col justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900"> Titutar </h2>
                        <p class="text-lg text-gray-800 font-bold">
                            {{ $dependencia->personasInformantes->where('areaPersona', 'Titular')->first()->nombrePersona }}
                        </p>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-700"> Domiclio </h2>
                        <p class="text-lg text-gray-600" id="domicilioDI"> {{ $dependencia->domicilioDI }} </p>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-700"> Teléfono y correo electrónico </h2>
                        <p class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2 text-cherry-800">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                            </svg>
                            <span class="text-lg text-gray-600" id="numTelefonoDI"> {{ $dependencia->numTelefonoDI }}
                            </span>
                        </p>
                        <p class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6 text-cherry-800">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                            <span class="text-lg text-gray-600" id="correoDI"> {{ $dependencia->correoDI }} </span>
                        </p>
                    </div>
                    <button @click="$dispatch('open-modal', 'editInfoDependecia')"
                        class="cursor-pointer self-end absolute after:content-['Editar_Datos_de_Dependencia'] after:text-white after:absolute after:text-nowrap after:scale-0 hover:after:scale-100 after:duration-200 w-10 h-10 rounded-full border border-gray-200 bg-gold-400 pointer flex items-center justify-center duration-300 hover:rounded-[50px] hover:w-56 group/button overflow-hidden active:scale-90">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor"
                            class="w-5 delay-50 duration-200 group-hover/button:-translate-y-12 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="mt-2 bg-cherry-800 text-center text-white text-xl font-bold">Unidades Generadoras de Información
            </div>
            <div class="flex px-4 py-3 xl:hidden">
                <button x-cloak @click="openListUnidades = !openListUnidades"
                    class="text-cherry-800 focus:outline-none">
                    <svg x-show="!openListUnidades" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                    </svg>

                    <svg x-show="openListUnidades" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex">
                <div x-cloak
                    :class="[openListUnidades ? 'translate-x-0 opacity-100 sm:w-96' : 'opacity-0 -translate-x-full sm:w-96']"
                    class="absolute inset-x-0 z-20 px-6 py-4 bg-gray-50 w-full transition-all duration-300 ease-in-out xl:relative xl:w-1/4 xl:opacity-100 xl:translate-x-0">
                    <ul class="space-y space-y-6 font-medium text-gray-500 md:me-4 mb-4 md:mb-0">
                        <li id="{{ $dependencia->id }}" @click="contentUnidades(event)"
                            class="flex items-center p-4 mb-4 border-l-8 border-cherry-800 bg-white shadow transition ease-in-out delay-75 hover:translate-y-1 hover:scale-100 hover:bg-brown-100">
                            <div class="ms-3 text-sm font-medium">
                                {{ $dependencia->nombreDI }}
                            </div>
                        </li>
                        @foreach ($dependencia->unidades as $unidad)
                            <li id="{{ $unidad->id }}" @click="contentUnidades(event)"
                                class="flex items-center p-4 mb-4 border-l-8 border-cherry-800 bg-white shadow transition ease-in-out delay-75 hover:translate-y-1 hover:scale-100 hover:bg-brown-100">
                                <div class="ms-3 text-sm font-medium">
                                    {{ $unidad->nombreDI }}
                                </div>
                            </li>
                        @endforeach
                        <li x-on:click="$dispatch('open-modal', 'agregar-unidad')"
                            class="flex items-center p-4 mb-4 border-l-8 border-cherry-800 bg-white shadow transition ease-in-out delay-75 hover:translate-y-1 hover:scale-100 hover:bg-brown-50/20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            <span class="ms-3 text-sm font-medium">
                                Agregar Unidad Informativa
                            </span>
                        </li>
                    </ul>
                </div>
                <div id="showInformantes" x-show="openInformantes"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                    class="p-6 bg-gray-50 text-medium text-gray-500 rounded-lg w-full xl:w-3/4">
                    <x-card-informante :collection="$informantes" />
                </div>
            </div>
        </div>

        <x-modal name="editInfoDependecia" maxWidth="5xl">
            <div class="header my-3 h-12 px-10 flex items-center justify-between">
                <h1 class="font-medium text-2xl">
                    Edición de la información de la dependencia
                </h1>

                <svg x-on:click="$dispatch('close')" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    class="h-6 w-6 cursor-pointer text-2xl font-medium hover:text-red-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </div>
            <div class="bg-white shadow-lg rounded-sm border border-gray-200 p-5">
                <form action="{{ route('dependencia.update') }}" method="post">
                    @csrf

                    <input type="hidden" name="id_di" value="{{ $dependencia->id }}" id="id_di">

                    <div class="mb-5">
                        <label for="nombreDI" class="block mb-2 text-sm font-medium text-gray-900">Nombre de la
                            dependencia: </label>
                        <input type="text" id="nombreDIEdit" name="nombreDI"
                            value="{{ $dependencia->nombreDI }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    </div>

                    <div class="mb-5">
                        <label for="domicilioDI" class="block mb-2 text-sm font-medium text-gray-900">Dirección de la
                            Dependencia: </label>
                        <input type="text" id="domicilioDIEdit" name="domicilioDI"
                            value="{{ $dependencia->domicilioDI }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    </div>

                    <div class="mb-5">
                        <label for="correoDI" class="block mb-2 text-sm font-medium text-gray-900">Correo Electrónico
                            de
                            Atención: </label>
                        <input type="text" id="correoDIEdit" name="correoDI"
                            value="{{ $dependencia->correoDI }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    </div>

                    <div class="mb-5">
                        <label for="numTelefonoDI" class="block mb-2 text-sm font-medium text-gray-900">Número de
                            Teléfono de Atención: </label>
                        <input type="text" id="numTelefonoDIEdit" name="numTelefonoDI"
                            value="{{ $dependencia->correoDI }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    </div>

                    <hr class="border-2 boder-gray-400">
                    <div class="flex mt-2 justify-between">
                        <button type="reset" @click="$dispatch('close')"
                            class="inline-flex items-center px-3 py-2 bg-red-500 text-white text-sm font-medium rounded-md">

                            Cancelar
                        </button>

                        <button type="submit"
                            class="inline-flex items-center px-3 py-2 bg-blue-500 text-white text-sm font-medium rounded-md">

                            Guardar Cambios de Información
                        </button>
                    </div>
                </form>
            </div>
        </x-modal>

        <x-modal name="agregar-unidad" maxWidth="5xl">
            <div class="header my-3 h-12 px-10 flex items-center justify-between">
                <h1 class="font-medium text-2xl">
                    Agregar Unidad Informativa a {{ $dependencia->nombreDI }}
                </h1>

                <svg x-on:click="$dispatch('close')" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    class="h-6 w-6 cursor-pointer text-2xl font-medium hover:text-red-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </div>

            <div class="bg-white shadow-lg rounded-sm border border-gray-200 p-5">
                <form action="{{ route('unidad.addUnidad', $dependencia->id) }}" method="POST">
                    @csrf
                    <input type="text" name="di_id" value="{{ $dependencia->id }}" hidden>

                    <div class="flex flex-wrap mb-5 gap-y-2">
                        <div class="w-full md:w-3/12">
                            <label for="numDI" class="block mb-2 text-sm font-medium text-gray-900">
                                Número de Dependencia
                            </label>
                            <input type="text" value="{{ $dependencia->numDI }}" id="numDI"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                readonly>
                        </div>
                        <div class="w-full md:w-9/12">
                            <label for="di_nombreDI" class="block mb-2 text-sm font-medium text-gray-900">
                                Dependencia a integrarse
                            </label>
                            <input type="text" value="{{ $dependencia->nombreDI }}" id="di_nombreDI"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                readonly />
                        </div>
                    </div>

                    <div class="flex flex-wrap mb-5">
                        <div class="w-full md:w-3/12">
                            <label for="numDI_U" class="block mb-2 text-sm font-medium text-gray-900">
                                Número de la Unidad
                            </label>
                            <input type="number" name="numDI_U" id="numDI_U"
                                value="{{ $dependencia->unidades->isEmpty() ? $dependencia->numDI : $dependencia->numDI . '.' . ($dependencia->unidades->count() + 1) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="w-full md:w-9/12">
                            <label for="nombreDI_U" class="block mb-2 text-sm font-medium text-gray-900">
                                Nombre de la Unidad Informativa
                            </label>
                            <input type="text" name="nombreDI_U" id="nombreDI_U"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="domicilioDI_U" class="block mb-2 text-sm font-medium text-gray-900">
                            Domicilio de la Unidad Informativa
                        </label>
                        <input type="text" name="domicilioDI_U" id="domicilioDI_U"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>

                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div class="mb-5 col-span-2 md:col-span-1">
                            <label for="correoDI_U" class="bloc mb-2 text-sm font-medium text-gray-900">
                                Correo Electronico de Contacto de la Unidad
                            </label>
                            <input type="text" name="correoDI_U" id="correoDI_U"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>

                        <div class="mb-5 col-span-2 md:col-span-1">
                            <label for="numTelefonoDI_U" class="bloc mb-2 text-sm font-medium text-gray-900">
                                Número Teléfonico de Contacto de la Unidad
                            </label>
                            <input type="text" name="numTelefonoDI_U" id="numTelefonoDI_U"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                    </div>

                    <hr class="border-gray-400 border-2">
                    <div class="flex justify-between mt-3">
                        <button type="reset" x-on:click="$dispatch('close')"
                            class="inline-flex justify-between items-center px-3 py-2 bg-red-500 text-white text-sm font-medium rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                            <span>Cancelar</span>
                        </button>

                        <button type="submit"
                            class="inline-flex items-center justify-between px-3 py-2 bg-green-500 text-white text-sm font-medium rounded-md">
                            <span>Guardar Datos de Unidad</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>

                        </button>
                    </div>
                </form>
            </div>
        </x-modal>
    </div>
</x-dashboard-layout>
