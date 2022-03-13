<template>
  <app-layout>
    <div class="p-4 rounded shadow bg-white">
      <div class="grid grid-cols-2 gap-4">
        <div class="col-span-2 md:col-span-1">
          <form @submit.prevent="submit()">
            <div class="mb-4">
              <label class="mb-1">Client Name</label>
              <input v-model="form.name" class="form-input" type="text"/>
              <div v-if="form.errors" class="text-red-700 text-sm mt-1">{{ form.errors.name }}</div>
            </div>
            <div class="mb-4">
              <tab-set>
                <template v-for="(lang, i) in languages" :key="lang.key">
                  <tab :name="lang.name" :selected="lang.key === activeTab">
                    <div class="mb-2">
                      <label class="mb-1 block">Type</label>
                      <v-select v-model="form.items[0][`type_${lang.key}`]" :options="options[lang.key]"></v-select>
                      <div v-if="form.errors" class="text-red-700 text-sm mt-1">
                        {{ form.errors[`items.0.type_${lang.key}`] }}
                      </div>
                    </div>
                    <div class="mb-2">
                      <label class="mb-1 block">Title</label>
                      <input v-model="form.items[0][`title_${lang.key}`]" class="form-input" type="text"/>
                      <div v-if="form.errors" class="text-red-700 text-sm mt-1">
                        {{ form.errors[`items.0.title_${lang.key}`] }}
                      </div>
                    </div>
                    <div class="mb-2">
                      <label class="mb-1 block">Description</label>
                      <textarea v-model="form.items[0][`description_${lang.key}`]" class="form-input" rows="3"
                                type="text"></textarea>
                      <div v-if="form.errors" class="text-red-700 text-sm mt-1">
                        {{ form.errors[`items.0.description_${lang.key}`] }}
                      </div>
                    </div>
                    <hr class="border-t-2 border-gray-300 my-3"/>
                    <div class="mb-2">
                      <label class="mb-1 block">Type</label>
                      <v-select v-model="form.items[1][`type_${lang.key}`]" :options="options[lang.key]"></v-select>
                      <div v-if="form.errors" class="text-red-700 text-sm mt-1">
                        {{ form.errors[`items.1.type_${lang.key}`] }}
                      </div>
                    </div>
                    <div class="mb-2">
                      <label class="mb-1 block">Title</label>
                      <input v-model="form.items[1][`title_${lang.key}`]" class="form-input" type="text"/>
                      <div v-if="form.errors" class="text-red-700 text-sm mt-1">
                        {{ form.errors[`items.1.title_${lang.key}`] }}
                      </div>
                    </div>
                    <div class="mb-2">
                      <label class="mb-1 block">Description</label>
                      <textarea v-model="form.items[1][`description_${lang.key}`]" class="form-input" rows="3"
                                type="text"></textarea>
                      <div v-if="form.errors" class="text-red-700 text-sm mt-1">
                        {{ form.errors[`items.1.description_${lang.key}`] }}
                      </div>
                    </div>
                    <hr class="border-t-2 border-gray-300 my-3"/>
                    <div class="mb-2">
                      <label class="mb-1 block">Type</label>
                      <v-select v-model="form.items[2][`type_${lang.key}`]" :options="options[lang.key]"></v-select>
                      <div v-if="form.errors" class="text-red-700 text-sm mt-1">
                        {{ form.errors[`items.2.type_${lang.key}`] }}
                      </div>
                    </div>
                    <div class="mb-2">
                      <label class="mb-1 block">Title</label>
                      <input v-model="form.items[2][`title_${lang.key}`]" class="form-input" type="text"/>
                      <div v-if="form.errors" class="text-red-700 text-sm mt-1">
                        {{ form.errors[`items.2.title_${lang.key}`] }}
                      </div>
                    </div>
                    <div class="mb-2">
                      <label class="mb-1 block">Description</label>
                      <textarea v-model="form.items[2][`description_${lang.key}`]" class="form-input" rows="3"
                                type="text"></textarea>
                      <div v-if="form.errors" class="text-red-700 text-sm mt-1">
                        {{ form.errors[`items.2.description_${lang.key}`] }}
                      </div>
                    </div>
                  </tab>
                </template>
              </tab-set>
            </div>
            <j-button>Save</j-button>
          </form>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/layouts/AppLayout";
