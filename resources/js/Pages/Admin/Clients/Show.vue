<template>
    <AdminLayout>
        <Head title="Show Clients"/>
        <template v-slot:header>
           <span>{{client.name}}</span>
        </template>

        <div class="relative h-screen bg-gray-300 px-4 pt-16 pb-20 sm:px-6 lg:px-8 lg:pt-24 lg:pb-28">
            <div class="relative mx-auto max-w-7xl">
                <div class="mx-auto mt-12 grid max-w-lg gap-5 lg:max-w-none lg:grid-cols-3">
                    <div v-for="item in items"
                         class="flex flex-col min-h-[60vh] overflow-hidden rounded-lg shadow-lg bg-white py-6">
                        <div class="py-2 my-6 font-bold uppercase bg-blue-300 text-blue-900 text-center">
                            {{ item.type.name[this.$page.props.locale] }}
                        </div>
                        <div class="px-6">
                            <a href="#" class="mt-2 block">
                                <p class="text-xl font-semibold text-gray-900">{{ item.title[this.$page.props.locale] }}</p>
                                <p class="mt-3 text-base text-gray-500">{{ item.paragraph[this.$page.props.locale] }}</p>
                            </a>
                        </div>
                        <div class="px-6 mt-2 flex flex-1 items-end">
                            <a class="inline-block px-6 py-2 border-2 border-blue-600 bg-blue-600 border-blue-600 text-white leading-tight font-bold rounded-full hover:bg-blue-500 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                               :href="'/admin/'+client.id+'/edit'">
                                Edit
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script>
import AdminLayout from '@/js/Layouts/AdminLayout.vue'
import {Inertia} from '@inertiajs/inertia'

export default {
    components: {
        AdminLayout,
    },
    setup() {

    },
    props: {
        items: Object,
        client : Object
    },
    methods: {}
}
</script>
