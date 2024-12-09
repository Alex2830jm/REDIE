<h3 class="mb-5 text-lg font-medium text-gray-900"> Temas </h3>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @foreach ($temas as $tema)
        <label for="tema_{{ $tema->id }}"
            class="flex cursor-pointer items-center justify-center rounded-md border border-{{ $tema->sector->grupo->colorGrupo }}-300 bg-white px-3 py-2 text-gray-900 hover:border-gray-200 has-[:checked]:border-{{ $tema->sector->grupo->colorGrupo }}-500 has-[:checked]:bg-{{ $tema->sector->grupo->colorGrupo }}-500 has-[:checked]:text-white transition ease-in-out delay-75 hover:border-2 hover:translate-y-1 hover:scale-110">
            <input type="radio" name="tema_id" value="{{ $tema->id }}" id="tema_{{ $tema->id }}" class="sr-only"/>
            <p class="text-sm font-medium">{{ $tema->nombreTema }}</p>
        </label>
    @endforeach
</div>

<div id="cuadrosEstadisticos" class="m-1"> </div>

<script languaje="javascript">
    $(document).ready(function () {
        $("input[name='tema_id']").click(function () {
            var temaId = $(this).val();
            $("#cuadrosEstadisticos").load("{{route('cuadrosEstadisticosByTema')}}?tema_id="+temaId).css("transition-property: font-size;"+
                "transition-duration: 4s;"+
                "transition-delay: 2s;"+
                "font-size: 36px;"
            );
        })
    })
</script>
