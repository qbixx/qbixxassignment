<template>
    <AdminLayout>
        <Head title="New Client" />

        <div class="view">
            <section id="header">
                <div class="header">
                    <h5>{{ client.name }}</h5>
                    <select @change="changeLocale" v-model="locale" name="locale"  id="">
                        <option v-for="(locale, lang) in locales" :value="locale">{{ lang }}</option>
                    </select>
                </div>
            </section>

            <div class="items">
                <div v-for="item, key in items" :key="key" class="item">
                    <div class="head" :class="item.type">
                        <h5>{{ item.type_locale }}</h5>
                    </div>
                    <div class="body">
                        <div class="title ">
                            <h2 class="text-overflow">{{ item.title_locale }}</h2>
                        </div>
                        <p class="">
                            {{item.paragraph_locale }}
                        </p>

                        <div class="footer">
                            <button>{{ buttonTranslation }}</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </AdminLayout>
</template>

<script>
    import {useForm} from '@inertiajs/inertia-vue3'
    import AdminLayout from '@/js/Layouts/AdminLayout.vue'
    import {ref} from "vue"

    export default {
        components: {
            AdminLayout,
        },

        props: {
            client: Object,
            items: Array,
            locales: Array,
            currentLocale: String,
            buttonTranslation: String,
        },

        setup(props) {

            const locale = ref(props.currentLocale)
            const form = useForm({})
            const changeLocale = () => {
                form.post(`/admin/language/${locale.value}`)
            }

            return {changeLocale, locale}
        },
    }
</script>
