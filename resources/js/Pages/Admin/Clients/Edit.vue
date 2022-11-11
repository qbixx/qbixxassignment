<template>
    <AdminLayout>
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

                        <div class="col-span-1" v-for="(itemList,indexList) in form.itemsList" :key="indexList">
                            <h2 class="mt-4 font-bold">Item {{ indexList + 1 }}</h2>
                            <div v-for="(language,languageIndex) in languages" :key="languageIndex">
                                <h2 class="mt-4 font-bold">{{ language['name'] }}</h2>
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
                                <select
                                    type="text"
                                    v-model="form.itemsList[indexList].type_id"
                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                >
                                    <option v-for="(type,typeIndex) in types" :key="typeIndex" :value="type['id']">
                                        {{ type['name'].en }}
                                    </option>
                                </select>
                                <span
                                    class="mt-2 block text-red-800">{{
                                        form.errors["itemsList." + indexList + ".type_id."]
                                    }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="w-full flex items-end justify-end space-x-8">
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

export default {
    components: {
        AdminLayout,
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

        }
    }
}
</script>
