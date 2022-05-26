import {createApp, h} from 'vue'
import {createInertiaApp, Head, Link} from '@inertiajs/inertia-vue3'
import {InertiaProgress} from '@inertiajs/progress'

window.axios = require('axios')
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

createInertiaApp({
    title: title => `${title} - Qbixx Assignment`,
    resolve: name => require(`./Pages/${name}`),
    setup({el, App, props, plugin}) {
        createApp({render: () => h(App, props)})
            .use(plugin)
            .component('Head', Head)
            .component('Link', Link)
            .mixin({
                methods: {
                    trans(key, locale = 'en') {
                        const translations = this.$page.props.translations

                        return translations[key] ?? key
                    }
                }
            })
            .mount(el)
    },
})

InertiaProgress.init()
