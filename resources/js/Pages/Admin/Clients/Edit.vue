<template>
    <AdminLayout>
        <Head title="Edit Client" />

        <form method="POST" class="pt-4" @submit.prevent="form.put(`/admin/clients/${client.id}/update`)">
            <div class="flex justify-center" v-for="(err1, err2) in form.errors">
                <div class="mt-2 font-semibold text-red-500">
                    {{ err1 }}
                </div>
            </div>
            <div class="w-full py-4 flex justify-center">
                <div class="block p-6 rounded-lg shadow-lg bg-white w-1/3">
                    <div class="form-group mb-6">
                        <label for="name" class="form-label inline-block mb-2 text-gray-700">
                            Client Name
                        </label>
                        <input
                            id="name"
                            name="name"
                            required
                            type="text"
                            v-model="form.name"
                            placeholder="Enter client name"
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        >

                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <h1 class="font-bold">Client Items</h1>
            </div>

            <div class="flex flex-wrap gap-5 justify-center pt-5">
                <div v-for="item, key in form.items" :key="key" class="flex flex-col gap-2">
                    <div class="w-full flex ">
                        <div class="block p-6 rounded-lg shadow-lg bg-white w-full">
                            <div class="form-group mb-6">
                                <label for="type" class="form-label inline-block mb-2 text-gray-700">
                                    {{key+1}}) Type
                                </label>
                                <select required name="type" id="type"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal
                                        text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                                        rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white
                                        focus:border-blue-600 focus:outline-none"
                                        v-model="item.type"
                                >
                                    <option>Design</option>
                                    <option>Wisdom</option>
                                    <option>Philosophy</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex py-8" >
                        <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
                            <ul class="flex flex-wrap -mb-px">
                                <li v-for="(locale, language) in locales" class="mr-2">
                                    <a @click="changeItemLocal(locale)" href="#" class="inline-block p-4 rounded-t-lg border-b-2 border-transparent
                        hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" :class="isLocalActive(locale === itemLocale)">{{ language }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="w-full py-1 flex ">
                        <div class="block p-6 rounded-lg shadow-lg bg-white">
                            <div>
                                <div class="form-group mb-6">
                                    <label for="title" class="form-label inline-block mb-2 text-gray-700">
                                        Title
                                    </label>
                                    <input
                                        id="title"
                                        name="title"
                                        required
                                        type="text"
                                        v-model="item['title'][itemLocale]"
                                        placeholder="Enter client name"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    >
                                </div>
                                <div class="form-group mb-6">
                                    <label for="paragraph" class="form-label inline-block mb-2 text-gray-700">
                                        Paragraph
                                    </label>
                                    <textarea required v-model="item['paragraph'][itemLocale]" rows="7" name="paragraph" id="paragraph"
                                              class="form-control block w-full px-3 py-1.5 text-base font-normal
                                          text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    >
                                    </textarea>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center">
                <button type="submit" :disabled="form.processing" class="mt-4 mb-4
                px-6 py-2 border-2 border-blue-600 bg-blue-600 border-blue-600 text-white
            leading-tight font-bold rounded hover:bg-blue-500 focus:outline-none focus:ring-0
            transition duration-150 ease-in-out">
                    Update Client
                </button>
            </div>

        </form>

    </AdminLayout>
</template>

<script>
    import {useForm} from '@inertiajs/inertia-vue3'
    import { ref } from 'vue'
    import AdminLayout from '@/js/Layouts/AdminLayout.vue'

    export default {
        components: {
            AdminLayout,
        },
        props: {
            client: Object,
            locales: Array,
            items: Array,
        },
        setup(props) {

            const itemLocale = ref("en");

            const form = useForm({
                name: props.client.name,
                items: props.items
            })

            const isLocalActive = (active) => {
                if(active) return "text-blue-600 rounded-t-lg border-b-2 border-blue-600 active dark:text-blue-500 dark:border-blue-500"
                return "rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
            }

            const changeItemLocal = (locale) => {
                itemLocale.value = locale
            }

            return {
                form,
                locales: props.locales,
                isLocalActive,
                changeItemLocal,
                itemLocale,
                client: props.client,
            }
        },
    }
</script>
