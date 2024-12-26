@props([
    'id',
    'key',
    'nombre',
    'color'
])

<li class="flex-1">
    <label for="sector_{{ $id }}_{{$key}}"
        class="curelative flex items-center justify-center gap-2 px-1 py-3 text-gray-500 cursor-pointer hover:text-{{ $color }}-400 has-[:checked]:border-b-2 has-[:checked]:border-{{ $color }}-500 has-[:checked]:text-{{ $color }}-400">
        {{ $nombre }}
        <input type="radio" name="sector_id" id="sector_{{ $id }}" value="{{ $id }}"
            class="sr-only" @click="searchContent($event)" />
    </label>
</li>