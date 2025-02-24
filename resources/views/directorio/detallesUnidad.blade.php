<x-dashboard-layout>
    <div x-data="{}">
        <div class="sm:px-10">
            <div class="container mx-auto p-5 grid grid-cols-1 sm:grid-cols-2">
                <div class="relative flex justify-center">
                    <a href="{{ route('directorio.unidades', $unidad->id) }}"
                        class="w-60 h-60 bg-white shadow rounded-3xl text-gray-700 hover:text-gold-400 p-4 flex flex-col gap-3 hover:shadow-2xl transition-shadow">
                        <div class="flex w-52 h-32 bg-cherry-800 rounded-2xl text-white items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-20 w-20">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                            </svg>
                        </div>
                        <div class="">
                            <p class="font-extrabold text-lg text-center"> {{ $unidad->nombreDI }} </p>
                        </div>
                    </a>
                </div>
                <div class="relative flex flex-col justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-700"> Titutar </h2>
                        <p> ... </p>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-700"> Dirreción </h2>
                        <p class="text-lg text-gray-600"> {{ $unidad->domicilioDI }} </p>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-700"> Teléfono y correo electrónico </h2>
                        <p class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2 text-cherry-800">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                            </svg>
                            <span class="text-lg text-gray-600"> {{ $unidad->numTelefonoDI }} </span>
                        </p>
                        <p class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6 text-cherry-800">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                            <span class="text-lg text-gray-600"> {{ $unidad->correoDI }} </span>
                        </p>
                    </div>
                    <button @click="$dispatch('open-modal', 'editInfoDependecia')"
                        class="cursor-pointer self-end absolute after:content-['Editar_Datos'] after:text-white after:absolute after:text-nowrap after:scale-0 hover:after:scale-100 after:duration-200 w-10 h-10 rounded-full border border-gray-200 bg-gold-400 pointer flex items-center justify-center duration-300 hover:rounded-[50px] hover:w-36 group/button overflow-hidden active:scale-90">
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
        </div>

        <x-modal name="editInfoDependecia" maxWidth="3xl">
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
                <form action="{{ route('directorio.updateInfoDependencia', $unidad->id) }}" method="post">
                    @csrf @method('PUT')
                    <div class="mb-5">
                        <label for="nombreDI" class="block mb-2 text-sm font-medium text-gray-900">Nombre de la
                            dependencia: </label>
                        <input type="text" id="nombreDI" name="nombreDI" value="{{ $unidad->nombreDI }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    </div>

                    <div class="mb-5">
                        <label for="domicilioDI" class="block mb-2 text-sm font-medium text-gray-900">Dirección de la
                            Dependencia: </label>
                        <input type="text" id="domicilioDI" name="domicilioDI"
                            value="{{ $unidad->domicilioDI }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    </div>

                    <div class="mb-5">
                        <label for="correoDI" class="block mb-2 text-sm font-medium text-gray-900">Correo Electrónico de
                            Atención: </label>
                        <input type="text" id="correoDI" name="correoDI" value="{{ $unidad->correoDI }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    </div>

                    <div class="mb-5">
                        <label for="numTelefonoDI" class="block mb-2 text-sm font-medium text-gray-900">Número de
                            Teléfono de Atención: </label>
                        <input type="text" id="numTelefonoDI" name="numTelefonoDI"
                            value="{{ $unidad->correoDI }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    </div>

                    <hr class="border-2 boder-gray-400">
                    <div class="flex mt-2 justify-between">
                        <button type="reset"  @click="$dispatch('close')"
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
    </div>
</x-dashboard-layout>
