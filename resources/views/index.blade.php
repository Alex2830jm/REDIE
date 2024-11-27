<x-dashboard-layout>
    <section>
        <div class="relative w-full px-4 py-6">
            <div class="wrapper">
                <div class="wrapper-content">
                    <!-- Contenido que quieras poner dentro del wrapper -->
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="mt-2 bg-header text-center text-white text-xl font-bold">GRUPOS DE INFORMACIÓN</div>
        <div class="grid grid-cols-1 md:grid-cols-12 p-4 gap-4 items-center">
            <div class="col-span-1 md:col-span-3">
                <div class="flex items-center p-4 mb-4 text-sm text-orange-800 border border-orange-300 rounded-lg bg-orange-50"
                    role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="flex-shrink-0 size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>
                    <div>
                        <span class="font-medium">Demografía y Sociedad</span>
                    </div>
                </div>
            </div>
            <div class="col-span-1 md:col-span-3">
                <div class="flex items-center p-4 mb-4 text-sm text-teal-800 border border-teal-300 rounded-lg bg-teal-50"
                    role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                    <div>
                        <span class="font-medium">Economía y Sectores Productivos</span>
                    </div>
                </div>
            </div>
            <div class="col-span-1 md:col-span-3">
                <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50"
                    role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>

                    <div>
                        <span class="font-medium">Geografía y Medio Ambiente</span>
                    </div>
                </div>
            </div>
            <div class="col-span-1 md:col-span-3">
                <div class="flex items-center p-4 mb-4 text-sm text-amber-800 border border-amber-300 rounded-lg bg-amber-50"
                    role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                    </svg>
                    <div>
                        <span class="font-medium">Gobierno, Seguridad y Justicia</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-dashboard-layout>
