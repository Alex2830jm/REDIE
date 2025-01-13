<x-dashboard-layout>
    <div class="px-4 my-6 text-2xl font-semibold text-gray-700">
        Direcctorio - {{ $unidad->nombreUnidad }}
    </div>
    <div class="md:container md:mx-auto">
        <x-content-unidad numberSteps="{{$unidad->areas->count()}}" :collection="$areas"></x-content-unidad>
    </div>
</x-dashboard-layout>
