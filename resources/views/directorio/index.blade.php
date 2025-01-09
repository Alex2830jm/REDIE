<x-dashboard-layout>
    <div class="md:container md:mx-auto">
        {{-- <div x-data="{
            openDependencia: false,
            openModalDirectorio: false,
        }">
            <div class="px-4 my-6 text-2xl font-semibold text-gray-700">
                Direcctorio de la Secretaría de Educación
            </div>
            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-sm text-gray-200 uppercase bg-cherry-800">
                        <tr>
                            <th scope="col" colspan="6" class="text-center py-2">
                                Tema: {{ $tema->nombreGrupo }}
                                <hr class="border border-gold-400">
                            </th>
                        </tr>
                        <tr>
                            <th scope="col" class="px-6 py-6">#</th>
                            <th scope="col" class="px-6 py-6">Nombre</th>
                            <th scope="col" class="px-6 py-6">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                        @foreach ($cuadros_estadisticos as $ce)
                            <!-- Fila principal -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-6 font-normal text-gray-700">{{ $ce->numeroCE }}</td>
                                <td class="px-6 py-4 font-normal text-gray-900">{{ $ce->nombreCuadroEstadistico }}</td>
                                <td class="px-6 py-4">
                                    <div class="group relative">
                                        <button id="ce_{{ $ce->id }}" @click="searchContent($event)"
                                            class="bg-blue-600 text-white px-4 py-2 rounded-lg focus:outline-none focus:ring">
                                            <svg x-bind:class="openHistorialArchivos === {{ $ce->id }} ? 'rotate-180' : ''"
                                                class="w-5 h-5 transform transition-transform duration-300" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
            
                            <!-- Fila para contenido del acordeón -->
                            <tr id="{{ $ce->id }}" x-show="openHistorialArchivos === '{{ $ce->id }}'"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform -translate-y-4"
                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100 transform translate-y-0"
                                x-transition:leave-end="opacity-0 transform -translate-y-4">
                                <td colspan="3" class="p-4 bg-gray-50">
                                    <div id="archivosCE_{{ $ce->id }}" class="flex justify-center items-center">
                                        <!-- Contenido dinámico aquí -->
                                        Contenido cargando para ID: {{ $ce->id }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div> --}}
        <div x-data="{
            open: null,
        
            currentStep: 1,
            totalSteps: 5,
            next() {
                if (this.currentStep < this.totalSteps) {
                    this.currentStep++;
                }
            },
            back() {
                if (this.currentStep > 1) {
                    this.currentStep--;
                }
            },
            reset() {
                this.currentStep = 1;
            },
        }" class="p-4 mt-5 bg-white rounded-lg shadow-md">
            <div class="px-4 my-6 text-2xl font-semibold text-gray-700">
                Direcctorio - Secretaría de Seguridad
            </div>
            <!-- Stepper Nav -->
            <ul class="items-center w-full space-y-4 sm:flex sm:space-x-8 sm:space-y-0">
                <template x-for="step in totalSteps" :key="step">
                    <li :class="{ 'flex items-center gap-x-2 shrink basis-0 flex-1 group': true }" class="">
                        <span
                            :class="{
                                'flex items-center justify-center w-8 h-8 rounded-full shrink-0 border': true,
                                'border-gray-200': currentStep < step,
                                'border-blue-500': currentStep === step,
                                'border-gray-200': currentStep > step
                            }"
                            x-text="step"></span>
                        <span
                            :class="{
                                'text-gray-700': currentStep < step,
                                'text-blue-500': currentStep === step,
                                'text-gray-700': currentStep > step,
                            }">
                            <h3 class="font-medium leading-tight">User info</h3>
                            <p class="text-sm">Step details here</p>
                        </span>
                    </li>
                </template>
            </ul>

            <!-- Stepper Content -->
            <div class="mt-5 sm:mt-8">
                <template x-if="currentStep === 1">
                    <div class="p-4 bg-gray-50 border border-dashed border-gray-200 rounded-xl">
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
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
                                    <tr class="border-b border-gray-400">
                                        <th scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                            Apple iMac 27&#34;</th>
                                        <td class="px-4 py-3">PC</td>
                                        <td class="px-4 py-3">Apple</td>
                                        <td class="px-4 py-3 flex items-center justify-end">
                                            <button @click="open === 1 ? open = null : open = 1"
                                                class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none ">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="h-5 w-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
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
                                    <tr class="border-b border-gray-400">
                                        <th scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                            Apple iMac 20&#34;</th>
                                        <td class="px-4 py-3">PC</td>
                                        <td class="px-4 py-3">Apple</td>
                                        <td class="px-4 py-3 flex items-center justify-end">
                                            <button @click="open === 2 ? open = null : open = 2"
                                                class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none "
                                                type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="h-5 w-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                            </button>
                                            <div id="apple-imac-20-dropdown"
                                                class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow ">
                                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                    aria-labelledby="apple-imac-20-dropdown-button">
                                                    <li>
                                                        <a href="#"
                                                            class="block py-2 px-4 hover:bg-gray-100">Show</a>
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            class="block py-2 px-4 hover:bg-gray-100">Edit</a>
                                                    </li>
                                                </ul>
                                                <div class="py-1">
                                                    <a href="#"
                                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr x-show="open === 2" x-transition:enter="transition ease-out duration-300"
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
                                    <tr class="border-b border-gray-400">
                                        <th scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                            Apple iPhone 14</th>
                                        <td class="px-4 py-3">Phone</td>
                                        <td class="px-4 py-3">Apple</td>
                                        <td class="px-4 py-3 flex items-center justify-end">
                                            <button id="apple-iphone-14-dropdown-button"
                                                data-dropdown-toggle="apple-iphone-14-dropdown"
                                                class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none "
                                                type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="h-5 w-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                            </button>
                                            <div id="apple-iphone-14-dropdown"
                                                class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow ">
                                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                    aria-labelledby="apple-iphone-14-dropdown-button">
                                                    <li>
                                                        <a href="#"
                                                            class="block py-2 px-4 hover:bg-gray-100">Show</a>
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            class="block py-2 px-4 hover:bg-gray-100">Edit</a>
                                                    </li>
                                                </ul>
                                                <div class="py-1">
                                                    <a href="#"
                                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-400">
                                        <th scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                            Apple iPad Air</th>
                                        <td class="px-4 py-3">Tablet</td>
                                        <td class="px-4 py-3">Apple</td>
                                        <td class="px-4 py-3 flex items-center justify-end">
                                            <button id="apple-ipad-air-dropdown-button"
                                                data-dropdown-toggle="apple-ipad-air-dropdown"
                                                class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none "
                                                type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="h-5 w-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                            </button>
                                            <div id="apple-ipad-air-dropdown"
                                                class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow ">
                                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                    aria-labelledby="apple-ipad-air-dropdown-button">
                                                    <li>
                                                        <a href="#"
                                                            class="block py-2 px-4 hover:bg-gray-100">Show</a>
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            class="block py-2 px-4 hover:bg-gray-100">Edit</a>
                                                    </li>
                                                </ul>
                                                <div class="py-1">
                                                    <a href="#"
                                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </template>

                <template x-if="currentStep === 2">
                    <div
                        class="p-4 h-48 bg-gray-50 flex justify-center items-center border border-dashed border-gray-200 rounded-xl">
                        <h3 class="text-gray-500 dark:text-neutral-400">Second content</h3>
                    </div>
                </template>

                <template x-if="currentStep === 3">
                    <div
                        class="p-4 h-48 bg-gray-50 flex justify-center items-center border border-dashed border-gray-200 rounded-xl">
                        <h3 class="text-gray-500 dark:text-neutral-400">Third content</h3>
                    </div>
                </template>

                <!-- Button Group -->
                <div class="mt-5 flex justify-between items-center gap-x-2">
                    <button @click="back" :disabled="currentStep === 1"
                        class="py-2 px-3 inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m15 18-6-6 6-6"></path>
                        </svg>
                        Back
                    </button>

                    <button @click="next" :disabled="currentStep === totalSteps"
                        class="py-2 px-3 inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Next
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </button>

                    <button @click="reset" x-show="currentStep === totalSteps"
                        class="py-2 px-3 inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-transparent bg-teal-600 text-white hover:bg-teal-700 focus:outline-none focus:bg-teal-700">
                        Reset
                    </button>
                </div>
            </div>
        </div>

    </div>
</x-dashboard-layout>
