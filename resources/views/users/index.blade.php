<x-dashboard-layout>
    <div class="px-4 py-6 mt-10 mb-8 bg-white rounded-lg shadow-md space-y-6" x-data="{
        async userDelete(event) {
            var userId = $(event.target).attr('id');
            $dispatch('open-modal', 'deleteUser');
            $('#userId').val(userId);
        },

        async userPassword(event) {
            var userId = event.currentTarget.id;
            console.log(userId);
            $('#resetId').val(userId);
            $dispatch('open-modal', 'user-password');
        }
    }">
        <div class="flex justify-between">
            <h1 class="px-4 py-2 text-2xl font-semibold text-gray-700">
                Usuarios
            </h1>
            <div class="flex items-center mt-4 gap-x-3">
                <a href="{{ route('usuarios.create') }}"
                    class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg sm:w-auto gap-x-2 hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                    </svg>
                    <span>Agregar Usuario</span>
                </a>
            </div>
        </div>
        <div class="flex flex-col mt-6">
            <div class="-mx-4 -my-2 overflow-x-auto">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden border border-gray-200 md:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-sm text-gray-200 uppercase bg-cherry-800">
                                <tr>
                                    <th scope="col" class="p-3 text-sm font-semibold tracking-wide">Nombre Completo
                                    </th>
                                    <th scope="col" class="p-3 text-sm font-semibold tracking-wide">Rol</th>
                                    <th scope="col" class="p-3 text-sm font-semibold tracking-wide">Activo</th>
                                    <th scope="col" colspan="3"
                                        class="p-3 text-sm font-semibold tracking-wide text-center">Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach ($users as $user)
                                    <tr class="hover:bg-gray-100">
                                        <td class="p-3 text-sm">
                                            <span class="text-gray-800 font-semibold">
                                                {{ $user->name }}
                                                {{ $user->primerApellido }}
                                                {{ $user->segundoApellido }}
                                            </span>
                                            <p class="text-gray-500">
                                                {{ $user->username }}
                                            </p>
                                        </td>
                                        <td class="p-3 text-sm">
                                            @foreach ($user->roles as $role)
                                                <span class="text-gray-800 font-semibold">
                                                    {{ $role->name }}
                                                </span>
                                                <p class="text-gray-500">
                                                    {{ $role->description }}
                                                </p>
                                            @endforeach
                                        </td>
                                        <td class="p-3 text-sm">
                                            <div
                                                class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 {{ $user->activo == 1 ? 'bg-emerald-100/60' : 'bg-red-100/60' }} ">
                                                <span
                                                    class="h-1.5 w-1.5 rounded-full {{ $user->activo == 1 ? 'bg-emerald-500' : 'bg-red-500' }}"></span>
                                                <h2
                                                    class="text-sm font-normal {{ $user->activo == 1 ? 'text-emerald-500' : 'text-red-500' }}">
                                                    {{ $user->activo == 1 ? 'Activo' : 'Inactivo' }} </h2>
                                            </div>
                                        </td>
                                        <td class="p-3 text-sm">
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
                                        </td>
                                        <td class="p-3 text-sm">
                                            <button @click="userDelete(event)"
                                                class="text-gray-500 transition-color duration-200  hover:text-red-500 focus:outline-none">
                                                <div id="{{ $user->id }}"
                                                    class="inline-flex items-center px-3 py-1 rounded-full gap-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M22 10.5h-6m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM4 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 10.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                                                    </svg>
                                                    Eliminar
                                                </div>
                                            </button>
                                        </td>
                                        <td class="p-3 text-sm">
                                            <button id="{{ $user->id }}" @click="userPassword(event)"
                                                class="text-gray-500 transition-color duration-200  hover:text-red-500 focus:outline-none">
                                                <div
                                                    class="inline-flex items-center px-3 py-1 rounded-full gap-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M13.5 10.5V6.75a4.5 4.5 0 1 1 9 0v3.75M3.75 21.75h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H3.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                                    </svg>
                                                </div>
                                            </button>
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
    <x-modal name="deleteUser" maxWidth="sm" focusable>
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
                <form action="{{ route('usuarios.delete') }}" method="POST">
                    @csrf
                    <div class="flex justify-between">
                        <input type="hidden" id="userId" name="userId" value="">
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

    <x-modal name="user-password" maxWidth="sm" focusable>
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
                <h3 class="mb-5 text-lg font-normal text-gray-900">¿Desea restablecer la contraseña de este usuario?</h3>
                <form action="{{ route('usuarios.reset-password') }}" method="POST">
                    @csrf
                    <div class="flex justify-between">
                        <input type="hidden" id="resetId" name="resetId" value="">
                        <button type="button" x-on:click="$dispatch('close')"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-gray-600 focus:z-10 focus:ring-4 focus:ring-gray-100">
                            No, cancelar
                        </button>
                        <button type="submit"
                            class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Si, restablecer
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </x-modal>
</x-dashboard-layout>
