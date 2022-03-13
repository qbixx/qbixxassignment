require('./bootstrap');

import {createApp, h} from 'vue'
import {createInertiaApp} from '@inertiajs/inertia-vue3'
import store from './store'
import VueSweetalert2 from 'vue-sweetalert2'
import 'sweetalert2/dist/sweetalert2.min.css'
import {translate} from "./libs/translate";

createInertiaApp({
  resolve: name => require(`./Pages/${name}`),
  setup({el, App, props, plugin, globalProperties}) {
    const app = createApp({render: () => h(App, props)})
        .use(plugin)
        .use(store)
        .mixin({methods: {route}})
        .use(VueSweetalert2)
    app.provide('swal', app.config.globalProperties.$swal)
        .provide('translate', translate)

    app.mount(el)
  },
}).catch(() => {
})
