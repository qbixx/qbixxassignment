<template>
    <div class="w-full">
        <nav
            class="relative w-full flex flex-wrap items-center justify-between py-4 bg-gray-100 text-gray-500 hover:text-gray-700 focus:text-gray-700 shadow-lg navbar navbar-expand-lg navbar-light">
            <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
                <div class="collapse navbar-collapse flex-grow items-center" id="navbarSupportedContent">
                    <ul class="navbar-nav flex flex-col pl-0 list-style-none mr-auto">
                        <li class="nav-item p-2">
                            <Link href="/admin/clients"
                                  class="nav-link text-gray-500 hover:text-gray-700 focus:text-gray-700 p-0">
                                <slot name="header"></slot>
                            </Link>
                        </li>
                    </ul>
                    <Popover class="relative" v-slot="{ open }">
                        <PopoverButton
                            class='flex px-6 py-2 border-2 border-medium-blue bg-medium-blue border-blue-600 text-white leading-tight font-bold rounded-full hover:bg-blue-500 focus:outline-none focus:ring-0 transition duration-150 ease-in-out'>
                            <span>{{ this.currentLocale() }}</span>
                            <ChevronDownIcon
                                class='ml-2 h-5 text-white w-5 group-hover:text-gray-500'
                                aria-hidden="true"/>
                        </PopoverButton>

                        <transition enter-active-class="transition ease-out duration-200"
                                    enter-from-class="opacity-0 translate-y-1"
                                    enter-to-class="opacity-100 translate-y-0"
                                    leave-active-class="transition ease-in duration-150"
                                    leave-from-class="opacity-100 translate-y-0"
                                    leave-to-class="opacity-0 translate-y-1">
                            <PopoverPanel
                                class="absolute left-1/2 z-10 mt-3 max-w-xs -translate-x-1/2 transform  sm:px-0">
                                <div class="overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
                                    <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8">
                                        <template v-for="item in $page.props.languages" :key="item.name">
                                            <button @click="changeLanguage(item)"
                                                    v-if="item.code !== $page.props.locale"
                                                    class="-m-3 block rounded-md px-3 py-1 transition duration-150 ease-in-out hover:bg-gray-50">
                                                <p class="text-base font-medium text-gray-900">{{ item.name }}</p>
                                            </button>
                                        </template>
                                    </div>
                                </div>
                            </PopoverPanel>
                        </transition>
                    </Popover>
                </div>
            </div>
        </nav>

        <slot/>
    </div>
</template>
<script>
import {Popover, PopoverButton, PopoverPanel} from '@headlessui/vue'
import {ChevronDownIcon} from '@heroicons/vue/20/solid'
import {Inertia} from "@inertiajs/inertia";

export default {
    components: {
        Popover, PopoverButton, PopoverPanel, ChevronDownIcon
    },
    setup() {

    },
    props: {
        items: Object,
        client: Object,
        languages: Object
    },
    data() {
        return {}
    },
    methods: {
        currentLocale() {
            return this.$page.props.languages.filter(lang => lang.code === this.$page.props.locale)[0].name
        },
        async changeLanguage(lang) {
            await axios.get('/api/languages/' + lang.code);
            Inertia.reload({ only: ['client','locale','language'] })
        }
    }
}
</script>
