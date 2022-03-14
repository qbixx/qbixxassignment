<template>
    <Front>
        <Head :title="'Client - ' + client.name"/>
        <template v-slot:client>{{ client.name }}</template>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 h-full py-12 px-12">
            <div v-for="item in myItems" class="h-full bg-white rounded-lg min-h-[700px]">
                <div class="h-1/6 pt-12">
                    <div class="w-full text-center font-extrabold py-4" :class="typePanelClasses(item)">
                        {{ item.item_type.name[locale] }}
                    </div>
                </div>
                <div class="px-4 h-5/6">
                    <div class="text-[50px] h-1/4 font-montserrat font-bold text-black text-ellipsis line-clamp-2">
                        {{ item.title[locale] }}
                    </div>
                    <div class="h-3/4">
                        <div class="text-xl h-4/5 font-montserrat text-black">{{ item.paragraph[locale] }}</div>
                        <button
                            class="font-montserrat font-bold text-base text-white bg-blue-500 hover:outline-blue-700 hover:bg-blue-700 rounded-full px-6 py-3">
                            {{ __('just a button') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full flex justify-center">
            <a class="inline-flex items-center px-8 py-2 border border-transparent font-bold rounded-full text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
               href="/admin/clients">To admin panel</a>
        </div>
    </Front>
</template>
<script>
import Front from "../../../Layouts/Front";

export default {
    props: {
        client: Object,
        myItems: Object,
    },
    components: {Front},
    data() {
        return {
            availableColors: {
                blue: null,
                yellow: null,
                red: null
            },
        }
    },
    computed: {
        languages() {
            return this.$page.props.availableLanguages;
        },
        locale() {
            return this.$page.props.locale;
        },
    },
    methods: {
        typePanelClasses(item) {
            return {
                'bg-red-200': item.item_type.id === 1,
                'text-red-700': item.item_type.id === 1,
                'bg-yellow-200': item.item_type.id === 2,
                'text-yellow-700': item.item_type.id === 2,
                'bg-blue-200': item.item_type.id === 3,
                'text-blue-700': item.item_type.id === 3,
            }
        }
    }
}
</script>