<template>
    <AppLayout>
        <Head :title="`Show Client - ${client.name}`" />

        <template #title>
            {{ client.name }}
        </template>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <div v-for="item in client.items" :key="item.id" class="flex flex-col bg-white justify-between rounded-lg py-8">
                <div class="w-full text-center font-extrabold py-4" :class="typeStyles(item.type)">
                    {{ trans(item.type, $page.props.locale) }}
                </div>
                <div class="max-h-44 h-full p-4 text-[3.125rem] line-clamp-2 font-montserrat text-black">
                    {{ item.title[$page.props.locale] }}
                </div>
                <div class="h-full p-4 text-xl">
                    {{ item.paragraph[$page.props.locale] }}
                </div>
                <div class="p-4">
                    <button class="font-montserrat font-bold text-base text-white bg-primary hover:outline-sky-700 hover:bg-sky-700 transition-colors rounded-full px-6 py-3">
                        {{ trans('Just a button', $page.props.locale) }}
                    </button>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "@/js/Layouts/AppLayout";

export default {
    name: "Show",
    components: { AppLayout },
    props: ['client'],
    methods: {
        typeStyles(type) {
            return {
                'bg-red-300 text-red-600': type === 'Wisdom',
                'bg-purple-300 text-purple-600': type === 'Philosophy',
                'bg-indigo-300 text-indigo-600': type === 'Design',
            }
        }
    }
}
</script>

<style scoped>

</style>
