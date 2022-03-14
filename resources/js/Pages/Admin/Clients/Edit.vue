<template>
    <AdminLayout>
        <Head title="Edit Client"/>
        <div class="w-full flex justify-center">
            <div class="block p-6 rounded-lg shadow-lg bg-white w-2/3">
                <form method="POST" @submit.prevent="updateClient">
                    <div class="form-group mb-6 w-1/3">
                        <label for="nameInput" class="block mb-2 text-sm font-medium"
                               :class="{'text-red-700 dark:text-red-500' : errors && errors.name}">Name</label>
                        <input
                            type="text"
                            name="name"
                            id="nameInput"
                            v-model="form.name"
                            class="border text-sm rounded-lg block w-full p-2.5"
                            :class="{'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:bg-red-100 dark:border-red-400' : errors && errors.name}"
                            placeholder="Enter client name">
                        <p v-if="errors && errors.name"
                           class="mt-2 text-sm text-red-600 dark:text-red-500">
                            <span class="font-medium">Oops!</span>
                            {{ errors.name }}
                        </p>
                    </div>
                    <div class="form-group mb-6">
                        <label class="inline-block mb-2 text-gray-700">Please enter the translations for all three languages.</label>
                        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                            <ul class="flex flex-wrap -mb-px" id="myTab" data-tabs-toggle="#myTabContent"
                                role="tablist">
                                <li class="mr-2" role="presentation">
                                    <button @click="currentTab = 1"
                                            :class="{'active' : currentTab === 1}"
                                            class="inline-block py-4 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300"
                                            id="english-tab" data-tabs-target="#english" type="button" role="tab"
                                            aria-controls="english" aria-selected="false">English
                                    </button>
                                </li>
                                <li class="mr-2" role="presentation">
                                    <button @click="currentTab = 2"
                                            :class="{'active' : currentTab === 2}"
                                            class="inline-block py-4 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300"
                                            id="dutch-tab" data-tabs-target="#dutch" type="button" role="tab"
                                            aria-controls="dutch" aria-selected="true">Dutch
                                    </button>
                                </li>
                                <li class="mr-2" role="presentation">
                                    <button @click="currentTab = 3"
                                            :class="{'active' : currentTab === 3}"
                                            class="inline-block py-4 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300"
                                            id="french-tab" data-tabs-target="#french" type="button" role="tab"
                                            aria-controls="french" aria-selected="false">French
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div id="myTabContent">
                            <div class="p-4 rounded-lg"
                                 :class="{'hidden': currentTab !== 1, 'block': currentTab === 1}" id="english"
                                 role="tabpanel"
                                 aria-labelledby="english-tab">
                                <ItemRow :types="types" language="en" @type-change="typeChange($event)"
                                         ref="itemRow1" :items="clientItems"
                                         @input="setForm($event)" :errors="errors" :total-items="totalItems"></ItemRow>
                            </div>
                            <div class="p-4 rounded-lg"
                                 :class="{'hidden': currentTab !== 2, 'block': currentTab === 2}" id="dutch"
                                 role="tabpanel"
                                 aria-labelledby="dutch-tab">
                                <ItemRow :types="types" language="nl" @type-change="typeChange($event)"
                                         ref="itemRow2" :items="clientItems"
                                         @input="setForm($event)" :errors="errors" :total-items="totalItems"></ItemRow>
                            </div>
                            <div class="p-4 rounded-lg"
                                 :class="{'hidden': currentTab !== 3, 'block': currentTab === 3}" id="french"
                                 role="tabpanel"
                                 aria-labelledby="french-tab">
                                <ItemRow :types="types" language="fr" @type-change="typeChange($event)"
                                         ref="itemRow3" :items="clientItems"
                                         @input="setForm($event)" :errors="errors" :total-items="totalItems"></ItemRow>
                            </div>
                        </div>
                    </div>

                    <div class="w-full flex flex-row justify-between">
                        <a
                            type="submit"
                            class="inline-block px-6 py-2 border-2 border-gray-800 text-gray-800 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                            href="/admin/clients">
                            Cancel
                        </a>

                        <button
                            type="submit"
                            class="inline-block px-6 py-2 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                            Update Client
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>

<script>
import {reactive, ref} from "vue";
import {Inertia} from '@inertiajs/inertia'
import AdminLayout from '../../../Layouts/Admin'
import ItemRow from "../../../Components/Clients/ItemRow";

export default {
    props: {
        types: Object,
        client: Object,
        clientItems: Object,
        errors: Object
    },
    components: {ItemRow, AdminLayout},
    setup(props) {
        const itemRow1 = ref(null);
        const itemRow2 = ref(null);
        const itemRow3 = ref(null);

        const form = reactive({
            name: props.client.name,
            items: {
                0: {
                    en: {},
                    nl: {},
                    fr: {},
                    type: ''
                },
                1: {
                    en: {},
                    nl: {},
                    fr: {},
                    type: ''
                },
                2: {
                    en: {},
                    nl: {},
                    fr: {},
                    type: ''
                }
            }
        })

        function setForm($event) {
            let form = $event[0];
            let language = $event[1];
            for (let i = 0; i < 3; i++) {
                this.form['items'][i][language] = {
                    title: form[i + 1].title,
                    paragraph: form[i + 1].paragraph,
                };
                this.form['items'][i].type = form[i + 1].type;
                this.form['items'][i].id = form[i + 1].id;
            }
        }

        function typeChange($event) {
            let type = $event[0];
            let index = $event[1];

            itemRow1.value?.setTypeVal(type, index);
            itemRow2.value?.setTypeVal(type, index);
            itemRow3.value?.setTypeVal(type, index);
        }

        function updateClient() {
            Inertia.put('/admin/clients/' + props.client.id, this.form)
        }

        return {updateClient, form, setForm, typeChange, itemRow1, itemRow2, itemRow3}
    },
    data() {
        return {
            currentTab: 1,
            totalItems: 3,
        }
    },
    computed: {
        languages() {
            return this.$page.props.availableLanguages;
        },
    }
}
</script>
