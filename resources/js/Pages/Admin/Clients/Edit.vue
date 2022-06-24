<script setup>
import { ref } from 'vue'
import { usePage, useForm } from '@inertiajs/inertia-vue3'
import AdminLayout from '@/js/Layouts/AdminLayout.vue'
import TheLabel from '@/js/Components/Form/Label.vue'
import TheInput from '@/js/Components/Form/Input.vue'
import TheTextarea from '@/js/Components/Form/Textarea.vue'
import TheCombo from '@/js/Components/Form/Combo.vue'
import InputError from '@/js/Components/Form/InputError.vue'

const props = defineProps({
  client: Object,
  items: Object,
  itemTypes: Object,
})

const availableLocales = usePage().props.value.availableLocales
const locale = ref(usePage().props.value.locale)

const form = useForm({
  name: props.client.name,
  items: props.items,
})

const submit = () => {
  const url = `/admin/clients/edit/${props.client.id}`

  form.put(url, {
    onSuccess: () => form.reset(),
  })
}
</script>

<template>
  <AdminLayout>
    <Head title="New Client" />
    <div class="flex w-full justify-center py-8 mb-20">
      <div class="w-full max-w-7xl rounded-lg bg-white m-6 shadow-lg overflow-hidden">
        <nav class="flex py-4 px-6 justify-end border-b border-gray-100">
          <button
            v-for="availableLocale in availableLocales" 
            :key="availableLocale.value"
            class="px-6"
            :class="[locale === availableLocale.value ? 'border-blue-600' : 'border-white', 'p-2 text-blue-600 border-2 font-bold leading-tight rounded']" 
            @click="locale = availableLocale.value"
          >
            <span class="relative">
              <span v-if="form.errors[availableLocale.value]" class="absolute -top-1 -right-5 flex flex-no-shrink items-center justify-center bg-red-500 text-white rounded-full text-xs h-4 w-4">
                E
              </span>
              {{ availableLocale.text }}
            </span>
          </button>
        </nav>
        <div>
          <form method="POST" @submit.prevent="submit">
            <div class="grid grid-cols-1 gap-6 p-6">
              <div class="grid grid-cols-3 gap-6 p-3 bg-gray-100/25 rounded">
                <div>
                  <TheLabel for="type" value="Name" />
                  <input id="name" v-model="form.name" name="name" type="text" placeholder="Enter client name" class="form-control m-0 block w-full rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-base font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none" />
                  <InputError :message="form.errors.name" />
                </div>
              </div>

              <div v-for="(item, itemIndex) in form.items" :key="item.id" class="grid grid-cols-3 gap-6 p-3 bg-gray-100/25 rounded">
                <div>
                  <TheLabel for="type" value="Type" />
                  <TheCombo id="type" v-model="item.type" :options="itemTypes.map(itemType => ({ value: itemType.value, text: itemType.translations[locale] }))" class="block w-full" />
                  <InputError :message="form.errors[`items.${itemIndex}.type`]" />
                </div>

                <div class="col-span-3">
                  <TheLabel for="title" value="Title" />
                  <TheInput id="title" v-model="item.title[locale]" type="text" class="block w-full" />
                  <InputError :message="form.errors[`items.${itemIndex}.title.${locale}`]" />
                </div>

                <div class="col-span-3">
                  <TheLabel for="paragraph" value="Paragraph" />
                  <TheTextarea id="paragraph" v-model="item.paragraph[locale]" type="text" class="block w-full resize-y" />
                  <InputError :message="form.errors[`items.${itemIndex}.paragraph.${locale}`]" />
                </div>
              </div>

              <div class="flex w-full justify-end items-baseline space-x-8">
                <div v-if="form.isDirty" class="grow justify-self-start font-semibold text-red-600">
                  There are unsaved form changes.
                </div>
                <a href="/admin/clients" title="Return to index" class="inline-block px-6 py-2 font-bold leading-tight transition duration-150 ease-in-out focus:outline-none focus:ring-0">
                  Cancel 
                </a>
                <button type="submit" :disabled="form.processing" class="inline-block rounded border-2 border-blue-600 bg-blue-600 px-6 py-2 font-bold leading-tight text-white transition duration-150 ease-in-out hover:bg-blue-500 focus:outline-none focus:ring-0">
                  Update Client
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>

