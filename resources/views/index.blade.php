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
    <x-radio-grupo :grupos="$grupos" />

    <x-slot name="scripts">
        <script>
            $(document).ready(function() {
                $("button").click(function() {
                    //Obtiene el valor de Id
                    var valor_id = $(this).attr("id");
                    //Obtiene el tipo de búsqueda
                    var grupo = valor_id.split("grupo");
                    //Obtiene el id del tipo de búsqueda
                    var id = valor_id.substring(valor_id.length-1);

                    if(grupo) {
                        $("#sectorGroup").load("{{ route('sectorsByGroup') }}?grupo_id=" + id);
                    } 
                });

            });
        </script>
    </x-slot>
</x-dashboard-layout>
