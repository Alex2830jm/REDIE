<x-dashboard-layout>
    <div x-data="{
        openDependencias: false,
        dependencias: {{ json_encode($dependencias) }},
        listDependencias: [],
    
        init() {
            this.listDependencias = this.dependencias.filter(dependencia => dependencia.tipoDI === 'Estatal');
            this.openDependencias = true;
        },
    
        async searchDependencia(event) {
            this.openDependencias = false;
            const type = event.currentTarget.id;
            setTimeout(() => {
                this.listDependencias = this.dependencias.filter(dependencia => dependencia.tipoDI === type);
                console.log(this.listDependencias);
                this.openDependencias = true;
            }, 1000);
        }
    }">
        <div class="sm:pr-10 sm:pl-10">
            <div class="flex px-4 my-6 justify-between">
                <h2 class="text-xl font-semibold text-gray-700">
                    Dependencias Informativas
                </h2>
                {{-- @can('directorio.agregarDI')
                <a href="{{ route('dependencia.create') }}"
                    class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-500 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-600 focus:outline-none focus:shadow-outline-purple">
                    <span>Agregar dependencia</span>
                    <svg class="w-4 h-4 ml-2 -mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </a>
                @endcan  --}}
            </div>

            <ul class="hidden text-sm font-medium text-center text-gray-500 rounded-lg shadow sm:flex">
                <li class="w-full focus-within:z-10">
                    <button value="Estatal" id="Estatal" @click="searchDependencia($event)"
                        class="inline-block w-full p-4 bg-white border-r border-gray-200 hover:text-gray-700 rounded-s-lg hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none">Dependencias
                        Estatales</button>
                </li>
                <li class="w-full focus-within:z-10">
                    <button value="Federal" id="Federal" @click="searchDependencia($event)"
                        class="inline-block w-full p-4 bg-white border-r border-gray-200 hover:text-gray-700 rounded-r-lg hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none">Dependencias
                        Federales</button>
                </li>
            </ul>

            <div x-show="openDependencias" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90">
                <template x-if="listDependencias.length > 0">
                    <div class="mt-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                        <template x-for="dependencia in listDependencias" :key="dependencia.id">
                            <div class="flex justify-center">
                                @can('directorio.showDI')
                                    <a :href="`{{ route('dependencia.listUnidades', '') }}/${dependencia.id}`"
                                        class="w-60 h-60 bg-white shadow rounded-3xl text-gray-700 hover:text-gold-400 p-4 flex flex-col gap-3 hover:shadow-2xl transition-shadow">
                                        <div
                                            class="flex w-52 h-32 bg-cherry-800 rounded-2xl text-white items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="h-20 w-20">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                                            </svg>
                                        </div>
                                        <div class="">
                                            <p class="font-extrabold text-lg text-center" x-text="dependencia.nombreDI">
                                            </p>
                                        </div>
                                    </a>
                                @endcan
                            </div>
                        </template>
                    </div>
                </template>
            </div>

        </div>
    </div>
</x-dashboard-layout>
