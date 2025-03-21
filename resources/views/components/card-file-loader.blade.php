@props(['show'])

<div x-show="{{ $show}}" class='w-56 m-5 overflow-hidden bg-white rounded-lg shadow-lg border-2 border-gray-300 md:w-64 animate-pulse'>
    <div class='w-14 h-3 bg-gray-500 m-3 rounded-full overflow-hidden self-center'></div>
    <div class='flex items-center justify-between px-3 py-2 bg-gray-200'>
        <button
            class='inline-flex items-center px-2 py-1 w-7 h-2 bg-gray-500 rounded-md'>
        </button>

        <button
            class='inline-flex items-center px-2 py-1 w-7 h-2 bg-gray-500 rounded-md'>
        </button>
    </div>
</div>
