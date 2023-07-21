<template>
    <AdminLayout
        :breadcrumbs="breadcrumbs"
        :title="isCreationMode ? 'Create article' : 'Edit article'"
    >
        <div class="flex w-full flex-col items-center justify-center py-8">
            <form
                class="block w-1/2 rounded bg-white p-6 shadow"
                @submit.prevent="submit"
            >
                <Tabs
                    nav-class="flex items-stretch text-sm font-medium text-center -mb-[1px]"
                    nav-item-class="mr-2 border border-gray-200 translate-y-[2px] duration-150 ease"
                    nav-item-active-class="border-b-[1px] border-b-white !translate-y-0 z-[2]"
                    nav-item-link-class="inline-block py-2 px-4 duration-150 ease text-bold text-[16px] text-gray-500 hover:text-gray-700"
                    nav-item-link-active-class="active text-gray-700"
                    panels-wrapper-class="border-t-[1px] border-t-gray-200 z-[1] bg-white pt-4 relative"
                >
                    <Tab v-for="(language, code) in languages" :id="code" :name="language">
                        <div class="form-group mb-6">
                            <label
                                for="title"
                                class="form-label mb-2 inline-block text-gray-700"
                            >
                                Title
                            </label>
                            <input
                                id="title"
                                name="title"
                                type="text"
                                v-model="form.title[code]"
                                placeholder="Entries article title"
                                class="form-control m-0 block w-full rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-base font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none"
                            />

                            <div
                                v-if="form.errors[`title.${code}`]"
                                class="mt-2 font-semibold text-red-500"
                            >
                                {{ form.errors[`title.${code}`] }}
                            </div>
                        </div>

                        <div class="form-group mb-6">
                            <label
                                for="paragraph"
                                class="form-label mb-2 inline-block text-gray-700"
                            >
                                Paragraph
                            </label>
                            <textarea
                                id="paragraph"
                                name="paragraph"
                                v-model="form.paragraph[code]"
                                placeholder="Entries article title"
                                class="form-control m-0 block w-full rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-base font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none"
                            />

                            <div
                                v-if="form.errors[`paragraph.${code}`]"
                                class="mt-2 font-semibold text-red-500"
                            >
                                {{ form.errors[`paragraph.${code}`] }}
                            </div>
                        </div>

                        <div class="form-group mb-6">
                            <label
                                for="type"
                                class="form-label mb-2 inline-block text-gray-700"
                            >
                                Type
                            </label>

                            <select
                                name="type"
                                id="type"
                                class="form-control m-0 block w-full rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-base font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none"
                                v-model="form.type[code]"
                            >
                                <option
                                    v-for="articleType in articleTypes"
                                    :value="articleType"
                                >
                                    {{ articleType }}
                                </option>
                            </select>

                            <div
                                v-if="form.errors[`type.${code}`]"
                                class="mt-2 font-semibold text-red-500"
                            >
                                {{ form.errors[`type.${code}`] }}
                            </div>
                        </div>
                    </Tab>
                </Tabs>
            </form>
        </div>

        <footer
            class="fixed-bottom w-full bg-white text-center text-gray-500 shadow hover:text-gray-700 focus:text-gray-700"
        >
            <div class="container-fluid py-4 px-6">
                <div class="flex w-full items-end justify-end space-x-8">
                    <a
                        href="/admin/clients"
                        title="Return to index"
                        class="inline-block rounded border-[1px] border-gray-300 bg-white px-6 py-2 font-bold leading-tight text-gray-500 transition duration-150 ease-in-out hover:border-gray-700 hover:text-gray-700 focus:outline-none focus:ring-0"
                    >
                        Back
                    </a>

                    <button
                        type="button"
                        :disabled="form.processing"
                        @click="submit"
                        class="inline-block rounded border-[1px] border-blue-600 bg-blue-600 px-6 py-2 font-bold leading-tight text-white transition duration-150 ease-in-out hover:border-blue-500 hover:bg-blue-500 focus:outline-none focus:ring-0"
                    >
                        {{ isCreationMode ? "Create Article" : "Update Article" }}
                    </button>
                </div>
            </div>
        </footer>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/js/Layouts/AdminLayout.vue";
import { Tab, Tabs } from "vue3-tabs-component";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    client: {
        type: Object,
        required: false
    },
    article: {
        type: Object,
        required: false
    },
    breadcrumbs: {
        type: Array
    },
    languages: {
        type: Object
    },
    articleTypes: {
        type: Object
    },
});

console.log(props)

const isCreationMode = !props.article;

const form = useForm({
    title: props.article?.title || {},
    paragraph: props.article?.paragraph || {},
    type: props.article?.type || {},
});

const submit = () => {
    const uri = isCreationMode
        ? `/admin/clients/${props.client.id}/articles`
        : `/admin/clients/${props.article.client_id}/articles/${props.article.id}`;

    const method = isCreationMode ? "post" : "put";

    form[method](uri);
};
</script>
