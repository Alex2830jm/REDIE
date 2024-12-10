@props([
    'id',
    'color',
    'nombre'
])
<div>
    <button type="button" id="sector_{{$id}}" class="w-full" @click="searchContent($event)">
        <label for="sector_{{$id}}"
            class="block cursor-pointer rounded-lg border border-{{$color}}-200 bg-white p-4 text-sm font-medium shadow-sm hover:border-{{$color}}-200 has-[:checked]:border-{{$color}}-500 has-[:checked]:ring-2 has-[:checked]:ring-{{$color}}-500 transition ease-in-out delay-75 hover:border-2 hover:translate-y-1 hover:scale-110">
            <div>
                <p class="text-gray-700  focus:text-{{$color}}-400">
                    {{$nombre}}
                </p>
            </div>
        </label>
    </button>
</div>