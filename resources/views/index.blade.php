<x-dashboard-layout>
    <section>
        <div class="relative w-full px-4 py-6">
            <span class="justify-end font-semibold text-gray-500">DEE - Departamento de Estadíscitca Económica</span>
            <div class="wrapper">
                <div class="wrapper-content">
                    <!-- Contenido que quieras poner dentro del wrapper -->
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="mt-2 bg-cherry-800 text-center text-white text-xl font-bold">GRUPOS DE INFORMACIÓN</div>
        <ul class="px-4 py-3 grid w-full gap-6 md:grid-cols-4">
            <li>
                <input type="checkbox" id="grupo1" value="1" class="hidden peer" required="" />
                <label for="grupo1"
                    class="inline-flex items-center w-full rounded-md text-gray-500 bg-white border-2 border-orange-200 transition ease-in-out delay-75 hover:translate-y-1 hover:scale-110 cursor-pointer">
                    <div class="bg-orange-300 p-3">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 640 512" class="mb-2 w-7 h-7">
                            <path fill="#ffffff"
                                d="M360 72a40 40 0 1 0 -80 0 40 40 0 1 0 80 0zM144 208a40 40 0 1 0 0-80 40 40 0 1 0 0 80zM32 416c-17.7 0-32 14.3-32 32s14.3 32 32 32l576 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L32 416zM496 208a40 40 0 1 0 0-80 40 40 0 1 0 0 80zM200 313.5l26.9 49.9c6.3 11.7 20.8 16 32.5 9.8s16-20.8 9.8-32.5l-36.3-67.5c1.7-1.7 3.2-3.6 4.3-5.8L264 217.5l0 54.5c0 17.7 14.3 32 32 32l48 0c17.7 0 32-14.3 32-32l0-54.5 26.9 49.9c1.2 2.2 2.6 4.1 4.3 5.8l-36.3 67.5c-6.3 11.7-1.9 26.2 9.8 32.5s26.2 1.9 32.5-9.8L440 313.5l0 38.5c0 17.7 14.3 32 32 32l48 0c17.7 0 32-14.3 32-32l0-38.5 26.9 49.9c6.3 11.7 20.8 16 32.5 9.8s16-20.8 9.8-32.5l-37.9-70.3c-15.3-28.5-45.1-46.3-77.5-46.3l-19.5 0c-16.3 0-31.9 4.5-45.4 12.6l-33.6-62.3c-15.3-28.5-45.1-46.3-77.5-46.3l-19.5 0c-32.4 0-62.1 17.8-77.5 46.3l-33.6 62.3c-13.5-8.1-29.1-12.6-45.4-12.6l-19.5 0c-32.4 0-62.1 17.8-77.5 46.3L18.9 340.6c-6.3 11.7-1.9 26.2 9.8 32.5s26.2 1.9 32.5-9.8L88 313.5 88 352c0 17.7 14.3 32 32 32l48 0c17.7 0 32-14.3 32-32l0-38.5z" />
                        </svg>
                    </div>
                    <div class="m-3 text-orange-400 font-semibold">Demografía y Sociedad</div>
                </label>
            </li>
            <li>
                <input type="checkbox" id="grupo2" value="2" class="hidden peer" required="" />
                <label for="grupo2"
                    class="inline-flex items-center w-full rounded-md text-gray-500 bg-white border-2 border-teal-200 transition ease-in-out delay-75 hover:translate-y-1 hover:scale-110 cursor-pointer">
                    <div class="bg-teal-400 p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="mb-2 w-7 h-7">
                            <path fill="#ffffff"
                                d="M160 0c17.7 0 32 14.3 32 32l0 35.7c1.6 .2 3.1 .4 4.7 .7c.4 .1 .7 .1 1.1 .2l48 8.8c17.4 3.2 28.9 19.9 25.7 37.2s-19.9 28.9-37.2 25.7l-47.5-8.7c-31.3-4.6-58.9-1.5-78.3 6.2s-27.2 18.3-29 28.1c-2 10.7-.5 16.7 1.2 20.4c1.8 3.9 5.5 8.3 12.8 13.2c16.3 10.7 41.3 17.7 73.7 26.3l2.9 .8c28.6 7.6 63.6 16.8 89.6 33.8c14.2 9.3 27.6 21.9 35.9 39.5c8.5 17.9 10.3 37.9 6.4 59.2c-6.9 38-33.1 63.4-65.6 76.7c-13.7 5.6-28.6 9.2-44.4 11l0 33.4c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-34.9c-.4-.1-.9-.1-1.3-.2l-.2 0s0 0 0 0c-24.4-3.8-64.5-14.3-91.5-26.3c-16.1-7.2-23.4-26.1-16.2-42.2s26.1-23.4 42.2-16.2c20.9 9.3 55.3 18.5 75.2 21.6c31.9 4.7 58.2 2 76-5.3c16.9-6.9 24.6-16.9 26.8-28.9c1.9-10.6 .4-16.7-1.3-20.4c-1.9-4-5.6-8.4-13-13.3c-16.4-10.7-41.5-17.7-74-26.3l-2.8-.7s0 0 0 0C119.4 279.3 84.4 270 58.4 253c-14.2-9.3-27.5-22-35.8-39.6c-8.4-17.9-10.1-37.9-6.1-59.2C23.7 116 52.3 91.2 84.8 78.3c13.3-5.3 27.9-8.9 43.2-11L128 32c0-17.7 14.3-32 32-32z" />
                        </svg>
                    </div>
                    <div class="m-3 text-teal-500 font-semibold">Economía y Sectores Productivos</div>
                </label>
            </li>
            <li>
                <input type="checkbox" id="grupo3" value="3" class="hidden peer" required="" />
                <label for="grupo3"
                    class="inline-flex items-center w-full rounded-md text-gray-500 bg-white border-2 border-lime-200 transition ease-in-out delay-75 hover:translate-y-1 hover:scale-110 cursor-pointer">
                    <div class="bg-lime-400 p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="mb-2 h-7 w-7">
                            <path fill="#ffffff"
                                d="M57.7 193l9.4 16.4c8.3 14.5 21.9 25.2 38 29.8L163 255.7c17.2 4.9 29 20.6 29 38.5l0 39.9c0 11 6.2 21 16 25.9s16 14.9 16 25.9l0 39c0 15.6 14.9 26.9 29.9 22.6c16.1-4.6 28.6-17.5 32.7-33.8l2.8-11.2c4.2-16.9 15.2-31.4 30.3-40l8.1-4.6c15-8.5 24.2-24.5 24.2-41.7l0-8.3c0-12.7-5.1-24.9-14.1-33.9l-3.9-3.9c-9-9-21.2-14.1-33.9-14.1L257 256c-11.1 0-22.1-2.9-31.8-8.4l-34.5-19.7c-4.3-2.5-7.6-6.5-9.2-11.2c-3.2-9.6 1.1-20 10.2-24.5l5.9-3c6.6-3.3 14.3-3.9 21.3-1.5l23.2 7.7c8.2 2.7 17.2-.4 21.9-7.5c4.7-7 4.2-16.3-1.2-22.8l-13.6-16.3c-10-12-9.9-29.5 .3-41.3l15.7-18.3c8.8-10.3 10.2-25 3.5-36.7l-2.4-4.2c-3.5-.2-6.9-.3-10.4-.3C163.1 48 84.4 108.9 57.7 193zM464 256c0-36.8-9.6-71.4-26.4-101.5L412 164.8c-15.7 6.3-23.8 23.8-18.5 39.8l16.9 50.7c3.5 10.4 12 18.3 22.6 20.9l29.1 7.3c1.2-9 1.8-18.2 1.8-27.5zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z" />
                        </svg>
                    </div>
                    <div class="m-3 text-lime-500 font-semibold">Geografía y Medio Ambiente</div>
                </label>
            </li>
            <li>
                <input type="checkbox" id="grupo4" value="4" class="hidden peer" required="" />
                <label for="grupo4"
                    class="inline-flex items-center w-full rounded-md text-gray-500 bg-white border-2 border-pink-200 transition ease-in-out delay-75 hover:translate-y-1 hover:scale-110 cursor-pointer">
                    <div class="bg-pink-900 p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="mb-2 w-7 h-7">
                            <path fill="#ffffff"
                                d="M0 48C0 21.5 21.5 0 48 0L336 0c26.5 0 48 21.5 48 48l0 159-42.4 17L304 224l-32 0c-8.8 0-16 7.2-16 16l0 32 0 24.2 0 7.8c0 .9 .1 1.7 .2 2.6c2.3 58.1 24.1 144.8 98.7 201.5c-5.8 2.5-12.2 3.9-18.9 3.9l-96 0 0-80c0-26.5-21.5-48-48-48s-48 21.5-48 48l0 80-96 0c-26.5 0-48-21.5-48-48L0 48zM80 224c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm80 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zM64 112l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16L80 96c-8.8 0-16 7.2-16 16zM176 96c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm80 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zM423.1 225.7c5.7-2.3 12.1-2.3 17.8 0l120 48C570 277.4 576 286.2 576 296c0 63.3-25.9 168.8-134.8 214.2c-5.9 2.5-12.6 2.5-18.5 0C313.9 464.8 288 359.3 288 296c0-9.8 6-18.6 15.1-22.3l120-48zM527.4 312L432 273.8l0 187.8c68.2-33 91.5-99 95.4-149.7z" />
                        </svg>
                    </div>
                    <div class="m-3 text-pink-950 font-semibold">Gobierno, Seguridad y Justicia</div>
                </label>
            </li>
        </ul>

        <div id="sectorGroup" class="px-4 py-3 w-full">

        </div>
    </section>

    <x-slot name="scripts">
        <script language="javascript">
            $(document).ready(function() {
                $("input[type='checkbox']").click(function(index, checkbox) {
                    var grupoId = $(this).val();
                    $("#sectorGroup").load("{{ route('sectores.index') }}");
                });
            });
        </script>
    </x-slot>
</x-dashboard-layout>
