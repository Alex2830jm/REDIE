<x-dashboard-layout>
    <div x-data="{
        openDependencias: false,

        init() {
            setTimeout(() => {
                $('#listDependencias').load(`{{ route('dependencia.index')}}?type=Estatal`, () => {
                    this.openDependencias = true;
                });
            }, 300);
        },

        async searchDependencia(event) {
            this.openDependencias = false;
            var type = $(event.currentTarget).attr('id');
            setTimeout(() => {
                $('#listDependencias').load(`{{ route('dependencia.index')}}?type=${type}`, () => {
                    this.openDependencias = true;
                });
            }, 300);
        }
    }">
        <div class="sm:pr-10 sm:pl-10">
            <div class="flex px-4 my-6 justify-between">
                <h2 class="text-xl font-semibold text-gray-700">
                    Dependencias
                </h2>
                @can('directorio.agregarDI')
                <a href="{{ route('dependencia.create') }}"
                    class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-500 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-600 focus:outline-none focus:shadow-outline-purple">
                    <span>Agregar dependencia</span>
                    <svg class="w-4 h-4 ml-2 -mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </a>
                @endcan 
            </div>

            <ul class="hidden text-sm font-medium text-center text-gray-500 rounded-lg shadow sm:flex">
                <li class="w-full focus-within:z-10">
                    <button id="Estatal" @click="searchDependencia($event)"
                        class="inline-block w-full p-4 bg-white border-r border-gray-200 hover:text-gray-700 rounded-s-lg hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none">Dependencias
                        Estatales</button>
                </li>
                <li class="w-full focus-within:z-10">
                    <button id="Federal" @click="searchDependencia($event)"
                        class="inline-block w-full p-4 bg-white border-r border-gray-200 hover:text-gray-700 rounded-r-lg hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none">Dependencias
                        Federales</button>
                </li>
            </ul>

            <div id="listDependencias" x-show="openDependencias"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
            ></div>
            
        </div>
    </div>
</x-dashboard-layout>