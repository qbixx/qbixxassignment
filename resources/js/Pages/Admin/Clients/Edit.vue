<template>
    <AdminLayout>
        <Head title="New Client" />

        <div class="w-full py-8 flex justify-center">
            <form method="POST" @submit.prevent="updateClient(locale)">
                <div class="block p-6 rounded-lg shadow-lg bg-white w-full">
                    <div class="form-group mb-6">
                        <label
                            for="name"
                            class="form-label inline-block mb-2 text-gray-700"
                        >
                            Client Name
                        </label>
                        <input
                            id="name"
                            name="name"
                            type="text"
                            v-model="form.name"
                            placeholder="Enter client name"
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        />

                        <div
                            v-if="form.errors.name"
                            class="mt-2 font-semibold text-red-500"
                        >
                            {{ form.errors.name }}
                        </div>
                    </div>
                </div>

                <div class="grid grid-rows-3 grid-flow-col gap-4">
                    <div
                        v-for="(item, index) in form.items"
                        :key="index"
                        class="row-start-1 row-end-4"
                    >
                        <div
                            class="block p-6 rounded-lg shadow-lg bg-white w-full mt-8 py-4"
                        >
                            <h3 class="text-2xl mb-6">ITEM #{{ index + 1 }}</h3>

                            <div class="form-group mb-6">
                                <div class="form-group mb-6">
                                    <label
                                        for="title"
                                        class="form-label inline-block mb-2 text-gray-700"
                                    >
                                        Title
                                    </label>
                                    <input
                                        id="title"
                                        name="title"
                                        required
                                        type="text"
                                        v-model="form.items[index].title"
                                        placeholder="Enter client name"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    />
                                </div>

                                <label
                                    for="type"
                                    class="form-label inline-block mb-2 text-gray-700"
                                >
                                    Type
                                </label>
                                <select
                                    required
                                    name="type"
                                    id="type"
                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    v-model="form.items[index].type_id"
                                >
                                    <option
                                        v-for="(type, index) in itemTypes"
                                        :key="index"
                                        :value="type.id"
                                    >
                                        {{ type.name }}
                                    </option>
                                </select>

                                <div class="form-group mb-6">
                                    <label
                                        for="paragraph"
                                        class="form-label inline-block mb-2 text-gray-700"
                                    >
                                        Paragraph
                                    </label>
                                    <textarea
                                        required
                                        v-model="form.items[index].paragraph"
                                        rows="7"
                                        name="paragraph"
                                        id="paragraph"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full flex items-end justify-end space-x-8 my-10">
                    <a
                        :href="`/${locale}/admin/clients`"
                        title="Return to index"
                        class="inline-block px-6 py-2 leading-tight font-bold focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="inline-block px-6 py-2 border-2 border-blue-600 bg-blue-600 border-blue-600 text-white leading-tight font-bold rounded hover:bg-blue-500 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                    >
                        Update Client
                    </button>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import AdminLayout from "@/js/Layouts/AdminLayout.vue";
import { Inertia } from "@inertiajs/inertia";

export default {
    components: {
        AdminLayout,
    },
    props: {
        client: Object,
        itemTypes: Array,
    },

    setup(props) {
        const form = useForm({
            name: props.client.name,
            items: props.client.items,
        });

        function updateClient(locale) {
            Inertia.post(
                `/${locale}/admin/client/${props.client.id}/update`,
                this.form
            );
        }

        return { form, updateClient };
    },

    computed: {
        locale() {
            return this.$page.props.locale;
        },
    },
};
</script>
