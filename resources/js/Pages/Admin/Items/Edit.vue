<template>
    <AdminLayout>
        <Head :title="`Edit Item - ${item.title[$page.props.locale]}`" />

        <div class="w-full py-8 max-w-7xl mx-auto flex flex-col justify-center items-center space-y-8">
            <div class="block w-full p-6 rounded-lg shadow-lg bg-white">

                <div class="mb-5">
                    <div v-for="error in form.errors" class="text-red-500 text-sm font-semibold">
                        {{ error }}
                    </div>
                </div>

                <form method="POST" @submit.prevent="updateItem">
                    <div class="form-group mb-6">
                        <label for="name" class="form-label inline-block mb-2 text-gray-700">
                            Title
                        </label>
                        <input
                            id="title"
                            name="title"
                            type="text"
                            v-model="form.title[$page.props.locale]"
                            placeholder="Enter client name"
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        >

                        <div v-if="form.errors[`title.${$page.props.locale}`]" class="mt-2 font-semibold text-red-500">
                            {{ form.errors[`title.${$page.props.locale}`] }}
                        </div>
                    </div>

                    <div class="form-group mb-6">
                        <label for="paragraph" class="form-label inline-block mb-2 text-gray-700">
                            Paragraph
                        </label>
                        <textarea
                            id="paragraph"
                            name="paragraph"
                            type="text"
                            v-model="form.paragraph[$page.props.locale]"
                            placeholder="Paragraph..."
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        ></textarea>

                        <div v-if="form.errors.paragraph" class="mt-2 font-semibold text-red-500">
                            {{ form.errors.paragraph }}
                        </div>
                    </div>

                    <div class="form-group mb-6">
                        <label for="type" class="form-label inline-block mb-2 text-gray-700">
                            Type
                        </label>
                        <select
                            id="type"
                            name="type"
                            v-model="form.type"
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        >
                            <option value="Wisdom">Wisdom</option>
                            <option value="Philosophy">Philosophy</option>
                            <option value="Design">Design</option>
                        </select>

                        <div v-if="form.errors.title" class="mt-2 font-semibold text-red-500">
                            {{ form.errors.paragraph }}
                        </div>
                    </div>

                    <div class="w-full flex items-end justify-end space-x-8">
                        <Link
                            :href="'/admin/clients/' + client.id + '/edit'"
                            title="Return to index"
                            class="inline-block px-6 py-2 leading-tight font-bold focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                        >
                            Cancel
                        </Link>

                        <button type="submit" :disabled="form.processing" class="inline-block px-6 py-2 border-2 border-blue-600 bg-blue-600 border-blue-600 text-white leading-tight font-bold rounded hover:bg-blue-500 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                            Update Client
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>

<script>
import AdminLayout from "@/js/Layouts/AdminLayout";
import { useForm, Link } from "@inertiajs/inertia-vue3";

export default {
    name: "Edit",
    components: { AdminLayout, Link },
    props: ['item', 'client'],
    setup(props) {
        const form = useForm({
            title: {
                en: props.item.title.en,
                fr: props.item.title.fr,
                nl: props.item.title.nl,
            },
            paragraph: {
                en: props.item.paragraph.en,
                fr: props.item.paragraph.fr,
                nl: props.item.paragraph.nl,
            },
            type: props.item.type,
        })

        return { form }
    },
    methods: {
        updateItem() {
            this.form.patch(`/admin/clients/${this.client.id}/items/${this.item.id}/update`, {
                errorBag: 'updateItem',
            })
        }
    }
}
</script>

<style scoped>

</style>
