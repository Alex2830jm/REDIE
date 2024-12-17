<x-dashboard-layout>

    <div class="my-6 text-2xl font-semibold text-gray-700">
        Roles de Usuarios
    </div>

    <div class="px-4 py-6 mb-8 bg-white rounded-lg shadow-md space-y-6">
        <div x-data="app()" x-cloak>
            <section class="container px-4 mx-auto">
                <div x-show.transition="step != 'complete'">
                    <div class="border-b-2 py-4">
                        <div class="uppercase tracking-wide text-xs font-bold text-gray-500 mb-1 leading-tight"
                            x-text="`Paso: ${step} de 3`"></div>
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                            <div class="flex-1">
                                <div x-show="step === 1">
                                    <div class="text-lg font-bold text-gray-700 leading-tight">Datos del Rol</div>
                                </div>

                                <div x-show="step === 2">
                                    <div class="text-lg font-bold text-gray-700 leading-tight">Permisos del Rol</div>
                                </div>

                                <div x-show="step === 3">
                                    <div class="text-lg font-bold text-gray-700 leading-tight">Temas Asignados al Rol</div>
                                </div>
                            </div>

                            <div class="flex items-center md:w-64">
                                <div class="w-full bg-white rounded-full mr-2">
                                    <div class="rounded-full bg-green-500 text-xs leading-none h-2 text-center text-white"
                                        :style="'width: ' + parseInt(step / 3 * 100) + '%'"></div>
                                </div>
                                <div class="text-xs w-10 text-gray-600" x-text="parseInt(step / 3 * 100) +'%'"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <form action="{{ route('roles.update', $role->id) }}" method="post">
                    @csrf @method('PUT')
                    <div x-show.transition.in="step === 1">
                        <h4 class="text-xl font-semibold text-gray-600">Nombre del Rol:</h4>
                        <p class="text-sm text-gray-400">Asigna un nombre al rol con el que identificará un usuario</p>
                        <div class="mt-3 relative">
                            <label for="nameRole"
                                class="block overflow-hidden rounded-md border border-gray-200 px-3 py-1 shadow-sm focus:within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                                <span class="text-xs font-medium text-gray-700">Nombre del Rol: * </span>
                                <input type="text" id="nameRole" name="nameRole" value="{{ $role->name }}"
                                    class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" />
                                <x-input-error :messages="$errors->get('nameRole')" class="mt-2" />
                            </label>
                        </div>
                        <p class="mt-3 text-sm text-gray-400">Asigna una abreviatura (opcional)</p>
                        <div class="relative">
                            <label for="descriptionRole"
                                class="block overflow-hidden rounded-md border border-gray-200 px-3 py-1 shadow-sm focus:within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                                <span class="text-xs font-medium text-gray-700">Descripción del Rol: * </span>
                                <input type="text" id="descriptionRole" name="descriptionRole" value="{{ $role->description }}"
                                    class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" />
                                <x-input-error :messages="$errors->get('descriptionRole')" class="mt-2" />
                            </label>
                        </div>
                    </div>

                    <div x-show.transition.in="step === 2" animate-fade-right>
                        <h4 class="text-xl font-semibold text-gray-600">Selección de Permisos:</h4>
                        <p class="text-sm text-gray-400">Selecciona los permisos con los que contará este rol</p>
                        <div
                            class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mt-4 border border-pink-400 rounded-lg p-4  bg-gray-100">
                            <!-- Checkbox -->
                            @foreach ($permissions as $permission)
                                <label
                                    class="flex items-center gap-3 p-4 border border-gray-200 bg-white rounded-lg cursor-pointer hover:bg-gray-50">
                                    <input type="checkbox" class="rounded border-gray-300" name="permission[]"
                                        value="{{ $permission->name }}" {{ $role->permissions->contains($permission->id) ? 'checked' : ''}}>
                                    <span class="font-medium text-gray-700">{{ $permission->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div x-show.transition.in="step === 3">
                        <h4 class="text-lg font-semibold text-gray-600 mb-2">Asignación de Temas</h4>
                        <label class="block text-sm text-gray-400">
                            Temas Estadísticos Disponibles
                        </label>

                        <div
                            class="flex flex-wrap gap-4  bg-gray-100 border-dashed border-2 border-yellow-500 p-4 rounded-lg">
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-2">
                                @foreach ($temas as $tema)
                                    <label for="tema_id{{ $tema->id }}"
                                        class="flex p-3 w-full cursor-pointer bg-white border border-gray-300 rounded-md text-sm ">
                                        <input type="checkbox" name="tema_id[]" value="{{$tema->id }}" {{ $role->temas->contains($tema->id) ? 'checked' : ''}}
                                            class="appearance-none cursor-pointer border border-gray-300  rounded-md mr-2 checked:bg-no-repeat checked:bg-center checked:border-blue-500 checked:bg-blue-500"
                                            id="tema_id{{ $tema->id }}">
                                        <span class="text-sm font-normal justify-center text-gray-600 ml-2">
                                            {{ $tema->nombreGrupo }} </span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between gap-4 p-4" x-show="step != 'complete'">
                        <button type="button"
                            class="rounded bg-red-500 text-white px-4 py-2 hover:bg-red-700 flex items-center gap-2"
                            x-show="step > 1" @click="step--">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061A1.125 1.125 0 0 1 21 8.689v8.122ZM11.25 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061a1.125 1.125 0 0 1 1.683.977v8.122Z" />
                            </svg>
                            Regresar
                        </button>
                        <button type="button"
                            class="rounded bg-blue-500 text-white px-4 py-2 hover:bg-blue-700 flex items-center gap-2"
                            x-show="step < 3" @click="step++">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061A1.125 1.125 0 0 1 3 16.811V8.69ZM12.75 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061a1.125 1.125 0 0 1-1.683-.977V8.69Z" />
                            </svg>
                            Siguiente
                        </button>
                        <button type="submit"
                            class="rounded bg-green-500 text-white px-4 py-2 hover:bg-green-700 flex items-center gap-2"
                            @click="step = 'complete'" x-show="step === 3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                            </svg>
                            Guardar
                        </button>
                    </div>
                    </form>
            </section>
        </div>
        <x-slot name="scripts">
            <script>
                function app() {
                    return {
                        step: 1,
                    }
                }
            </script>
        </x-slot>
</x-dashboard-layout>
