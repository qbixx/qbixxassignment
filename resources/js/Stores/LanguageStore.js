import {defineStore} from "pinia";
import {ref} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";

const page = usePage()

export const useLanguageStore = defineStore('language', () =>{
    const activeLanguage = ref(Object.keys(page.props.value.languages)[0])

    const setLanguage = (language) => {
        activeLanguage.value = language
    }

    return {
        activeLanguage,
        setLanguage
    }
})
