<template>
    <Link
        :href="`${this.$page.url}?change_language=${index}`"
        v-for="(locale, index) in languages"
        :key="index"
        class="text-gray-700 block px-4 py-2 text-sm"
    >
        {{ locale }}
    </Link>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
    components: {
        Link,
    },
    computed: {
        languages() {
            return this.$page.props.availableLanguages;
        },
    },
};
</script>
