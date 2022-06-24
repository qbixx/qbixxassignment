<script setup>
import { useForm } from '@inertiajs/inertia-vue3'
import AdminLayout from '@/js/Layouts/AdminLayout.vue'
import InputError from '@/js/Components/Form/InputError.vue'

const form = useForm({
  name: null,
})
</script>

<template>
  <AdminLayout>
    <Head title="New Client" />

    <div class="flex w-full justify-center py-8">
      <div class="block w-1/3 rounded-lg bg-white p-6 shadow-lg">
        <form method="POST" @submit.prevent="form.post('/admin/clients/create')">
          <div class="form-group mb-6">
            <label for="name" class="form-label mb-2 inline-block text-gray-700"> Name </label>
            <input id="name" v-model="form.name" name="name" type="text" placeholder="Enter client name" class="form-control m-0 block w-full rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-base font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none" />
            <InputError :message="form.errors.name" />
          </div>

          <div class="flex w-full items-end justify-end space-x-8">
            <a href="/admin/clients" title="Return to index" class="inline-block px-6 py-2 font-bold leading-tight transition duration-150 ease-in-out focus:outline-none focus:ring-0"> Cancel </a>

            <button type="submit" :disabled="form.processing" class="inline-block rounded border-2 border-blue-600 bg-blue-600 px-6 py-2 font-bold leading-tight text-white transition duration-150 ease-in-out hover:bg-blue-500 focus:outline-none focus:ring-0">Create Client</button>
          </div>
        </form>
      </div>
    </div>
  </AdminLayout>
</template>