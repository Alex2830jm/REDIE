@props(['grupos' => []])

<div x-data="{
    openSectores: false,
    openTemas: false,
    openCuadroEstadistico: false,
    async searchContent(event) {
        var button = event.currentTarget;
        var valor_id = button.getAttribute('id');
        var [type, id] = valor_id.split('_');

        //console.log('type:', type);
        if (type === 'grupo') {
            this.openSectores = false,
                this.openTemas = false,
                this.openCuadroEstadistico = false;
            setTimeout(async () => {
                $('#sectorGroup').load(`{{ route('index.sectorsByGroup') }}?id=${id}`, () => {
                    this.openSectores = true;
                });
            }, 300);
        } else if (type === 'sector') {
            this.openSectores = true,
                this.openTemas = false,
                this.openCuadroEstadistico = false;
            setTimeout(async () => {
                $('#temasSectorGroup').load(`{{ route('index.temasBySector') }}?id=${id}`, () => {
                    this.openTemas = true;
                });
            }, 300);
        } else if (type === 'tema') {
            this.openSectores = true,
                this.openTemas = true,
                this.openCuadroEstadistico = false;
            setTimeout(async () => {
                $('#cuadrosEstadisticos').load(`{{ route('index.cuadrosEstadisticosByTema') }}?id=${id}`, () => {
                    this.openCuadroEstadistico = true;
                });
            }, 300);
        }

    }
}">


    <ul class="px-4 py-3 grid w-full gap-6 md:grid-cols-4">
        <li>
            <button type="button" id="grupo_2" class="w-full" @click="searchContent($event)">
                <label for="grupo_2"
                    class="inline-flex items-center w-full rounded-md text-gray-500 bg-white border-2 border-orange-200 has-[:checked]:ring-1 has-[:checked]:ring-orange-500 transition ease-in-out delay-75 hover:translate-y-1 hover:scale-110 cursor-pointer">
                    <div class="bg-orange-600 p-3 flex items-center justify-center aspect-square w-16">
                        <svg class="h-3/4 w-3/4"
                            viewBox="0 0 512 512">
                            <path fill="#ffffff"
                                d="M320 64A64 64 0 1 0 192 64a64 64 0 1 0 128 0zm-96 96c-35.3 0-64 28.7-64 64l0 48c0 17.7 14.3 32 32 32l1.8 0 11.1 99.5c1.8 16.2 15.5 28.5 31.8 28.5l38.7 0c16.3 0 30-12.3 31.8-28.5L318.2 304l1.8 0c17.7 0 32-14.3 32-32l0-48c0-35.3-28.7-64-64-64l-64 0zM132.3 394.2c13-2.4 21.7-14.9 19.3-27.9s-14.9-21.7-27.9-19.3c-32.4 5.9-60.9 14.2-82 24.8c-10.5 5.3-20.3 11.7-27.8 19.6C6.4 399.5 0 410.5 0 424c0 21.4 15.5 36.1 29.1 45c14.7 9.6 34.3 17.3 56.4 23.4C130.2 504.7 190.4 512 256 512s125.8-7.3 170.4-19.6c22.1-6.1 41.8-13.8 56.4-23.4c13.7-8.9 29.1-23.6 29.1-45c0-13.5-6.4-24.5-14-32.6c-7.5-7.9-17.3-14.3-27.8-19.6c-21-10.6-49.5-18.9-82-24.8c-13-2.4-25.5 6.3-27.9 19.3s6.3 25.5 19.3 27.9c30.2 5.5 53.7 12.8 69 20.5c3.2 1.6 5.8 3.1 7.9 4.5c3.6 2.4 3.6 7.2 0 9.6c-8.8 5.7-23.1 11.8-43 17.3C374.3 457 318.5 464 256 464s-118.3-7-157.7-17.9c-19.9-5.5-34.2-11.6-43-17.3c-3.6-2.4-3.6-7.2 0-9.6c2.1-1.4 4.8-2.9 7.9-4.5c15.3-7.7 38.8-14.9 69-20.5z" />
                        </svg>
                    </div>
                    <div class="m-3 text-orange-400 font-semibold text-center flex-1"> Demografía y Sociedad </div>
                </label>
            </button>
        </li>
        <li>
            <button type="button" id="grupo_14" value="2" class="w-full" @click="searchContent($event)">
                <label for="grupo_14"
                    class="inline-flex items-center w-full rounded-md text-gray-500 bg-white border-2 border-sky-200 transition ease-in-out delay-75 hover:translate-y-1 hover:scale-110 cursor-pointer has-[:checked]:ring-1 has-[:checked]:ring-sky-500">
                    <div class="bg-sky-600 p-3 flex items-center justify-center aspect-square w-16">
                        <svg class="h-3/4 w-3/4" viewBox="0 0 576 512">
                            <path fill="#ffffff"
                                d="M312 24l0 10.5c6.4 1.2 12.6 2.7 18.2 4.2c12.8 3.4 20.4 16.6 17 29.4s-16.6 20.4-29.4 17c-10.9-2.9-21.1-4.9-30.2-5c-7.3-.1-14.7 1.7-19.4 4.4c-2.1 1.3-3.1 2.4-3.5 3c-.3 .5-.7 1.2-.7 2.8c0 .3 0 .5 0 .6c.2 .2 .9 1.2 3.3 2.6c5.8 3.5 14.4 6.2 27.4 10.1l.9 .3s0 0 0 0c11.1 3.3 25.9 7.8 37.9 15.3c13.7 8.6 26.1 22.9 26.4 44.9c.3 22.5-11.4 38.9-26.7 48.5c-6.7 4.1-13.9 7-21.3 8.8l0 10.6c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-11.4c-9.5-2.3-18.2-5.3-25.6-7.8c-2.1-.7-4.1-1.4-6-2c-12.6-4.2-19.4-17.8-15.2-30.4s17.8-19.4 30.4-15.2c2.6 .9 5 1.7 7.3 2.5c13.6 4.6 23.4 7.9 33.9 8.3c8 .3 15.1-1.6 19.2-4.1c1.9-1.2 2.8-2.2 3.2-2.9c.4-.6 .9-1.8 .8-4.1l0-.2c0-1 0-2.1-4-4.6c-5.7-3.6-14.3-6.4-27.1-10.3l-1.9-.6c-10.8-3.2-25-7.5-36.4-14.4c-13.5-8.1-26.5-22-26.6-44.1c-.1-22.9 12.9-38.6 27.7-47.4c6.4-3.8 13.3-6.4 20.2-8.2L264 24c0-13.3 10.7-24 24-24s24 10.7 24 24zM568.2 336.3c13.1 17.8 9.3 42.8-8.5 55.9L433.1 485.5c-23.4 17.2-51.6 26.5-80.7 26.5L192 512 32 512c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l36.8 0 44.9-36c22.7-18.2 50.9-28 80-28l78.3 0 16 0 64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0-16 0c-8.8 0-16 7.2-16 16s7.2 16 16 16l120.6 0 119.7-88.2c17.8-13.1 42.8-9.3 55.9 8.5zM193.6 384c0 0 0 0 0 0l-.9 0c.3 0 .6 0 .9 0z" />
                        </svg>
                    </div>
                    <div class="m-3 text-sky-400 font-semibold text-center flex-1"> Economía y Sectores Productivos
                    </div>
                </label>
            </button>
        </li>
        <li>
            <button type="button" id="grupo_32" value="32" class="w-full" @click="searchContent($event)">
                <label for="grupo_32"
                    class="inline-flex items-center w-full rounded-md text-gray-500 bg-white border-2 border-green-200 transition ease-in-out delay-75 hover:translate-y-1 hover:scale-110 cursor-pointer has-[:checked]:ring-8 has-[:checked]:ring-green-500">
                    <div class="bg-green-600 p-3 flex items-center justify-center aspect-square w-16">
                        <svg class="h-3/4 w-3/4" viewBox="0 0 512 512">
                            <path fill="#ffffff"
                                d="M57.7 193l9.4 16.4c8.3 14.5 21.9 25.2 38 29.8L163 255.7c17.2 4.9 29 20.6 29 38.5l0 39.9c0 11 6.2 21 16 25.9s16 14.9 16 25.9l0 39c0 15.6 14.9 26.9 29.9 22.6c16.1-4.6 28.6-17.5 32.7-33.8l2.8-11.2c4.2-16.9 15.2-31.4 30.3-40l8.1-4.6c15-8.5 24.2-24.5 24.2-41.7l0-8.3c0-12.7-5.1-24.9-14.1-33.9l-3.9-3.9c-9-9-21.2-14.1-33.9-14.1L257 256c-11.1 0-22.1-2.9-31.8-8.4l-34.5-19.7c-4.3-2.5-7.6-6.5-9.2-11.2c-3.2-9.6 1.1-20 10.2-24.5l5.9-3c6.6-3.3 14.3-3.9 21.3-1.5l23.2 7.7c8.2 2.7 17.2-.4 21.9-7.5c4.7-7 4.2-16.3-1.2-22.8l-13.6-16.3c-10-12-9.9-29.5 .3-41.3l15.7-18.3c8.8-10.3 10.2-25 3.5-36.7l-2.4-4.2c-3.5-.2-6.9-.3-10.4-.3C163.1 48 84.4 108.9 57.7 193zM464 256c0-36.8-9.6-71.4-26.4-101.5L412 164.8c-15.7 6.3-23.8 23.8-18.5 39.8l16.9 50.7c3.5 10.4 12 18.3 22.6 20.9l29.1 7.3c1.2-9 1.8-18.2 1.8-27.5zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z" />
                        </svg>
                    </div>
                    <div class="m-3 text-green-400 font-semibold text-center flex-1"> Geografía y Medio Ambiente </div>
                </label>
            </button>
        </li>

        <li>
            <button type="button" id="grupo_37" value="37" class="w-full" @click="searchContent($event)">
                <label for="grupo_37"
                    class="inline-flex items-center w-full rounded-md text-gray-500 bg-white border-2 border-fuchsia-200 transition ease-in-out delay-75 hover:translate-y-1 hover:scale-110 cursor-pointer has-[:checked]:ring-1 has-[:checked]:ring-fuchsia-500">
                    <div class="bg-fuchsia-600 p-3 flex items-center justify-center aspect-square w-16">
                        <svg class="h-3/4 w-3/4" viewBox="0 0 576 512">
                            <path fill="#ffffff"
                                d="M0 48C0 21.5 21.5 0 48 0L336 0c26.5 0 48 21.5 48 48l0 159-42.4 17L304 224l-32 0c-8.8 0-16 7.2-16 16l0 32 0 24.2 0 7.8c0 .9 .1 1.7 .2 2.6c2.3 58.1 24.1 144.8 98.7 201.5c-5.8 2.5-12.2 3.9-18.9 3.9l-96 0 0-80c0-26.5-21.5-48-48-48s-48 21.5-48 48l0 80-96 0c-26.5 0-48-21.5-48-48L0 48zM80 224c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm80 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zM64 112l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16L80 96c-8.8 0-16 7.2-16 16zM176 96c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm80 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zM423.1 225.7c5.7-2.3 12.1-2.3 17.8 0l120 48C570 277.4 576 286.2 576 296c0 63.3-25.9 168.8-134.8 214.2c-5.9 2.5-12.6 2.5-18.5 0C313.9 464.8 288 359.3 288 296c0-9.8 6-18.6 15.1-22.3l120-48zM527.4 312L432 273.8l0 187.8c68.2-33 91.5-99 95.4-149.7z" />
                        </svg>
                    </div>
                    <div class="m-3 text-fuchsia-400 font-semibold text-center flex-1"> Gobierno, Seguridad y Justicia
                    </div>
                </label>
            </button>
        </li>
    </ul>

    <div id="sectorGroup" x-show="openSectores" class="px-4 py-3 w-full"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"></div>
</div>
