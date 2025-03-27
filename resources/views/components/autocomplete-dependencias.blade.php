@props(['collection' => [], 'typecollection'])

{{-- Se creo compontent autocomplete para buscar alguna dependencia informativa.
        Donde:
            1 = Si se desea se desea mostrar con las unidades / hijos
            2 = Si se desea solo mostrar dependencias / unidades 
 --}}

<div x-data="{
    query: '',
    di_id: '',
    filtered: [],
    selectedIndex: -1,
    collection: {{ json_encode($collection) }},

    subQuery: '',
    ui_id: '',
    subFiltered: [],
    subCollection: [],
    subSelectedIndex: -1,

    typecollection: {{ $typecollection }},

    filterResults() {
        this.filtered = this.collection.filter(item =>
            item.nombreDI.toLowerCase().includes(this.query.toLowerCase()) && item.nivelDI === 1
        );
        this.selectedIndex = -1;
    },

    subFilterResults() {
        if (this.di_id) {
            this.subFiltered = this.subCollection.filter(subItem =>
                subItem.padreDI === this.di_id &&
                subItem.nombreDI.toLowerCase().includes(this.subQuery.toLowerCase())
            );
        }
        this.subSelectedIndex = -1;
    },

    navigate(direction, type) {
        if (type === '1' && this.filtered.length > 0) {
            this.selectedIndex = (this.selectedIndex + direction + this.filtered.length) % this.filtered.length;
        }

        if (type === '2' && this.subFiltered.length > 0) {
            this.subSelectedIndex = (this.subSelectedIndex + direction + this.subFiltered.length) % this.subFiltered.length;
        }
    },

    selectResult(type, result = null) {
        if (type === '1') {
            if (result === null && this.selectedIndex >= 0) {
                result = this.filtered[this.selectedIndex];
            }
            if (result) {
                this.query = result.nombreDI;
                this.di_id = result.id;
                this.subQuery = '';

                this.filtered = [];
                this.subFiltered = [];
                this.subCollection = this.collection.filter(item => item.padreDI === this.di_id);
            }
        }

        if (type === '2') {
            if (result === null && this.subSelectedIndex >= 0) {
                result = this.subFiltered[this.subSelectedIndex];
            }

            if (result) {
                this.subQuery = result.nombreDI;
                this.ui_id = result.id;
                this.subFiltered = [];
            }
        }
    }
}" class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3">
        <input 
            type="text"
            x-model="di_id"
            name="{{ $typecollection === '1' ? 'di_id' : 'ui_id' }}" hidden readonly>
        <label 
            class="text-sm font-semibold text-gray-700" 
            for="query">
            Busca la {{ $typecollection === '1' ? 'dependencia informativa' : 'unidad informariva' }}
        </label>
        <input
            type="text" 
            x-model="query"
            id="autocompletePadre"
            @input="filterResults()"
            @focus="filterResults()"
            @keydown.arrow-down.prevent="navigate(1, '1')"
            @keydown.arrow-up.prevent="navigate(-1, '1')"
            @keydown.enter.prevent="selectResult('1')"
            class="block w-full px-4 py-3 text-sm text-gray-700 bg-gray-50 border border-gray-400 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40"
            placeholder="Busca/Selecciona la dependencia informativa"
            autocomplete="off">
        <ul x-show="filtered.length > 0"
            class="absolute z-10 mt-1 max-h-56 overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black/5 focus:outline-none sm:text-sm">
            <template x-for="(result, index) in filtered" :key="index">
                <li @click="selectResult('1', result)" @mouseenter="selectedIndex = index"
                    :class="{ 'bg-cherry-900 text-white': selectedIndex === index }"
                    class="relative cursor-default select-none py-2 pl-3 pr-9 tex-gray-800">
                    <div class="flex items-center">
                        <span x-text="result.numDI + ' - ' + result.nombreDI"></span>
                    </div>
                </li>
            </template>
        </ul>
    </div>
    <div x-show="query" class="w-full md:w-1/2 px-3">
        <input type="text" x-model="ui_id" name="{{ $typecollection === '1' ? 'ui_id' : '' }}" hidden readonly>
        <label class="text-sm font-semibold text-gray-700" for="subQuery">Busca la
            {{ $typecollection === '1' ? 'unidad informariva' : '' }}</label>
        <input type="text" x-model="subQuery" @input="subFilterResults()"
            @focus="subFilterResults()"
            @keydown.arrow-down.prevent="navigate(1, '2')" @keydown.arrow-up.prevent="navigate(-1, '2')"
            @keydown.enter.prevent="selectResult('2')"
            class="block w-full px-4 py-3 text-sm text-gray-700 bg-gray-50 border border-gray-400 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40"
            placeholder="Busca/Selecciona la dependencia informativa" autocomplete="off">
        <ul x-show="subFiltered.length > 0"
            class="absolute z-10 mt-1 max-h-56 overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black/5 focus:outline-none sm:text-sm">
            <template x-for="(result, index) in subFiltered" :key="index">
                <li @click="selectResult('2', result)" @mouseenter="subSelectedIndex = index"
                    :class="{ 'bg-cherry-900 text-white': subSelectedIndex === index }"
                    class="relative cursor-default select-none py-2 pl-3 pr-9 tex-gray-800">
                    <div class="flex items-center">
                        <span x-text="result.numDI + ' - ' + result.nombreDI"></span>
                    </div>
                </li>
            </template>
        </ul>
    </div>
</div>
