<x-dashboard-layout>
    <div x-data="{
        documents: [],
        yearPost: '',
    
        async filesUpload(event) {
            let files = Array.from(event.target.files);
            console.log(files);
    
    
            let existingFiles = new Set(this.documents.map(doc => doc.name));
            let newFiles = files.filter(file => !existingFiles.has(file.name));
    
            let fileDataArray = await Promise.all(newFiles.map(async (file) => {
                let data = await $.get(`{{ route('upload.infoCuadroEstadistico') }}?numero_ce=${file.name}`);
                let fileData = {
                    file: file,
                    url: URL.createObjectURL(file),
                    name: file.name,
                    preview: ['xlsx', 'xls', 'csv'].includes(file.name.split('.').pop().toLowerCase()),
                    size: file.size > 1024 ?
                        file.size > 1048576 ?
                        Math.round(file.size / 1048576) + 'MB' :
                        Math.round(file.size / 1024) + 'KB' : file.size + 'B',
                    progress: 0,
                    idCE: data.cuadroEstadistico.length > 0 ? data.cuadroEstadistico[0].id : 0,
                    nameCE: data.cuadroEstadistico.length > 0 ? data.cuadroEstadistico[0].nombreCuadroEstadistico : 'No existe el cuadro estadistico',
                };
                console.log(fileData);

                let reader = new FileReader();
    
                reader.onprogress = (e) => {
                    if (e.lengthComputable) {
                        fileData.progress = Math.round((e.loaded / e.total) * 100);
                        this.$nextTick(() => this.documents = [...this.documents]);
                    }
                };
    
                reader.onloadend = () => {
                    fileData.progress = 100;
                    this.$nextTick(() => this.documents = [...this.documents]);
                };
    
                reader.readAsArrayBuffer(file);
                return fileData;
            }));
    
            this.documents = [...this.documents, ...fileDataArray];
            console.log(this.documents);

            this.addFiletToInput();
        },
    
        addFiletToInput() {
            let dataTransfer = new DataTransfer();

            this.documents.forEach(doc => {
                dataTransfer.items.add(doc.file);
            });

            this.$refs.fileInput.files = dataTransfer.files;
        },

        removeFile(index) {
            this.documents.splice(index, 1);
            this.addFiletToInput()
        }
    }">

        <div class="pr-10 pl-10">
            <div class="flex px-4 my-6">
                <h2 class="text-xl font-semibold text-gray-700">Carga Masiva de Archivos Historicos a Cuadros
                    Estadísticos</h2>
            </div>

            <form method="POST" action="{{ route('upload.storeFiles') }}" enctype="multipart/form-data">
                @csrf
                <div class="px-4 py-2 bg-white shadow rounded-lg">
                    <h2 class="text-lg font-semibold text-gray-500">Selecciona el año de publicación de los archivos</h2>
                    <div class="flex flex-wrap gap-3 mb-5">
                        @php
                            $year = date('Y');
                            for ($i = $year; $i >= 2010; $i--) {
                                echo '
                                    <div>
                                        <label for="year_' . $i . '" class="flex cursor-pointer items-center justify-center rounded-md border border-gray-300 bg-gray-100 px-3 py-2 text-gray-900 hover:border-gray-400 has-[:checked]:border-blue-500 has-[:checked]:bg-blue-500 has-[:checked]:text-white">
                                            <input x-model="yearPost" type="radio" name="yearPost" value="' . $i . '" id="year_' . $i . '" class="sr-only" />
                                            <p class="text-sm font-medium"> ' . $i . ' </p>
                                        </label>
                                    </div>
                                ';
                            }
                        @endphp
                    </div>

                    <h2 class="text-lg font-semibold text-gray-500">Agrega los archivos para subir</h2>
                    <label id="select-image">
                        <div class="flex items-center justify-center w-full mb-5">
                            <div
                                class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-100 hover:bg-gray-200">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click para subir
                                            archivo</span> o puedes arrastrarlo y soltarlo</p>
                                    <p class="text-xs text-gray-500"> XLSX, XLS or CVS (MAX: 5MB)</p>
                                </div>
                                {{-- <input hidden type="file" multiple name="fileCE"
                                @change="documents = Array.from($event.target.files).map(file => ({url: URL.createObjectURL(file), name: file.name, preview: ['jpg', 'jpeg', 'png', 'gif', 'xlsx', 'xls', 'csv'].includes(file.name.split('.').pop().toLowerCase()), size: file.size > 1024 ? file.size > 1048576 ? Math.round(file.size / 1048576) + 'mb' : Math.round(file.size / 1024) + 'kb' : file.size + 'b'}))"
                                x-ref="fileInput"> --}}
                                <input type="file" name="fileCE[]" @change="filesUpload($event)" hidden multiple
                                    accept=".xlsx, .xls, .csv" x-ref="fileInput">
                            </div>
                        </div>
                    </label>

                    <template x-if="documents.length > 0">
                        <div class="">
                            <h2 class="text-lg font-semibold text-gray-500">Listado de archivos por subir</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                                <template x-for="(document, index) in documents" :key="index">
                                    <div x-show="document.preview">
                                        <div>
                                            <input type="text" name="indexFile[]" x-model="index" hidden readonly />
                                            <input type="text" name="idCE[]" x-model="document.idCE" hidden  readonly />
                                            <input type="text" name="fileName[]" x-model="document.name" hidden />
                                        </div>

                                        <div class="p-3 bg-white border border-solid border-gray-300 rounded-xl">
                                            <div class="mb-1 flex justify-between items-center">
                                                <div class="flex items-center gap-x-3">
                                                    <span
                                                        class="size-10 flex justify-center items-center border border-gray-200 text-gray-500 rounded-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="size-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                        </svg>
                                                    </span>
                                                    <div class="">
                                                        <p class="flex text-sm font-medium text-gray-800 justify-between">
                                                            <span class="truncate inline-block max-w-[300px] align-bottom"
                                                                x-text="document.name"></span>
                                                            <span class="truncate inline-block max-w-[300px] align-bottom"
                                                                x-text="document.size"> </span>
                                                            <span class="truncate inline-block max-w-[300px] align-bottom"
                                                                x-text="yearPost"></span>
                                                        </p>
                                                        <p class="text-xs text-justify text-gray-500" x-text="document.nameCE"> </p>
                                                    </div>
                                                </div>

                                                <div class="flex items-center ml-2 mr-2 gap-x-2 justify-end">
                                                    <button type="button" @click="removeFile(index)"
                                                        class="text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class=" shrink-0 w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                                {{-- <div class="flex items-center gap-x-3 whitespace-nowrap mt-2">
                                                    <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden" role="progressbar"
                                                        :aria-valenow="document.progress" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition-all duration-500"
                                                            :style="'width: ' + document.progress + '%'">
                                                        </div>
                                                    </div>
                                                    <div class="w-10 text-end">
                                                        <span class="text-sm text-gray-800">
                                                            <span x-text="document.progress">0</span>%
                                                        </span>
                                                    </div>
                                                </div> --}}
                                        </div>
                                    </div>
                                </template>
                            </div>
                            <hr class="border-2 border-gray-300">
                            <div class="flex justify-end mt-5">
                                <button type="submit"
                                    class="inline-flex items-center px-3 py-2 bg-blue-500 text-white text-sm font-medium rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-5 w-6 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
                                    </svg>
                                    Guardar Archivos
                                </button>
                            </div>
                        </div>
                    </template>
                </div>
            </form>
        </div>

</x-dashboard-layout>
