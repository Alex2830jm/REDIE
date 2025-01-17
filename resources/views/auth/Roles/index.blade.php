<x-dashboard-layout>
    <h1 class="px-4 py-2 text-2xl font-semibold text-gray-700">
        Roles de Accesso
    </h1>

    <div class="px-4 py-6 mb-8 bg-white rounded-lg shadow-md space-y-6" x-data="{
        async role(event) {
                var roleId = $(event.target).attr('id');
                $dispatch('open-modal', 'roleDelete');
                $('#roleId').val(roleId);
            },
    
            async roleTemas(event) {
                var roleId = $(event.target).attr('id');
                $dispatch('open-modal', 'group-role-temas');
                $('#contentTemas').empty();
                $.get(`{{ route('roles.temas') }}?role_id=${roleId}`, (temas) => {
                    $.each(temas, (index, value) => {
                        $('#contentTemas').append('<tr class=hover:bg-gray-100><td class=p-3 text-gray-500>' + value.nombre + '</td><td class=p-3 text-gray-500>' + value.sector + '</td><td class=p-3 text-gray-500>' + value.grupo + '</td></tr>');
                    });
                });
            }
    }">
        <div class="container px-4 mx-auto">
            <div class="sm:flex sm:items-center sm:justify-between py-3">
                <div class="flex items-center mt-4 gap-x-3">
                    <span class="absolute">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </span>

                    <input type="text" placeholder="Search"
                        class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
                </div>
                <div class="flex items-center mt-4 gap-x-3">
                    <a href="{{ route('roles.create') }}"
                        class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg sm:w-auto gap-x-2 hover:bg-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        <span>Agregar Rol</span>
                    </a>
                </div>
            </div>

            <div class="overflow-auto rounded-lg shadow">
                <table class="w-full text-sm  text-gray-500">
                    <thead class="text-sm text-gray-200 uppercase bg-cherry-800">
                        <tr>
                            <th scope="col" class="p-3 text-sm font-semibold tracking-wide">Rol</th>
                            <th scope="col" class="p-3 text-sm font-semibold tracking-wide">Total de temas</th>
                            <th scope="col" class="p-3 text-sm font-semibold tracking-wide">Total de Permisos</th>
                            <th scope="col" class="p-3 text-sm font-semibold tracking-wide" colspan="2">Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($roles as $role)
                            <tr class="hover:bg-gray-100">
                                <td class="p-3 text-sm">
                                    <span class="text-gray-800 font-semibold">
                                        {{ $role->name }}
                                    </span>
                                    <p class="text-gray-500">
                                        {{ $role->description }}
                                    </p>
                                </td>
                                <td class="p-3 text-sm">
                                    <div id="{{ $role->id }}"
                                        class="cursor-pointer inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-sky-100/60 border-2 border-sky-200/50"
                                        @click="roleTemas(event)">
                                        <h2 class="text-sm font-normal text-sky-500" id="{{ $role->id }}">
                                            {{ $role->temas->count() }}
                                        </h2>
                                    </div>
                                </td>
                                <td class="p-3 text-sm self-center">
                                    <div
                                        class="cursor-pointer inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-sky-100/60 border border-sky-200/50">
                                        <h2 class="text-sm font-normal text-sky-500">
                                            {{ $role->permissions->count() }}
                                        </h2>
                                    </div>
                                </td>
                                <td class="p-3 text-sm">
                                    <a href="{{ route('roles.edit', $role->id) }}"
                                        class="text-gray-500 transition-color duration-200 hover:text-amber-500 focus:outline-none">
                                        <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                            Editar
                                        </div>
                                    </a>
                                </td>
                                <td class="p-3 text-sm">
                                    <button @click="role(event)"
                                        class="text-gray-500 transition-color duration-200 hover:text-red-500 focus:outline-none">
                                        <div id="{{ $role->id }}"
                                            class="inline-flex items-center px-3 py-1 rounded-full gap-x-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18 18 6M6 6l12 12" />
                                            </svg>
                                            Eliminar
                                        </div>
                                        </a>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <x-modal name="roleDelete" maxWidth="sm" focusable>
        <div class="relative bg-white rounded-lg shadow">
            <button type="button" x-on:click="$dispatch('close')"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-900">¿Estás seguro de eliminar a este usuario?</h3>
                <form action="{{ route('roles.delete') }}" method="POST">
                    @csrf
                    <div class="flex justify-between">
                        <input type="hidden" id="roleId" name="roleId" value="">
                        <button type="button" x-on:click="$dispatch('close')"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-gray-600 focus:z-10 focus:ring-4 focus:ring-gray-100">
                            No, cancelar
                        </button>
                        <button type="submit"
                            class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Si, eliminar
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </x-modal>

    <x-modal name="group-role-temas">
        <div class="bg-white w-full px-4 pb-5 pt-5 sm:p-6 sm:pb-4">
            <div class="flex items-center justify-between">
                <h3 class="text-base font-semibold text-gray-900">
                    Temas asignados al rol
                </h3>
                <svg x-on:click="$dispatch('close')" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    class="h-6 w-6 cursor-pointer hover:text-red-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </div>
            <div class="w-full max-w-full p-4 border border-gray-200 rounded-lg shadow sm:p-8 mt-3 mb-3">
                <div class="flow-root">
                    <table class="w-full text-sm text-gray-500 items-center text-center">
                        <thead class="bg-cherry-800 text-gray-200 uppercase">
                            <tr>
                                <th scope="col" class="p-3 font-semibold tracking-wide">Tema</th>
                                <th scope="col" class="p-3 font-semibold tracking-wide">Sector</th>
                                <th scope="col" class="p-3 font-semibold tracking-wide">Grupo</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-400" id="contentTemas">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-modal>

    <x-modal name="group-role-permissions" focusable>
        <div class="bg-white px-4 pb-5 pt-5 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                    <h3 class="text-base font-semibold text-gray-900" id="">Permisos
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500">
                            Permisos autorizados:
                        </p>

                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <button type="button" x-on:click="$dispatch('close')"
                    class="mt-3 inline-flex w-full justify-center rounded-m bg-red-500 px-3 py-2 text-sm font-semibold text-gray-100 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-red-600 sm:mt-0 sm:w-auto">Cerrar</button>
            </div>
    </x-modal>
</x-dashboard-layout>
