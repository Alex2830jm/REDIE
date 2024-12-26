<x-dashboard-layout>
    <div class="my-6 text-2xl font-semibold text-gray-700">
        Roles de Usuarios
    </div>

    <div class="px-4 py-6 mb-8 bg-white rounded-lg shadow-md space-y-6">
        <div class="container mx-auto">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex gap-x-3">
                    <h2 class="text-lg font-medium text-gray-800">Listado de Roles</h2>
                </div>

                <div class="flex">
                    <a href="{{ route('roles.create') }}"
                        class="flex items-center px-5 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg gap-x-2 hover:bg-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-5 h-5">
                            <path fill="#ffffff"
                                d="M512 80c8.8 0 16 7.2 16 16l0 320c0 8.8-7.2 16-16 16L64 432c-8.8 0-16-7.2-16-16L48 96c0-8.8 7.2-16 16-16l448 0zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zM208 256a64 64 0 1 0 0-128 64 64 0 1 0 0 128zm-32 32c-44.2 0-80 35.8-80 80c0 8.8 7.2 16 16 16l192 0c8.8 0 16-7.2 16-16c0-44.2-35.8-80-80-80l-64 0zM376 144c-13.3 0-24 10.7-24 24s10.7 24 24 24l80 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-80 0zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24l80 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-80 0z" />
                        </svg>
                        Agregar Rol
                    </a>
                </div>
            </div>

            <div class="flex flex-col mt-6">
                <div class="-mx-4 -my overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border border-gray-200 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal text-left rtl:text-rigth text-gray-500">
                                            Rol </th>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal text-left rtl:text-rigth text-gray-500">
                                            Total de Temas </th>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal text-left rtl:text-rigth text-gray-500">
                                            Total de Permisos </th>
                                        <th scope="col" class="relative py-3.5 px-4">
                                            <span class="sr-only">Acciones</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                <div class="inline-flex items-center gap-x-3">
                                                    <div>
                                                        <h2 class="font-medium text-gray-800">{{ $role->name }}</h2>
                                                        <p class="text-sm font-normal text-gray-600">
                                                            {{ $role->description }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 text-sm font-medium text-gray-700">
                                                <div class="inline-flex items-center gap-x-3">
                                                    <div class="px-3 justify-start rounded-lg border border-emerald-500"> {{ $role->temas->count()}} </div>
                                                    <button
                                                        class="px-2 justify-end rounded-xl border border-blue-500 hover:bg-sky-600 hover:text-white"
                                                        x-on:click.prevent="$dispatch('open-modal', 'group-role-temas')"
                                                    >
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                        </svg>
                                                    </button>
                                                    
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <div class="flex items-center gap-x-3">
                                                    <h2>{{ $role->permissions->count() }}</h2>
                                                    <button
                                                        class="px-2 rounded-lg border border-blue-500 hover:bg-sky-600 hover:text-white"
                                                        x-on:click.prevent="$dispatch('open-modal', 'group-role-permissions')"
                                                    >
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <div class="flex items-center gap-x-6">
                                                    <a href="{{ route('roles.destroy', $role->id) }}"
                                                        class="text-gray-500 transition-color duration-200 hover:text-red-500 focus:outline-none">
                                                        <div
                                                            class="inline-flex items-center px-3 py-1 rounded-full gap-x-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="size-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                                            </svg>
                                                            Eliminar
                                                        </div>
                                                    </a>
                                                    <a href="{{ route('roles.edit', $role->id) }}"
                                                        class="text-gray-500 transition-color duration-200 hover:text-amber-500 focus:outline-none">
                                                        <div
                                                            class="inline-flex items-center px-3 py-1 rounded-full gap-x-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="size-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                            </svg>
                                                            Editar
                                                        </div>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <x-modal name="group-role-temas" focusable>
        <div class="bg-white px-4 pb-5 pt-5 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                    <h3 class="text-base font-semibold text-gray-900" id="role_temas">Temas
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500">
                            Rol Seleccionado:
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
            <button type="button" x-on:click="$dispatch('close')"
                class="mt-3 inline-flex w-full justify-center rounded-m bg-red-500 px-3 py-2 text-sm font-semibold text-gray-100 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-red-600 sm:mt-0 sm:w-auto">Cerrar</button>
        </div>
    </x-modal>

    <x-modal name="group-role-permissions" focusable>
        <div class="bg-white px-4 pb-5 pt-5 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                    <h3 class="text-base font-semibold text-gray-900" id="role_temas">Permisos
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500">
                            Permisos autorizados:
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
            <button type="button" x-on:click="$dispatch('close')"
                class="mt-3 inline-flex w-full justify-center rounded-m bg-red-500 px-3 py-2 text-sm font-semibold text-gray-100 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-red-600 sm:mt-0 sm:w-auto">Cerrar</button>
        </div>
    </x-modal>
</x-dashboard-layout>