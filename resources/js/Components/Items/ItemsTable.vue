<template>
    <div class="overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-white border-b">
            <tr>
                <th scope="col" class="w-1/12 text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    #
                </th>
                <th scope="col" class="w-auto text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Title
                </th>
                <th scope="col" class="w-auto text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Type
                </th>
                <th scope="col" class="w-4/12 text-sm font-medium text-gray-900 px-6 py-4 text-right">
                    Actions
                </th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="item in items" class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                    <td class="w-1/12 px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ item.id }}</td>
                    <td class="w-auto text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ item.title[$page.props.locale] }}</td>
                    <td class="w-auto text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ item.type }}</td>
                    <td class="w-4/12 text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        <div class="flex space-x-2 justify-end">
                            <Link :href="'/admin/clients/' + client.id + '/items/' + item.id + '/edit'" class="nav-link text-gray-500 hover:text-gray-700 focus:text-gray-700 py-0 px-1" title="Edit Item">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path d="M362.7 19.32C387.7-5.678 428.3-5.678 453.3 19.32L492.7 58.75C517.7 83.74 517.7 124.3 492.7 149.3L444.3 197.7L314.3 67.72L362.7 19.32zM421.7 220.3L188.5 453.4C178.1 463.8 165.2 471.5 151.1 475.6L30.77 511C22.35 513.5 13.24 511.2 7.03 504.1C.8198 498.8-1.502 489.7 .976 481.2L36.37 360.9C40.53 346.8 48.16 333.9 58.57 323.5L291.7 90.34L421.7 220.3z" />
                                </svg>
                            </Link>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import { computed } from 'vue'
import { Link, usePage } from "@inertiajs/inertia-vue3";

export default {
    name: "ItemsTable",
    props: ['items', 'client'],
    components: {
        Link
    },
    setup() {
        const locale = computed(() => usePage().props.value.locale);

        console.log(locale);

        return { locale };
    }
}
</script>

<style scoped>

</style>
