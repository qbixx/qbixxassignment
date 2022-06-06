<template>
    <div class="w-full">
        <nav
            class="relative w-full flex flex-wrap items-center justify-between py-4 bg-gray-100 text-gray-500 hover:text-gray-700 focus:text-gray-700 shadow-lg navbar navbar-expand-lg navbar-light"
        >
            <div
                class="container-fluid w-full flex flex-wrap items-center justify-between px-6"
            >
                <div
                    class="collapse navbar-collapse flex-grow items-center"
                    id="navbarSupportedContent"
                >
                    <a
                        class="flex items-center text-gray-900 hover:text-gray-900 focus:text-gray-900 mt-2 lg:mt-0 mr-1"
                        href="#"
                    >
                    </a>
                    <ul
                        class="navbar-nav flex flex-col pl-0 list-style-none mr-auto"
                    >
                        <li class="nav-item p-2">
                            <Link
                                :href="`/${locale}/admin/clients`"
                                class="nav-link text-gray-500 hover:text-gray-700 focus:text-gray-700 p-0"
                                >Clients</Link
                            >
                        </li>
                    </ul>
                    <ul
                        class="navbar-nav flex flex-col pl-0 list-style-none right-0"
                    >
                        <li class="nav-item p-2">
                            <a
                                :href="`/${locale}`"
                                class="nav-link text-gray-500 hover:text-gray-700 focus:text-gray-700 p-0"
                                >To the front end</a
                            >
                        </li>
                        <li class="nav-item p-2">
                            <div class="relative inline-block text-left right-0">
                                <div>
                                    <button
                                        @click="toggleDropdown()"
                                        type="button"
                                        class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500"
                                        id="menu-button"
                                        :aria-expanded="isActive"
                                        :contenteditable="isActive"
                                    >
                                        {{
                                            this.$page.props.availableLanguages[
                                                this.locale
                                                ]
                                        }}

                                        <svg
                                            class="-mr-1 ml-2 h-5 w-5"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                            :aria-hidden="isActive"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                    </button>
                                </div>

                                <div
                                    v-bind:class="{
                                hidden: !isActive,
                                block: isActive,
                            }"
                                    class="origin-top-right right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none absolute"
                                    role="menu"
                                    aria-orientation="vertical"
                                    aria-labelledby="menu-button"
                                    tabindex="-1"
                                >
                                    <div class="py-1" role="none">
                                        <LanguageSwitch />
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <slot />
    </div>
</template>

<script>
import LanguageSwitch from "../Components/LanguageSwitch";

export default {
    components: {
        LanguageSwitch,
    },

    data() {
        return {
            isActive: false,
        };
    },

    computed: {
        locale() {
            return this.$page.props.locale;
        },
    },

    methods: {
        toggleDropdown() {
            this.isActive = !this.isActive;
        },
    }
};
</script>
