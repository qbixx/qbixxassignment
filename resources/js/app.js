import {createApp, h} from 'vue'
import {createInertiaApp, Head, Link} from '@inertiajs/inertia-vue3'
import {InertiaProgress} from '@inertiajs/progress'
import {createPinia} from 'pinia'

window.axios = require('axios')
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

const pinia = createPinia()

createInertiaApp({
    title: title => `${title} - Qbixx Assignment`,
    resolve: name => require(`./Pages/${name}`),
    setup({el, App, props, plugin}) {
        createApp({render: () => h(App, props)})
            .use(plugin)
            .use(pinia)
            .component('Head', Head)
            .component('Link', Link)
            .mount(el)
    },
})

InertiaProgress.init()
