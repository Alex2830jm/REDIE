@foreach ($personas as $persona)
    <div class="flow-root rounded-lg border border-gray-400 py-3 shadow-sm mb-5">
        <dl class="divide-y divide-gray-300 text-sm">
            <div
                class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:gap-4 text-2xl text-center bg-cherry-800 text-white">
                {{ $persona->area }}
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
