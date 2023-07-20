<template>
    <div class="h-screen w-full flex flex-col">
        <nav
            class="navbar navbar-light navbar-expand-lg relative flex w-full flex-wrap items-center justify-between bg-gray-100 pt-2 pb-1 text-gray-500 shadow-lg hover:text-gray-700 focus:text-gray-700"
        >
            <div
                class="container-fluid flex w-full flex-wrap items-center justify-between px-6"
            >
                <div
                    class="flex flex-grow items-stretch justify-between"
                    id="navbarSupportedContent"
                >
                    <h1
                        class="inline-block font-montserrat text-[20px] text-black tracking-tight"
                    >
                        {{ title }}
                    </h1>
                    <LanguagePicker />
                </div>
            </div>
        </nav>

        <slot />
    </div>
</template>

<script setup>
import LanguagePicker from "@/js/Components/Layout/LanguagePicker.vue";

defineProps({
    title: {
        type: String
    }
})
</script>
