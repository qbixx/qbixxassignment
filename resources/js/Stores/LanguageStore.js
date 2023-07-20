import {defineStore} from "pinia";
import {ref} from "vue";
import languages from "@/js/Config/languages";

export const useLanguageStore = defineStore('language', () =>{
    const activeLanguage = ref(Object.keys(languages)[0])

    const setLanguage = (language) => {
        activeLanguage.value = language
    }

    return {
        activeLanguage,
        setLanguage
    }
})
