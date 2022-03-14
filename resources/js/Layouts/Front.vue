<template>
    <div class="w-full">
        <nav
            class="relative w-full flex flex-wrap items-center justify-between py-4 bg-white text-gray-500 hover:text-gray-700 focus:text-gray-700 shadow-lg navbar navbar-expand-lg navbar-light h-20">
            <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
                <div class="collapse navbar-collapse flex-grow items-center" id="navbarSupportedContent">
                    <ul class="navbar-nav flex flex-col pl-0 list-style-none mr-auto">
                        <li class="nav-item p-2">
                            <span class="text-xl text-black font-montserrat"><slot name="client"></slot></span>
                        </li>
                    </ul>
                    <div class="flex flex-wrap">
                        <div class="w-full sm:w-6/12 md:w-4/12 px-4">
                            <div class="relative inline-flex align-middle w-full">
                                <button
                                    class="text-white font-bold text-sm px-3 py-1 rounded-full shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 bg-blue-500 ease-linear transition-all duration-150 font-sm px-6 py-2 outline-none focus:outline-none mr-1 mb-1 w-auto flex items-center font-montserrat font-bold"
                                    type="button" @click="toggleDropdown()" ref="btnDropdownRef">
                                    Languages
                                    <ChevronDownIcon class="h-3.5"></ChevronDownIcon>
                                </button>
                                <div v-bind:class="{'hidden': !dropdownPopoverShow, 'block': dropdownPopoverShow}"
                                     class="bg-blue-500 text-base z-50 float-left py-2 list-none text-left rounded shadow-lg py-1"
                                     style="min-width:12rem" ref="popoverDropdownRef">
                                    <LanguageSwitch />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="bg-[#575F65] h-full min-h-[calc(100vh-5rem)]">
            <slot></slot>
        </div>
    </div>
</template>
<script>

import {createPopper} from "@popperjs/core";
import LanguageSwitch from "../Components/LanguageSwitch";
import {ChevronDownIcon} from '@heroicons/vue/solid'

export default {
    components: {
        ChevronDownIcon,
        LanguageSwitch
    },
    data() {
        return {
            dropdownPopoverShow: false,
        }
    },
    methods: {
        toggleDropdown() {
            if (this.dropdownPopoverShow) {
                this.dropdownPopoverShow = false;
            } else {
                this.dropdownPopoverShow = true;
                createPopper(this.$refs.btnDropdownRef, this.$refs.popoverDropdownRef, {
                    placement: "top-end"
                });
            }
        },
    }
}
</script>
