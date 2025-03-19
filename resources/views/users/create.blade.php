<x-dashboard-layout>
    <div x-data="{
        name: '',
        primerApellido: '',
        segundoApellido: '',
        username: '',
        password: '',
        year: new Date().getFullYear(),
    
        generarUsuario() {
            this.username = (this.name.charAt(0) + this.texto(this.primerApellido) + this.segundoApellido.charAt(0)).toLowerCase();
            this.password = this.username + this.year;
        },
    
        texto(value) {
            return value.normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/ /g, '');
        }
    
    }" class="px-4 py-6 mb-8 bg-white rounded-lg shadow-md space-y-6">
        <div class="flex justify-between mt-2">
            <h1 class="px-4 py-2 text-2xl font-semibold text-gray-700 flex items-center">
                <a href="{{ route('usuarios.index') }}" class="mr-5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>
                </a>
                Registro de nuevos usuarios
            </h1>

        </div>
        <div class="flex flex-col mt-6">
            <div class="-mx-4 -my-2 overflow-x-auto">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="col-span-2">
                                <span class="flex m-2 items-center">
                                    <span class="h-px flex-1 bg-black"></span>
                                    <span class="font-sans text-md font-medium text-gray-600 shrink-0 px-6">Datos del
                                        Usuario</span>
                                    <span class="h-px flex-1 bg-black"></span>
                                </span>
                            </div>

                            <div class="mb-5 md:col-span-2">
                                <label for="name" class="block mb-2 font-medium text-gray-900">
                                    Nombre(s): *
                                </label>
                                <input type="text" name="name" id="name" x-model="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>

                            <div class="mb-5">
                                <label for="primerApellido" class="block mb-2 font-medium text-gray-900">
                                    Primer Apellido: *
                                </label>
                                <input type="text" name="primerApellido" id="primerApellido" x-model="primerApellido"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>

                            <div class="mb-5">
                                <label for="segundoApellido" class="block mb-2 font-medium text-gray-900">
                                    Segundo Apellido: *
                                </label>
                                <input type="text" name="segundoApellido" id="segundoApellido"
                                    x-model="segundoApellido" @change="generarUsuario"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>

                            <span class="flex m-2 items-center col-span-2">
                                <span class="h-px flex-1 bg-black"></span>
                                <span class="font-sans text-md font-medium text-gray-600 shrink-0 px-6">Datos de
                                    Acceso</span>
                                <span class="h-px flex-1 bg-black"></span>
                            </span>

                            <div class="mb-5">
                                <label for="username" class="block mb-2 font-medium text-gray-900">
                                    Usuario de Acceso: *
                                </label>
                                <input type="text" name="username" id="username" x-model="username"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    readonly>
                            </div>

                            <div class="mb-5">
                                <label for="password" class="block mb-2 font-medium text-gray-900">
                                    Contraseña: *
                                </label>
                                <input type="password" name="password" id="password" x-model="password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    readonly>
                            </div>

                            <span class="flex m-2 items-center col-span-2">
                                <span class="h-px flex-1 bg-black"></span>
                                <span class="font-sans text-md font-medium text-gray-600 shrink-0 px-6">Rol</span>
                                <span class="h-px flex-1 bg-black"></span>
                            </span>

                            <div class="col-span-2">
                                <h2 class="block mb-2 font-medium text-gray-900">Selecciona el Rol que ocuapará este
                                    usuario: *</h2>
                                <div class="flex flex-row justify-between gap-3">
                                    @foreach ($roles as $role)
                                        <label for="{{ $role->name }}"
                                            class="flex cursor-pointer justify-between gap-4 rounded-lg border border-gray-500 bg-white p-4 text-sm font-medium shadow-sm hover:border-gray-200 has-[:checked]:border-blue-500 has-[:checked]:ring-1 has-[:checked]:ring-blue-500">
                                            <div>
                                                <p class="text-gray-700">{{ $role->name }}</p>

                                                <p class="mt-1 text-gray-500"> {{ $role->description }} </p>
                                            </div>

                                            <input type="radio" name="role_id" value="{{ $role->name }}"
                                                id="{{ $role->name }}" class="size-5 border-gray-300 text-blue-500" />
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-6 col-span-2">

                                <button type="submit"
                                    class="flex items-center px-5 py-2 text-sm text-white capitalize transition-color duration-200 bg-green-400 border rounded-md gap-x-2 hover:bg-emerald-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 0 1 9 9v.375M10.125 2.25A3.375 3.375 0 0 1 13.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 0 1 3.375 3.375M9 15l2.25 2.25L15 12" />
                                    </svg>
                                    Guardar Datos
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
