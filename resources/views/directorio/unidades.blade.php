<x-dashboard-layout>
    <div class="px-4 my-6 text-2xl font-semibold text-gray-700">
        Direcctorio - {{ $dependencia->nombreDependencia }}
    </div>
    <div class="md:container md:mx-auto">
        {{-- <x-content-unidad numberSteps="{{$dependencia->unidades->count()}}" :collection="$dependencia->unidades"></x-content-unidad> --}}
        <!-- component -->
        <div class='flex items-center justify-center'>
            <ul class="mx-auto grid max-w-full w-full sm:grid-cols-3 gap-x-5 px-8">
                <li class="">
                    <input class="peer sr-only" type="radio" value="0" name="unidad" id="0" />
                    <label
                        class="flex justify-center cursor-pointer rounded-full border border-gray-300 bg-white py-2 px-4 hover:bg-gray-50 focus:outline-none peer-checked:border-transparent peer-checked:ring-2 peer-checked:ring-cherry-800 transition-all duration-500 ease-in-out"
                        for="0">{{ $dependencia->nombreDependencia }}</label>

                    <div
                        class="absolute bg-white shadow-lg left-0  sm:left-56 p-6 border mt-2 border-indigo-300 rounded-lg w-[77vw] mx-auto transition-all duration-500 ease-in-out translate-x-40 opacity-0 invisible peer-checked:opacity-100 peer-checked:visible peer-checked:translate-x-1">
                        <div class="flow-root rounded-lg border border-gray-400 py-3 shadow-sm mb-5">
                            @foreach ($dependencia->personas as $persona)
                                <dl class="-my-3 divide-y divide-gray-300 text-sm">
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
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-5 h-5">
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
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="h-5 w-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                                </svg>
                                            </a>
                                        </dd>
                                    </div>
                                </dl>
                            @endforeach
                        </div>
                    </div>
                </li>
                @foreach ($dependencia->unidades as $unidad)
                    <li class="">
                        <input class="peer sr-only" type="radio" value="{{ $unidad->id }}" name="unidad"
                            id="{{ $unidad->id }}" />
                        <label
                            class="flex justify-center cursor-pointer rounded-full border border-gray-300 bg-white py-2 px-4 hover:bg-gray-50 focus:outline-none peer-checked:border-transparent peer-checked:ring-2 peer-checked:ring-cherry-800 transition-all duration-500 ease-in-out"
                            for="{{ $unidad->id }}">{{ $unidad->nombreUnidad }}</label>

                        <div
                            class="absolute bg-white shadow-lg left-0  sm:left-56 p-6 border mt-2 border-indigo-300 rounded-lg w-[77vw] mx-auto transition-all duration-500 ease-in-out translate-x-40 opacity-0 invisible peer-checked:opacity-100 peer-checked:visible peer-checked:translate-x-1">
                            <div class="flow-root rounded-lg border border-gray-400 py-3 shadow-sm mb-5">
                                @foreach ($unidad->personasUnidad as $persona)
                                    <dl class="-my-3 divide-y divide-gray-300 text-sm">
                                        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                                            <dt class="font-medium text-gray-900">Nombre de la persona servidora pública
                                            </dt>
                                            <dd class="text-gray-700 sm:col-span-2"> {{ $persona->nombrePersona }}
                                            </dd>
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-5 h-5">
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="h-5 w-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                                    </svg>
                                                </a>
                                            </dd>
                                        </div>
                                    </dl>
                                @endforeach
                            </div>
                        </div>
                    </li>
                @endforeach

                {{-- <li class="">
                    <input class="peer sr-only" type="radio" value="no" name="answer" id="no" />
                    <label
                        class="flex justify-center cursor-pointer rounded-full border border-gray-300 bg-white py-2 px-4 hover:bg-gray-50 focus:outline-none peer-checked:border-transparent peer-checked:ring-2 peer-checked:ring-indigo-500 transition-all duration-500 ease-in-out"
                        for="no">About</label>

                    <div
                        class="absolute bg-white shadow-lg left-0 p-6 border mt-2 border-indigo-300 rounded-lg w-[97vw] mx-auto transition-all duration-500 ease-in-out translate-x-40 opacity-0 invisible peer-checked:opacity-100 peer-checked:visible peer-checked:translate-x-1">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, voluptatum! Sequi
                        consequatur error nulla quaerat rem fugit provident tempore nihil a aspernatur ad laboriosam,
                        dolor nisi qui? Esse, mollitia? Nostrum?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, voluptatum! Sequi
                        consequatur error nulla quaerat rem fugit provident tempore nihil a aspernatur ad laboriosam,
                        dolor nisi qui? Esse, mollitia? Nostrum?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, voluptatum! Sequi
                        consequatur error nulla quaerat rem fugit provident tempore nihil a aspernatur ad laboriosam,
                        dolor nisi qui? Esse, mollitia? Nostrum?
                    </div>
                </li>

                <li class="">
                    <input class="peer sr-only" type="radio" value="yesno" name="answer" id="yesno" />
                    <label
                        class="flex justify-center cursor-pointer rounded-full border border-gray-300 bg-white py-2 px-4 hover:bg-gray-50 focus:outline-none peer-checked:border-transparent peer-checked:ring-2 peer-checked:ring-indigo-500 transition-all duration-500 ease-in-out "
                        for="yesno">Something</label>

                    <div
                        class="absolute bg-white shadow-lg left-0 p-6 border mt-2 border-indigo-300 rounded-lg w-[97vw] mx-auto transition-all duration-500 ease-in-out translate-x-40 opacity-0 invisible peer-checked:opacity-100 peer-checked:visible peer-checked:translate-x-1">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, voluptatum! Sequi
                        consequatur error nulla quaerat rem fugit provident tempore nihil a aspernatur ad laboriosam,
                        dolor nisi qui? Esse, mollitia? Nostrum?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, voluptatum! Sequi
                        consequatur error nulla quaerat rem fugit provident tempore nihil a aspernatur ad laboriosam,
                        dolor nisi qui? Esse, mollitia? Nostrum?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, voluptatum! Sequi
                        consequatur error nulla quaerat rem fugit provident tempore nihil a aspernatur ad laboriosam,
                        dolor nisi qui? Esse, mollitia? Nostrum?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, voluptatum! Sequi
                        consequatur error nulla quaerat rem fugit provident tempore nihil a aspernatur ad laboriosam,
                        dolor nisi qui? Esse, mollitia? Nostrum?
                    </div>
                </li> --}}
            </ul>

        </div>
    </div>
</x-dashboard-layout>
