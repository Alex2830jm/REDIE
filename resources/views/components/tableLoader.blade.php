@props(['show'])

<div x-show="{{ $show }}" class="flex animate-pulse">
    <div class="ms-4 mt-2 w-full">
        <ul class="mt-5 space-y-3">
            <li class="w-full h-4 bg-gray-200 rounded-full"></li>
            <li class="w-full h-4 bg-gray-200 rounded-full"></li>
            <li class="w-full h-4 bg-gray-200 rounded-full"></li>
            <li class="w-full h-4 bg-gray-200 rounded-full"></li>
        </ul>
    </div>
</div>