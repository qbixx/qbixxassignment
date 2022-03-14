<template>
    <AdminLayout>
        <Head title="Clients"/>
        <div class="flex flex-col">
            <div>
                <div class="py-2 inline-block min-w-full">
                    <div class="overflow-hidden">
                        <section class="antialiased text-gray-600 px-4 mt-12">
                            <div class="flex flex-col justify-center h-full">
                                <div
                                    class="w-full max-w-4xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                                    <header class="px-5 py-4 border-b border-gray-100 flex justify-between">
                                        <h2 class="font-semibold text-gray-800">Clients</h2>
                                        <a class="inline-block px-6 py-2 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                                           href="/admin/clients/create">
                                            Create new client
                                        </a>
                                    </header>
                                    <div class="p-3">
                                        <div class="overflow-x-auto">
                                            <table class="table-auto w-full">
                                                <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                                <tr>
                                                    <th class="p-2 whitespace-nowrap">
                                                        <div class="font-semibold text-left">#</div>
                                                    </th>
                                                    <th class="p-2 whitespace-nowrap">
                                                        <div class="font-semibold text-left">Client name</div>
                                                    </th>
                                                    <th class="p-2 whitespace-nowrap">
                                                        <div class="font-semibold text-left">Items added</div>
                                                    </th>
                                                    <th class="p-2 whitespace-nowrap">
                                                        <div class="font-semibold text-center">Actions</div>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody class="text-sm divide-y divide-gray-100">
                                                <tr v-for="client in clients">
                                                    <td class="p-2 whitespace-nowrap">
                                                        <div class="text-left">{{ client.id }}</div>
                                                    </td>
                                                    <td class="p-2 whitespace-nowrap">
                                                        <div class="text-left">{{ client.name }}</div>
                                                    </td>
                                                    <td class="p-2 whitespace-nowrap">
                                                        <div class="text-left font-medium text-green-500"
                                                             :class="{'text-red-500': !client.items.length}">
                                                            {{ client.items.length ? 'Yes' : 'No' }}
                                                        </div>
                                                    </td>
                                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        <div class="flex space-x-2">
                                                            <a class="nav-link text-gray-500 hover:text-gray-700 focus:text-gray-700 py-0 px-1"
                                                               :href="'/clients/' + client.id"
                                                               title="View on front-end">
                                                                <svg class="w-4 h-4 fill-gray-500"
                                                                     xmlns="http://www.w3.org/2000/svg"
                                                                     viewBox="0 0 576 512">
                                                                    <path
                                                                        d="M279.6 160.4C282.4 160.1 285.2 160 288 160C341 160 384 202.1 384 256C384 309 341 352 288 352C234.1 352 192 309 192 256C192 253.2 192.1 250.4 192.4 247.6C201.7 252.1 212.5 256 224 256C259.3 256 288 227.3 288 192C288 180.5 284.1 169.7 279.6 160.4zM480.6 112.6C527.4 156 558.7 207.1 573.5 243.7C576.8 251.6 576.8 260.4 573.5 268.3C558.7 304 527.4 355.1 480.6 399.4C433.5 443.2 368.8 480 288 480C207.2 480 142.5 443.2 95.42 399.4C48.62 355.1 17.34 304 2.461 268.3C-.8205 260.4-.8205 251.6 2.461 243.7C17.34 207.1 48.62 156 95.42 112.6C142.5 68.84 207.2 32 288 32C368.8 32 433.5 68.84 480.6 112.6V112.6zM288 112C208.5 112 144 176.5 144 256C144 335.5 208.5 400 288 400C367.5 400 432 335.5 432 256C432 176.5 367.5 112 288 112z"/>
                                                                </svg>
                                                            </a>
                                                            <a class="nav-link text-blue-500 hover:text-blue-700 focus:text-blue-700 py-0 px-1"
                                                               :href="'/admin/clients/edit/' + client.id" title="Edit">
                                                                <svg class="w-4 h-4 fill-blue-500"
                                                                     xmlns="http://www.w3.org/2000/svg"
                                                                     viewBox="0 0 512 512">
                                                                    <path
                                                                        d="M362.7 19.32C387.7-5.678 428.3-5.678 453.3 19.32L492.7 58.75C517.7 83.74 517.7 124.3 492.7 149.3L444.3 197.7L314.3 67.72L362.7 19.32zM421.7 220.3L188.5 453.4C178.1 463.8 165.2 471.5 151.1 475.6L30.77 511C22.35 513.5 13.24 511.2 7.03 504.1C.8198 498.8-1.502 489.7 .976 481.2L36.37 360.9C40.53 346.8 48.16 333.9 58.57 323.5L291.7 90.34L421.7 220.3z"/>
                                                                </svg>
                                                            </a>
                                                            <form method="post"
                                                                  @submit.prevent="deleteClient(client.id)">
                                                                <button type="submit"
                                                                        class="nav-link text-red-500 hover:text-red-700 focus:text-red-700 py-0 px-1"
                                                                        title="Delete">
                                                                    <svg class="w-4 h-4 fill-red-500"
                                                                         xmlns="http://www.w3.org/2000/svg"
                                                                         viewBox="0 0 448 512">
                                                                        <path
                                                                            d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM394.8 466.1C393.2 492.3 372.3 512 346.9 512H101.1C75.75 512 54.77 492.3 53.19 466.1L31.1 128H416L394.8 466.1z"/>
                                                                    </svg>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script>
import AdminLayout from '../../../Layouts/Admin'
import {Inertia} from "@inertiajs/inertia";

export default {
    components: {AdminLayout},
    props: {
        clients: Object,
    },
    setup() {
        function deleteClient(id) {
            if (window.confirm('Are you sure you want to delete this client?')) {
                Inertia.delete('/admin/clients/' + id);
            }
        }

        return {deleteClient}
    }
}
</script>