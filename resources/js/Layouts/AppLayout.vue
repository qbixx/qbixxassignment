<template>
    <div class="bg-secondary min-h-screen">
        <header class="bg-white w-full px-4 py-4 border-b border-slate-200 shadow">
            <div class="container flex justify-between items-center mx-auto">
                <h1 class="text-xl text-black font-montserrat">
                    <slot name="title" />
                </h1>
                <div>
                    <Menu>
                        <MenuButton
                            class="inline-flex items-center space-x-2 rounded-xl bg-primary px-2 py-0.5 text-white font-montserrat font-bold">
                            <span>{{ trans('Language', $page.props.locale) }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </MenuButton>
                        <MenuItems
                            class="absolute right-0 mt-2 w-56 origin-top-right bg-white rounded-lg ring-1 shadow-lg ring-opacity-5 focus:outline-none">
                            <MenuItem v-for="(language, locale) in locales"
                                      class="text-gray-900 flex w-full items-center rounded-md px-2 py-2 text-sm">
                                <Link :href="`/locale/${locale}`" method="post" :class="locale === $page.props.locale ? 'bg-sky-100' : 'cursor-pointer'">{{ language }}</Link>
                            </MenuItem>
                        </MenuItems>
                    </Menu>
                </div>
            </div>
        </header>

        <main class="container mx-auto pb-8 pt-8">
            <slot />
        </main>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import { Menu, MenuButton, MenuItems, MenuItem } from "@headlessui/vue";

export default {
    name: "AppLayout",
    components: { MenuButton, Menu, MenuItems, MenuItem, Link },
    computed: {
        locales() {
            return {
                en: "English",
                fr: "France",
                nl: "Dutch"
            }
        }
    }
}
</script>

<style scoped>

</style>
