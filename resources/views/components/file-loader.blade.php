@props(['show', 'numberFiles'])

<div x-show="{{ $show }}" class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
    @for ($i = 0; $i < 4; $i++)
        <div class="p-3 bg-white border border-solid border-gray-300 rounded-xl animate-pulse">
            <div class="mb-1 flex justify-between items-center">
                <div class="flex items-center gap-x-3">
                    <span
                        class="size-10 flex justify-center items-center border border-gray-200 text-gray-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                    </span>
                    <div class="">
                        <div class=" max-w-full flex flex-row space-x-2 text-sm font-medium text-gray-800">
                            <div class="w-14 h-3 bg-gray-200 rounded-full overflow-hidden"></div>
                            <div class="w-14 h-3 bg-gray-200 rounded-full overflow-hidden"></div>
                            <div class="w-14 h-3 bg-gray-200 rounded-full overflow-hidden"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-x-3 whitespace-nowrap mt-2">
                <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden" role="progressbar"
                    aria-valuemin="0" aria-valuemax="100">
                    <div
                        class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition-all duration-500">
                    </div>
                </div>
            </div>
        </div>
    @endfor
</div>
