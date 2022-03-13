<template>
  <app-layout>
    <div class="p-4 rounded shadow bg-white">
      <div class="mb-3 text-right">
        <a :href="route('admin.clients.create')"
           class="inline-flex items-center rounded whitespace-nowrap justify-center px-4 py-2 border border-transparent font-semibold text-base text-white tracking-tight focus:outline-none focus:ring transition bg-blue-500 hover:bg-blue-700 active:bg-blue-900 focus:ring-blue-300">Create
          new client</a>
      </div>
      <div class="w-full overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-2 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider whitespace-nowrap">
              #
            </th>
            <th class="px-6 py-2 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider whitespace-nowrap">
              Client Name
            </th>
            <th class="px-6 py-2 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider whitespace-nowrap">
              Actions
            </th>
          </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
          <tr v-for="(client, i) in clients" :key="i">
            <td class="px-6 py-2 whitespace-nowrap">{{ client.id }}</td>
            <td class="px-6 py-2 whitespace-nowrap">{{ client.name }}</td>
            <td class="px-6 py-2 whitespace-nowrap">
              <div class="text-gray-400 space-x-2">
                <a :href="route('front.clients.show', client.id)" class="inline-block hover:text-blue-700">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                       xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2"></path>
                    <path
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                        stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2"></path>
                  </svg>
                </a>
                <a :href="route('admin.clients.edit', client.id)" class="inline-block hover:text-blue-700">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                       xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                        stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2"></path>
                  </svg>
                </a>
                <button class="hover:text-red-700" @click="deleteClient(client)">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                       xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                        stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2"></path>
                  </svg>
                </button>
              </div>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/layouts/AppLayout";
import JButton from '@/templates/Button'
import {inject} from 'vue'
import {Inertia} from "@inertiajs/inertia";

export default {
  name: "Index",
  props: ['clients'],
  components: {
    AppLayout,
    JButton
  },
  setup() {
    // Providers
    const swal = inject('swal')

    // Methods
    const deleteClient = (client) => {
      swal.fire({
        title: "",
        html: "<h1 class='text-lg text-gray-800 mb-1'>Delete Client</h1><p class='text-base'>Are you sure want to delete this record?</p>",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: "Delete Record"
      }).then((result) => {
        if (result.value) {
          Inertia.delete(route('admin.clients.destroy', client.id), {
            preserveScroll: false
          })
        }
      })
    }

    return {
      deleteClient
    }
  }
}
</script>

<style scoped></style>