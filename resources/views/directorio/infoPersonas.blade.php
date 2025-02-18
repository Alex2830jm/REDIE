@foreach ($personas as $persona)
    <div class="flow-root rounded-lg border border-gray-400 shadow-sm mb-5">
        <dl class="divide-y divide-gray-300 text-sm">
            <div class="flex p-3 bg-cherry-800 even:bg-gray-50 sm:justify-between items-center">
                <span class=" text-base md:text-xl lg:text-2xl text-white mx-auto"> {{ $persona->area }} </span>
                <button value="{{ $persona->id }}" @click="personaContent(event)"
                    class="cursor-pointer relative after:content-['Editar_Datos'] after:text-white after:absolute after:text-nowrap after:scale-0 hover:after:scale-100 after:duration-200 w-10 h-10 rounded-full border border-gray-200 bg-gold-400 pointer flex items-center justify-center duration-300 hover:rounded-[50px] hover:w-36 group/button overflow-hidden active:scale-90">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 delay-50 duration-200 group-hover/button:-translate-y-12 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>


                </button>
            </div>


            <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Nombre de la persona servidora pública
                </dt>
                <dd class="text-gray-700 sm:col-span-2"> {{ $persona->nombrePersona }} </dd>
            </div>

            <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Profesión</dt>
                <dd class="text-gray-700 sm:col-span-2"> {{ $persona->profesion }} </dd>
            </div>

            <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Cargo en dependencia</dt>
                <dd class="text-gray-700 sm:col-span-2"> {{ $persona->cargo }} </dd>
            </div>
            <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Domicilio</dt>
                <dd class="text-gray-700 sm:col-span-2"> {{ $persona->dependencia->domicilioDI }} </dd>
            </div>
            <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Correo Electronico</dt>
                <dd class="text-gray-700 sm:col-span-2 items-center">
                    <span> {{ $persona->correo }} </span>
                    <a href="mailto:{{ $persona->correo }}"
                        class="inline-block items-center justify-center px-1 py-1 text-sm font-medium leading-5 transition-colors duration-150 border border-gray-300 rounded-full hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2"
                        aria-label="Enviar correo">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                    </a>
                </dd>
            </div>

            <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Teléfono</dt>
                <dd class="text-gray-700 sm:col-span-2">
                    <span> {{ $persona->telefono }} </span>
                    <a href="tel:+{{ $persona->telefono }}"
                        class="inline-block items-center justify-center px-1 py-1 text-sm font-medium leading-5 transition-colors duration-150 border border-gray-300 rounded-full hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                        </svg>
                    </a>
                </dd>
            </div>
        </dl>
    </div>
@endforeach


<x-modal name="editInfoPersona" maxWidth="7xl">
    <div class="header my-3 h-12 px-10 flex items-center justify-between">
        <h1 class="font-medium text-2xl">
            Edición de la información de contacto
        </h1>

        <svg x-on:click="$dispatch('close')" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor"
            class="h-6 w-6 cursor-pointer text-2xl font-medium hover:text-red-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
    </div>
    <div class="bg-white shadow-lg rounded-sm border border-gray-200 p-5">
        <form action="{{ route('directorio.updateInfoPersona') }}" method="POST">
            @csrf
            <input type="hidden" name="idPersona" id="idPersona">

            <div class="grid sm:grid-cols-2 gap-4 mb-5">
                <div class='mt-2 sm:col-span-2'>
                    <label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Nombre Completo del
                        Titular</label>
                    <input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='text'
                        name='nombrePersona' id="nombrePersona">
                </div>
                <div class='mt-2 sm:col-span-2'>
                    <label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Profesión del
                        Titular</label>
                    <input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='text'
                        name='profesionPersona' id="profesionPersona">
                </div>

                <div class="mt-2">
                    <label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Área
                        Informante</label>
                    <input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='text'
                        name='areaPersona' value="" id="areaPersona" readonly>
                </div>
                <div class="mt-2">
                    <label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Cargo en el
                        área</label>
                    <input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='text'
                        name='cargoPersona' id="cargoPersona" value=''>
                </div>

                <div class="mt-2">
                    <label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Número de
                        Telefono de
                        Contacto</label>
                    <input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='text'
                        name='telefonoPersona' id="telefonoPersona" value=''>
                </div>
                <div class="mt-2">
                    <label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Correo
                        Electronico de
                        Contacto</label>
                    <input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='email'
                        name='correoPersona' id="correoPersona" value=''>
                </div>
            </div>
            <hr class="border-2 boder-gray-400">
            <div class="flex justify-end mt-5">
                <button type="submit"
                    class="inline-flex items-center px-3 py-2 bg-blue-500 text-white text-sm font-medium rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                    </svg>

                    Guardar Cambios de Información
                </button>
            </div>
        </form>
    </div>
</x-modal>
