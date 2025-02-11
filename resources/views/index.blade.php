<x-dashboard-layout>
    <section>
        <div class="relative w-full px-4 py-6">
            <span class="justify-end font-semibold text-gray-500">
                @foreach (Auth::user()->roles as $role)
                    {{ $role->name }} - {{ $role->description }}
                @endforeach
            </span>
            <div class="wrapper">
                <div class="wrapper-content">
                    <!-- Contenido que quieras poner dentro del wrapper -->
                </div>
            </div>
        </div>
    </section>

    <div class="mt-2 bg-cherry-800 text-center text-white text-xl font-bold">GRUPOS DE INFORMACIÓN</div>
    @include('grupos/listGrupos')
</x-dashboard-layout>
