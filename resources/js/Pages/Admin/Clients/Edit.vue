<template>
    <AdminLayout>
        <Head title="Edit Clients" />

        <div class="w-full py-8 flex justify-center">
            <div class="block p-6 rounded-lg shadow-lg bg-white w-1/3">
                <form method="POST" @submit.prevent="form.post('/admin/clients/create')">
                    <div class="form-group mb-6">
                        <label for="name" class="form-label inline-block mb-2 text-gray-700">
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

                        <div v-if="form.errors.name" class="mt-2 font-semibold text-red-500">
                            {{ form.errors.name }}
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

                        <button type="submit" :disabled="form.processing" class="inline-block px-6 py-2 border-2 border-blue-600 bg-blue-600 border-blue-600 text-white leading-tight font-bold rounded hover:bg-blue-500 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                            Edit Client
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="flex flex-row justify-center" >
            <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px">
                    <li class="mr-2">
                        <a href="#" class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Profile</a>
                    </li>
                    <li class="mr-2">
                        <a href="#" class="inline-block p-4 text-blue-600 rounded-t-lg border-b-2 border-blue-600 active dark:text-blue-500 dark:border-blue-500" aria-current="page">Dashboard</a>
                    </li>
                    <li class="mr-2">
                        <a href="#" class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Settings</a>
                    </li>
                </ul>
            </div>
        </div>
    </AdminLayout>
</template>

<script>
    import {useForm} from '@inertiajs/inertia-vue3'
    import AdminLayout from '@/js/Layouts/AdminLayout.vue'

    export default {
        components: {
            AdminLayout,
        },
        props: {
            client: Object,
            locales: Array,
        },
        setup(props) {


            const form = useForm({
                name: props.client.name,
            })
            return {form}
        },
    }
</script>
