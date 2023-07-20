<template>
    <FrontLayout :title="client.name">
        <div
            class="container-fluid flex w-full flex-grow flex-col bg-[#575F65] p-5"
        >
            <div class="-mx-2 flex flex-wrap items-stretch">
                <div
                    class="w-full px-2 pb-4 md:w-1/3"
                    v-for="article in client.articles"
                >
                    <div
                        class="flex h-full flex-col items-stretch rounded-lg bg-white px-5 pt-10 pb-5"
                    >
                        <div
                            class="-mx-5 p-5 text-center font-montserrat text-[12px] font-semibold uppercase"
                            :class="[
                                clientTypesConfig[article.type[activeLanguage]].fontColor,
                                clientTypesConfig[article.type[activeLanguage]].backgroundColor,
                            ]"
                        >
                            {{ article.type[activeLanguage] }}
                        </div>
                        <h2
                            class="line-clamp-2 mt-8 min-h-[2em] font-montserrat text-[30px] font-bold leading-[50px] md:text-[40px]"
                        >
                            {{ article.title[activeLanguage] }}
                        </h2>
                        <p class="mt-4 flex-grow">
                            {{ article.paragraph[activeLanguage] }}
                        </p>
                        <div class="mt-6">
                            <button
                                class="rounded-full bg-[#249EEA] py-2 px-5 text-[12px] font-bold text-white duration-150 ease-in-out hover:bg-[#1f85c4]"
                            >
                                Just a button
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </FrontLayout>
</template>

<script setup>
import FrontLayout from "@/js/Layouts/FrontLayout.vue";
import { useLanguageStore } from "@/js/Stores/LanguageStore";
import { computed } from "vue";
import clientTypesConfig from "@/js/Config/client-types";

defineProps({
    client: {
        type: Object,
    },
});

const languageStore = useLanguageStore();

const activeLanguage = computed(() => languageStore.activeLanguage);
</script>
