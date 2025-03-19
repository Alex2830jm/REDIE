<x-dashboard-layout>
    <div class="px-4 py-6 mb-8 bg-white rounded-lg shadow-md space-y-6">
        <div class="flex justify-between mt-2">
            <h1 class="px-4 py-2 text-2xl font-semibold text-gray-700 flex items-center">
                <a href="{{ route('roles.index') }}" class="mr-5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>
                </a>
                Crear nuevo rol de acceso
            </h1>
        </div>
        <div x-data="app()" x-cloak>
            <div class="flex flex-col mt-6">
                <div class="-mx-4 -my-2 overflow-x-auto">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div x-show.transition="step != 'complete'">
                            <div class="border-b-2 py-4">
                                <div class="uppercase tracking-wide text-xs font-bold text-gray-500 mb-1 leading-tight"
                                    x-text="`Paso: ${step} de 3`"></div>
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                    <div class="flex-1">
                                        <div x-show="step === 1">
                                            <div class="text-lg font-bold text-gray-700 leading-tight">
                                                Datos del Rol
                                            </div>
                                        </div>

                                        <div x-show="step === 2">
                                            <div class="text-lg font-bold text-gray-700 leading-tight">
                                                Permisos a otorgar al Rol
                                            </div>
                                        </div>

                                        <div x-show="step === 3">
                                            <div class="text-lg font-bold text-gray-700 leading-tight">
                                                Temas Asignados al Rol
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex items-center md:w-64">
                                        <div class="w-full bg-white rounded-full mr-2">
                                            <div class="rounded-full bg-green-500 text-xs leading-none h-2 text-center text-white"
                                                :style="'width: ' + parseInt(step / 3 * 100) + '%'"></div>
                                        </div>
                                        <div class="text-xs w-10 text-gray-600" x-text="parseInt(step / 3 * 100) +'%'">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('roles.store') }}" method="post">
                            @csrf
                            <div x-show.transition.in="step === 1">
                                <div class="mt-5">
                                    <div class="mb-5">
                                        <label for="nameRole" class="block mb-2 text-xl font-medium text-gray-900">
                                            Siglas del Rol: *
                                        </label>
                                        <input type="text" name="nameRole" id="nameRole" placeholder="Ejem: SA"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                                    </div>

                                    <div class="mb-5">
                                        <label for="descriptionRole"
                                            class="block mb-2 text-xl font-medium text-gray-900">
                                            Nombre del Rol: *
                                        </label>
                                        <input type="text" name="descriptionRole" id="descriptionRole"
                                            placeholder="Ejem: Super Administrador"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                                    </div>
                                </div>
                            </div>

                            <div x-show.transition.in="step === 2">
                                <h4 class="text-xl font-semibold text-gray-600">Selección de Permisos:</h4>
                                <p class="text-sm text-gray-400">Selecciona los permisos con los que contará este rol
                                </p>
                                <div
                                    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mt-4 border-dashed border-2 border-cherry-800 rounded-lg p-4  bg-gray-100">
                                    <!-- Checkbox -->
                                    @foreach ($permissions as $permission)
                                        <div class="inline-flex items-start bg-white shadow-xl rounded-lg p-5">
                                            <label class="flex items-start cursor-pointer relative"
                                                for="role_{{ $permission->id }}">
                                                <input type="checkbox" value="{{ $permission->name }}" name="permission[]"
                                                    class="peer h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-800 checked:border-slate-800"
                                                    id="role_{{ $permission->id }}" />
                                                <span
                                                    class="absolute text-white opacity-0 peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5"
                                                        viewBox="0 0 20 20" fill="currentColor" stroke="currentColor"
                                                        stroke-width="1">
                                                        <path fill-rule="evenodd"
                                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                            </label>
                                            <label class="cursor-pointer ml-2 text-slate-600 text-sm"
                                                for="role_{{ $permission->id }}">
                                                <div>
                                                    <p class="font-medium">
                                                        {{ $permission->name }}
                                                    </p>
                                                    <p class="text-slate-500">
                                                        {{ $permission->description }}
                                                    </p>
                                                </div>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div x-show.transition.in="step === 3">
                                <h4 class="text-lg font-semibold text-gray-600 mb-2">Asignación de Temas</h4>
                                <div class="flex justify-between">
                                    <label class="block text-sm text-gray-400">
                                        Temas Estadísticos Disponibles
                                    </label>
                                    <label for="checkAllTemas" class="flex cursor-pointer items-start gap-4">
                                        <div class="flex items-center">
                                            &#8203;
                                            <input type="checkbox" class="size-4 rounded border-gray-300"
                                                id="checkAllTemas" />
                                        </div>
                                        <div>
                                            <strong class="block text-sm text-gray-400"> Seleccionar Todos </strong>
                                        </div>
                                    </label>
                                </div>

                                <div
                                    class="flex flex-wrap gap-4  bg-gray-100 border-dashed border-2 border-cherry-800 p-4 rounded-lg">
                                    <div class="grid grid-cols-1 gap-2 sm:grid-cols-2 md:grid-cols-4">
                                        @foreach ($grupos as $grupo)
                                            <div
                                                class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8">
                                                <div class="flex items-center justify-between mb-4">
                                                    <h5
                                                        class="text-xl text-center font-bold leading-none text-{{ $grupo->colorGrupo }}-500">
                                                        {{ $grupo->nombreGrupo }}
                                                    </h5>
                                                </div>
                                                <div class="flow-root">
                                                    <ul role="list" class="divide-y divide-gray-200">
                                                        @foreach ($grupo->sectores as $sector)
                                                            <li class="py-3 sm:py-4">
                                                                <div class="flex items-center">
                                                                    <div class="flex-1 min-w-0 ms-4">
                                                                        <p
                                                                            class="text-sm font-medium text-gray-900 truncate">
                                                                        </p>
                                                                        <p
                                                                            class="text-sm text-{{ $grupo->colorGrupo }}-500 truncate">
                                                                            {{ $sector->nombreGrupo }}
                                                                        </p>
                                                                        @foreach ($sector->temas as $tema)
                                                                            <ul
                                                                                class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg">
                                                                                <li
                                                                                    class="w-full border-b border-gray-200 rounded-t-lg">
                                                                                    <div
                                                                                        class="flex items-center ps-3 rounded-lg has-[:checked]:ring-2 has-[:checked]:ring-{{ $tema->padre->padre->colorGrupo }}-500 has-[:checked]:text-{{ $tema->padre->padre->colorGrupo }}-400">
                                                                                        {{-- <label for="tema_id{{$tema->id}}"
                                                                                    class="cursor-pointer items-center justify-center text-center px-4 py-2 text-gray-500 text-sm font-medium rounded-md border border-{{ $tema->padre->padre->colorGrupo }}-200 bg-white transition ease-in-out delay-75 hover:border hover:border-{{ $tema->padre->padre->colorGrupo }}-200 has-[:checked]:ring-2 has-[:checked]:ring-{{ $tema->padre->padre->colorGrupo }}-500 has-[:checked]:text-{{ $tema->padre->padre->colorGrupo }}-400">
                                                                                    {{ $tema->nombreGrupo }}
                                                                                    <input type="checkbox" name="tema_id" id="tema_id{{$tema->id}}"
                                                                                        value="{{ $tema->id }}">
                                                                                </label> --}}
                                                                                        <input
                                                                                            id="tema_id{{ $tema->id }}"
                                                                                            type="checkbox"
                                                                                            value="{{ $tema->id }}"
                                                                                            name="tema_id[]"
                                                                                            class="w-4 h-4 text-{{ $grupo->colorGrupo }}-400 bg-gray-100 border-gray-400 border has-[:checked]:border-{{ $grupo->colorGrupo }}-500">
                                                                                        <label
                                                                                            for="tema_id{{ $tema->id }}"
                                                                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-500">
                                                                                            {{ $tema->nombreGrupo }}
                                                                                        </label>
                                                                                    </div>
                                                                                </li>
                                                                            </ul>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-between gap-4 p-4" x-show="step != 'complete'">
                                <button type="button"
                                    class="rounded bg-red-500 text-white px-4 py-2 hover:bg-red-700 flex items-center gap-2"
                                    x-show="step > 1" @click="step--">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061A1.125 1.125 0 0 1 21 8.689v8.122ZM11.25 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061a1.125 1.125 0 0 1 1.683.977v8.122Z" />
                                    </svg>
                                    Regresar
                                </button>
                                <button type="button"
                                    class="rounded bg-blue-500 text-white px-4 py-2 hover:bg-blue-700 flex items-center gap-2"
                                    x-show="step < 3" @click="step++">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061A1.125 1.125 0 0 1 3 16.811V8.69ZM12.75 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061a1.125 1.125 0 0 1-1.683-.977V8.69Z" />
                                    </svg>
                                    Siguiente
                                </button>
                                <button type="submit"
                                    class="rounded bg-green-500 text-white px-4 py-2 hover:bg-green-700 flex items-center gap-2"
                                    @click="step = 'complete'" x-show="step === 3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                                    </svg>
                                    Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <x-slot name="scripts">
            <script>
                function app() {
                    return {
                        step: 1,
                    }
                }
            </script>

            <script language="javascript">
                $(document).ready(function() {
                    $("#checkAllTemas").click(function() {
                        if ($(this).is(":checked")) {
                            $("input[type='checkbox']").prop("checked", true);
                        } else {
                            $("input[type='checkbox']").prop("checked", false);
                        }
                    });
                });
            </script>

        </x-slot>
</x-dashboard-layout>
