@props([
    'id',
    'color',
    'tema'
])
<button type="button" id="tema_{{$id}}" class="w-full" @click="searchContent($event)">
    <label for="tema_{{$id}}"
        class="flex cursor-pointer items-center justify-center rounded-md border border-{{$color}}-200 bg-white px-3 py-2 text-gray-900 hover:border-{{$color}}-200 has-[:checked]:ring-2 has-[:checked]:ring-{{$color}}-500 transition ease-in-out delay-75 hover:border-2 hover:translate-y-1 hover:scale-110">
        <p class="text-sm font-medium">{{$tema}}</p>
    </label>
</button>