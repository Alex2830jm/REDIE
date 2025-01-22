<div class="px-4 pb-5 mt-10 grid gap-4 md:grid-cols-3 items-center justify-center self-center">
    @foreach ($dependencias as $dependencia)
        <div
            class="relative flex w-80 flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md transition ease-in-out delay-75 duration-500 hover:translate-y-1 hover:scale-110">
            <div
                class="relative mx-4 -mt-4 h-40 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40 bg-gradient-to-r from-cherry-800 to-cherry-900 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="h-20 w-20">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                </svg>
            </div>
            <div class="p-6">
                <h5
                    class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                    {{ $dependencia->nombreDependencia }}
                </h5>
            </div>
            <div class="p-6 pt-0 justify-center">
                <a href="{{ route('directorio.unidades') }}?dependencia_id={{ $dependencia->id }}"
                    class="select-none rounded-lg bg-gold-400 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                    Ver
                </a>
            </div>
        </div>
    @endforeach
</div>