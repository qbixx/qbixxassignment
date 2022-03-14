<template>
    <div v-for="index in [1,2, 3]" class="mb-4 border-b-2 pb-4">
        <label class="text-xl block mb-2 text-gray-700">Item #{{ index }}</label>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label :for="'titleInput' + language + index"
                       class="block mb-2 text-sm font-medium"
                       :class="{'text-red-700 dark:text-red-500' : errors && errors['items.' + (index - 1) + '.' + language + '.title']}">
                    {{ __('title', {}, language) }}</label>
                <input
                    type="text"
                    v-model="myForm[index].title"
                    :id="'titleInput' + language + index"
                    class="border text-sm rounded-lg block w-full p-2.5"
                    :class="{'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:bg-red-100 dark:border-red-400' : errors && errors['items.' + (index - 1) + '.' + language + '.title']}"
                    :placeholder="__('enter item title', {}, language)"
                    @change="emitForm()">
                <p v-if="errors && errors['items.' + (index - 1) + '.' + language + '.title']"
                   class="mt-2 text-sm text-red-600 dark:text-red-500">
                    <span class="font-medium">Oops!</span>
                    {{ errors['items.' + (index - 1) + '.' + language + '.title'] }}
                </p>
            </div>
            <div class="relative">
                <label :for="'typeInput' + language + index"
                       class="block mb-2 text-sm font-medium"
                       :class="{'text-red-700 dark:text-red-500' : errors && errors['items.' + (index - 1) + '.type']}">
                    {{ __('type', {}, language) }}</label>
                <input
                    type="text"
                    v-model="$data['typeValue'][index]"
                    :id="'typeInput' + language + index"
                    class="border text-sm rounded-lg block w-full p-2.5 bg-white"
                    :class="{'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:bg-red-100 dark:border-red-400' : errors && errors['items.' + (index - 1) + '.type']}"
                    :placeholder="__('select type', {}, language)"
                    @input="searchTypes($event)"
                    @focus="toggleSelectingOptions(index, true)"
                >
                <div :class="{'hidden': !selectingOptions[index]}"
                     class="w-full min-h-min border-b border-x p-2 rounded absolute bg-white">
                    <template v-if="searchOptions === null || Object.keys(searchOptions).length">
                        <span class="absolute top-1 right-2 text-red-500 cursor-pointer"
                              @click="toggleSelectingOptions(index, false)">x</span>
                        <div class="cursor-pointer" @click="selectType(optionId, index, option)"
                             v-for="(option, optionId) in searchOptions">{{ option }}
                        </div>
                    </template>
                    <template v-else>
                        <div>No results found!</div>
                    </template>
                </div>
                <p v-if="errors && errors['items.' + (index - 1) + '.type']"
                   class="mt-2 text-sm text-red-600 dark:text-red-500">
                    <span class="font-medium">Oops!</span>
                    {{ errors['items.' + (index - 1) + '.type'] }}
                </p>
            </div>
        </div>
        <div>
            <label :for="'paragraphInput' + language + index"
                   class="block mb-2 text-sm font-medium"
                   :class="{'text-red-700 dark:text-red-500' : errors && errors['items.' + (index - 1) + '.' + language + '.paragraph']}">
                {{ __('paragraph', {}, language) }}</label>
            <textarea
                v-model="myForm[index].paragraph"
                :id="'paragraphInput' + language + index"
                class="border text-sm rounded-lg block w-full p-2.5"
                :class="{'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:bg-red-100 dark:border-red-400' : errors && errors['items.' + (index - 1) + '.' + language + '.paragraph']}"
                :placeholder="__('enter item paragraph', {}, language)"
                @change="emitForm()"></textarea>
            <p v-if="errors && errors['items.' + (index - 1) + '.' + language + '.paragraph']"
               class="mt-2 text-sm text-red-600 dark:text-red-500">
                <span class="font-medium">Oops!</span>
                {{ errors['items.' + (index - 1) + '.' + language + '.paragraph'] }}
            </p>
        </div>
    </div>
</template>

<script>

import {isProxy, toRaw} from "vue";

export default {
    props: {
        totalItems: Number,
        types: Object,
        language: String,
        errors: Object,
        items: Object,
    },
    emits: ['input', 'type-change'],
    data() {
        return {
            searchOptions: null,
            selectingOptions: {
                1: false,
                2: false,
                3: false
            },
            myForm: {
                1: {
                    title: '',
                    paragraph: '',
                    type: ''
                },
                2: {
                    title: '',
                    paragraph: '',
                    type: ''
                },
                3: {
                    title: '',
                    paragraph: '',
                    type: ''
                },
            },
            typeValue: {
                1: '',
                2: '',
                3: ''
            }
        }
    },
    mounted() {
        this.searchTypes({target: {value: ''}});
        if (this.items) {
            for (let i in this.items) {
                this.typeValue[parseInt(i) + 1] = this.types[this.language][this.items[i].type];
                this.myForm[parseInt(i) + 1].id = this.items[i].id;
                this.myForm[parseInt(i) + 1].type = this.items[i].type;
                this.myForm[parseInt(i) + 1].title = this.items[i]['title'][this.language];
                this.myForm[parseInt(i) + 1].paragraph = this.items[i]['paragraph'][this.language];
            }
            this.emitForm();
        }
    },
    methods: {
        setTypeVal(type, index) {
            this.typeValue[index] = this.types[this.language][type];
            this.myForm[index].type = type;
        },
        searchTypes($event) {
            let types = {...this.types[this.language]};
            let val = $event.target.value;
            let results = {};
            for (let key in types) {
                if (types[key].toLowerCase().includes(val)) {
                    results[key] = types[key];
                }
            }

            if(isProxy(results)) {
                results = toRaw(results);
            }

            this.searchOptions = results;
        },


        toggleSelectingOptions(index, value) {
            this.selectingOptions[index] = value;
        },

        selectType(val, index, label) {
            this.myForm[index].type = val;
            this.selectingOptions[index] = false
            this.typeValue[index] = label;
            this.emitForm(index, true, label);
            this.searchTypes({target: {value: ''}});
        },

        emitForm(index = null, typeChange = false, label = null) {
            this.$emit('input', [this.myForm, this.language]);

            if (typeChange && index && label) {
                this.$emit('type-change', [this.myForm[index].type, index, label])
            }
        }
    }
}
</script>