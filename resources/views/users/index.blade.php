<x-dashboard-layout>
    <h1 class="px-4 py-2 text-2xl font-semibold text-gray-700">
        Usuarios
    </h1>
    <div class="px-4 py-6 mb-8 bg-white rounded-lg shadow-md space-y-6">
        <section class="container px-4 mx-auto">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="flex items-center gap-x-3">
                    <h2 class="text-lg font-medium text-gray-800">Listado de Usuarios</h2>
                </div>
        
                <div class="flex justify-end">
                    <a
                        href="{{ route('usuarios.create') }}"
                        class="flex items-center px-5 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg gap-x-2 hover:bg-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                        </svg>
                        Agregar Usuario
                    </a>
                </div>
            </div>    
    
            <div class="flex flex-col mt-6">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border border-gray-200 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500">
                                            Nombre Completo
                                        </th>
                                        <th scope="col"
                                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                            Rol
                                        </th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-tight tezt-gray-500">
                                            Activo
                                        </th>
                                        <th scope="col" class="relative py-3.5 px-4">
                                            <span class="sr-only">Acciones</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($users as $user)
                                    <tr>
                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                            <div class="inline-flex items-center gap-x-3">
                                                <div class="flex items-center gap-x-2">
                                                    <div>
                                                        <h2 class="font-medium text-gray-800">
                                                            {{ $user->name }} {{ $user->primerApellido }} {{ $user->segundoApellido }}
                                                        </h2>
                                                        <p class="text-sm font-normal text-gray-600">
                                                            {{ $user->username }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                            <div class="inline-flex items-center gap-x-3">
                                                <div class="flex items-center gap-x-2">
                                                    <div>
                                                        <h2 class="font-medium text-gray-800">
                                                            @foreach($user->roles as $role)
                                                                {{ $role->name }}
                                                            @endforeach
                                                        </h2>
                                                        <p class="text-sm font-normal text-gray-600">
                                                            @foreach($user->roles as $role)
                                                                {{ $role->description }}
                                                            @endforeach
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="px-12 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                            <div
                                                class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-emerald-100-60">
                                                <span class="h-1.5 w-1.5 rounded-full {{ $user->activo === 1 ? 'bg-emerald-500' : 'bg-red-500'}}"></span>
                                                <h2 class="text-sm font-normal {{ $user->activo === 1 ? 'text-emerald-500' : 'text-red-500'}}"> {{ $user->activo === 1 ? 'Activo' : 'Inactivo'}} </h2>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            <div class="flex items-center gap-x-6">
                                                <a href="{{ route('usuarios.destroy', $user->id ) }}"
                                                    class="text-gray-500 transition-color duration-200  hover:text-red-500 focus:outline-none">
                                                    <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="size-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                                        </svg>
                                                        Eliminar
                                                    </div>
                                                </a>
                                                <a href="{{ route('usuarios.edit', $user->id) }}"
                                                    class="text-gray-500 transition-color duration-200 hover:text-amber-500 focus:outline-none">
                                                    <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="size-6">
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
    
            <div class="flex items-center justify-between mt-6">
                <a href="" class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-color duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061A1.125 1.125 0 0 1 21 8.689v8.122ZM11.25 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061a1.125 1.125 0 0 1 1.683.977v8.122Z" />
                    </svg>                  
                    <span>Anterior</span>
                </a>
    
                <div class="items-center hidden lg:flex gap-x-3">
                    <a href="#" class="px-2 py-1 text-sm text-blue-500 rounded-md bg-blue-100/60">1</a>
                    <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md hover:bg-gray-100">2</a>
                    <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md hover:bg-gray-100">3</a>
                    <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md hover:bg-gray-100">...</a>
                    <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md hover:bg-gray-100">12</a>
                    <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md hover:bg-gray-100">13</a>
                    <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md hover:bg-gray-100">14</a>
                </div>
    
                <a href="" class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-color duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061A1.125 1.125 0 0 1 3 16.811V8.69ZM12.75 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061a1.125 1.125 0 0 1-1.683-.977V8.69Z" />
                    </svg>                  
                    <span>Siguiente</span>
                </a>
            </div>
        </section>
    </div>
</x-dashboard-layout>
