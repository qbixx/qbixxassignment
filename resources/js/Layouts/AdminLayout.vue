<template>
    <Head :title="title"/>

    <div class="w-full min-h-screen flex flex-col bg-gray-100">
        <nav class="relative w-full flex flex-wrap items-center justify-between py-4 bg-white text-gray-500 hover:text-gray-700 focus:text-gray-700 shadow navbar navbar-expand-lg navbar-light">
            <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
                <div class="flex flex-grow justify-between" id="navbarSupportedContent">
                    <ul class="navbar-nav flex flex-col pl-0 list-style-none mr-auto">
                        <li class="nav-item p-2">
                            <Link href="/admin/clients" class="nav-link text-gray-500 hover:text-gray-700 focus:text-gray-700 p-0">Clients</Link>
                        </li>
                    </ul>
                    <ul class="navbar-nav flex flex-col pl-0 list-style-none right-0">
                        <li class="nav-item p-2">
                            <a href="/" class="nav-link text-gray-500 hover:text-gray-700 focus:text-gray-700 p-0">To the front end</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <Breadcrumbs :breadcrumbs="breadcrumbs" :title="title"/>

        <slot />
    </div>
</template>

<script setup>
import Breadcrumbs from "@/js/Components/Layout/Breadcrumbs.vue";
import {usePage} from "@inertiajs/inertia-vue3";
import {ref, watch} from "vue";
import Swal from 'sweetalert2'

const props = defineProps({
    page: {
        type: Object
    },
    title: {
        type: String
    },
    breadcrumbs: {
        type: Array,
        default: () => []
    }
})

const page = usePage()

const successFlashMessage = ref('')
const errorFlashMessage = ref('')

watch(
    () => page.props.value.flash,
    (flash) => {
        successFlashMessage.value = flash.success
        errorFlashMessage.value = flash.error
    },
    {
        deep: true
    }
)

watch(
    successFlashMessage,
    (message) => {
        if (! message) {
            return
        }

        Swal.fire({
            title: 'Success!',
            text: message,
            toast: true,
            icon: 'success',
            position: 'top-right',
            showConfirmButton: false,
            timer: 2500,
            timerProgressBar: true
        })
    }
)

watch(
    errorFlashMessage,
    (message) => {
        if (! message) {
            return
        }

        Swal.fire({
            title: 'Error!',
            text: message,
            toast: true,
            icon: 'danger',
            position: 'top-right',
            showConfirmButton: false,
            timer: 2500,
            timerProgressBar: true
        })
    }
)
</script>