import TabSet from "@/templates/TabSet";
import Tab from '@/templates/Tab';
import JButton from '@/templates/Button';
import {onBeforeMount, reactive, toRefs, watch} from "vue";
import {Inertia} from "@inertiajs/inertia";
import VueMultiselect from 'vue-multiselect';
import * as _ from 'lodash';

export default {
  name: "Update",
  props: ['client'],
  components: {
    AppLayout,
    TabSet,
    Tab,
    JButton,
    'v-select': VueMultiselect
  },
  setup(props) {
    // State
    const state = reactive({
      form: {
        name: '',
        items: [
          {
            type_en: '',
            type_nl: '',
            type_fr: '',
            title_en: '',
            title_nl: '',
            title_fr: '',
            description_en: '',
            description_nl: '',
            description_fr: ''
          },
          {
            type_en: '',
            type_nl: '',
            type_fr: '',
            title_en: '',
            title_nl: '',
            title_fr: '',
            description_en: '',
            description_nl: '',
            description_fr: ''
          },
          {
            type_en: '',
            type_nl: '',
            type_fr: '',
            title_en: '',
            title_nl: '',
            title_fr: '',
            description_en: '',
            description_nl: '',
            description_fr: ''
          }
        ]
      },
      languages: [
        {
          key: 'en',
          name: 'English',
        },
        {
          key: 'nl',
          name: 'Dutch',
        },
        {
          key: 'fr',
          name: 'French'
        }
      ],
      options: {
        en: ['Wisdom', 'Philosophy', 'Design'],
        nl: ['Wijsheid', 'Filosofie', 'Ontwerp'],
        fr: ['Sagesse', 'Philosophie', 'Conception']
      },
      errors: null,
      activeTab: 'en'
    })

    // Watch
    watch(() => _.cloneDeep(state.form),
        (newVal, oldVal) => {
          newVal.items.forEach((val, i) => {
            if (isTypeNotEmpty(val)) {
              const typeKey = getChangedType(val, oldVal.items[i])
              if (typeKey) {
                const index = state.options[typeKey].indexOf(val[`type_${typeKey}`])
                if (index !== -1) {
                  state.form.items[i].type_en = state.options.en[index]
                  state.form.items[i].type_nl = state.options.nl[index]
                  state.form.items[i].type_fr = state.options.fr[index]
                }
              }
            }
          })
        })

    // Methods
    const isTypeNotEmpty = (val) => {
      return val.type_en !== '' || val.type_nl !== '' || val.type_fr !== ''
    }
    const getChangedType = (newVal, oldVal) => {
      let key = null
      if (newVal.type_en !== oldVal.type_en) {
        key = 'en'
      } else if (newVal.type_nl !== oldVal.type_nl) {
        key = 'nl'
      } else if (newVal.type_fr !== oldVal.type_fr) {
        key = 'fr'
      }
      return key
    }

    // Methods
    const setActiveTab = (err) => {
      let lang = ''
      Object.keys(err).find(key => {
        if (key.endsWith('_en')) {
          lang = 'en'
        }
      })
      if (lang === '') {
        Object.keys(err).find(key => {
          if (key.endsWith('_nl')) {
            lang = 'nl'
          }
        })
      }
      if (lang === '') {
        Object.keys(err).find(key => {
          if (key.endsWith('_fr')) {
            lang = 'fr'
          }
        })
      }
      state.activeTab = lang ? lang : state.activeTab
    }
    const submit = () => {
      Inertia.put(route('admin.clients.update', props.client.id), state.form, {
        errorBag: 'client',
        preserveScroll: true,
        onError: (err) => {
          state.form.errors = err
          setActiveTab(err)
        }
      })
    }

    onBeforeMount(() => {
      state.form = {
        name: props.client.name,
        items: props.client.items
      }
    })

    return {
      ...toRefs(state),
      submit
    }
  }
}
</script>

<style scoped></style>
