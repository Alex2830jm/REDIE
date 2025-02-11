<x-dashboard-layout>
    <div x-data="{ open: false }" class="flex items-center gap-4">
        <!-- Botón de Toggle -->
        <button @click="open = !open"
            class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
            Toggle
        </button>
    
        <!-- Contenedor colapsable -->
        <div class="overflow-hidden transition-all duration-300"
            x-bind:style="open ? 'max-width: 300px; opacity: 1' : 'max-width: 0px; opacity: 0'">
            <div class="w-[300px] p-4 bg-gray-200 rounded-md shadow-md">
                Contenido colapsable
            </div>
        </div>
    </div>
    
</x-dashboard-layout>
