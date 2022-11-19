<template>
    <AdminLayout>
        <template v-slot:header>
            <span>{{ client.name }}</span>
        </template>
        <Head title="Update Client"/>
        <div class="py-8 flex justify-center">
            <div class="block p-6 rounded-lg shadow-lg bg-white w-10/12">
                <form method="POST" @submit.prevent="form.post('/admin/clients/'+client.id)">
                    <div class="md:grid md:grid-cols-3 gap-4">
                        <div class="col-span-3">
                            <label for="name" class="form-label inline-block mt-2 text-gray-700">
                                Name
                            </label>
                            <input
                                id="name"
                                name="name"
                                type="text"
                                v-model="form.name"
                                placeholder="Enter client name"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            >
                            <span
                                class="mt-2 block text-red-800">{{
                                    form.errors.name
                                }}</span>
                        </div>
                        <div class="col-span-3">
                            <div class="block">
                                <div class="border-b border-gray-200">
                                    <nav class="-mb-px flex" aria-label="Tabs">
                                        <button type="button" v-for="tab in tabs" :key="tab.name"
                                                @click="tabChangeLanguage(tab.code)"
                                                :class="[tab.current ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300', hasErrors(tab.code) ? 'border-red-700 text-red-700' : '', 'w-1/3 py-4 px-1 text-center border-b-2 font-medium text-sm']"
                                                :aria-current="tab.current ? 'page' : undefined">{{ tab.name }}
                                        </button>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1" v-for="(itemList,indexList) in form.itemsList" :key="indexList">
                            <div v-for="(language,languageIndex) in languages" :key="languageIndex">
                                <div :class="language.code === currentLangTab ? '': 'hidden'">
                                    <label
                                        class="form-label inline-block mt-2 text-gray-700">
                                        Title
                                    </label>
                                    <input
                                        type="text"
                                        v-model="form.itemsList[indexList].title[language.code]"
                                        placeholder="Enter title name"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    >
                                    <span
                                        class="mt-2 block text-red-800">{{
                                            form.errors["itemsList." + indexList + ".title." + language.code]
                                        }}</span>
                                    <label class="form-label inline-block mt-2 text-gray-700">
                                        Paragraph
                                    </label>
                                    <textarea
                                        type="text"
                                        rows="3"
                                        v-model="form.itemsList[indexList].paragraph[language.code]"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    />
                                    <span
                                        class="mt-2 block text-red-800">{{
                                            form.errors["itemsList." + indexList + ".paragraph." + language.code]
                                        }}</span>
                                    <label class="form-label inline-block mt-2 text-gray-700">
                                        Type
                                    </label>
                                    <v-select v-model="form.itemsList[indexList].type_id"
                                              :reduce="(option) => option.id"
                                              :options="typeSelectOptions()">
                                    </v-select>
                                    <span
                                        class="mt-2 block text-red-800">{{
                                            form.errors["itemsList." + indexList + ".type_id"]
                                        }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full flex items-end justify-end space-x-8 mt-5">
                        <a
                            href="/admin/clients"
                            title="Return to index"
                            class="inline-block px-6 py-2 leading-tight font-bold focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                        >
                            Cancel
                        </a>

                        <button type="submit" :disabled="form.processing"
                                class="inline-block px-6 py-2 border-2 border-blue-600 bg-blue-600 border-blue-600 text-white leading-tight font-bold rounded hover:bg-blue-500 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                            Update Client
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </AdminLayout>
</template>

<script>
import {useForm} from '@inertiajs/inertia-vue3'
import AdminLayout from '@/js/Layouts/AdminLayout.vue'
import {itemListData} from '@/js/Utils/mockData';
import vSelect from 'vue-select'

export default {
    components: {
        AdminLayout,
        vSelect
    },
    props: {
        client: Object,
        types: Object,
        languages: Object,
        items: Object,
    },
    data() {
        return {
            form: useForm({
                name: this.client.name,
                itemsList: this.items.length === 0 ? itemListData : this.items,
            }),
            tabs: [
                {id: 1, name: 'English', code: 'en', current: true, error: true},
                {id: 2, name: 'Dutch', code: 'nl', current: false, error: false},
                {id: 3, name: 'French', code: 'fr', current: false, error: false},
            ],
            currentLangTab: 'en'
        }
    },
    methods: {
        tabChangeLanguage(code) {
            this.currentLangTab = code;
            this.tabs.forEach(tab => {
                tab.current = tab.code === code
            })
        },
        hasErrors(code) {
            let errors = JSON.stringify(this.form.errors);
            return errors.includes(code);
        },
        typeSelectOptions() {
           return  this.types.map(type => {
                return {'id': type.id, "label": type.name[this.$page.props.locale]}
            })
        }
    }
}
</script>
