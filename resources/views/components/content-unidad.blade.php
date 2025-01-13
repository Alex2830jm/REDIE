@props(['numberSteps', 'collection' => []])

<div x-data="{
    open: null,
    openInfoPersona: null,

    currentStep: 1,
    totalSteps: {{ $numberSteps }},
    collection: {{ json_encode($collection) }},

    async infoPersona(event) {
        var button = event.currentTarget;
        var id = button.getAttribute('id');
        this.openInfoPersona = this.openInfoPersona === id ? null : id,
            setTimeout(async () => {
                $('#details_' + id).load(`{{ route('directorio.persona') }}?persona_id=${id}`, () => {
                    console.log(id);
                    this.openInfoPersona = true;
                });
            }, 300);
    },

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

    <!-- Stepper Nav -->
    <ul class="items-center w-full space-y-4 sm:flex sm:space-x-8 sm:space-y-0">
        <template x-for="step in totalSteps" :key="step">
            <li :class="{ 'flex items-center gap-x-2 shrink basis-0 flex-1 group': true }" class="">
                <span
                    :class="{
                        'flex items-center justify-center w-8 h-8 rounded-full shrink-0 border': true,
                        'border-gray-200': currentStep < step,
                        'border-blue-500 text-blue-500': currentStep === step,
                        'border-gray-200': currentStep > step
                    }"
                    x-text="step"></span>
                <span
                    :class="{
                        'text-gray-700': currentStep < step,
                        'text-blue-500': currentStep === step,
                        'text-gray-700': currentStep > step,
                    }">
                    <h3 class="font-medium leading-tight" x-text="collection[step - 1].nombreArea"></h3>
                </span>
            </li>
        </template>
    </ul>

    <!-- Stepper Content -->
    <div class="mt-5 sm:mt-8">
        <template x-for="step in totalSteps">
            <template x-if="currentStep === step">
                <div class="p-4 bg-gray-50 border border-dashed border-gray-200 rounded-xl" :id="'list_' + step">
                    <div class="overflow-x-auto">
                        <template x-for="persona in collection[step - 1].personas" :key="persona.id">
                            <div class="flow-root rounded-lg border border-gray-400 py-3 shadow-sm mb-5">
                                <dl class="-my-3 divide-y divide-gray-300 text-sm">
                                    <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                                        <dt class="font-medium text-gray-900">Nombre de la persona servidora pública
                                        </dt>
                                        <dd class="text-gray-700 sm:col-span-2" x-text="persona.nombrePersona"></dd>
                                    </div>

                                    <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                                        <dt class="font-medium text-gray-900">Profesión</dt>
                                        <dd class="text-gray-700 sm:col-span-2" x-text="persona.profesion"></dd>
                                    </div>

                                    <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                                        <dt class="font-medium text-gray-900">Cargo en dependencia</dt>
                                        <dd class="text-gray-700 sm:col-span-2" x-text="persona.cargo"></dd>
                                    </div>

                                    <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                                        <dt class="font-medium text-gray-900">Correo Electronico</dt>
                                        <dd class="text-gray-700 sm:col-span-2 items-center">
                                            <span x-text="persona.correo"></span>
                                            <a :href="`mailto:${persona.correo}`"
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
                                            <span x-text="persona.telefono"></span>
                                            <a :href="`tel:+${persona.telefono}`"
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
                            </div>
                            {{-- <div class="flow-root rounded-lg border border-gray-100 py-3 shadow-sm">
                                <dl class="-my-3 divide-y divide-gray-100 text-sm">
                                    <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                                        <dt class="font-medium text-gray-900">Nombre de la persona servidora pìblica
                                        </dt>
                                        <dd class="text-gray-700 sm:col-span-2" x-text="persona.nombrePersona"></dd>
                                    </div>

                                    <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                                        <dt class="font-medium text-gray-900">Profesión</dt>
                                        <dd class="text-gray-700 sm:col-span-2" x-text="persona.profesion"></dd>
                                    </div>

                                    <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                                        <dt class="font-medium text-gray-900">Cargo en dependencia</dt>
                                        <dd class="text-gray-700 sm:col-span-2" x-text="persona.cargo"></dd>
                                    </div>

                                    <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                                        <dt class="font-medium text-gray-900">Correo Electronico</dt>
                                        <dd class="text-gray-700 sm:col-span-2" x-text="persona.correo"></dd>
                                    </div>

                                    <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                                        <dt class="font-medium text-gray-900">Teléfono</dt>
                                        <dd class="text-gray-700 sm:col-span-2" x-text="persona.telefono"></dd>
                                    </div>
                                </dl>
                            </div> --}}
                        </template>
                    </div>
                </div>
            </template>
        </template>


        <!-- Button Group -->
        <div class="mt-5 flex justify-between items-center gap-x-2">
            <button @click="back" :disabled="currentStep === 1"
                class="py-2 px-3 inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="m15 18-6-6 6-6"></path>
                </svg>
                Anterior
            </button>

            <button @click="next" :disabled="currentStep === totalSteps"
                class="py-2 px-3 inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                Siguiente
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6"></path>
                </svg>
            </button>
        </div>
    </div>
</div>
