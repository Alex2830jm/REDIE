<div x-data="{
    documents: [],

    async filesUpload(event) {
        files = Array.from(event.target.files);
        this.documents = files.map(file => {
            var fileData = {
                url: URL.createObjectURL(file),
                name: file.name,
                preview: ['xlsx', 'xls', 'csv'].includes(file.name.split('.').pop().toLowerCase()),
                size: file.size > 1024
                    ? file.size > 1048576
                        ? Math.round(file.size / 1048576) + 'mb'
                        : Math.round(file.size / 1024) + 'kb'
                    : file.size + 'b',
                progress: 0,
            };

            var reader = new FileReader();
            reader.onprogress = (e) => {
                if(e.lengthComputable) {
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
        });
    }
}">
    <label id="select-image">
        <div class="flex items-center justify-center w-full mt-5">
            <div
                class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-100 hover:bg-gray-200">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                    </svg>
                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click para subir
                            archivo</span> o puedes arrastrarlo y soltarlo</p>
                    <p class="text-xs text-gray-500"> XLSX, XLS or CVS (MAX: 5MB)</p>
                </div>
                {{-- <input hidden type="file" multiple name="fileCE"
                    @change="documents = Array.from($event.target.files).map(file => ({url: URL.createObjectURL(file), name: file.name, preview: ['jpg', 'jpeg', 'png', 'gif', 'xlsx', 'xls', 'csv'].includes(file.name.split('.').pop().toLowerCase()), size: file.size > 1024 ? file.size > 1048576 ? Math.round(file.size / 1048576) + 'mb' : Math.round(file.size / 1024) + 'kb' : file.size + 'b'}))"
                    x-ref="fileInput"> --}}
                <input hidden type="file" name="fileCE" multiple
                    @change="filesUpload($event)" x-ref="fileInput">
            </div>
        </div>
    </label>

    <!-- Preview image here -->
    <div id="preview">
        <template x-for="(document, index) in documents" :key="index">
            <div x-show="document.preview">
                <div class="p-3 bg-white mt-5 border border-solid border-gray-300 rounded-lg">
                    <div class="mb-1 flex justify-between items-center">
                        <div class="flex items-center gap-x-3">
                            <span
                                class="size-10 flex justify-center items-center border border-gray-200 text-gray-500 rounded-lg">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                </svg>
                            </span>
                            <div>
                                <p class="text-sm font-medium text-gray-800">
                                    <span class="truncate inline-block max-w-[300px] align-bottom"
                                        x-text="document.name"></span>
                                </p>
                                <p class="text-xs text-gray-500" x-text="document.size"></p>
                            </div>
                        </div>

                        <div class="flex items-center gap-x-2">
                            <button type="button"
                                class="text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="shrink-0 size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                </svg>
                            </button>
                            <button type="button" @click="documents.splice(index, 1)"
                                class="text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="shrink-0 size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    {{-- <div class="flex items-center gap-x-3 whitespace-nowrap">
                        <div class="w-full h-2 bg-gry-200 rounded-full overflow-hidden" role="progressbar"
                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                            <div
                                class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition-all duration-500"  >
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
</div>
