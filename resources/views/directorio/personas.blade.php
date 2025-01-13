<div class="overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            {{-- <tr>
                <th scope="col" colspan="4" class="px-4 py-3" x-text="collection[step - 1].nombreArea"></th>
            </tr> --}}
            <tr>
                <th scope="col" class="px-4 py-3">Nombre de la Persona Servidora Pública</th>
                <th scope="col" class="px-4 py-3">Profesión</th>
                <th scope="col" class="px-4 py-3">Cargo</th>
                <th scope="col" class="px-4 py-3">
                    <span class="sr-only">Actions</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($personas as $persona)
                <tr class="border-b border-gray-400">
                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                        {{ $persona->nombrePersona}}
                    </th>
                    <td class="px-4 py-3">
                        {{ $persona->profesion }}
                    </td>
                    <td class="px-4 py-3">
                        {{ $persona->cargo }}
                    </td>
                    <td class="px-4 py-3 flex items-center justify-end">
                        <button @click="open === 1 ? open = null : open = 1"
                            class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </button>
                    </td>
                </tr>    
            @endforeach
            <tr x-show="open === 1" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform -translate-y-4"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform -translate-y-4">
                <td colspan="4">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-base/7 font-semibold text-gray-900">Información de la
                            persona servidora pública</h3>
                    </div>
                    <div class="mt-2 border-t border-gray-100">
                        <dl class="divide-y divide-x-reverse divide-gray-300">
                            <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm/6 font-medium text-gray-900">Nombre</dt>
                                <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                                    Margot Foster</dd>
                            </div>
                            <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm/6 font-medium text-gray-900">Profesión</dt>
                                <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                                    Backend Developer</dd>
                            </div>
                            <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm/6 font-medium text-gray-900">Domicilio</dt>
                                <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                                    margotfoster@example.com</dd>
                            </div>
                            <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm/6 font-medium text-gray-900">No. Teléfono
                                </dt>
                                <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                                    $120,000</dd>
                            </div>
                            <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm/6 font-medium text-gray-900">Correo
                                    Eléctronico</dt>
                                <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                                    alguien@mail.com
                                </dd>
                            </div>
                        </dl>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>