<template>
    <nav class="flex py-2 px-6 lg:px-8" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center p-2">
                <a
                    href="/"
                    class="inline-flex items-center text-sm font-medium text-gray-500 duration-150 ease-in hover:text-gray-700"
                >
                    <svg
                        class="mr-2.5 h-3 w-3"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                    >
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"
                        />
                    </svg>
                    Home
                </a>
            </li>
            <li v-for="breadcrumb in completeBreadcrumbs">
                <div class="flex items-center">
                    <svg
                        class="mx-1 h-3 w-3 text-gray-400"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 6 10"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m1 9 4-4-4-4"
                        />
                    </svg>
                    <template v-if="breadcrumb.link">
                        <a
                            :href="breadcrumb.link"
                            class="ml-1 text-sm font-medium text-gray-500 duration-150 ease-in hover:text-gray-700 md:ml-2"
                        >
                            {{ breadcrumb.name }}
                        </a>
                    </template>
                    <template v-else>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">
                            {{ breadcrumb.name }}
                        </span>
                    </template>
                </div>
            </li>
        </ol>
    </nav>
</template>

<script setup>
import { usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";

const page = usePage();

const props = defineProps({
    breadcrumbs: {
        type: Array,
        default: () => [],
    },
    title: {
        type: String,
    },
});

const completeBreadcrumbs = computed(() => {
    let breadcrumbs = props.breadcrumbs;

    breadcrumbs.push({
        name: props.title,
    });

    return breadcrumbs;
});
</script>
