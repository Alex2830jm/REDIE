@props([
    'idFile',
    'yearPost',
    'nameFile'
])

<div class='w-56 m-5 overflow-hidden bg-white rounded-lg shadow-lg border-2 border-gray-300 md:w-64'>
    <h3 class='py-2 font-bold tracking-wide text-center text-gray-800 uppercase'> {{ $yearPost }} </h3>
    <div class='flex items-center justify-between px-3 py-2 bg-gray-200'>
        @can('ce.viewFile')
        <button id='viewFile' value='{{ $idFile }}' @click='contentCE(event)'
            class='inline-flex items-center px-2 py-1 bg-blue-500 transition ease-in-out delay-75 hover:bg-blue-600 text-white text-sm font-medium rounded-md hover:-translate-y-1 hover:scale-110'>
            <svg fill='none' viewBox='0 0 24 24'
                stroke-width='1.5' stroke='currentColor' class='h-5 w-5 mr-2'>
                <path stroke-linecap='round' stroke-linejoin='round'
                    d='M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z' />
            </svg>
            Ver
        </button>
        @endcan
        @can('ce.downloadFileCE')
        <a href='{{ route('descargarArchivo') }}?idFile={{$idFile}}'
            class='inline-flex items-center px-2 py-1 bg-green-500 transition ease-in-out delay-75 hover:bg-green-600 text-white text-sm font-medium rounded-md hover:-translate-y-1 hover:scale-110'>
            <svg fill='none' viewBox='0 0 24 24'
                stroke-width='1.5' stroke='currentColor' class='h-5 w-5 mr-2'>
                <path stroke-linecap='round' stroke-linejoin='round'
                    d='M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z' />
            </svg>
            Descargar
        </a>
        @endcan
    </div>
</div>