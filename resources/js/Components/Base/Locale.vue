<template>
    <Link :href="`/locale/${locale}`" v-for="locale in locales" method="post" class="uppercase text-sm p-2" :class="locale === $page.props.locale ? 'bg-slate-400' : 'bg-slate-300'">
        {{ locale }}
    </Link>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
    name: "Locale",
    components: {
        Link
    },
    computed: {
        locales() {
            return [
                'en',
                'fr',
                'nl',
            ]
        }
    }
}
</script>

<style scoped>

</style>
