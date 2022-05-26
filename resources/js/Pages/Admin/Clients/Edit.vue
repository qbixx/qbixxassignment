<template>
    <AdminLayout>
        <Head :title="`Edit Client - ${client.name}`" />

        <div class="w-full py-8 max-w-7xl mx-auto flex flex-col justify-center items-center space-y-8">
            <div class="block w-full p-6 rounded-lg shadow-lg bg-white">

                <form method="POST" @submit.prevent="updateClient">
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
                            Update Client
                        </button>
                    </div>
                </form>
            </div>

            <ItemsTable class="block w-full" :items="client.items" :client="client" />
        </div>
    </AdminLayout>
</template>

<script>
import AdminLayout from "@/js/Layouts/AdminLayout";
import { useForm } from "@inertiajs/inertia-vue3";
import ItemsTable from "@/js/Components/Items/ItemsTable";

export default {
    name: "Edit",
    components: { ItemsTable, AdminLayout },
    props: ['client'],
    setup(props) {
        const form = useForm({
            name: props.client.name,
        })

        return { form }
    },
    methods: {
        updateClient() {
            this.form.patch(`/admin/clients/${this.client.id}/update`);
        }
    }
}
</script>

<style scoped>

</style>
