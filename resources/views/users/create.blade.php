<x-dashboard-layout>
    <h1 class="px-4 py-2 text-2xl font-semibold text-gray-700">
        Usuarios
    </h1>
    <div class="px-4 py-6 mb-8 bg-white rounded-lg shadow-md space-y-6">
        <div class="flex items-center gap-x-3">
            <h2 class="text-xl font-medium text-gray-800">Formulario de Usuarios - Registro</h2>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <section>
                <span class="flex m-2 items-center">
                    <span class="h-px flex-1 bg-black"></span>
                    <span class="font-sans text-md font-medium text-gray-600 shrink-0 px-6">Datos del
                        Usuario</span>
                    <span class="h-px flex-1 bg-black"></span>
                </span>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <label for="nombres"
                        class="md:col-span-2 block overflow-hidden rounded-md border border-gray-200 px-3 py-1 shadow-sm focus:within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                        <span class="text-xs font-medium text-gray-700">Nombre(s): * </span>
                        <input type="text" id="nombres" name="name" value="{{ old('name') }}"
                            class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </label>
                    <label for="primerApellido"
                        class="block overflow-hidden rounded-md border border-gray-200 px-3 py-1 shadow-sm focus:within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                        <span class="text-xs font-medium text-gray-700">Primer Apellido: * </span>
                        <input type="text" id="primerApellido" name="primerApellido" value="{{ old('primerApellido') }}"
                            class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" />
                            <x-input-error :messages="$errors->get('primerApellido')" class="mt-2" />
                    </label>
                    <label for="segundoApellido"
                        class="block overflow-hidden rounded-md border border-gray-200 px-3 py-1 shadow-sm focus:within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                        <span class="text-xs font-medium text-gray-700">Segundo Apellido: * </span>
                        <input type="text" id="segundoApellido" name="segundoApellido" value="{{ old('segundoApellido') }}"
                            class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" />
                            <x-input-error :messages="$errors->get('segundoApellido')" class="mt-2" />
                    </label>
                </div>
            </section>
            <section>
                <span class="flex m-2 items-center">
                    <span class="h-px flex-1 bg-black"></span>
                    <span class="font-sans text-md font-medium text-gray-600 shrink-0 px-6">Datos de
                        Acceso</span>
                    <span class="h-px flex-1 bg-black"></span>
                </span>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <label for="username"
                        class="block overflow-hidden rounded-md border border-gray-200 px-3 py-1 shadow-sm focus:within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                        <span class="text-xs font-medium text-gray-700">Usuario de Acceso: * </span>
                        <input type="text" id="username" name="username" value="{{ old('username') }}"
                            class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" readonly />
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </label>

                    <label for="password"
                        class="block overflow-hidden rounded-md border border-gray-200 px-3 py-1 shadow-sm focus:within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                        <span class="text-xs font-medium text-gray-700">Contraseña: * </span>
                        <input type="password" id="password" name="password" value="{{ old('password') }}"
                            class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" readonly />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </label>
                </div>
            </section>
            <section>
                <span class="flex m-2 items-center">
                    <span class="h-px flex-1 bg-black"></span>
                    <span class="font-sans text-md font-medium text-gray-600 shrink-0 px-6">Rol</span>
                    <span class="h-px flex-1 bg-black"></span>
                </span>
                <h4 class="font-sans text-md font-medium text-gray-600">Selecciona el rol que ocupará</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach ($roles as $role)
                        <label for="{{ $role->name }}"
                            class="flex cursor-pointer justify-between gap-4 rounded-lg border border-gray-100 bg-white p-4 text-sm font-medium shadow-sm hover:border-gray-200 has-[:checked]:border-blue-500 has-[:checked]:ring-1 has-[:checked]:ring-blue-500">
                            <div>
                                <p class="text-gray-700">{{ $role->name }}</p>

                                <p class="mt-1 text-gray-500"> {{ $role->description }} </p>
                            </div>

                            <input type="radio" name="role_id" value="{{ $role->name }}" id="{{ $role->name }}"
                                class="size-5 border-gray-300 text-blue-500" checked />
                        </label>
                    @endforeach
 
                </div>
            </section>
            <section>
                <div class="flex items-center justify-between mt-6">
                    <a href="{{ route('usuarios.index') }}"
                        class="flex items-center px-5 py-2 text-sm text-white capitalize transition-color duration-200 bg-red-400 border rounded-md gap-x-2 hover:bg-red-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                        </svg>
                        Regresar
                    </a>

                    <button type="submit"
                        class="flex items-center px-5 py-2 text-sm text-white capitalize transition-color duration-200 bg-green-400 border rounded-md gap-x-2 hover:bg-emerald-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 0 1 9 9v.375M10.125 2.25A3.375 3.375 0 0 1 13.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 0 1 3.375 3.375M9 15l2.25 2.25L15 12" />
                        </svg>
                        Guardar Datos
                    </button>
                </div>
            </section>
        </form>
    </div>
    <x-slot name="scripts">
        <script>
            $(document).ready(function() {
                const today = new Date();
        
                $("#segundoApellido").change(function() {
                    const nombres = $("#nombres").val();
                    const primerApellido = $("#primerApellido").val();
                    const segundoApellido = $("#segundoApellido").val();
        
                    // Validar que los campos no estén vacíos para evitar errores
                    if (nombres && primerApellido && segundoApellido) {
                        const username = (nombres.charAt(0) + primerApellido + segundoApellido.charAt(0)).toLowerCase();
                        $("#username").val(username);
                        $("#password").val(username + today.getFullYear());
                    } else {
                        console.warn("Algunos campos están vacíos.");
                    }
                });
            });
        </script>
    </x-slot>
</x-dashboard-layout>
