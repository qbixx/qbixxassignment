<template>
    <AdminLayout>
        <Head title="Show Clients"/>
        <template v-slot:header>
           <span>{{client.name}}</span>
        </template>
        <div class="flex bg-medium-grey px-4 pt-10 pb-20 sm:px-6 lg:px-8 lg:pt-10 lg:pb-28">
            <div class="relative mx-auto max-w-7xl">
                <div class="mx-auto mt-12 grid max-w-lg gap-5 lg:max-w-none lg:grid-cols-3">
                    <div v-for="(item,index) in itemsData"
                         class="flex flex-col min-h-[70vh] overflow-hidden rounded-lg shadow-lg bg-white py-6">
                        <div :class="`bg-${typeColors[index]}-300 text-${typeColors[index]}-900`" class="py-2 my-6 font-bold uppercase text-center">
                            {{ item.type.name[this.$page.props.locale] }}
                        </div>
                        <div class="px-6">
                            <a href="#" class="mt-2 block">
                                <p class="pr-2 text-7xl font-bold text-black text-wrap line-clamp-2 min-h-[148px] max-h-[148px] overflow-hidden">{{ item.title[this.$page.props.locale] }}</p>
                                <p class="mt-3 text-xl text-black">{{ item.paragraph[this.$page.props.locale] }}</p>
                            </a>
                        </div>
                        <div class="px-6 mt-2 flex flex-1 items-end">
                            <a class="inline-block px-6 py-2 border-2 border-medium-blue bg-medium-blue border-blue-600 text-white leading-tight font-bold rounded-full hover:bg-blue-500 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                               :href="'/admin/clients/'+client.id+'/edit'">
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
import {itemListData} from "@/js/Utils/mockData";

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
    data() {
       return {
           typeColors : ['blue','orange','pink'],
           itemsData : this.items.length === 0 ? itemListData : this.items,
       }
    },
    methods: {}
}
</script>
