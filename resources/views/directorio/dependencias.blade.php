<div class="mt-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
    @foreach ($dependencias as $dependencia)
        <div class="flex justify-center">
            <a href="{{ route('dependencia.listUnidades', $dependencia->id ) }}"
                class="w-60 h-60 bg-white shadow rounded-3xl text-gray-700 hover:text-gold-400 p-4 flex flex-col gap-3 hover:shadow-2xl transition-shadow">
                <div class="flex w-52 h-32 bg-cherry-800 rounded-2xl text-white items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-20 w-20">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                    </svg>
                </div>
                <div class="">
                    <p class="font-extrabold text-lg text-center"> {{ $dependencia->nombreDI }} </p>
                </div>
            </a>
        </div>
    @endforeach
</div>
