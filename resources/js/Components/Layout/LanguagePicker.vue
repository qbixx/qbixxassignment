<template>
    <div class="relative self-end">
        <button
            :id="id"
            class="inline-flex items-center rounded-full bg-[#249EEA] px-5 py-1 text-center text-sm font-bold text-white duration-150 ease-in-out hover:bg-blue focus:outline-none"
            type="button"
            @click="show = !show"
        >
            Language
            <svg
                class="ml-2.5 h-2.5 w-2.5"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 10 6"
            >
                <path
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="m1 1 4 4 4-4"
                />
            </svg>
        </button>
        <div
            id="dropdown"
            class="absolute right-0 top-[100%] z-10 mt-1 w-44 divide-y divide-gray-100 rounded-lg bg-white shadow"
            v-show="show"
        >
            <ul
                class="py-2 text-sm text-gray-700"
                :aria-labelledby="id"
                v-for="(language, code) in languages"
            >
                <li>
                    <a
                        href="#"
                        class="block px-4 py-2 hover:bg-gray-100"
                        @click="setActiveLanguage(code)"
                    >
                        {{ code }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { useLanguageStore } from "@/js/Stores/LanguageStore";
import languages from "@/js/Config/languages";

defineProps({
    id: {
        type: String,
    },
});

const show = ref(false);

const languageStore = useLanguageStore();

const setActiveLanguage = (language) => {
    languageStore.setLanguage(language);

    show.value = false;
};
</script>
