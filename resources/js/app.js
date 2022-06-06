import { createApp, h } from "vue";
import { createInertiaApp, Head, Link } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import { createI18n } from "vue-i18n";

window.axios = require("axios");
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

createInertiaApp({
    title: (title) => `${title} - Qbixx Assignment`,
    resolve: (name) => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        const i18n = createI18n({
            locale: props.initialPage.props.locale, // user locale by props
            fallbackLocale: "en", // set fallback locale
            messages: {
                en: {
                    button_text: "Just a button",
                },
                nl: {
                    button_text: "Gewoon een knop",
                },
                fr: {
                    button_text: "Juste un bouton",
                },
            },
        });
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(i18n)
            .component("Head", Head)
            .component("Link", Link)
            .mount(el);
    },
});

InertiaProgress.init();
