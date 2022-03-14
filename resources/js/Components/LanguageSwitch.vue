<template>
    <Link :href="'/language/' + language" v-for="(language, name) in languages"
       class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-white cursor-pointer">
        {{ name }}
    </Link>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
export default {
    components: {
        Link
    },
    computed: {
        languages() {
            return this.$page.props.availableLanguages
        },
        locale() {
            return this.$page.props.locale
        }
    },
    methods: {
        changeLang(lang) {
            let self = this;
            axios.get('/language/' + lang).then(function (response) {
                console.log(self.$page.props.locale)
            })
        }
    }
}
</script>