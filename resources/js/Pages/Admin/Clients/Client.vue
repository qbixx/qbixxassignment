<template>
    <AdminLayout
        :breadcrumbs="breadcrumbs"
        :title="isCreationMode ? 'New Client' : 'Edit Client'"
    >
        <div class="flex w-full flex-col items-center justify-center py-8">
            <div class="block w-1/3 rounded bg-white p-6 shadow">
                <form method="POST" @submit.prevent="submit">
                    <div class="form-group mb-6">
                        <label
                            for="name"
                            class="form-label mb-2 inline-block text-gray-700"
                        >
                            Name
                        </label>
                        <input
                            id="name"
                            name="name"
                            type="text"
                            v-model="form.name"
                            placeholder="Enter client name"
                            class="form-control m-0 block w-full rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-base font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none"
                        />

                        <div
                            v-if="form.errors.name"
                            class="mt-2 font-semibold text-red-500"
                        >
                            {{ form.errors.name }}
                        </div>
                    </div>
                </form>
            </div>

            <div class="mt-4 overflow-hidden rounded bg-white shadow" v-if="!isCreationMode">
                <div class="flex flex-row justify-between px-6 py-4">
                    <h2 class="mr-2">Articles</h2>
                    <div class="flex flex-col items-center justify-center">
                        <a
                            :href="`/admin/clients/${client.id}/articles/create`"
                            class="inline-block rounded border-[1px] border-blue-600 bg-blue-600 px-3 py-1 text-sm font-bold leading-tight text-white transition duration-150 ease-in-out hover:border-blue-500 hover:bg-blue-500 focus:outline-none focus:ring-0"
                        >
                            Create article
                        </a>
                    </div>
                </div>
                <table class="min-w-full">
                    <thead class="border-b bg-white">
                        <tr>
                            <th
                                scope="col"
                                class="w-1/12 px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-black"
                            >
                                #
                            </th>
                            <th
                                scope="col"
                                class="w-auto px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-black"
                            >
                                Article name
                            </th>
                            <th
                                scope="col"
                                class="w-4/12 px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-black"
                            >
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="article in client.articles"
                            class="border-b bg-white transition duration-150 ease-in-out hover:bg-gray-100"
                        >
                            <td
                                class="w-1/12 whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-700"
                            >
                                {{ article.id }}
                            </td>
                            <td
                                class="w-auto whitespace-nowrap px-6 py-4 text-sm font-light text-gray-900"
                            >
                                {{ Object.values(article.title)[0] }}
                            </td>
                            <td
                                class="w-4/12 whitespace-nowrap px-6 py-4 text-sm font-light text-gray-700"
                            >
                                <div class="flex justify-end space-x-2">
                                    <a
                                        class="nav-link px-1 py-0 text-gray-500 hover:text-gray-700 focus:text-gray-700"
                                        :href="`/admin/clients/${article.client_id}/articles/${article.id}/edit`"
                                        title="Edit"
                                    >
                                        <svg
                                            class="h-4 w-4 fill-gray-500 duration-150 ease-in hover:fill-gray-700"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512"
                                        >
                                            <path
                                                d="M362.7 19.32C387.7-5.678 428.3-5.678 453.3 19.32L492.7 58.75C517.7 83.74 517.7 124.3 492.7 149.3L444.3 197.7L314.3 67.72L362.7 19.32zM421.7 220.3L188.5 453.4C178.1 463.8 165.2 471.5 151.1 475.6L30.77 511C22.35 513.5 13.24 511.2 7.03 504.1C.8198 498.8-1.502 489.7 .976 481.2L36.37 360.9C40.53 346.8 48.16 333.9 58.57 323.5L291.7 90.34L421.7 220.3z"
                                            />
                                        </svg>
                                    </a>
                                    <a
                                        class="nav-link px-1 py-0 text-gray-500 hover:text-gray-700 focus:text-gray-700"
                                        href="#"
                                        title="Delete"
                                        @click.prevent="
                                            confirmArticleDeletion(article)
                                        "
                                    >
                                        <svg
                                            class="h-4 w-4 fill-gray-500 duration-150 ease-in hover:fill-gray-700"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 448 512"
                                        >
                                            <path
                                                d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM394.8 466.1C393.2 492.3 372.3 512 346.9 512H101.1C75.75 512 54.77 492.3 53.19 466.1L31.1 128H416L394.8 466.1z"
                                            />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <footer
            class="fixed-bottom w-full bg-white text-center text-gray-500 shadow hover:text-gray-700 focus:text-gray-700"
        >
            <div class="container-fluid px-6 py-4">
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
                        {{ isCreationMode ? "Create Client" : "Update Client" }}
                    </button>
                </div>
            </div>
        </footer>
    </AdminLayout>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import AdminLayout from "@/js/Layouts/AdminLayout.vue";
import Swal from "sweetalert2";
import { useLanguageStore } from "@/js/Stores/LanguageStore";

const props = defineProps({
    client: {
        type: Object,
        required: false,
    },
    breadcrumbs: {
        type: Array,
    },
    languages: {
        type: Object,
    },
});

const isCreationMode = !props.client;

const form = useForm({
    name: props.client?.name,
});

const submit = () => {
    const uri = isCreationMode
        ? "/admin/clients"
        : `/admin/clients/${props.client.id}`;

    const method = isCreationMode ? "post" : "put";

    form[method](uri);
};

const addArticleForm = useForm({
    title: "",
    paragraph: "",
    type: null,
});

const addArticle = () =>
    addArticleForm.post(`/admin/clients/${props.client.id}/articles`);

const languageStore = useLanguageStore();

const confirmArticleDeletion = (article) => {
    Swal.fire({
        title: `Are you sure you want to delete article ${
            article.title[languageStore.activeLanguage]
        }?`,
        icon: "error",
        confirmButtonText: "Delete",
        showCancelButton: true,
    }).then((result) => {
        if (!result.isConfirmed) {
            return;
        }

        useForm({}).delete(
            `/admin/clients/${article.client_id}/articles/${article.id}`
        );
    });
};
</script>
