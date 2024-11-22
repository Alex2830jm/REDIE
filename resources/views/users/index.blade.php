@extends('layouts.dashboard')
@section('tittle', 'Gestión de Usuarios')
@section('content')
<div class="container px-6 mx-auto grid">
    <h1 class="my-6 text-2xl font-semibold text-gray-700">
        Formulario de Roles
    </h1>
    <div class="px-4 py-6 mb-8 bg-white rounded-lg shadow-md space-y-6">
        <!-- Nombre del Rol -->
        <section>
            <h4 class="text-xl font-semibold text-gray-600">Nombre del Rol:</h4>
            <p class="text-sm text-gray-400">Asigna un nombre al rol con el que identificará un usuario</p>
            <div class="mt-3 relative">
                <input type="text" placeholder="Nombre del Rol"
                    class="block w-full py-2.5 text-gray-700 placeholder-gray-400 bg-gray-100 border border-gray-300 rounded-lg pl-12 pr-5 focus:border-blue-400 focus:ring focus:ring-blue-300">
                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    class="absolute left-3 top-1/2 transform -translate-y-1/2 h-6 w-6 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                </svg>
            </div>
            <p class="mt-3 text-sm text-gray-400">Asigna una abreviatura (opcional)</p>
            <div class="relative">
                <input type="text" placeholder="Nombre del Rol"
                    class="block w-full py-2.5 text-gray-700 placeholder-gray-400 bg-gray-100 border border-gray-300 rounded-lg pl-12 pr-5 focus:border-blue-400 focus:ring focus:ring-blue-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="absolute left-3 top-1/2 transform -translate-y-1/2 h-6 w-6 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                </svg>                      
        </section>

        <!-- Selección de Permisos -->
        <section>
            <h4 class="text-xl font-semibold text-gray-600">Selección de Permisos:</h4>
            <p class="text-sm text-gray-400">Selecciona los permisos con los que contará este rol</p>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mt-4 border border-pink-400 rounded-lg p-4  bg-gray-100">
                <!-- Checkbox -->
                <label class="flex items-center gap-3 p-4 border border-gray-200 bg-white rounded-lg cursor-pointer hover:bg-gray-50">
                    <input type="checkbox" class="rounded border-gray-300">
                    <span class="font-medium text-gray-700">Consulta</span>
                </label>
                <label class="flex items-center gap-3 p-4 border border-gray-200 bg-white rounded-lg cursor-pointer hover:bg-gray-50">
                    <input type="checkbox" class="rounded border-gray-300">
                    <span class="font-medium text-gray-700">Edición</span>
                </label>
                <!-- Agrega más opciones aquí -->
            </div>
        </section>

        <!-- Asignación de Temas -->
        <section>
            <h4 class="text-lg font-semibold text-gray-600 mb-4">Asignación de Temas</h4>
            <div class="space-y-6">
                <!-- Temas Estadísticos Disponibles -->
                <div>
                    <label class="block text-md font-semibold text-gray-700 mb-2">Temas Estadísticos Disponibles</label>
                    <div class="flex flex-wrap gap-4  bg-gray-100 border-dashed border-2 border-yellow-500 p-4 rounded-lg" id="group-temas">
                        <!-- Tarjeta de Tema -->
                        <div class="w-40 bg-white rounded-lg shadow">
                            <h3 class="py-2 text-center text-gray-800 font-semibold uppercase">Población</h3>
                            <div class="bg-orange-400/75 py-2 text-center font-bold text-gray-800">Hechos Vitales</div>
                        </div>
                        <!-- Repite las tarjetas según sea necesario -->
                    </div>
                </div>

                <!-- Permisos Asignados -->
                <div>
                    <label class="block text-md font-semibold text-gray-700 mb-2">Permisos Asignados</label>
                    <div class="flex flex-wrap gap-4  bg-gray-100 border-dashed border-2 border-green-500 p-4 rounded-lg" id="temas-selected">
                    </div>
                </div>
            </div>
        </section>

        <!-- Botones -->
        <div class="flex justify-between gap-4">
            <button type="button" class="rounded bg-red-500 text-white px-4 py-2 hover:bg-red-700 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75 14.25 12m0 0 2.25 2.25M14.25 12l2.25-2.25M14.25 12 12 14.25m-2.58 4.92-6.374-6.375a1.125 1.125 0 0 1 0-1.59L9.42 4.83c.21-.211.497-.33.795-.33H19.5a2.25 2.25 0 0 1 2.25 2.25v10.5a2.25 2.25 0 0 1-2.25 2.25h-9.284c-.298 0-.585-.119-.795-.33Z" />
                </svg>                  
                Cancelar
            </button>
            <button type="submit" class="rounded bg-green-500 text-white px-4 py-2 hover:bg-green-700 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                </svg>                  
                Guardar
            </button>
        </div>
    </div>
</div>

@endsection
